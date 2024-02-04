<?php
 session_start();
 if(count($_SESSION)===0)
 {
	header("Location:../CONTROLLER/LOG_OUT.php");
 }
?>

<html>
<head>
	<meta charset="UTF-8">
	<title>UPDATE USER FORM</title>
	<style>
		#msg{
		color:red;
		}
</style>
	<link rel="stylesheet" type="text/css" href="../VIEW/A.css">
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
	</div>
</head>
	<h1 style="text-align:center;"><u>UPDATE USER FORM</u></h1>
	<button style="text-align:right; margin-left: 1270px;" type="button"  onclick="window.location.href='../CONTROLLER/LOG_OUT.php';"><h4>Log out</h4></button>
	<button style="text-align:right; margin-right: 1270px;" type="button"  onclick="window.location.href='../VIEW/PROFILE.php';"><h4>Back</h4></button>
	<br>
	<br>
 <body id="B_Color">
	<fieldset style="text-align:center;">
	<legend>   Information   </legend>
	<form name="jsform" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" onsubmit="return isValid(this);">
	<br>
	<br>
	Username: <input style="border:2px solid navajowhite ;" type="text" name="Username">
	<br>
	<br>
	<input type="submit" name="submit" value="Log in">
	</form>
	</fieldset style="text-align:center;">
	<br>
	<br>
	<p id="msg"></p>
	<script>
		function isValid(jsform)
		{
			const USERNAME= jsform.Username.value;
			if (USERNAME === "") {
				document.getElementById("msg").innerHTML = "Please fill up the form properly";
				return false;
			}
			else if(USERNAME.toString().length > 50)
			{
				document.getElementById("msg").innerHTML = "Name characters should be equal or less than 50 characters";
				return false;
			}
			return true;
		}
	</script>
</body>
</html>
<?php
		if($_SERVER['REQUEST_METHOD'] === "POST" and count($_REQUEST) > 0) 
		$Username="";
		$isValid = false;
		if (empty($_POST['Username']))
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
		$username = "root";
		$password = "";
		$dbname = "pd";
		$connection = new mysqli($servername, $username, $password, $dbname);
		if ($connection->connect_error) {
		die("Connection failed: " . $connection->connect_error);
		}
		
			$sql = "SELECT * FROM reg WHERE username = ? and user_type != 'admin'";
			$stmt = $connection->prepare($sql);
			$stmt->bind_param("s", $USERNAME );
			$USERNAME = $_POST["Username"];
			$response = $stmt->execute();

			if ($response) {
				$data = $stmt->get_result();
				if ($data->num_rows > 0) {
					while ($row = $data->fetch_assoc()) {
						
						$_SESSION['User']=$USERNAME;
						header("Location:../VIEW/UPDATE_USER.php");
						die();
					}
				}
				else
				{
					
					echo "USERNAME IS NOT CORRECT or USERNAME BELONGS TO ADMIN!!!!!!!!";
				}
			}
			else
			{
				echo "Database Execution failed!!!!!!!!";
			}
			
		}
		else
		{
			echo "Please fill Username section";
		}
	
?>	
<div class="footer">
	<?php include('../VIEW/HF/FOOTER.html'); ?>	
  </div>

	


