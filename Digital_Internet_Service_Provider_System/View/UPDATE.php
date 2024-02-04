<!DOCTYPE html>
<?php
 session_start();
 if(count($_SESSION)===0)
 {
	header("Location:../CONTROLLER/LOG_OUT.php");
 }
 ?>
<html>
<head>
	<meta charset="utf-8">
	<title style="text-align:center;">Update Profile</title>
		<style>
		#msg{
		color:red;
		}
	</style>
	<link rel="stylesheet" href="TABLE.css">
	<link rel="stylesheet" href="Reg.css">
	<link rel="stylesheet" href="A.css">
		<style type="text/css">
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
		<?php include('../VIEW/HF/HEADER.html')?>
	</div>
	<h1 style="text-align:center;" ><u>Update Profile</u></h1>
</head>
<body id="B_Color">
	<h3 style="text-align:right;" >User: <?php echo $_SESSION['Username']; ?></h3>
	<button style="text-align:right; margin-left: 1270px;" type="button"  onclick="window.location.href='../CONTROLLER/LOG_OUT.php';"><h4>Log out</h4></button>
	<button style="text-align:right; margin-right: 1270px;" type="button"  onclick="window.location.href='../VIEW/PROFILE.php';"><h4>Back</h4></button>
	<br>
	<br>

	<!--
	<button type="button" onclick="window.location.href='../VIEW/PROFILE.php';">Show details</button>
	-->
	<button type="button" onclick="getData();">Show Profile details</button>
	<p id="i1"></p>
	<table id="table">
			<tr>
				 <th>Name</th>
				 <th>Gender</th>
				 <th>Date of Birth</th>
				 <th>Religion</th>
				 <th>Address</th>
				 <th>Phone</th>
				 <th>Email</th>
				 <th>Username</th>
				 <th>Password</th>
			</tr>
		</th>
		<tbody id="i2"></tbody>
	</table>
	
	<script>
		function getData() {
			const xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {

				if (this.readyState === 4 && this.status === 200) {
					const json = JSON.parse(this.responseText);
					
					let x = "";

					for (let i = 0; i < json.length; i++) {
						x += "<tr>" + 
					"<td>" + json[i].name + "</td>" + 
					"<td>" + json[i].gender + "</td>" +
					"<td>" + json[i].dob + "</td>" + 
					"<td>" + json[i].religion + "</td>" + 
					"<td>" + json[i].address + "</td>" +  
					"<td>" + json[i].phone + "</td>" + 
					"<td>" + json[i].email + "</td>" +
					"<td>" + json[i].username + "</td>" + 
					"<td>" + json[i].password + "</td>" + 
					"</tr>"
					}

					document.getElementById("i2").innerHTML = x;
					console.log(x);
				}
			}
			xhttp.open("GET", "../MODEL/UPDATE_M.php");
			xhttp.send();
		}
	</script>
	
	
		 <br>
		 <br>
		 
	
		<form name="jsform" action="<?php echo htmlspecialchars("../CONTROLLER/UPDATE_A.php"); ?>" method="POST" onsubmit="sendData(this); return false;">
		
			<u><i>Name*</i></u>: <input type="text" name="firstname">
			<br>
			<br>
			<u><i>Gender*</i></u>:<br> 
			<input style="margin-left:900px" type="radio" name="gender" value="male">Male
			<input style="margin-left:900px" type="radio" name="gender" value="female">Female
			<input style="margin-left:900px" type="radio" name="gender" value="other">Other
			<br>
			<br>		
			<u><i>Dob*</i></u>:
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
		<u><i>Email*</i></u>:
		<input type="Email" id="Email" name="Email">
		<br>
		<br>
		<u><i>Phone*</i></u>:
		<input type="tel" id="phone" name="phone" >
		<br>
		<br>
		<br>

		<input style="margin-left:900px" type="submit" name="submit" value="Update">
	</form>
	<br>
	<br>
	<p id="msg"></p>
	<script>
		function sendData(formData) 
		{
			const NAME= jsform.firstname.value;
			const GENDER= jsform.gender.value;
			const DATE= jsform.Dob.value;
			const RELIGION= jsform.Religion.value;
			const ADDRESS= jsform.PreAddress.value;
			const PHONE= jsform.phone.value;
			const EMAIL= jsform.Email.value;
			if ( NAME === "" || GENDER === "" || DATE === "" ||
				RELIGION === "none" || PHONE === "" || EMAIL === "") 
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
			const xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState === 4 && this.status === 200) {
					document.getElementById("msg").innerHTML = this.responseText;
				}
			}
			xhttp.open(formData.method, formData.action);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			const myData = {
				"firstname" : formData.firstname.value,
				"gender" : formData.gender.value,
				"Dob" : formData.Dob.value,
				"Religion" : formData.Religion.value,
				"PreAddress" : formData.PreAddress.value,
				"phone" : formData.phone.value,
				"Email" : formData.Email.value
			}
			xhttp.send("obj="+JSON.stringify(myData));
			getData();
			
		}
	</script>
	
<div class="footer">
  		<?php include('../VIEW/HF/FOOTER.html'); ?>	
</div>
</body>
</html>