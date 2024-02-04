<?php 
		if ($_SERVER['REQUEST_METHOD'] === "POST") 
	  {
		$decode = json_decode($_POST["obj"], false);
		$NAME=$decode->username; 
		
		$isValid = false;
		if (empty($NAME)) 
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
			echo "USERName is not  declared";
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
			$sql = "SELECT * FROM communication_box WHERE name = ?";
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
		
			
			 $sql2 = "UPDATE communication_box SET status = ? WHERE name = ?";
			 $stmt2 = $connection->prepare($sql2);
			 $stmt2->bind_param("ss",$STATUS, $NAME);
			 $STATUS= "CONFIRMED";
			 $response2 = $stmt2->execute();
			
			if ($response2)
				{	
					echo "<h3 style=color:green;>Action Successfull</h3>";
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