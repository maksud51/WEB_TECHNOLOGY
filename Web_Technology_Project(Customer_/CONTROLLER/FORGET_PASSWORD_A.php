<!DOCTYPE html>
<?php include "../MODEL/FUNCTION.php"?>
<html>
<head>
	<meta charset="utf-8">
	<title style="text-align:center;">Forget Password</title>
	<h1 style="text-align:center;" ><u>Forget Password</u></h1>
</head>
<body>
	<a href="../VIEW/LOG_IN.php">Log in</a>
	<br>
	<br>
	
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
		<fieldset>
		
		<u>Phone</u>:
		<input type="tel" id="phone" name="phone" >
		<br>
		<br>
		<input type="submit" name="submit" value="GET OTP">
		</form>
		
		
	<?php
	if ($_SERVER['REQUEST_METHOD'] === "POST") 
	{
		$PHONE="";
		$isValid = false;
	if (empty($_POST['phone']))
	{
		$isValid = false;
		echo "<h3>Fill the Phone number  section </h3>";
	}
	else
	{
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
				
			$sql = "SELECT * FROM reg WHERE phone = ?";
			$stmt = $connection->prepare($sql);
			$stmt->bind_param("s", $PHONE);
			$PHONE=$_POST['phone'];
			$response = $stmt->execute();

			if ($response) 
			{
				$data = $stmt->get_result();
				if ($data->num_rows > 0) 
				{
					while ($row = $data->fetch_assoc()) {

						echo "<br>";
						echo "Mobile Number Matched";
						echo "<br>";
						$OTP1=rand(10,1000);
						echo $OTP1;
						echo "<br>";
						session_start();
						$_SESSION['OTP1']=$OTP1;
						$_SESSION['phone']=$_POST['phone'];
						header("Location:../CONTROLLER/FORGET_PASSWORD_A2.php");
						die();
					}
				}
				else
				{
					echo "<br>";
					echo "Phone Number is not Found";
				}
				
				
				
			}
			else
			{
				echo "<br>";
				echo "Execution error";
			}
		
	}
	else
	{
		echo "<br>";
		echo "Somethig Validation Priblem";
		echo "<br>"	;
	}
	}
	?>
	
</body>
</html>