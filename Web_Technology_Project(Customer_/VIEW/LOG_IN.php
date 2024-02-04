<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>LOG IN FORM</title>
	<link rel="stylesheet" href="A.css">
	<style>
		
	</style>
</head>

<body id=LB>
<div id="example1"  >
	<form action="<?php echo htmlspecialchars("../CONTROLLER/LOG_IN_A.php"); ?>" method="POST">
	<br>
	<br>
	<label for="fname" style="margin-left:600px;">UserName</label>
  	<input type="text"  name="Username">
	<br>
	<br>
	<label for="fname" style="margin-left:600px;">Password</label> <input type="text" name="password">
	<br>
	<br>
	<a style="margin-left:600px;" href="../CONTROLLER/FORGET_PASSWORD_A.php">Forgot Password?</a>
	<br> 
	<br>
	<input style="margin-left:600px;" type="submit" name="submit" value="Log in">
	</form>
	</fieldset>
	<br>
	<br>
	<a style="margin-left:600px;" href="REGISTRATION.php">Create an Account</a> 
</div >	
</body>
</html>

