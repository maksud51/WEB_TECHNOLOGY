<!DOCTYPE html>
<html>
<head>
	<title>Registration Form</title>
	<style>
		#msg{
		color:red;
		}
   </style>
	<link rel="stylesheet" href="Reg.css">
	<link rel="stylesheet" href="Reg.css">

	<style>
	.dropbtn {
	  background-color: #8CE5E5;
	  border-radius: 25px;
	  color: white;
	  padding: 6px;
	  font-size: 10px;
	  border: none;
	  cursor: pointer;
	  margin-left: 200px;
	}

	.dropdown {
	  position: relative;
	  display: inline-block;
	}

	.dropdown-content {
	  display: none;
	  position: absolute;
	  right: 0;
	  background-color: #f9f9f9;
	  min-width: 130px;
	  box-shadow: 0px 6px 16px 0px rgba(0,0,0,0.2);
	  z-index: 1;
	}

	.dropdown-content a {
	  color: black;
	  padding: 12px 16px;
	  text-decoration: none;
	  display: block;
	}

	.dropdown-content a:hover {background-color: #38B6B6;}

	.dropdown:hover .dropdown-content {
	  display: block;
	}

	.dropdown:hover .dropbtn {
	  background-color: #38B6B6;
	   border-radius: 25px;

}
</style>
  <div class="sticky">
    <?php include('../VIEW/HF/HEADER_A.html')?>
  </div>
</head>
<body>
	<div id="example2"  >
	<h1 style="text-align:center;"><u>Registration Form</u></h1>
	
	
		<form name="jsform" action="<?php echo htmlspecialchars("../CONTROLLER/REGISTRATION_A.php");?>" method="POST" onsubmit="return isValid(this);">
		
			<u><i>Name*</i></u>: <input type="text" name="firstname">
			<br>
			<br>
			<u><i>Gender*</i></u>: 
			<input type="radio" name="gender" value="male"><i>Male</i>
			<input type="radio" name="gender" value="female"><i>Female</i>
			<input type="radio" name="gender" value="other"><i>Other</i>
			<br>
			<br>		
			<u><i>Date of Birth*</i></u>:
			<input type="date"  name="Dob">
			<br>
			<br>
			<u><i>Religion*</i></u>: 
			<select name="Religion">
			    <option value="none">none</option>
				<option value="Islam">Islam</option>
				<option value="Hindu">Hindu</option>
				<option value="Christianity">Christianity</option>
				<option value="Others">Others</option>
			</select>
			<br>
			<br>			
		<u><i>Address</i></u>: 
		<textarea  name="PreAddress" ></textarea>
		<br>
		<br>
		<u><i>Phone*</i></u>:
		<input type="tel" id="phone" name="phone" >
		<br>
		<br>
		<u><i>Email*<i></u>:
		<input type="Email" id="Email" name="Email">
		<br>
		<br>
		<u><i>Username*<i></u>:
		<input type="text" name="Username">
			<br>
			<br>
		<u><i>password*<i></u>: 
		<input type="password" name="password">
			<br>
			<br>	
			<br>
			<br>
		<input type="submit" name="submit" value="submit">
		</div>
	</form>
	<fieldset>
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
			const ADDRESS= jsform.PreAddress.value;
			const PHONE= jsform.phone.value;
			const EMAIL= jsform.Email.value;
			const USERNAME= jsform.Username.value;
			const PASSWORD= jsform.password.value;
			if ( NAME === "" || GENDER === "" || DATE === "" ||
				RELIGION === "none" || PHONE === "" || EMAIL === "" ||
				USERNAME === "" || PASSWORD === "" ) 
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
				document.getElementById("msg").innerHTML = "Email characters should be equal or less than 100 characters";
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

	
	<h3> Already registered? - <a href="LOG_IN.php">Login</a><h3>
<div class="footer">
      <?php include('../VIEW/HF/FOOTER.html'); ?> 
 </div>
</body>
</html>