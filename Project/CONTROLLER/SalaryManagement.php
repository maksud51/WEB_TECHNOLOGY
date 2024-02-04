<!DOCTYPE html>
<?php include("../VIEW/HF/HEADER.html")?>

<html>
<head>
	<title>Salary</title>
	
	<style>
	      #message{
		            color:red;
					}
	 </style>
	
</head>
<body>

	<h1 style="text-align:center;"><u><b>Salary MangementSystem</b></u></h1>
	
	
		<form name="jsform" action="../CONTROLLER/SalaryManagementAction.php" method="POST" onsubmit="return isValid(this);">
		<fieldset>
		<br>
		<b>User Name</b>:
		<input type="text" name="username">
        <br>
		<br>
        <b>Name:</b>
		<input type="text" name="name">
		<br>
		<br>
		 <b>Employee Status:</b>
		<input type="text" name="es">
	    <b>Amount:<b> 
		<input type="text"  name="amount" >
		<br>
		<br>
       <input  type="submit" name="submit" value="Done">
	</fieldset>
	</form>
	
	<p id="message"></p>
	
	
	<script>
		     function isValid(jsForm){
			    const username = jsForm.username.value; 
				const name = jsForm.name.value;
				const es = jsForm.es.value;
				const amount = jsForm.amount.value;
				
				
				if(username ==="" || name ==="" || es ==="" || amount ==="" ){
					
					  document.getElementById("message").innerHTML = "Please fill up the form properly*;"
		               return false;
					}
				
                
				else if(username.toString().length > 31)
					{
						document.getElementById("message").innerHTML = "User Name must be less than 31 characters*";
						return false;
					}
					
					                
				else if(name.toString().length > 31)
					{
						document.getElementById("message").innerHTML = "Name must be less than 31 characters*";
						return false;
					}
					
					
				else if(es.toString().length > 20)
					{
						document.getElementById("message").innerHTML = "Employee Status must be less then 20 characters*";
						return false;
					}
					
					
			   else if(amount.toString().length > 8)
					{
						document.getElementById("message").innerHTML = "Amount must be less then 8 digit";
						return false;
					}
					
			else if(isNaN(amount))
					{
						document.getElementById("message").innerHTML = "Amount must be neumeric ";
						return false;
					}
				
				   return true;   
			 }
		  
		 </script>
	
	
	
	
	
	<?php include("../VIEW/HF/FOOTER.html")?>
	
</body>
</html>