<!DOCTYPE html>
<?php include('../VIEW/HEADER.php')?>
<?php
 session_start();
 if(count($_SESSION)===0)
 {
	header("Location:../CONTROLLER/LOG_OUT.php");
 }
 ?>
<?php include "../MODEL/FUNCTION.php"?>
<html>
<head>
	<meta charset="utf-8">
	<title>WELCOME PAGE</title>
	<link rel="stylesheet" href="Reg.css">
	<link rel="stylesheet" href="../MODEL/TABLE.css">
	<link rel="stylesheet" href="../VIEW/A.css">


</head>
<body>
<div class="dropdown" style="float:right;">
  <button class="dropbtn"><h1>. . .</h1></button>
  <div class="dropdown-content">
  <a href="../CONTROLLER/SHOW_A.php">Show my profie</a><br>
  <a href="../CONTROLLER/LOG_OUT.php">Logout</a><br>
  <a href="../VIEW/PROFILE.php">HOME</a> 
  </div>
</div>

	<h3 style="text-align:left ;color:#38B6B6;" >User: <?php echo $_SESSION['Username']; ?></h3>
		<h3 style="text-align:left;" ><a href="../VIEW/PROFILE.php">Back</a></h3>
	<br>
<?php
	
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "pd";
		$res="";
		$connection = new mysqli($servername, $username, $password, $dbname);
		if ($connection->connect_error) {
		die("Connection failed: " . $connection->connect_error);
		}
			$sql = "SELECT * FROM reg WHERE username = ?";
			$stmt = $connection->prepare($sql);
			$stmt->bind_param("s", $USERNAME);
			$USERNAME=$_SESSION['Username'];
			$response = $stmt->execute();
			if ($response) {
				$data = $stmt->get_result();
				if ($data->num_rows > 0) 
				{
				  $res=true;
					
				}
				else
				{
					$res=false;
					echo "Row cannot found";
					
				}
			}
			else
			{
				echo "Database Execution failed!!!!!!!!";
			}
		
	?>
	<div class="def">
		<h2 style="text-align:center;color:#8CE5E5;" >Your details</h2>

		<div class="abc">
	<table id="table">
		 
		 <thead>
		 <tr>
		 <th>Name</th>
		 <th>Gender</th>
		 <th>Date of Birth</th>
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
			if($res==true)
			{
				
					while ($row = $data->fetch_assoc()) {
						echo "<tr>";
						echo "<td>". $row["name"]."</td>"; 
						echo "<td>".$row["gender"]."</td>";
						echo "<td>".$row["dob"]."</td>";
						echo "<td>".$row["religion"]."</td>";
 						echo "<td>".$row["address"]."</td>";
						echo "<td>".$row["phone"]."</td>";
						echo "<td>".$row["email"]."</td>";
						echo "<td>".$row["username"]."</td>";
						echo "<td>".$row["password"]."</td>";
						echo "</tr>";
						
					}
			}
			else
			{
					
				echo "Details Cannot be found";
			}
			
		  
		 ?>
		 </tbody>
		 </table> 
		 </div>
	</div>
</body>
</html>