
	<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "chat";
		$res="";
		$connection = new mysqli($servername, $username, $password, $dbname);
		if ($connection->connect_error) {
		die("Connection failed: " . $connection->connect_error);
		}
			$sql3 = "TRUNCATE TABLE communication";
			$stmt3 = $connection->prepare($sql3);
			$response3 = $stmt3->execute();
			if ($response3) {
				
				echo "Database erase successfully!!!!!!!!";
			}
			else
			{
				echo "Database Execution failed!!!!!!!!";
			}
		
		
	?>