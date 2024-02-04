<?php include "../MODEL/FUNCTION.php"?>
<?php
	if($_SERVER['REQUEST_METHOD'] === "POST" and count($_REQUEST) > 0) 
		$Username=$password="";
		$isValid = false;
		if (empty($_POST['Username']) or empty($_POST['password']))
		{
			$isValid = false;
		}
		else
		{
			$isValid = true;
		}
		if ($isValid) 
		{
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "pd";
			$connection = new mysqli($servername, $username, $password, $dbname);
			if ($connection->connect_error) {
			die("Connection failed: " . $connection->connect_error);
			}
			
				$sql = "SELECT * FROM reg WHERE username = ? and password = ?";
				$stmt = $connection->prepare($sql);
				$stmt->bind_param("ss", $USERNAME, $PASSWORD);
				$USERNAME = $_POST["Username"];
				$PASSWORD=$_POST['password'];
				$response = $stmt->execute();

				if ($response) {
					$data = $stmt->get_result();
					if ($data->num_rows > 0) {
						while ($row = $data->fetch_assoc()) {
							
							session_start();
							$_SESSION['Username']=$USERNAME;
							$_SESSION['password']=$PASSWORD;
							header("Location:../VIEW/PROFILE.php");
							die();
						}
					}
					else
					{
						
						echo "USERNAME OR PASSWORD IS NOT CORRECT!!!!!!!!";
					}
				}
				else
				{
					echo "Database Execution failed!!!!!!!!";
				}
				
			}
			else
		{
			echo "Please fill all sections";
		}
	
	?>
	
	