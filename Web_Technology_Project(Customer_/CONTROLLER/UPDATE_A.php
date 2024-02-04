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
	<title>Registration Form</title>
	<link rel="stylesheet" href="Reg.css">
	<!--link rel="stylesheet" href="A.css"-->
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
	<?php 
	  if ($_SERVER['REQUEST_METHOD'] === "POST") 
{
		$firstname=$gender=$Dob=$Religion=$phone=$Email=$Username=$password=$PreAddress="";
		$Religion=$_POST['Religion'];
		
		$isValid = false;
		if (empty($_POST['firstname']) or empty($_POST['gender']) 
			or empty($_POST['Dob']) or $Religion=="none"  or empty($_POST['Email']) )  {
			$isValid = false;
		echo "<u>";
		echo "<h3>Find empty value in Mandatory section....... </h3>";
		echo "</u>";
		echo "<br>";
			if (!empty($_POST['firstname'])) 
		{
        }
		else 
		{
			echo "Name is not  declared";
			echo "<br>";
        }
		if (!empty($_POST['gender'])) 
		{			
        }
		else 
		{
			echo "gender is not  declared";
			echo "<br>";		
        }
		if (!empty($_POST['Dob'])) 
		{
        }
		else 
		{
			echo "DOB is not  declared";
			echo "<br>";			
        }
		if ($Religion=="none") 
		{
			echo "Religion is not  declared";
			echo "<br>";
			
        }
		else
		{
        }
		if (!empty($_POST['Email'])) 
		{	
        }
		else 
		{
			echo "Email is not  declared";
			echo "<br>";			
        }
				
		
		}
		else {
			$isValid = true;
		}
	if($isValid)
	{
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "pd";
		$connection = new mysqli($servername, $username, $password, $dbname);
		if ($connection->connect_error) {
		die("Connection failed: " . $connection->connect_error);
		}
			$sql = "SELECT * FROM reg WHERE name = ? and phone = ?";
			$stmt = $connection->prepare($sql);
			$stmt->bind_param("ss", $USERNAME, $PHONE);
			$USERNAME=$_SESSION['Username'];
			$PHONE = $_POST['phone'];
			$response = $stmt->execute();

			if ($response) {
				$data = $stmt->get_result();
				if ($data->num_rows > 0) {
					while ($row = $data->fetch_assoc()) {
						
						echo "<hr>";
						echo " Phone number is already taken";
						echo "<hr>";
						$isValid=false;
					}
				}
				else
				{
					
					$isValid=true;
				}
			}
		
			
			
		
		
		if($isValid)
		{
			$USERNAME=$_SESSION['Username'];
			$sql2 = "UPDATE reg SET name = ?, gender = ? , dob = ?, religion = ?, address = ?,
			phone = ?, email = ? WHERE username = ?";
			$stmt2 = $connection->prepare($sql2);
			$stmt2->bind_param("ssssssss", $NAME, $GENDER, $DOB, $RELIGION, $ADDRESS, $PHONE, $EMAIL, $USERNAME);
			 $NAME=$_POST['firstname'];
			 $GENDER=$_POST['gender'];
			 $DOB=$_POST['Dob'];
			 $RELIGION=$_POST['Religion'];
			 $ADDRESS=$_POST['PreAddress'];
			 $PHONE=$_POST['phone'];
			 $EMAIL=$_POST['Email'];
			 $USERNAME=$_SESSION['Username'];	
			 $response2 = $stmt2->execute();
			
			if ($response2)
				{	
					echo "<h3>Update successful</h3>";
				}

				else
				{
					echo "<h3>Unique field Violation</h3>";
					echo "<h3>Please Update again</h3>";
				}
				
			}
			else
			{
				echo "<h3>Validation Erorr</h3>";
			}
		
	}		
		
		else{
			echo "<h3>Something Validation is error</h3>";
		}
}	
	?>

	<body>
	<h3 style="text-align:left;" ><a href="../VIEW/PROFILE.php">Back</a></h3>
	
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


			<div class="dropdown" style="float:right;">
  <button class="dropbtn"><h1>. . .</h1></button>
  <div class="dropdown-content">
  <a href="../CONTROLLER/SHOW_A.php">Show my profie</a><br>
  <a href="../CONTROLLER/LOG_OUT.php">Logout</a><br>
  </div>
</div>
<br>
<div class="def">
	<div class="abc">
		<h3 style="text-align:left ;color:#38B6B6;" >User: <?php echo $_SESSION['Username']; ?></h3>
		<h3 style="text-align:left ;color:Black" > Updated Values </h3>
	<br>
		<table border="1">
		 
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