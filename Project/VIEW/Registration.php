<!DOCTYPE html>
<?php include('../VIEW/HF/HEADER.html')?>

<html>
<head>
	<title>Registration Form</title>
		 <style>
	      #message{
		            color:red;
					}
	 </style>
</head>
<body>

	<h1 style="text-align:center;"><u><b>Manager Registration</b></u></h1>
	
		<form name="jsform" action="<?php echo htmlspecialchars("../CONTROLLER/RegistrationAction.php"); ?>" method="POST" onsubmit="return isValid(this);">
		<fieldset>
		<legend  style="text-align:center";><h3>Personal Information</h3></legend>
		
			<b>Name<span style="color: red;">*</b>:
			<input type="text" name="name">
			<br>
			<br>
			
			<b>Gender<span style="color: red;"> *</b>:
			<input type="radio" name="gender" value="male">Male
			<input type="radio" name="gender" value="female">Female
			<input type="radio" name="gender" value="other">Other
			<br>
			<br>
			
			<b>Birth Date<span style="color: red;"> *</b>: 
			<input type="date"  name="dob">
			<br>
			<br>
			
			<b>Religion<span style="color: red;"> *</b>: 
			<select name="religion">
			    <option value="none">none</option>
				<option value="Islam">Islam</option>
				<option value="Hindu">Hindu</option>
				<option value="Christianity">Christianity</option>
				<option value="Buddhists">Buddhists</option>
				<option value="Others">Others</option>
			</select>
			<br>
			<br>

      </fieldset>			

         <fieldset>
		 <legend  style="text-align:center";><h3>Contact Information</h3></legend>	
		 
		<b>Present Address</b>: 
		<textarea  name="presentaddress" ></textarea>
		<br>
		<br>
		
		<b>Permanent Address</b>: 
		<textarea  name="permanentaddress" ></textarea>
		<br>
		<br>

		<b>Phone</b>:
		<input type="tel" id="phone" name="phone" >
		<br>
		<br>
		<b>Email</b>:
		<input type="Email" id="Email" name="email">
		
		
		</fieldset>
		
		<fieldset>
		 <legend  style="text-align:center";><h3>Account  Information</h3></legend>
		 
		<b>Username<span style="color: red;"> *</b>:
		<input type="text" name="username">
			<br>
			<br>
			
		<b>Password<span style="color: red;"> *</b>: 
		<input type="password" name="password">
			<br>
			<br>	
		</fieldset>
		<h1 style="text-align:center;">
		<input  type="submit" name="update" value="Register"></h1>
		<h3 style="text-align:center;">
		<b>Already registered?</b>
	    <a href="../VIEW/Login.php"><b>Sign in</b></a>
		</h3>
	</form>
	
	<p id="message"></p>
	
	
		<script>
	      function isValid(jsForm){
		   const name = jsForm.name.value;
		   const gender = jsForm.gender.value;
		   const dob = jsForm.dob.value;
		   const religion = jsForm. religion.value;
		   const presentaddress = jsForm.presentaddress.value;
		   const permanentaddress = jsForm.permanentaddress.value;
		   const  phone= jsForm. phone.value;
		   const  email = jsForm. email.value;
		   const  username = jsForm. username.value;
		   const  password = jsForm. password.value;
		   
		   //console.log(fname + " " + lname);
		   
		   if(name ==="" || gender ==="" || dob==="" || religion==="" || phone==="" || email==="" || username==="" || password==="" ){
		       document.getElementById("message").innerHTML = "Please fill up the form properly;"
		       return false;
          }
		  
		 else if(name.toString().length > 21)
			{
				document.getElementById("message").innerHTML = "Name must be less than 21 characters*";
				return false;
			}
			
		 else if(gender.toString().length > 8)
			{
				document.getElementById("message").innerHTML = "Gender must be  less than 9 characters*";
				return false;
			}
			
	     else if(dob.toString().length > 16)
			{
				document.getElementById("message").innerHTML = "Date Of Birth must be less than 17 characters*";
				return false;
			}
			
	     else if(religion.toString().length > 10)
			{
				document.getElementById("message").innerHTML = "Religion must be less than 11 characters*";
				return false;
			}
			
	     else if(presentaddress.toString().length > 30)
			{
				document.getElementById("message").innerHTML = "Present Address must be less than 31 characters*";
				return false;
			}
			
	     else if(permanentaddress.toString().length > 30)
			{
				document.getElementById("message").innerHTML = "Permanent Address must be equal or less than 31 characters*";
				return false;
			}
			
			
		else if(phone.toString().length !== 11)
			{
				document.getElementById("message").innerHTML = "Phone number characters should be equal to 11 characters";
				return false;
				
			}
			else if(isNaN(phone))
			{
				document.getElementById("message").innerHTML = "Phone number must be neumeric";
				return false;
			}
			

	     else if(email.toString().length > 40)
			{
				document.getElementById("message").innerHTML = "Email must be less than 41 characters*";
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
	
	<?php include('../VIEW/HF/FOOTER.html')?>
	
</body>
</html>