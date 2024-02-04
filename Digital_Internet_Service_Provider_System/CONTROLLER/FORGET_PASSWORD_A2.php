<!DOCTYPE html>
<?php
 session_start();
 if(count($_SESSION)===0)
 {
	header("Location:../CONTROLLER/LOG_OUT.php");
 }
 ?>
<html>
<head>
	<meta charset="utf-8">
	<title style="text-align:center;">Forget Password</title>
	<style>
		#msg{
		color:red;
		}
</style>
	
	<link rel="stylesheet" href="../VIEW/A.css">
	<style type="text/css">
	div.sticky 
	{
	  position: -webkit-sticky;
	  position: sticky;
	  top: 0;
	  background-color: #74A7CE;
	  padding: 5px;
	  font-size: 20px;
	}
	.footer 
	{
	   left: 0;
	   bottom: 0;
	   width: 100%;
	   background-color: #74A7CE;
	   color: black;
	   margin: 0px;
	   text-align: center;
	}

	.dropbtn 
	{
	  background-color: #8CE5E5;
	  border-radius: 25px;
	  color: white;
	  padding: 6px;
	  font-size: 10px;
	  border: none;
	  cursor: pointer;
	  margin-left: 150px;
	}

	.dropdown 
	{
	  position: relative;
	  display: inline-block;
	}

	.dropdown-content 
	{
	  display: none;
	  position: absolute;
	  right: 0;
	  background-color: #f9f9f9;
	  min-width: 130px;
	  box-shadow: 0px 6px 16px 0px rgba(0,0,0,0.2);
	  z-index: 1;
	}

	.dropdown-content a 
	{
	  color: black;
	  padding: 12px 16px;
	  text-decoration: none;
	  display: block;
	}

	.dropdown-content a:hover {background-color: #38B6B6;}

	.dropdown:hover .dropdown-content 
	{
	  display: block;
	}

	.dropdown:hover .dropbtn 
	{
	  background-color: #38B6B6;
	   border-radius: 25px;
	}
	</style>
	<div class="sticky">
	</div>
	<h1 style="text-align:center;" ><u>Forget Password</u></h1>
</head>
<body id="B_Color">

	<button style="text-align:right; margin-right: 1270px;" type="button"  onclick="window.location.href='../CONTROLLER/FORGET_PASSWORD_A.php';"><h4>Back</h4></button>
	<br>
	<br>



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
		
		<form name="jsform" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" onsubmit="return isValid(this);">
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
		<br>
		<br>
	<p id="msg"></p>
	<script>
	
		function isValid(jsform)
		{
			const OTP= jsform.OTP.value;
			const PASSWORD1= jsform.password2.value;
			const PASSWORD2= jsform.password3.value;
			if (OTP === "" || PASSWORD1 === "" || PASSWORD2 === "") {
				document.getElementById("msg").innerHTML = "Please fill up the form properly";
				return false;
			}
			else if(OTP.toString().length > 4)
			{
				document.getElementById("msg").innerHTML = "OTP characters should be equal or less than 4 characters";
				return false;
			}
			else if(PASSWORD1.toString().length > 100)
			{
				document.getElementById("msg").innerHTML = "Password characters should be equal or less than 100 characters";
				return false;
			}
			else if(PASSWORD2.toString().length > 100)
			{
				document.getElementById("msg").innerHTML = "Password characters should be equal or less than 100 characters";
				return false;
			}
			return true;
		}
	</script>
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
							echo "<h3 style=color:green;>Password Changed successful</h3>";
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
	<div class="footer">
  		<?php include('../VIEW/HF/FOOTER.html'); ?>	
  </div>
</body>
</html>