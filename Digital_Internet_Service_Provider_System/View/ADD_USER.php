<?php
 session_start();
 if(count($_SESSION)===0)
 {
	header("Location:../CONTROLLER/LOG_OUT.php");
 }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title style="text-align:center;">Add User</title>
	<style>
		#msg{
		color:red;
		}
</style>
	<link rel="stylesheet" href="../VIEW/A.css">
	<style type="text/css">
	div.sticky 
	{
	  position: -webkit-sticky;
	  position: sticky;
	  top: 0;
	  background-color: #74A7CE;
	  padding: 5px;
	  font-size: 20px;
	}
	.footer 
	{
	   left: 0;
	   bottom: 0;
	   width: 100%;
	   background-color: #74A7CE;
	   color: black;
	   margin: 0px;
	   text-align: center;
	}

	.dropbtn 
	{
	  background-color: #8CE5E5;
	  border-radius: 25px;
	  color: white;
	  padding: 6px;
	  font-size: 10px;
	  border: none;
	  cursor: pointer;
	  margin-left: 200px;
	}

	.dropdown 
	{
	  position: relative;
	  display: inline-block;
	}

	.dropdown-content 
	{
	  display: none;
	  position: absolute;
	  right: 0;
	  background-color: #f9f9f9;
	  min-width: 130px;
	  box-shadow: 0px 6px 16px 0px rgba(0,0,0,0.2);
	  z-index: 1;
	}

	.dropdown-content a 
	{
	  color: black;
	  padding: 12px 16px;
	  text-decoration: none;
	  display: block;
	}

	.dropdown-content a:hover {background-color: #38B6B6;}

	.dropdown:hover .dropdown-content 
	{
	  display: block;
	}

	.dropdown:hover .dropbtn 
	{
	  background-color: #38B6B6;
	   border-radius: 25px;
	}
	</style>
	<div class="sticky">
		<?php include('../VIEW/HF/HEADER.html')?>
	</div>
	<h1 style="text-align:center;" ><u>Add User</u></h1>
</head>
<body id="B_Color">

	
	<h3 style="text-align:right;" >User: <?php echo $_SESSION['Username']; ?></h3>
	<button style="text-align:right; margin-left: 1270px;" type="button"  onclick="window.location.href='../CONTROLLER/LOG_OUT.php';"><h4>Log out</h4></button>
	<button style="text-align:right; margin-right: 1270px;" type="button"  onclick="window.location.href='../VIEW/PROFILE.php';"><h4>Back</h4></button>
	<br>
	<br>
	
	
		<form name="jsform" action="<?php echo htmlspecialchars("../CONTROLLER/ADD_USER_A.php"); ?>" method="POST" onsubmit="return isValid(this);">
		<fieldset>
		<legend>Basic information </legend>
		
			<u>Name*</u>: <input type="text" name="firstname">
			<br>
			<br>
			<u>Gender*</u>: <br>
			<input type="radio" name="gender" value="male">Male <br>
			<input type="radio" name="gender" value="female">Female<br>
			<input type="radio" name="gender" value="other">Other<br>
			<br>
			<br>		
			<u>Dob*</u>:
			<input type="date"  name="Dob">
			<br>
			<br>
			<u>Religion*</u>: 
			<select name="Religion">
			    <option value="none">none</option><br>
				<option value="Islam">Islam</option><br>
				<option value="Hindu">Hindu</option><br>
				<option value="Christianity">Christianity</option><br>
				<option value="Others">Others</option><br>
			</select>
			<br>
			<br>			
		</fieldset>
		<fieldset>
		<legend >Contact Information</legend>
		<u>Address</u>: 
		<textarea  name="PreAddress" ></textarea>
		<br>
		<br>
		<u>Phone*</u>:
		<input type="tel" id="phone" name="phone" >
		<br>
		<br>
		<u>Email*</u>:
		<input type="Email" id="Email" name="Email">
		<br>
		<br>
		</fieldset>
		<fieldset >
		<legend >Account Information</legend>
		<u>USER TYPE*</u>: <br>
			<input type="radio" name="USER" value="customer">CUSTOMER<br>
			<input type="radio" name="USER" value="manager">MANAGER<br>
			<input type="radio" name="USER" value="lineman">LINE MAN<br>
			<br>
			<br>
		<u>Username*</u>:
		<input type="text" name="Username">
			<br>
			<br>
		<u>password*</u>: 
		<input type="password" name="password">
			<br>
			<br>	
		</fieldset>
			<br>
			<br>
		</fieldset>
		<input type="submit" name="submit" value="submit">
	</form>
	<br>
	<br>
	<p id="msg"></p>
	<script>
		function isValid(jsform)
		{
			const NAME= jsform.firstname.value;
			const GENDER= jsform.gender.value;
			const DATE= jsform.Dob.value;
			const RELIGION= jsform.Religion.value;
			const PHONE= jsform.phone.value;
			const ADDRESS= jsform.PreAddress.value;
			const EMAIL= jsform.Email.value;
			const USERNAME= jsform.Username.value;
			const PASSWORD= jsform.password.value;
			const USER= jsform.USER.value;
			if ( NAME === "" || GENDER === "" || DATE === "" ||
				RELIGION === "none" || PHONE === "" || EMAIL === "" ||
				USERNAME === "" || PASSWORD === "" || USER === "" ) 
			{
				document.getElementById("msg").innerHTML = "Please fill up the form properly";
				return false;
			}
			else if(NAME.toString().length > 100)
			{
				document.getElementById("msg").innerHTML = "Name characters should be equal or less than 100 characters";
				return false;
			}
			else if(GENDER.toString().length > 10)
			{
				document.getElementById("msg").innerHTML = "Gender characters should be equal or less than 10 characters";
				return false;
			}
			else if(DATE.toString().length > 50)
			{
				document.getElementById("msg").innerHTML = "DOB characters should be equal or less than 50 characters";
				return false;
			}
			else if(RELIGION.toString().length > 10)
			{
				document.getElementById("msg").innerHTML = "DOB characters should be equal or less than 10 characters";
				return false;
			}
			else if(ADDRESS.toString().length > 100)
			{
				document.getElementById("msg").innerHTML = "Address characters should be equal or less than 100 characters";
				return false;
			}
			else if(PHONE.toString().length !== 11)
			{
				document.getElementById("msg").innerHTML = "Phone number characters should be equal to 11 characters";
				return false;
				
			}
			else if(isNaN(PHONE))
			{
				document.getElementById("msg").innerHTML = "Phone number characters should be all neumeric";
				return false;
			}
					
			else if(EMAIL.toString().length > 50)
			{
				document.getElementById("msg").innerHTML = "Email characters should be equal or less than 50 characters";
				return false;
			}
			else if(USERNAME.toString().length > 50)
			{
				document.getElementById("msg").innerHTML = "Username characters should be equal or less than 50 characters";
				return false;
			}
			else if(PASSWORD.toString().length > 100)
			{
				document.getElementById("msg").innerHTML = "Password characters should be equal or less than 100 characters";
				return false;
			}
			return true;
		}
	</script>

	<div class="footer">
  		<?php include('../VIEW/HF/FOOTER.html'); ?>	
  </div>
</body>
</html>