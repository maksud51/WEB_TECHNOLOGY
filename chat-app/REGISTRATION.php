<!DOCTYPE html>
<html>
<head>
	<title>Registration Form</title>
</head>
<body>
	<h1 style="text-align:center;"><u>Registration Form</u></h1>
	
	
		<form action="REGISTRATION_A.php" method="post" onsubmit="sendData(this); return false;">
		<fieldset>
		<legend >Account Information</legend>
		<u>Username</u>:
		<input type="text" name="Username">
			<br>
			<br>
		<u>password</u>: 
		<input type="password" name="Password">
			<br>
			<br>
		<u>Email</u>:
		<input type="Email" id="Email" name="Email">
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
		function sendData(formData) {
			if (formData.Username.value === "" || formData.Password.value === "" || formData.Email.value === "") {
				document.getElementById("msg").innerHTML = "Please fill up the form properly";
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
				"Username" : formData.Username.value,
				"Password" : formData.Password.value,
				"Email" : formData.Email.value
			}
			xhttp.send("obj="+JSON.stringify(myData));
		}
	</script>
	
	
	
	
	<h3> Already registered? - <a href="LOG_IN.php">Login</a><h3>	
</body>
</html>