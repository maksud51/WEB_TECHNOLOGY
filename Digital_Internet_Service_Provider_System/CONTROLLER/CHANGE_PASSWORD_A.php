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
	<title style="text-align:center;">Change password</title>
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
	  margin-left: 200px;
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
		<?php include('../VIEW/HF/HEADER.html')?>
	</div>
	<h1 style="text-align:center;" ><u>Change password</u></h1>
</head>
<body id="B_Color">
	<h3 style="text-align:right;" >User: <?php echo $_SESSION['Username']; ?></h3>
	<button style="text-align:right; margin-left: 1270px;" type="button"  onclick="window.location.href='../CONTROLLER/LOG_OUT.php';"><h4>Log out</h4></button>
	<button style="text-align:right; margin-right: 1270px;" type="button"  onclick="window.location.href='../VIEW/PROFILE.php';"><h4>Back</h4></button>
	<br>
	<br>

	
	
		<form name="jsform" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" onsubmit="return isValid(this);">
		<fieldset>
		
		<u>Previous password*</u>: 
		<input type="password" name="password1">
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
		
		
		<input type="submit" name="submit" value="Change">
	</form>
	<br>
		<br>
	<p id="msg"></p>
	<script>
	
		function isValid(jsform)
		{
			const PASSWORD1= jsform.password1.value;
			const PASSWORD2= jsform.password2.value;
			const PASSWORD3= jsform.password3.value;
			if (PASSWORD3 === "" || PASSWORD1 === "" || PASSWORD2 === "") {
				document.getElementById("msg").innerHTML = "Please fill up the form properly";
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
			else if(PASSWORD3.toString().length > 100)
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
							echo "<h3 style=color:green;>Password Changed successful</h3>";
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
	<div class="footer">
  		<?php include('../VIEW/HF/FOOTER.html'); ?>	
  </div>

</body>
</html>