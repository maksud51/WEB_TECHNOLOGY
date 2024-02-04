<!DOCTYPE html>
<?php include('../VIEW/HEADER.php')?>
<?php
 session_start();
 if(count($_SESSION)===0)
 {
	header("Location:../CONTROLLER/LOG_OUT.php");
 }
 ?>

<html>
<head>
	<meta charset="utf-8">
	<title>WELCOME PAGE</title>
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
</head>
<body>
	<div class="dropdown" style="float:right;">
  <button class="dropbtn"><h1>. . .</h1></button>
  <div class="dropdown-content">
  <a href="../CONTROLLER/SHOW_A.php">Show my profie</a><br>
  <a href="../CONTROLLER/LOG_OUT.php">Logout</a><br>
  </div>
</div>
	 
	<h3 style="text-align:left ;color:#38B6B6;" >User: <?php echo $_SESSION['Username']; ?></h3>
	<br>
<div id="example2"  >

<div class="dropdown" style="float:left;" style=" border-radius: 0px;">
  <button class="dropbtn"><h1>Update</h1></button>
  <div class="dropdown-content" style="left: 0;">
  <a href="../VIEW/UPDATE.php">Update my profie</a><br>
  <a href="../CONTROLLER/CHANGE_PASSWORD_A.php">Change Password</a><br>
  </div>
</div>
<br><br><br><br><br><br><br><br>

<!--img src="Speed_test.JPG" alt="Paris" width="400" height="400" style="text-align: center;"-->


<div class="dropdown" style="float: left;" style=" border-radius: 5px;">
  <button class="dropbtn"><h1>Package</h1></button>
  <div class="dropdown-content" style="left: 0;">
  <a href="../VIEW/BUY_PACKAGE.php">Buy Package</a><br>
  <a href="../VIEW/CHANGE_PACKAGE.php">Change Package</a></h3><br>
  <a href="../VIEW/PAY_BILL.php">Pay Bill</a>
  </div>
</div>
<br><br><br><br><br><br><br><br>

<div class="dropdown" style="float:left" style=" border-radius: 5px;">
  <button class="dropbtn"><h1>Chat Box</h1></button>
  <div class="dropdown-content" style="left: 0;">
  <a href="../VIEW/MAIL_BOX.php">Mail Box</a><br>
  <a href="../VIEW/INFORM_PROBLEM.php">Inform Problem</a><br>
  </div>
</div>
</div>






<!--	<h3 style="text-align:center;" ><a href="../CONTROLLER/SHOW_A.php">Show my profie</a></h3>
	<h3 style="text-align:center;" ><a href="../CONTROLLER/UPDATE_A.php">Update my profie</a></h3>
	<h3 style="text-align:center;" ><a href="../CONTROLLER/CHANGE_PASSWORD_A.php">Change Password</a></h3>
	<h3 style="text-align:center;" ><a href="../CONTROLLER/PAY_BILL_A.php">Pay Bill</a></h3>
	<h3 style="text-align:center;" ><a href="../VIEW/BUY_PACKAGE.php">Buy Package</a></h3>
	<h3 style="text-align:center;" ><a href="../CONTROLLER/RATING_A.php">Rating</a></h3>
	<h3 style="text-align:center;" ><a href="../VIEW/CHANGE_PACKAGE.php">Package Change</a></h3>
	<h3 style="text-align:center;" ><a href="../VIEW/MAIL_BOX.php">Mail Box</a></h3>
	<h3 style="text-align:center;" ><a href="../VIEW/INFORM_PROBLEM.php">Inform Problem</a></h3>-->

	
	
</body>
</html>
<br>
<br>
<br>
<?php include('../VIEW/FOOTER.php')?>
