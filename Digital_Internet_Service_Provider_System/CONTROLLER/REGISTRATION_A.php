<html>
<head>
	<title>Registration Form</title>
</style>
	<link rel="stylesheet" href="Reg.css">
	<link rel="stylesheet" href="Reg.css">

	<style>
	.dropbtn {
	  background-color: #8CE5E5;
	  border-radius: 25px;
	  color: white;
	  padding: 6px;
	  font-size: 10px;
	  border: none;
	  cursor: pointer;
	  margin-left: 200px;
	}

	.dropdown {
	  position: relative;
	  display: inline-block;
	}

	.dropdown-content {
	  display: none;
	  position: absolute;
	  right: 0;
	  background-color: #f9f9f9;
	  min-width: 130px;
	  box-shadow: 0px 6px 16px 0px rgba(0,0,0,0.2);
	  z-index: 1;
	}

	.dropdown-content a {
	  color: black;
	  padding: 12px 16px;
	  text-decoration: none;
	  display: block;
	}

	.dropdown-content a:hover {background-color: #38B6B6;}

	.dropdown:hover .dropdown-content {
	  display: block;
	}

	.dropdown:hover .dropbtn {
	  background-color: #38B6B6;
	   border-radius: 25px;

}
</style>
  <div class="sticky">
    <?php include('../VIEW/HF/HEADER_A.html')?>
 </div>
</head>
<body>
	<div id="example2"  >
<?php 
	  if ($_SERVER['REQUEST_METHOD'] === "POST") 
 {
		$firstname=$gender=$Dob=$Religion=$phone=$Email=$Username=$password=$PreAddress="";
		$Religion=$_POST['Religion'];
		
		$isValid = false;
		if (empty($_POST['firstname']) or empty($_POST['gender']) 
			or empty($_POST['Dob']) or $Religion=="none"  or empty($_POST['Email']) or empty($_POST['phone'])
			or empty($_POST['Username']) or empty($_POST['password'])  ){
			$isValid = false;
		echo "<h3>Find empty value in Mandatory section....... </h3>";
		echo "<br>";
		echo "<h3>Please fill all the section....... </h3>";
		echo "<br>";
			if (!empty($_POST['firstname'])) 
		{
        }
		else 
		{
			echo "Name is not  declared";
			echo "<br>";
        }
		if (!empty($_POST['gender'])) 
		{			
        }
		else 
		{
			echo "gender is not  declared";
			echo "<br>";		
        }
		if (!empty($_POST['Dob'])) 
		{
        }
		else 
		{
			echo "DOB is not  declared";
			echo "<br>";			
        }
		if ($Religion=="none") 
		{
			echo "Religion is not  declared";
			echo "<br>";
			
        }
		else
		{
        }
		
		if (!empty($_POST['Email'])) 
		{	
        }
		else 
		{
			echo "Email is not  declared";
			echo "<br>";			
        }
		
		
		if (!empty($_POST['phone'])) 
		{	
        }
		else 
		{
			echo "Email is not  declared";
			echo "<br>";			
        }
				
		if (!empty($_POST['Username'])) 
		{
        }
		else 
		{
			echo "Username is not  declared";
			echo "<br>";
			
        }
		if (!empty($_POST['password'])) 
		{
        }
		else 
		{
			echo "password is not  declared";
			echo "<br>";			
        }
		if (!empty($_POST['gender'])) 
		{
        }
		else 
		{
			echo "password is not  declared";
			echo "<br>";			
        }
		
		
		
		}
		else {
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
		
			$sql = "SELECT * FROM reg WHERE username = ? or phone = ?";
			$stmt = $connection->prepare($sql);
			$stmt->bind_param("ss", $USERNAME, $PHONE);
			$USERNAME = $_POST["Username"];
			$PHONE = $_POST['phone'];
			$response = $stmt->execute();

			if ($response) {
				$data = $stmt->get_result();
				if ($data->num_rows > 0) {
					while ($row = $data->fetch_assoc()) {
						
						echo "<hr>";
						echo "Username or Phone number is already taken";
						echo "<hr>";
						$isValid=false;
					}
				}
				else
				{
					
					$isValid=true;
				}
			}
		
		if ($isValid) { 
			
			$sql2 = "INSERT INTO reg (name, gender, dob, religion, address, phone, email, username, password, user_type) 
			VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
			$stmt2 = $connection->prepare($sql2);
			$stmt2->bind_param("ssssssssss", $NAME, $GENDER, $DOB, $RELIGION, $ADDRESS, $PHONE, $EMAIL, $USERNAME, $PASSWORD, $USER_TYPE);
			
			 $NAME=$_POST['firstname'];
			 $GENDER=$_POST['gender'];
			 $DOB=$_POST['Dob'];
			 $RELIGION=$_POST['Religion'];
			 $ADDRESS=$_POST['PreAddress'];
			 $PHONE=$_POST['phone'];
			 $EMAIL=$_POST['Email'];
			 $USERNAME=$_POST['Username'];
			 $PASSWORD=$_POST['password'];	
			 $USER_TYPE='admin';
			 $response2 = $stmt2->execute();
			
			if ($response2)
				{	
					header("Location:../VIEW/LOG_IN.php");
					echo "<h3>Registration successful</h3>";
				}

				else
				{
					echo "<h3>Unique field Violation</h3>";
					echo "<h3>Please submit again</h3>";
			
				}
				
			}
			else
			{
				echo "<h3>Validation Erorr</h3>";
			}
			
							
		}
		else{
			echo "<h3>Validation Erorr</h3>";
		}
	}
	
	?>
	
	<br>
	<br>

	<br>
	<br>
	
	Already registered?  <h3><a href="../VIEW/LOG_IN.php">Login</a></h3> 
	<p> </p>
	Did not registered yet?  <h3><a href="../VIEW/REGISTRATION.php">Registration</a></h3> 
	<div class="footer">
      <?php include('../VIEW/HF/FOOTER.html'); ?> 
 </div>
</body>
</html>