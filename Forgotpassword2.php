<!DOCTYPE html>
<?php
 include('../Model/Session.php');
 include('../VIEW/HF/HEADER.html');?>
<html>
<head>
	<title>Forgetpassword</title>
		<style>
	      #message{
		            color:red;
					}
	 </style>
	
</head>
<body>

	<a href="../VIEW/Login.php">Log in</a>
	<a href="../CONTROLLER/Forgotpassword.php">Back</a>


	<br>
	<br>
		<h1>
		<?php 
		$OTP1 = $_SESSION['OTP1'];
		echo "OTP IS: ";
		echo $OTP1; ?>
		</h1>
	<br>
	<br>	
		
		<form name="jsform" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST"  onsubmit="return isValid(this);">
		<u>OTP</u>: <input type="text" name="OTP">
			<br>
			<br>
		<u>New password</u>: 
		<input type="password" name="newpassword">
			<br>
			<br>	
			
		<u>Confirm password</u>: 
		<input type="password" name="confirmpassword">
			<br>
			<br>	
		
		
		<input type="submit" name="submit" value="Confirm">
	</form>
		<br>
		<br>
		
		<p id="message"></p>
		
		<script>
		function isValid(jsform)
		{
			const OTP= jsform.OTP.value;
			const newpassword= jsform.newpassword.value;
			const confirmpassword= jsform.confirmpassword.value;
			if (OTP === "" || newpassword === "" || confirmpassword === "") {
				document.getElementById("message").innerHTML = "Please fill up the form properly*";
				return false;
			}
			else if(OTP.toString().length > 6)
			{
				document.getElementById("message").innerHTML = "OTP  must be less than 6 characters*";
				return false;
			}
			else if(newpassword.toString().length > 31)
			{
				document.getElementById("message").innerHTML = "New Password must be less than 30 characters*";
				return false;
			}
			else if(confirmpassword.toString().length > 31)
			{
				document.getElementById("msg").innerHTML = "Confirm Password must be less than 100 characters*";
				return false;
			}
			return true;
		}
	</script>
		
		
		
		
		
		
	<?php 
	  if ($_SERVER['REQUEST_METHOD'] === "POST") 
	  {
		$newpassword=$_POST['newpassword'];
		$confirmpassword=$_POST['confirmpassword'];
		$OTP=$_POST['OTP'];
		$isValid = false;
		
		if (empty($newpassword) or empty($confirmpassword)
			or empty($OTP)){
			$isValid = false;
		
		
		if (!empty($OTP)) 
		{
			
        }
		else 
		{
			echo "Plese Give OTP";
			echo "<br>";		
        }
	
		if (!empty($newpassword)) 
		{
			
        }
		else 
		{
			echo "Write New Password";
			echo "<br>";		
        }
		if (!empty($confirmpassword)) 
		{
			
        }
		else 
		{
			echo "Writr Confirm Password" ;
			echo "<br>";			
        }
		
		}
		else {
			$isValid = true;
		}
		
		
			$newpassword=$_POST['newpassword'];
			$confirmpassword=$_POST['confirmpassword'];
			$OTP=$_POST['OTP'];	
			if($OTP==$OTP1)
			{
				$isValid = true;
			}
			else
			{
				$isValid = false;
				echo "Invalid OTP!!!";
			}
	if($isValid)
	{	
	if($newpassword==$confirmpassword)
	{
				
		if ($isValid) 
		{			$servername = "localhost";
					$Username = "root";
					$Password = "";
					$dbname = "internet";
					$connection = new mysqli($servername, $Username, $Password, $dbname);
					if ($connection->connect_error) {
					die("Connection failed: " . $connection->connect_error);
					}
			
		
					$sql2 = "UPDATE data SET password = ? WHERE email = ?";
					$stmt2 = $connection->prepare($sql2);
					$stmt2->bind_param("ss", $newpassword, $email);
					 $newpassword=$_POST['newpassword'];
					 $email=$_SESSION['email'];					 
					 $response2 = $stmt2->execute();
					
					if ($response2)
						{	
							echo "<h5>Password Setup Successfully</h5>";
						}

						else
						{
							echo "<h3>Database Execution error</h3>";
							echo "<h5>Failled!!!</h5>";
						}
			
		}
		else
		{
			echo "<h3>Validation Error</h3>";
		}		
				
	}
		else
		{
			echo "Write Same New Password and Confirm Password";
		}
		
	}
	}
		

	?>
	 <?php include('../VIEW/HF/FOOTER.html')?>

</body>
</html>