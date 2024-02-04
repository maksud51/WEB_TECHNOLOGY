<!DOCTYPE html>
<?php include('../VIEW/HEADER.php')?>
<?php
 session_start();
 if(count($_SESSION)===0)
 {
	header("Location:../CONTROLLER/LOG_OUT.php");
 }
 ?>
<html>
<head>
	<title>Registration Form</title>
	<h1 style="text-align:center;" ><u>Change Password</u></h1>
	<link rel="stylesheet" href="../VIEW/A.css">
	<style>

</style>
</head>
<body>
<div class="dropdown" style="float:right;">
  <button class="dropbtn"><h1>. . .</h1></button>
  <div class="dropdown-content">
  <a href="../CONTROLLER/SHOW_A.php">Show my profie</a><br>
  <a href="../CONTROLLER/LOG_OUT.php">Logout</a><br>
  </div>
</div>

	<h3 style="text-align:left ;color:#38B6B6;" >User: <?php echo $_SESSION['Username']; ?></h3>
	<br>
	<h3 style="text-align:left;" ><a href="../VIEW/PROFILE.php">Back</a></h3>
	<br>
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
		
		<label  style="margin-left:600px;">Previous password</label> <input type="text" name="password1">
			<br>
			<br>
		<label  style="margin-left:600px;">New password</label> <input type="text" name="password2">
			<br>
			<br>	
		<label  style="margin-left:600px;">Confirm password</label> <input type="text" name="password3">
			<br>
			<br>	
		
		
		<input type="submit" name="submit" value="Chnage">
	</form>
	<?php 
	  if ($_SERVER['REQUEST_METHOD'] === "POST") 
	  {
		$password1=$password2=$password3="";
		$isValid = false;
		
		if (empty($_POST['password1']) or empty($_POST['password2']) 
			or empty($_POST['password3'])){
			$isValid = false;
		echo "<u>";
		echo "<h3>Fill all the sections </h3>";
		echo "</u>";
		echo "<br>";
			if (!empty($_POST['password1'])) 
		{
        }
		else 
		{
			echo "Previous Password is not declare";
			echo "<br>";
        }
		if (!empty($_POST['password2'])) 
		{			
        }
		else 
		{
			echo "New Password is not declare";
			echo "<br>";		
        }
		if (!empty($_POST['password3'])) 
		{
        }
		else 
		{
			echo "Confirm Password is not declare";
			echo "<br>";			
        }
		
		}
		else {
			$isValid = true;
		}
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
			$USERNAME=$_SESSION['Username'];
			$PASSWORD=$_POST['password1'];
			$response = $stmt->execute();

			if ($response) {
				$data = $stmt->get_result();
				if ($data->num_rows > 0) {
					while ($row = $data->fetch_assoc()) {

						$isValid=true;
					}
				}
				else
				{
					
					$isValid=false;
					echo "<br>";
					echo "Previous Password is not matched";
				}
			}
			
			$password2=$_POST['password2'];
			$password3=$_POST['password3'];
			
								
			if($password2==$password3)
			{
				
				if ($isValid) 
				{
					
					$sql2 = "UPDATE reg SET password = ? WHERE username = ?";
					$stmt2 = $connection->prepare($sql2);
					$stmt2->bind_param("ss", $password2, $USERNAME);
					 $password2=$_POST['password2'];
					 $USERNAME=$_SESSION['Username'];	
					 $response2 = $stmt2->execute();
					
					if ($response2)
						{	
							echo "<h3>Password Changed successful</h3>";
						}

						else
						{
							echo "<h3>Execution error</h3>";
							echo "<h3>Please try  again</h3>";
						}

				
				}
				else{
					echo "<h3>Something Validation is error</h3>";
				}		
				
			}
			else
			{
				echo "Current and confirm password is not match";
			}

	}	
	?>
	

</body>
</html>