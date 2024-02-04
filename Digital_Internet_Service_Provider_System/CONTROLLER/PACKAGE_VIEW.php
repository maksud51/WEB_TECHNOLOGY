<?php
 session_start();
 if(count($_SESSION)===0)
 {
	header("Location:../CONTROLLER/LOG_OUT.php");
 }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title style="text-align:center;">View Packages</title>
	<link rel="stylesheet" href="../VIEW/Table.css">
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
	  margin-left: 200px;
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
	<h1 style="text-align:center;" ><u>View Packages</u></h1>
</head>
<body>
	<h3 style="text-align:right;" >User: <?php echo $_SESSION['Username']; ?></h3>
	<button style="text-align:right; margin-left: 1270px;" type="button"  onclick="window.location.href='../CONTROLLER/LOG_OUT.php';"><h4>Log out</h4></button>
	<button style="text-align:right; margin-right: 1270px;" type="button"  onclick="window.location.href='../VIEW/PACKAGE.php';"><h4>Back</h4></button>
	<br>
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
			$sql = "SELECT * FROM packages ";
			$stmt = $connection->prepare($sql);
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
					echo "<br>";
					
				}
			}
			else
			{
				echo "Database Execution failed!!!!!!!!";
			}
		
	?>
	
	<table id="table">
		 
		 <thead>
		 <tr>
		 <th>Name</th>
		 <th>SPEED</th>
		 <th>TIME</th>
		 <th>CABLE</th>
		 <th>NUMBER OF SERVERS</th>
		 <th>OFFERS</th>
		 <th>preferable Area</th>
		 <th>Charge</th>
		 
		 </tr>
		 </thead>
		 <tbody>
		 <?php
			if($res==true)
			{
				
					while ($row = $data->fetch_assoc()) {
						echo "<tr>";
						echo "<td>". $row["name"]."</td>"; 
						echo "<td>".$row["speed"]."</td>";
						echo "<td>".$row["time"]."</td>";
						echo "<td>".$row["cable"]."</td>";
 						echo "<td>".$row["sites"]."</td>";
						echo "<td>".$row["offer"]."</td>";
						echo "<td>".$row["area"]."</td>";
						echo "<td>".$row["amount"]."</td>";
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
<div class="footer">
  	<?php include('../VIEW/HF/FOOTER.html'); ?>	
 </div>

<body>
<html>