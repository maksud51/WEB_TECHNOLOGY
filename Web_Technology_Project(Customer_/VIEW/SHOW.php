<!DOCTYPE html>
<?php
$cookie_name = "time";
$cookie_value = "Welcome!!!!!!!!!!!!!!!!!";
setcookie($cookie_name, $cookie_value, time() + (10), "/"); 
?>
<h1 style="text-align:conter;">
<?php
if(!isset($_COOKIE[$cookie_name])) {
  echo "Cookie named '" . $cookie_name . "' is not set!";
} else {
 
  echo "You are : "; 
  echo  $_COOKIE[$cookie_name];
}
?>
</h1>
<?php
 session_start();
 if(count($_SESSION)===0)
 {
	header("Location:../VIEW/LOG_OUT.php");
 }
 ?>
<?php include "../MODEL/FUNCTION.php"?>
<html>
<head>
	<meta charset="utf-8">
	<title>WELCOME PAGE</title>
</head>
<body>
	<a href="../CONTROLLER/LOG_OUT.php">Log Out</a> 
	<h1 style="text-align:center;" ><u>WELCOME <?php echo $_SESSION['Username']; ?></u></h1>
		<h3 style="text-align:left;" ><a href="../VIEW/PROFILE.php">Back</a></h3>
	<?php
	$filename="../MODEL/user_info.json";
	$arr2=read($filename);
	//var_dump($arr1);
	?>
	<table border="1">
		 
		 <thead>
		 <tr>
		 <th>Name</th>
		 <th>Gender</th>
		 <th>Date of Birth</th>
		 <th>DOB</th>
		 <th>Religion</th>
		 <th>Address</th>
		 <th>Phone</th>
		 <th>Email</th>
		 <th>Username</th>
		 <th>Password</th>
		 </tr>
		 </thead>
		 <tbody>
		 <?php
		 
		 for ($j=0;$j<count($arr2);$j++)
		 {
			 echo "<tr>";
			 echo "<td>".$arr2[$j]-> firstname."</td>";
			 echo "<td>".$arr2[$j]-> gender."</td>";
			 echo "<td>".$arr2[$j]-> Dob."</td>";
			 echo "<td>".$arr2[$j]-> Religion."</td>";
			 echo "<td>".$arr2[$j]-> Address."</td>";
			 echo "<td>".$arr2[$j]-> phone."</td>";
			 echo "<td>".$arr2[$j]-> Email."</td>";
			 echo "<td>".$arr2[$j]-> Username."</td>";
			 echo "<td>".$arr2[$j]-> password."</td>";
			 echo "</tr>";
		 } 	 
		 ?>
		 </tbody>
		 </table> 
	
</body>
</html>