
<?php
 session_start();
 if(count($_SESSION)===0)
 {
	header("Location:../CONTROLLER/LOG_OUT.php");
 }
 ?>

 
 <?php 
			
	  if ($_SERVER['REQUEST_METHOD'] === "POST") 
	  {
		$decode = json_decode($_POST["obj"], false);
		
		$NAME=$decode->username;
		$PACKAGE=$decode->package;

		
		$isValid = false;
		if (empty($NAME) or $PACKAGE =="none") 
		{
			$isValid = false;
		echo "<u>";
		echo "<h3>Find empty value in Mandatory section....... </h3>";
		echo "</u>";
		echo "<br>";
		if (!empty($NAME)) 
		{
        }
		else 
		{
			echo "USER Name is not  declared";
			echo "<br>";
        }
		if ($PACKAGE =="none") 
		{
        }
		else 
		{
			echo "Package is not  declared";
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
			$sql = "SELECT * FROM control WHERE name = ?";
			$stmt = $connection->prepare($sql);
			$stmt->bind_param("s", $NAME);
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
		
			
			 $sql2 = "UPDATE control SET package = ?,customer_request=? WHERE name = ?";
			 $stmt2 = $connection->prepare($sql2);
			 $stmt2->bind_param("sss", $PACKAGE, $CUSTOMER_REQUEST, $NAME);
			 $CUSTOMER_REQUEST="None";
			 $response2 = $stmt2->execute();
			
			if ($response2)
				{	
					
					echo "<h3 style=color:green;>Package Updated</h3>";
				}

				else
				{
					echo "<h3>Database Execution Error</h3>";
				}
			
		}
		else{
			echo "<h3>User cannot found</h3>";
			echo "<h3>Please submit again</h3>";
		}
	 }
	?>

						
