<!DOCTYPE html>
<?php include "../MODEL/FUNCTION.php"?>
<html>
<head>
	<title style="color: blueviolet;">Registration Form</title>
	<link rel="stylesheet" href="Reg.css">
	<style>

	</style>
</head>


<body>
	<div id="example2"  >
	<h1 style="text-align:center;color: blueviolet;"><u>Registration Form</u></h1>
	
	
		<form action="<?php echo htmlspecialchars("../CONTROLLER/REGISTRATION_A.php"); ?>" method="POST">

		
			<i>Name </i>: <input type="text" name="firstname">

			<i>Gender*</i>: 
			<input type="radio" name="gender" value="male"><i>Male</i>
			<input type="radio" name="gender" value="female"><i>Female</i>
			<input type="radio" name="gender" value="other"><i>Other</i>
			<br>
			<br>		
			<i>Dob*</i>:
			<input  type="date"  name="Dob">
			<br>
			<br>
			<i>Religion*</i>: 
			<select name="Religion">
			    <option value="none">none</option>
				<option value="Islam">Islam</option>
				<option value="Hindu">Hindu</option>
				<option value="Christianity">Christianity</option>
				<option value="Others">Others</option>
			</select>
			<br>
			<br>			
		<i>Address</i>: 
		<textarea  name="PreAddress" ></textarea>
		<br>
		<br>
		<i>Phone</i>:
		<input type="tel" id="phone" name="phone" >
		<br>
		<br>
		<i>Email*</i>:
		<input type="Email" id="Email" name="Email">
		<br>
		<br>
		<i>Username*</i>:
		<input type="text" name="Username">
			<br>
			<br>
		<i>password*</i>: 
		<input type="password" name="password">
			<br>
			<br>	
		</fieldset>
			<br>
			<br>

		<input type="submit" name="submit" value="Signup">
		</div>
	</form>
	Already registered?
	<a href="LOG_IN.php">Click here</a> for login.

</body>
</html>