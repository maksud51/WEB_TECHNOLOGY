<!DOCTYPE html>
<?php
 session_start();
 if(count($_SESSION)===0)
 {
	header("Location:../CONTROLLER/LOG_OUT.php");
 }
 ?>
  <div class="sticky">
    <?php include('../VIEW/HF/HEADER_A.html')?>
  </div>
<?php
$cookie_name = "time";
$cookie_value = date("M,d,Y h:i:s A");
setcookie($cookie_name, $cookie_value, time() + (10), "/"); 
?>
<html>
<head>
	<meta charset="utf-8">
	<title style="text-align:center;">HOME PAGE</title>
	<h1 style="text-align:center;" ><u>HOME PAGE</u></h1>
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
<?php
if(!isset($_COOKIE[$cookie_name])) {
} else {
 
  echo "Login : "; 
  echo  $_COOKIE[$cookie_name];
}
?>
</head>
<body id="B_Color">
	<h3 style="text-align:right;" >User: <?php echo $_SESSION['Username']; ?></h3>
	<button style="text-align:right; margin-left: 1265px;" type="button"  onclick="window.location.href='../CONTROLLER/LOG_OUT.php';"><h4>Log out</h4></button>
<div id="example2"  >

<div class="dropdown" style="float:left;" style=" border-radius: 0px;">
  <button class="dropbtn"><h2>Profile</h2></button>
  <div class="dropdown-content" style="left: 0;">
  <a href="../CONTROLLER/SHOW_A.php"> Show my profie</a></h3>
  <a href="../VIEW/UPDATE.php"> Update my profie</a>
	<a href="../CONTROLLER/CHANGE_PASSWORD_A.php">  Change Password</a>
  <a href="../VIEW/SALARY.php"> Show salary Details </a>
  </div>
</div>


<!--img src="Speed_test.JPG" alt="Paris" width="400" height="400" style="text-align: center;"-->


<div class="dropdown" style="float: left;" style=" border-radius: 5px; margin-left: 100px;">
  <button class="dropbtn" ><h2>User Control</h2></button>
  <div class="dropdown-content" style="left: 0;">
	<a href="../VIEW/ADD_USER.php"> ADD USER </a>
	<a href="../CONTROLLER/UPDATE_USER_A0.php"> UPDATE USERS </a>
	<a href="../VIEW/SHOW.php"> SHOW USERS </a>
	<a href="../VIEW/DELETE_USER.php"> DELETE USER </a>
  </div>
</div>

<div class="dropdown" style="float: left;" style=" border-radius: 5px;">
  <button class="dropbtn"><h2>Package</h2></button>
  <div class="dropdown-content" style="left: 0;">
	<a href="../VIEW/PACKAGE.php"> Create Packages</a>
	<a href="../VIEW/MANAGE_PACKAGES.php"> Manage Packages</a>
  </div>
</div>


<div class="dropdown" style="float:left" style=" border-radius: 5px;">
  <button class="dropbtn"><h2>Chat Box</h2></button>
  <div class="dropdown-content" style="left: 0;">
  <a href="../VIEW/LINEMAN_BOX.php"> Communiication Box (LINE MAN)</a>
  <a href="../VIEW/CUSTOMER_BOX.php"> Communiication Box (CUSTOMER)</a>
  </div>
</div>
</div>

	<!--<h3 style="text-align:left;" ><a href="../CONTROLLER/SHOW_A.php"> 1. Show my profie</a></h3>
	<h3 style="text-align:left;" ><a href="../VIEW/UPDATE.php"> 2 .Update my profie</a></h3>
	<h3 style="text-align:left;" ><a href="../CONTROLLER/CHANGE_PASSWORD_A.php"> 3. Change Password</a></h3>
	<h3 style="text-align:left;" ><a href="../VIEW/PACKAGE.php">4. Create Packages</a></h3>
	<h3 style="text-align:left;" ><a href="../VIEW/USERS.php">5. User Control</a></h3>
	<h3 style="text-align:left;" ><a href="../VIEW/MANAGE_PACKAGES.php">6. Manage Packages</a></h3>
	<h3 style="text-align:left;" ><a href="../VIEW/LINEMAN_BOX.php">7. Communiication Box (LINE MAN)</a></h3>
	<h3 style="text-align:left;" ><a href="../VIEW/CUSTOMER_BOX.php">8. Communiication Box (CUSTOMER)</a></h3>-->
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  <div class="footer">
      <?php include('../VIEW/HF/FOOTER.html'); ?> 
  </div>
</body>
</html>