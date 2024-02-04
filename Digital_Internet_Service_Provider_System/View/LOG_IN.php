<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>LOG IN FORM</title>
	<style>
		#msg{
		color:red;
		}
</style>
	<link rel="stylesheet" href="A.css">
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
<h1 style="text-align:center;"><u>LOG IN FORM</u></h1>	
<body id="B_Color">
	<div id="example1"  >
	<form name="jsform" action="<?php echo htmlspecialchars("../CONTROLLER/LOG_IN_A.php"); ?>" method="POST" onsubmit="return isValid(this);">
	<br>
	<br>
	<label style="margin-left:600px;">Username</label>
	<input type="text" name="Username">
	<br>
	<br>
	<label style="margin-left:600px;">Password</label>
	<input type="text" name="password">
	<br>
	<br>
	<a style="margin-left:600px;"href="../CONTROLLER/FORGET_PASSWORD_A.php">Forgot Password?</a>
	<br> 
	<br>
	<input style="margin-left:600px;"type="submit" name="submit" value="Log in">
	</form>
	<br>
	<br>
	<p style="margin-left:600px"; id="msg"></p>
	<script > 
		function isValid(jsform)
		{
			const USERNAME= jsform.Username.value;
			const PASSWORD= jsform.password.value;
			if (USERNAME === "" || PASSWORD === "") {
				document.getElementById("msg").innerHTML = "Please fill up the form properly";
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
	<br>
	<h3 style="margin-left:600px;"> New user? - <a href="REGISTRATION.php">REGISTRATION</a><h3>
	<div class="footer">
      <?php include('../VIEW/HF/FOOTER.html'); ?> 
  </div>
</div>
</body>
</html>

