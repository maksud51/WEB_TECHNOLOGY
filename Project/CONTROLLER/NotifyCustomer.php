<!DOCTYPE html>
<?php include("../VIEW/HF/HEADER.html")?>

<html>
<head>
	<title>Notify Customer</title>
	
	<style>
	      #message{
		            color:red;
					}
	 </style>
</head>
<body>

<a href="../VIEW/Home.php">BACK</a>
	<h1 style="text-align:center;"><u><b>Notify Customer</b></u></h1>
	
	
		<form name="jsform" action="../CONTROLLER/NotifyCustomerAction.php" method="POST" onsubmit="return isValid(this);">
		<fieldset>
		<b>New Massage</b>:
        <br>
		<br>
        <b>Username:</b>
		<br>
		To:
		<input type="text" name="username">
	    <b>Subject</b>: 
		<input type="text"  name="subject" >
		<br>
		<br>
		Comment: 
		<textarea  name="comment" ></textarea>
		<br>
       <input  type="submit" name="submit" value="Send">
	</fieldset>
	</form>
	
	<p id="message"></p>
	
	      <script>
		     function isValid(jsForm){
			    const username = jsForm.username.value; 
				const subject = jsForm.subject.value;
				const comment = jsForm.comment.value;
				
				
				if(username ==="" || subject ==="" || comment===""){
					
					  document.getElementById("message").innerHTML = "Please fill up the form properly;"
		               return false;
					}
				
                
				else if(username.toString().length > 31)
					{
						document.getElementById("message").innerHTML = "Name must be less than 31 characters*";
						return false;
					}
					
					
				else if(subject.toString().length > 51)
					{
						document.getElementById("message").innerHTML = "Name must be less than 51 characters*";
						return false;
					}
					
					
			   else if(comment.toString().length > 501)
					{
						document.getElementById("message").innerHTML = "Name must be less than 501 characters*";
						return false;
					}
				
				   return true;   
			 }
		  
		  </script>
	
	
	
	  <?php include("../VIEW/HF/FOOTER.html")?>
</body>
</html>