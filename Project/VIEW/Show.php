<!DOCTYPE html>
<?php
 include('../Model/Session.php');
 include('../VIEW/HF/HEADER.html');?>

<html>
<head>
	<meta charset="utf-8">
	<title>Profile</title>
</head>
<body>
	
	
	<h1 style="text-align:center;" ><u>Profile Information</u></h1>
	<h2 style="text-align:left;" ><a href="../VIEW/Home.php" >Back</a> </h2>
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

<?php
	
		$servername = "localhost";
		$Username = "root";
		$Password = "";
		$dbname = "internet";
		$res="";
		$connection = new mysqli($servername, $Username, $Password, $dbname);
		if ($connection->connect_error) {
		die("Connection failed: " . $connection->connect_error);
		}
			$sql = "SELECT * FROM data WHERE username = ?";
			$stmt = $connection->prepare($sql);
			$stmt->bind_param("s", $username);
			$username=$_SESSION['username'];
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
					echo "Exitance Information Cannot Found!!!";
					
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
		 <th>Name</th>
		 <th>Gender</th>
		 <th>Dob</th>
		 <th>Religion</th>
		 <th>PresentAddress</th>
		 <th>ParmanentAddress</th>
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
 						echo "<td>".$row["presentaddress"]."</td>";
						echo "<td>".$row["permanentaddress"]."</td>";
						echo "<td>".$row["phone"]."</td>";
						echo "<td>".$row["email"]."</td>";
						echo "<td>".$row["username"]."</td>";
						echo "<td>".$row["password"]."</td>";
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
	   </fieldset>
 <?php include('../VIEW/HF/FOOTER.html')?>
	
</body>
</html>