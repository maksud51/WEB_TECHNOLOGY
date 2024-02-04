<?php include("../VIEW/HF/HEADER.html")?>

<?php
    if($_SERVER['REQUEST_METHOD'] === "POST" and count($_REQUEST) > 0)
	
    $username=$_POST['username'];
	$password=$_POST['password'];
	if (empty($username) or empty($password))
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
		$Username = "root";
		$Password = "";
		$dbname = "internet";
		$connection = new mysqli($servername, $Username, $Password, $dbname);
		if ($connection->connect_error) {
		die("Connection failed: " . $connection->connect_error);
		}
		
			$sql = "SELECT * FROM data WHERE username = ? and password = ?";
			$stmt = $connection->prepare($sql);
			$stmt->bind_param("ss", $username, $password);
			$username = $_POST["username"];
			$password=$_POST['password'];
			$response = $stmt->execute();

			if ($response) {
				$data = $stmt->get_result();
				if ($data->num_rows > 0) {
					while ($row = $data->fetch_assoc()) {
						
						session_start();
						$_SESSION['username']=$username;
						$_SESSION['password']=$password;
						header("Location:../VIEW/Home.php");
						die();
					}
				}
				else
				{
					
					echo "Username or Password is Invalid!!!!!!!!";
				}
			}
			else
			{
				echo "Database Connection Error!!!!!!!!";
			}
			
		}
		else
		{
			echo "Re-Submit All Blank Space!!!";
		}
	 
	 
		  
?>		 <?php include("../VIEW/HF/FOOTER.html")?>