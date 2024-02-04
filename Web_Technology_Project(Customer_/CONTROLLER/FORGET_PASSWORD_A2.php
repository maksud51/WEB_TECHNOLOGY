<!DOCTYPE html>
<?php
 session_start();
 if(count($_SESSION)===0)
 {
	header("Location:../CONTROLLER/LOG_OUT.php");
 }
 ?>
<?php include "../MODEL/FUNCTION.php"?>
<html>
<head>
	<meta charset="utf-8">
	<title style="text-align:center;">Forget Password</title>
	<h1 style="text-align:center;" ><u>Forget Password</u></h1>
</head>
<body>
	<h3 style="text-align:left;" ><a href="../CONTROLLER/FORGET_PASSWORD_A.php">Back</a></h3>


	<br>
	<br>
		<h1>
		<?php 
		$OTP1=$_SESSION['OTP1'];
		echo "OTP IS: ";
		echo $OTP1; ?>
		</h1>
	<br>
	<br>	
		
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
		<u>OTP*</u>: <input type="text" name="OTP">
			<br>
			<br>
		<u>New password*</u>: 
		<input type="password" name="password2">
			<br>
			<br>	
			
		<u>Confirm password*</u>: 
		<input type="password" name="password3">
			<br>
			<br>	
		
		
		<input type="submit" name="submit" value="Chnage">
	</form>
	<?php 
	  if ($_SERVER['REQUEST_METHOD'] === "POST") 
	  {
		$password2=$password3=$OTP="";
		$isValid = false;
		
		if ( empty($_POST['password2']) or empty($_POST['OTP'])
			or empty($_POST['password3'])){
			$isValid = false;
		echo "<u>";
		echo "<h3>Fill all the sections </h3>";
		echo "</u>";
		echo "<br>";
		
		
		if (!empty($_POST['OTP'])) 
		{			
        }
		else 
		{
			echo "OTP is not declare";
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
			
			
			$password2=$_POST['password2'];
			$password3=$_POST['password3'];
			$OTP=$_POST['OTP'];
			$filename="../MODEL/user_info.json";	
			if($OTP==$OTP1)
			{
				$isValid = true;
			}
			else
			{
				$isValid = false;
				echo "OTP IS NOT MATCHED";
			}
	if($isValid)
	{	
	if($password2==$password3)
	{
				
		if ($isValid) 
		{			$servername = "localhost";
					$username = "root";
					$password = "";
					$dbname = "pd";
					$connection = new mysqli($servername, $username, $password, $dbname);
					if ($connection->connect_error) {
					die("Connection failed: " . $connection->connect_error);
					}
			
		
					$sql2 = "UPDATE reg SET password = ? WHERE phone = ?";
					$stmt2 = $connection->prepare($sql2);
					$stmt2->bind_param("ss", $password2, $PHONE);
					 $password2=$_POST['password2'];
					 $PHONE=$_SESSION['phone'];					 
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
		else
		{
			echo "<h3>Something Validation is error</h3>";
		}		
				
	}
		else
		{
			echo "Current and confirm password is not match";
		}
		
	}
	}	
	?>


</body>
</html>