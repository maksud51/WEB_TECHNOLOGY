<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>LOG IN FORM</title>
</head>
	<h1 style="text-align:center;"><u>LOG IN FORM</u></h1>	
 <body>
	<fieldset style="text-align:center;">
	<legend>   Log In   </legend>
	<form name="jsform" action="LOG_IN_A.php" method="post" onsubmit="return isValid(this);"> 
	<br>
	<br>
	Username: <input type="text" name="Username">
	<br>
	<br>
	password: <input type="text" name="password">
	<br>
	<br>
	<input type="submit" name="submit" value="Log in">
	</form>
	</fieldset style="text-align:center;">
	<br>
	<br>
	<p id="msg"></p>
	<script>
		function isValid(jsform)
		{
			const USERNAME= jsform.Username.value;
			const PASSWORD= jsform.password.value;
			if (USERNAME === "" || PASSWORD === "") {
				document.getElementById("msg").innerHTML = "Please fill up the form properly";
				return false;
			}
			return true;
		}
	</script>

	<h3> New user? - <a href="REGISTRATION.php">REGISTRATION</a><h3>
	
</body>
</html>

