<!DOCTYPE html>
<?php include('../VIEW/HEADER.php')?>
<?php
 session_start();
 if(count($_SESSION)===0)
 {
    header("Location:../CONTROLLER/LOG_OUT.php");
 }
?>
 <?php
  include "../MODEL/FUNCTION.php"?>
<html>
<head>
    <title>Buy Package</title>
    <link rel="stylesheet" href="../VIEW/A.css">
    <link rel="stylesheet" href="../VIEW/AA.css">

</head>
<body >
<div class="dropdown" style="float:right;">
  <button class="dropbtn"><h1>. . .</h1></button>
  <div class="dropdown-content">
  <a href="../CONTROLLER/SHOW_A.php">Show my profie</a><br>
  <a href="../CONTROLLER/LOG_OUT.php">Logout</a><br>
  </div>
</div> 
    <h3 style="text-align:left ;color:#38B6B6;" >User: <?php echo $_SESSION['Username']; ?></h3>
        <h3 style="text-align:left;" ><a href="../VIEW/PROFILE.php">Back</a></h3>
        <h1 style="text-align:center;" ><u> Payment Page</u></h1> 
    <div id="example3"  >
    <form action="<?php echo htmlspecialchars("../CONTROLLER/PAY_BILL_A.php"); ?>" method="POST">
        <label  style="margin-left:700px;">Amount</label> <input type="text" name="amount">
        <br><br>
        <label style="margin-left:700px;">Package Name</label>
         <input type="text" name="reference">
        <br><br>
        <label style="margin-left:700px;">Area</label> <input type="text" name="area">
        <br><br>
        <input style="margin-left:700px;color:blue"type="submit" name="submit" value="Send ">
    </div>
</form>
</body>
</html>
