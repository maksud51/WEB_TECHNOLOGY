<?php 
	
	if ($_SERVER["REQUEST_METHOD"] === "POST") {

		$decode = json_decode($_POST["obj"], false);

		$USERNAME = $decode->Username;
		$PASSWORD = $decode->Password;
		$EMAIL = $decode->Email;

		if (empty($USERNAME ) or empty($PASSWORD) or empty($EMAIL)) {
			echo "Please fill up all the sections";
		}
		else {
		
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "chat";
		$res="";
		$connection = new mysqli($servername, $username, $password, $dbname);
		if ($connection->connect_error) {
		die("Connection failed: " . $connection->connect_error);
		}
			$sql = "SELECT * FROM reg WHERE username = ?";
			$stmt = $connection->prepare($sql);
			$stmt->bind_param("s", $USERNAME);
			$response = $stmt->execute();

			if ($response) {
				$data = $stmt->get_result();
				if ($data->num_rows > 0) {
					while ($row = $data->fetch_assoc()) {
						
						echo "<hr>";
						echo "Username is already taken";
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
			
					$sql2 = "INSERT INTO reg (username, password, email) VALUES (?, ?, ?)";
					$stmt2 = $connection->prepare($sql2);
					$stmt2->bind_param("sss", $USERNAME, $PASSWORD, $EMAIL);
					$response2 = $stmt2->execute();
					
					if ($response2)
						{	
							echo "<h3>Registration successfull</h3>";

						}

						else
						{
							echo "<h3>Please submit  again</h3>";
					
						}
			}
			else{
				echo "<h3>Validation Erorr</h3>";
			}
			
		}
	}
?>

	<br>
	<br>
