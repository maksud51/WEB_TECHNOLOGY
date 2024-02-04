<!DOCTYPE html>

<?php
 include('../Model/Session.php');
 include('../VIEW/HF/HEADER.html');?>

<html>
<head>
	<meta charset="utf-8">
	<title>Home</title>
</head>
<body>

    <h1 style="text-align:center;" ><u>Home Page</u></h1>
	<h2 style="text-align:right;" ><a href="../CONTROLLER/Logout.php">Log Out</a></h2> 
		
	 <?php
	$cookie_name = "time";
	$cookie_value = "Welcome:-";
	setcookie($cookie_name, $cookie_value, time() + (10), "/"); 
	?>
	<h1 style="text-align:conter;">
	<?php
	if(!isset($_COOKIE[$cookie_name])) {
	  echo "Cookie named '" . $cookie_name . "' is not set!";
	} else {
	  echo"<h3 style=text-align:right;>";
	  echo "You are : "; 
	  echo  $_COOKIE[$cookie_name];
	  echo $_SESSION['username'];
	  echo "</h3>";
	  
	}
	?>
	
	
   	<fieldset>
	<br>
	<br>
	<h5 style="text-align:center;" ><a href="../VIEW/Show.php">My Data</a></h5>
	<h5 style="text-align:center;" ><a href="../VIEW/UpdateInformation.php">Update Information</a></h5>
	<h5 style="text-align:center;" ><a href="../CONTROLLER/Changepassword.php">Change Password</a></h5>
	
	
	<h5 style="text-align:center;" ><a href="../CONTROLLER/Lineman.php">Line Man</a></h5>
	
	
	<h5 style="text-align:center;" ><a href="../CONTROLLER/NotifyCustomer.php">Notify The Customer</a></h5>
	
	<h5 style="text-align:center;" ><a href="../CONTROLLER/SalaryManagement.php">Salary Management</a></h5>
	

	<h5 style="text-align:center;" ><a href="../CONTROLLER/Validationpakage.php">Pakage Validation</a></h5>
	<h5 style="text-align:center;" ><a href="../CONTROLLER/RECEIVED_BILL.php">Rreceived Bill</a></h5>
	
	</fieldset>
	
	<?php include('../VIEW/HF/FOOTER.html')?>
	
	
</body>
</html>