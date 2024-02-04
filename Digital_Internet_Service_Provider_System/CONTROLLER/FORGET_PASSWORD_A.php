<!DOCTYPE html>
<?php include "../MODEL/FUNCTION.php"?>
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
<button style="text-align:right; margin-right: 1270px;" type="button"  onclick="window.location.href='../VIEW/LOG_IN.php';"><h4>Log in</h4></button>
	<br>
	<br>
	
		<form name="jsform" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" onsubmit="return isValid(this);">
		<fieldset>
		
		<u>Phone*</u>:
		<input type="tel" id="phone" name="phone" >
		<br>
		<br>
		<input type="submit" name="submit" value="GET OTP">
		</form>
		<br>
		<br>
		<p id="msg"></p>
		<script>
			function isValid(jsform)
			{
				const PHONE= jsform.phone.value;
				if (PHONE === "") {
					document.getElementById("msg").innerHTML = "Please fill up the form properly";
					return false;
				}
				else if(PHONE.toString().length !== 11)
			{
				document.getElementById("msg").innerHTML = "Phone number characters should be equal to 11 characters";
				return false;
				
			}
			else if(isNaN(PHONE))
			{
				document.getElementById("msg").innerHTML = "Phone number characters should be all neumeric";
				return false;
			}
				return true;
			}
		</script>
		
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
	<br><br><br><br><br><br><br><br>
	<div class="footer">
  		<?php include('../VIEW/HF/FOOTER.html'); ?>	
  </div>
</body>
</html>
