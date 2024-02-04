<?php 
			
	  if ($_SERVER['REQUEST_METHOD'] === "POST") 
	  {
		$decode = json_decode($_POST["obj"], false);
		
		$NAME=$decode->username;


		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "pd";
		$res="";
		$connection = new mysqli($servername, $username, $password, $dbname);
		if ($connection->connect_error) {
		die("Connection failed: " . $connection->connect_error);
		}
			$sql3 ="SELECT * FROM control WHERE name = ?";
			$stmt3 = $connection->prepare($sql3);
			$stmt3->bind_param("s", $NAME);
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
					echo "Row cannot found";
					echo "<br>";
					
				}
			}
			else
			{
				echo "Database Execution failed!!!!!!!!";
			}
		
		

			$MANAGER_COMMAND="";
	
			if($res==true)
			{
				
					while ($row = $data->fetch_assoc()) {
						$MANAGER_COMMAND=$row["manager_command"];
						
					}
			}
			else
			{
					
				echo "Details Cannot be found";
				echo "<br>";
			}

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
			echo "USER Name is not  declared";
			echo "<br>";
        }

	
		}
		else {
			$isValid = true;
		}
			if($isValid)
		{
			$STATUS="";
			$sql = "SELECT * FROM control WHERE name = ?";
			$stmt = $connection->prepare($sql);
			$stmt->bind_param("s", $NAME);
			$response = $stmt->execute();

			if ($response) {
				$data = $stmt->get_result();
				if ($data->num_rows > 0) {
					$isValid=true;
				
				if($MANAGER_COMMAND=="active")
				{
					$STATUS= "RUNNING";
				}
				else if($MANAGER_COMMAND=="inactive")
				{
					$STATUS= "EXPIRE";
				}


					
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
		
			
			 $sql2 = "UPDATE control SET status = ? WHERE name = ?";
			 $stmt2 = $connection->prepare($sql2);
			 $stmt2->bind_param("ss",$STATUS, $NAME);
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