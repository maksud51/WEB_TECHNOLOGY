<?php include "../MODEL/FUNCTION.php"?>
<?php 
	  if ($_SERVER['REQUEST_METHOD'] === "POST") 
	  {
		$firstname=$gender=$Dob=$Religion=$phone=$Email=$Username=$password=$PreAddress="";
		$Religion=$_POST['Religion'];
		
		$isValid = false;
		if (empty($_POST['firstname']) or empty($_POST['gender']) 
			or empty($_POST['Dob']) or $Religion=="none"  or empty($_POST['Email']) 
			or empty($_POST['Username']) or empty($_POST['password'])  ){
			$isValid = false;
		echo "<u>";
		echo "<h3>Find empty value in Mandatory section....... </h3>";
		echo "</u>";
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
			 $USER_TYPE='User';
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
	
	</fieldset>
	<br>
	<br>
	

	
	
	
	<br>
	<br>
	
	Already registered?
	<a href="../VIEW/LOG_IN.php">Click here</a> for login