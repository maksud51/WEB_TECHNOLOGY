<?php 
		session_start();
		 if(count($_SESSION)===0)
		 {
			header("Location:../CONTROLLER/LOG_OUT.php");
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
		
		$sql = "SELECT * FROM communication_box ";
		$stmt = $connection->prepare($sql);
		$response = $stmt->execute();
		$result = $stmt->get_result();
		$arr1 = array();
		if($response)
		{
		
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				array_push($arr1, 
					array('name' => $row['name'],
					'area' => $row['area'],
					'customer' => $row['customer'],
					'lineman' => $row['lineman'],
					'status' => $row['status']
					));
			}
			echo json_encode($arr1);
		}
		}
		else
			
			{
				echo "error";
			}
?>