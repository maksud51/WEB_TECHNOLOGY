<!DOCTYPE html>
<?php include "../MODEL/FUNCTION.php"?>
<html>
<head>
	<title>Registration Form</title>
</head>
<body>
	<h1 style="text-align:center;"><u>Registration Form</u></h1>
	
	<a href="../CONTROLLER/LOG_OUT.php">Log Out</a> 
	<p> || </p>
	<a href="../VIEW/PROFILE.php">HOME</a>
	
	
		<form action="<?php echo htmlspecialchars("../CONTROLLER/PACKAGE_A.php"); ?>" method="POST">
		<fieldset>
		<legend>Basic information </legend>
		
			<u>Name*</u>: <input type="text" name="firstname">
			<br>
			<br>
			<u>Gender*</u>: 
			<input type="radio" name="gender" value="male">Male
			<input type="radio" name="gender" value="female">Female
			<input type="radio" name="gender" value="other">Other
			<br>
			<br>		
			<u>Dob*</u>:
			<input type="date"  name="Dob">
			<br>
			<br>
			<u>Religion*</u>: 
			<select name="Religion">
			    <option value="none">none</option>
				<option value="Islam">Islam</option>
				<option value="Hindu">Hindu</option>
				<option value="Christianity">Christianity</option>
				<option value="Others">Others</option>
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
		<u>Phone</u>:
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
	<fieldset>
	<br>
	<br>
	
	Already registered?
	<a href="LOG_IN.php">Click here</a> for login.

</body>
</html>