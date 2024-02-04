<!DOCTYPE html>
<?php
 include('../Model/Session.php');
 include('../VIEW/HF/HEADER.html');?>

<html>
<head>
	<meta charset="utf-8">
	<title>Validation</title>
	
	<style>
	      #message{
		            color:red;
					}
	 </style>
	 
</head>
<body>
	<a href="../CONTROLLER/Logout.php">Log Out</a> 

	<a href="../VIEW/Home.php">BACK</a>
	<h1 style="text-align:center;" ><u>Pakage Validation <?php echo $_SESSION['username']; ?></u></h1>
	<form name="jsform" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" onsubmit="return isValid(this);">
	<fieldset>
	<u>User Name</u>: <input type="text" name="username">
	<br>
	<br>
	<input type="submit" name="submit" value="Action">
	</fieldset>
	</form>
	<br>
	<br>
	
	<p id="message"></p>
	<script>
		function isValid(jsform)
		{
			const username= jsform.username.value;
			if (username === "") {
				document.getElementById("message").innerHTML = "Please fill up the form properly*";
				return false;
			}
			else if(username.toString().length > 31)
			{
				document.getElementById("message").innerHTML = "User Name must be less than 31 characters*";
				return false;
			}
			return true;
		}
	</script>
	

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
			$sql3 = "SELECT * FROM pakgeinfo";
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
			
        <table border="5">
		 
		 <thead>
		 <tr>
		 <th>User Name</th>
		 <th>Customer Name</th>
		 <th>Area</th>
		 <th>Phone</th>
		 <th>Description</th>
		 <th>Status</th>
		 <th>Reason</th>
		
		 </tr>
		 </thead>
		 <tbody>			

          <?php
			$status="";
	
			if($res==true)
			{
				
					while ($row = $data->fetch_assoc()) {
						
						$status=$row["status"];
						echo "<tr>";
						echo "<td>". $row["username"]."</td>"; 
						echo "<td>".$row["CustomerName"]."</td>";
						echo "<td>".$row["area"]."</td>";
						echo "<td>".$row["phone"]."</td>";
						echo "<td>".$row["description"]."</td>";
						echo "<td>".$row["status"]."</td>";
						echo"<td>".'<a href="../CONTROLLER/NotifyCustomer.php"> Inform </a>'."</td>" ;
						echo "</tr>";	
					}
			}
			else
			{
					
				echo "Exitance Information Cannot Found!!!";
				echo "<br>";
			}
		 
			
		  
		 ?>
		 </tbody>
		 </table>			
	<?php 
			
	  if ($_SERVER['REQUEST_METHOD'] === "POST") 
	  {

		
		$isValid = false;
		if (empty($_POST['username'])) 
		{
			$isValid = false;
		echo "<u>";
		echo "<h3>Usernamber empty.Please re-submit</h3>";
		echo "</u>";
		echo "<br>";
		if (!empty($_POST['username'])) 
		{
        }
		else 
		{
			echo "USER Name is not  declared";
			echo "<br>";
        }

	
		}
		else {
			$isValid = true;
		}
			if($isValid)
		{

			$servername = "localhost";
			$Username = "root";
			$password = "";
			$dbname = "internet";
			$connection = new mysqli($servername, $Username, $password, $dbname);
			if ($connection->connect_error) {
			die("Connection failed: " . $connection->connect_error);
			}
			
			$sql = "SELECT * FROM pakgeinfo WHERE username = ?";
			$stmt = $connection->prepare($sql);
			$stmt->bind_param("s", $username);
			$username= $_POST["username"];
			$response = $stmt->execute();

			if ($response) {
				$data = $stmt->get_result();
				if ($data->num_rows > 0) {
					$isValid=true;
				
		
		      }
				else
				{
					
					$isValid=false;
				}
			}
		}
		else{
			echo "<h3>Validation Error</h3>";
		}
		
		
		if ($isValid) { 
		
			
			 $sql2 = "UPDATE pakgeinfo SET status = ? WHERE username = ?";
			 $stmt2 = $connection->prepare($sql2);
			 $stmt2->bind_param("ss",$status, $username);
			 $status="Invalid";
			 $username=$_POST["username"];
			 $response2 = $stmt2->execute();
			
			if ($response2)
				{	
					echo "<h3>Action Successfull</h3>";
					header("Location:../CONTROLLER/Validationpakage.php");
				}

				else
				{
					echo "<h3>Database Execution Error</h3>";
				}
			
		}
		else{
			echo "<h3>Linem man cannot found</h3>";
			echo "<h3>Please submit again</h3>";
		}
	 }

	?>
	<?php include('../VIEW/HF/FOOTER.html')?>

	
</body>
</html>
