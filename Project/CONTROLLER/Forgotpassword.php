<!DOCTYPE html>
<?php include('../VIEW/HF/HEADER.html')?>

<html>
<head>
    <meta charset="utf-8">
	<title>Forgot Password</title>
	<style>
	      #message{
		            color:red;
					}
	 </style>
	
	
</head>
<body>
	<a href="../VIEW/Login.php">Log in</a>
	<br>
	<br>
	
		<form name="jsform" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" onsubmit="return isValid(this);">
		<fieldset>
		
		<u>Email</u>:
		<input type="email" id="email" name="email">
		<br>
		<br>
		<input type="submit" name="submit" value="GET CODE">
		</form>
		
		<p id="message"></p>
		
		<script>
			function isValid(jsform)
			{
				const email= jsform.email.value;
				if (email === "") {
					document.getElementById("message").innerHTML = "Please fill up the form properly";
					return false;
				}
				else if(email.toString().length > 41)
			{
				document.getElementById("message").innerHTML = "Email Address must be less then 41 characters";
				return false;
				
			}

				return true;
			}
		</script>
		
		
		
		
		
	   <?php
	     if ($_SERVER['REQUEST_METHOD'] === "POST") 
	      {
		      $email="";
		      $isValid = false;
	       if (empty($_POST['email']))
	        {
		      $isValid = false;
		      echo "<h3>Fill the Emailber </h3>";
	        }
	      else
	        {
		      $isValid = true;
		    }
		
		 if($isValid)
			
		
		{
			
		    $servername = "localhost";
			$Username = "root";
			$Password = "";
			$dbname = "internet";
			$connection = new mysqli($servername, $Username, $Password, $dbname);
			if ($connection->connect_error) {
			die("Connection failed: " . $connection->connect_error);
			}
				
			$sql = "SELECT * FROM data WHERE email = ?";
			$stmt = $connection->prepare($sql);
			$stmt->bind_param("s", $email);
			$email=$_POST['email'];
			$response = $stmt->execute();
           
			if ($response) 
			{
				$data = $stmt->get_result();
				
				if ($data->num_rows > 0) 
				{
					while ($row = $data->fetch_assoc()) {

						echo "<br>";
						echo  "Email Address is Correct";
						echo "<br>";
						$OTP1=rand(100,10000);
						echo $OTP1;
						echo "<br>";
						session_start();
						$_SESSION['OTP1']=$OTP1;
						$_SESSION['email']=$_POST['email'];
						header("Location:../CONTROLLER/Forgotpassword2.php");
						die();
					}
				}
				else
				{
					echo "<br>";
					echo "Incorrect Email Address";
				}
				
				
				
			}
			else
			{
				echo "<br>";
				echo "Error!!!Try Again.....";
			}
		
	}
	else
	{
		echo "<br>";
		echo "Blank Space!!!Please Re-submit";
		echo "<br>"	;
	}
	}
	?>
</body>
</html>
	<?php include('../VIEW/HF/FOOTER.html');?>
