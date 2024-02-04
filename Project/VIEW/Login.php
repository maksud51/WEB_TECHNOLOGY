<!DOCTYPE html>
<?php include('../VIEW/HF/HEADER.html')?>

<html>
<head>
	<title>Login</title>
		<title>Registration Form</title>
		 <style>
		 
	      #message{
		            color:red;
					}
	 </style>
		
</head>
<body>

	<h1 style="text-align:center;"><u><b>SIGN IN YOUR ACCOUNT </b></u></h1>
	<br>
	<fieldset>
	<form name="jsform" action="<?php echo htmlspecialchars("../CONTROLLER/LoginAction.php"); ?>" method="POST" onsubmit="return isValid(this);">
	
	<h5 style="text-align:center;">
	<label for="username">Username:</label> 
	<input type="text" name="username"></h5>

	<h5 style="text-align:center;">
	<label for="password">Password:</label> 
	<input type="text" name="password"></h5>
	
	<h5 style="text-align:center;">
	<input type="submit" name="submit" value="login"></h5>
	<br>
	
	<a href="../CONTROLLER/Forgotpassword.php"><b>Forgot Password.</b></a> 
	<a href="../VIEW/Registration.php"><b>Sign up for Manager</b></a> 
	</fieldset>
	</form>
	
	<p id="message"></p>
		
		<script>
	      function isValid(jsForm){
		   const username = jsForm.username.value;
		   const  password = jsForm. password.value;
		   
		 
		   if(username==="" || password==="" ){
		       document.getElementById("message").innerHTML = "Please fill up the form properly;"
		       return false;
              }
		  
	     else if(username.toString().length > 10)
			{
				document.getElementById("message").innerHTML = "User Name must be less than 11 characters*";
				return false;
			}
			
		 else if(password.toString().length > 30)
			{
				document.getElementById("message").innerHTML = "Password must be less than 31 characters*";
				return false;
			}
			

		  
		    return true;
		  
	 }  
	
	</script>
	
	
	
	
	
	
	<br>
	
	
	
	

 <?php include('../VIEW/HF/FOOTER.html')?>
</body>	
</html>