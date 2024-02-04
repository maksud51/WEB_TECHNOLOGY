<!DOCTYPE html>
<?php
 include('../Model/Session.php');
 include('../VIEW/HF/HEADER.html');?>
 
<html>
<head>
	<meta charset="utf-8">
	<title>Received Bill</title>
</head>
<body>
	<a href="../CONTROLLER/Logout.php">Log Out</a> 
	<p> || </p>
	<a href="../VIEW/Home.php">Back</a> 
	<h1 style="text-align:center;" ><u>WELCOME <?php echo $_SESSION['username']; ?></u></h1>
	<form action="<?php echo htmlspecialchars("../CONTROLLER/RECEIVED_BILL_A.php"); ?>" method="POST">
	<br>
	<br>
	
	
		<?php
		$servername = "localhost";
		$Username = "root";
		$password = "";
		$dbname = "internet";
		$res="";
		$connection = new mysqli($servername, $Username, $password, $dbname);
		if ($connection->connect_error) {
		die("Connection failed: " . $connection->connect_error);
		}
			$sql3 = "SELECT * FROM bill";
			$stmt3 = $connection->prepare($sql3);
			$response3 = $stmt3->execute();
			if ($response3) {
				$data = $stmt3->get_result();
				if ($data->num_rows > 0) 
				{
				  $res=true;
					
				}
				else
				{
					$res=false;
					echo "Exitance Information Cannot Found!!!";
					echo "<br>";
					
				}
			}
			else
			{
				echo "Database Execution Error!!!!!!!!";
			}
	?>
	
	
	
	<table border="1">
		 
		 <thead>
		 <tr>
		 <th>User Name</th>
		 <th>Area</th>
		 <th>Pakage Name</th>
		 <th>Amount</th>
		 <th>Bill Date</th>
		 
		 </tr>
		 </thead>
		 <tbody>
		 
		 <?php
			if($res==true)
			{
				
					while ($row = $data->fetch_assoc()) {
						echo "<tr>";
						echo "<td>". $row["username"]."</td>"; 
						echo "<td>".$row["area"]."</td>";
						echo "<td>".$row["pakage_name"]."</td>";
						echo "<td>".$row["amount"]."</td>";
 						echo "<td>".$row["bill_date"]."</td>";
						echo "</tr>";
						
					}
			}  
		  
	   else
	   {
		   echo "Your Information Cannot be found";
	   }
         		   	 
	   ?>
	   </tbody>
	   </table> 
 <?php include('../VIEW/HF/FOOTER.html')?>

</body>
</html>