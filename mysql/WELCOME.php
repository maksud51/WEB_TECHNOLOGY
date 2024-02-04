<?php
 session_start();
 if(count($_SESSION)===0)
 {
	header("Location:LOG_OUT.php");
 }
 ?>
<html>
<head>
	<meta charset="utf-8">
	<title style="text-align:center;">Welcome</title>
	<h1 style="text-align:center;" ><u>Welcome Page</u></h1>
</head>
<body>
	<h3 style="text-align:right;" ><a href="LOG_OUT.php">Log Out</a></h3>
	<h2 style="text-align:center;" ><u>*****My Profile Details*****</u></h2>
	<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "etwo";
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
	
	<table border="1">
		 
		 <thead>
		 <tr>
		 <th>First Name</th>
		 <th>Last Name</th>
		 <th>Gender</th>
		 <th>Date of Birth</th>
		 <th>Religion</th>
		 <th> Present Address</th>
		 <th> Permanent Address</th>
		 <th>Phone</th>
		 <th>Email</th>
		 <th>Personal Website</th>
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
						echo "<td>". $row["firstname"]."</td>"; 
						echo "<td>". $row["lastname"]."</td>";
						echo "<td>".$row["gender"]."</td>";
						echo "<td>".$row["dob"]."</td>";
						echo "<td>".$row["religion"]."</td>";
 						echo "<td>".$row["presentaddress"]."</td>";
						echo "<td>".$row["permanentaddress"]."</td>";
						echo "<td>".$row["phone"]."</td>";
						echo "<td>".$row["email"]."</td>";
						echo "<td>".$row["website"]."</td>";
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
</body>
</html>