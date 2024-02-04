<?php 
		 session_start();
		 if(count($_SESSION)===0)
		 {
			header("Location:../CONTROLLER/LOG_OUT.php");
		 }
		 
	  if ($_SERVER['REQUEST_METHOD'] === "POST") 
	  {
		
		$decode = json_decode($_POST["obj"], false);
		$USERNAME=$decode->username;
		
		$isValid = false;
		if ( empty($USERNAME) ) 
		{
			$isValid = false;
		echo "<u>";
		echo "<h3>Username is not declare</h3>";
		echo "</u>";
		echo "<br>";
		}
		else {
			$isValid = true;
		}
				
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
			$stmt->bind_param("s", $USERNAME );
			$response = $stmt->execute();

			if ($response) {
				$data = $stmt->get_result();
					if ($data->num_rows > 0) 
					{
						$isValid = true;
					}
					else
					{	
						$isValid = false;
					}
				}
				else
				{
					echo "Database execution failed";
				}
				
				
			
				
			
			if($isValid == true)
			{
				if($USERNAME != $_SESSION['Username'])
				{

					$sql2 = "DELETE FROM reg WHERE username = ?";
					$stmt2 = $connection->prepare($sql2);
					$stmt2->bind_param("s", $USERNAME );
					$response2 = $stmt2->execute();
					if ($response2) {
						echo "<br>";
						echo "<h3 style=color:green;>DELETE SUCCESSFULLY</h3>";
						echo "<br>";
					}
					else
					{
						echo "DELETE UNSUCCESSFULL";
					}
				}
				else
				{
					echo "<br>";
					echo "You cannot delete yourself";
					echo "<br>";
				}
			}
			else
			{
				echo "<br>";
				echo "USERNAME IS NOT CORRECT ";
				echo "<br>";
			}
	}	
	?>