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
		$USERNAME=$_SESSION['Username'];
		$connection = new mysqli($servername, $username, $password, $dbname);
		if ($connection->connect_error) {
		die("Connection failed: " . $connection->connect_error);
		}
	
		
		$sql = "SELECT * FROM reg WHERE username = ?";
		$stmt = $connection->prepare($sql);
		$stmt->bind_param("s", $USERNAME);
		$USERNAME=$_SESSION['Username'];
		$response = $stmt->execute();
		$result = $stmt->get_result();
		$arr1 = array();
		if($response)
		{
		
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				array_push($arr1, 
					array('name' => $row['name'],
					'gender' => $row['gender'],
					'dob' => $row['dob'],
					'religion' => $row['religion'],
					'address' => $row['address'],
					'phone' => $row['phone'],
					'email' => $row['email'],
					'username' => $row['username'],
					'password' => $row['password']
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