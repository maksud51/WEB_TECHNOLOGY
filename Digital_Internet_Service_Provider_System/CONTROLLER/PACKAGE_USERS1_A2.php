<!DOCTYPE html>
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
	<title style="text-align:center;">Packages Users</title>
	</style>
	<link rel="stylesheet" href="../VIEW/A.css">
	<link rel="stylesheet" href="TABLE.css">
		<link rel="stylesheet" href="../VIEW/A.css">
	<style type="text/css">
	div.sticky 
	{
	  position: -webkit-sticky;
	  position: sticky;
	  top: 0;
	  background-color: #74A7CE;
	  padding: 5px;
	  font-size: 20px;
	}
	.footer 
	{
	   left: 0;
	   bottom: 0;
	   width: 100%;
	   background-color: #74A7CE;
	   color: black;
	   margin: 0px;
	   text-align: center;
	}

	.dropbtn 
	{
	  background-color: #8CE5E5;
	  border-radius: 25px;
	  color: white;
	  padding: 6px;
	  font-size: 10px;
	  border: none;
	  cursor: pointer;
	  margin-left: 150px;
	}

	.dropdown 
	{
	  position: relative;
	  display: inline-block;
	}

	.dropdown-content 
	{
	  display: none;
	  position: absolute;
	  right: 0;
	  background-color: #f9f9f9;
	  min-width: 130px;
	  box-shadow: 0px 6px 16px 0px rgba(0,0,0,0.2);
	  z-index: 1;
	}

	.dropdown-content a 
	{
	  color: black;
	  padding: 12px 16px;
	  text-decoration: none;
	  display: block;
	}

	.dropdown-content a:hover {background-color: #38B6B6;}

	.dropdown:hover .dropdown-content 
	{
	  display: block;
	}

	.dropdown:hover .dropbtn 
	{
	  background-color: #38B6B6;
	   border-radius: 25px;
	}
	</style>
	<div class="sticky">
		<?php include('../VIEW/HF/HEADER.html')?>
	</div>
	<h1 style="text-align:center;" ><u>Packages Users</u></h1>
</head>
<body id="B_Color">
	<h3 style="text-align:right;" >User: <?php echo $_SESSION['Username']; ?></h3>
	<button style="text-align:right; margin-left: 1270px;" type="button"  onclick="window.location.href='../CONTROLLER/LOG_OUT.php';"><h4>Log out</h4></button>
	<button style="text-align:right; margin-right: 1270px;" type="button"  onclick="window.location.href='../CONTROLLER/PACKAGE_USERS1_A.php';"><h4>Back</h4></button>
	<br>
	<br>
 
 
 <?php 
			echo "<br>";
			echo "<h3>Searching Result</h3>";
			$response="";
			
	  if ($_SERVER['REQUEST_METHOD'] === "POST") 
	  {

		
		$isValid = false;
		if (empty($_POST['USERNAME'])) 
		{
			
		$isValid = false;
		echo "<u>";
		echo "<h3>Find empty value in Mandatory section....... </h3>";
		echo "</u>";
		echo "<br>";
		if (!empty($_POST['USERNAME'])) 
		{
        }
		else 
		{
			echo "USER Name is not  declared";
			echo "<br>";
        }
		
	
		}
		else 
		{
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
			$sql = "SELECT * FROM control WHERE name = ?";
			$stmt = $connection->prepare($sql);
			$stmt->bind_param("s", $NAME);
			$NAME = $_POST["USERNAME"];
			$response = $stmt->execute();

			if ($response) {
				$data = $stmt->get_result();
				if ($data->num_rows > 0) {

					echo "<h3 style=color:green;>Result Found</h3>";
					$isValid=true;	
				}
				else
				{
					echo "<h3>Result cannot Found</h3>";
					$isValid=false;
				}
			}
		}
		else{
			echo "<h3>Validation Error</h3>";
		}
	  }		
	?>
			
		 <table id="table">
		 
		 <thead>
		 <tr>
		 <th>Username</th>
		 <th>Area</th>
		 <th>Package</th>
		 <th>Status</th>
		 <th>Manager Command</th>
		 <th>Customer Request</th>
		 <th>Date</th>
		 </tr>
		 </thead>
		 <tbody>
		 <?php
			$MANAGER_COMMAND="";
	
			if($response==true)
			{
				
					while ($row = $data->fetch_assoc()) {
						echo "<tr>";
						echo "<td>". $row["name"]."</td>"; 
						echo "<td>".$row["area"]."</td>";
						echo "<td>".$row["package"]."</td>";
						echo "<td>".$row["status"]."</td>";
						echo "<td>".$row["manager_command"]."</td>";
						$MANAGER_COMMAND=$row["manager_command"];
						echo "<td>".$row["customer_request"]."</td>";
						echo "<td>".$row["date"]."</td>";
						echo "</tr>";	
					}
			}
			else
			{
					
				echo "Details Cannot be found";
				echo "<br>";
			}
		 
			
		  
		 ?>
		 </tbody>
		 </table>
<?php include('../VIEW/HF/FOOTER.html')?>
	
</body>
</html>