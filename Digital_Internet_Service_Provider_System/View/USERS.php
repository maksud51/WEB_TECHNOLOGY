<?php
 session_start();
 if(count($_SESSION)===0)
 {
	header("Location:../CONTROLLER/LOG_OUT.php");
 }
?>
<!DOCTYPE html>
<?php include('HF/HEADER.html')?>
<html>
<head>
	<meta charset="utf-8">
	<title style="text-align:center;">Users Management</title>
	<h1 style="text-align:center;" ><u>Users Management</u></h1>
</head>
<body>
	<h3 style="text-align:right;" >User: <?php echo $_SESSION['Username']; ?></h3>
	<h3 style="text-align:right;" ><a href="../CONTROLLER/LOG_OUT.php">Log Out</a></h3>
	<h3 style="text-align:left;" ><a href="../VIEW/PROFILE.php">Back</a></h3>
	
	<p>1. <a href="../VIEW/ADD_USER.php"> ADD USER </a>
	|| 2. <a href="../CONTROLLER/UPDATE_USER_A0.php"> UPDATE USERS </a>
	|| 3. <a href="../VIEW/SHOW.php"> SHOW USERS </a>
	|| 4. <a href="../VIEW/DELETE_USER.php"> DELETE USER </a>
<?php include('HF/FOOTER.html'); ?>

</body>
</html>