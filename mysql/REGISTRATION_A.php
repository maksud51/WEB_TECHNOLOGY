<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>LOG IN FORM</title>
</head>
	<h1 style="text-align:center;"><u>LOG IN FORM</u></h1>
	
 <body>
	<fieldset>

 <?php 
	  if ($_SERVER['REQUEST_METHOD'] === "POST") 
	  {
		
		$Religion=$_POST['Religion'];
		$isValid = false;

		if (empty($_POST['firstname']) or empty($_POST["lastname"]) or empty($_POST["gender"]) 
			or empty($_POST['Dob']) or $Religion=="none"  or empty($_POST['Email']) 
			or empty($_POST['Username']) or empty($_POST['password'])  ){
			$isValid = false;
		echo "<u>";
		echo "<h3>Find empty value in Mandatory section!!!!!!!</h3>";
		echo "</u>";
		echo "<br>";
			if (!empty($_POST["firstname"])) 
		{
        }
		else 
		{
			echo "First Name is not  declared";
			echo "<br>";
        }
		if (!empty($_POST["lastname"])) 
		{
        }
		else 
		{
			echo "Last Name is not  declared";
			echo "<br>";
        }
		if (!empty($_POST["gender"])) 
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
	
		if ($isValid) { 
		
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "etwo";
		$connection = new mysqli($servername, $username, $password, $dbname);
		if ($connection->connect_error) {
		die("Connection failed: " . $connection->connect_error);
		}
	
			$sql2 = "INSERT INTO reg (firstname, lastname,gender, dob, religion, presentaddress, permanentaddress,phone, email, website,username, password) 
			VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
			$stmt2 = $connection->prepare($sql2);
			$stmt2->bind_param("ssssssssssss", $FIRSTNAME, $LASTNAME, $GENDER, $DOB, $RELIGION, $PRESENTADDRESS, $PERMANENTADDRESS, $PHONE, $EMAIL, $WEBSITE,$USERNAME, $PASSWORD);
			
			 $FIRSTNAME=$_POST['firstname'];
			 $LASTNAME=$_POST["lastname"];
			 $GENDER=$_POST['gender'];
			 $DOB=$_POST['Dob'];
			 $RELIGION=$_POST['Religion'];
			 $PRESENTADDRESS=$_POST['PreAddress'];
			 $PERMANENTADDRESS=$_POST['PerAddress'];
			 $PHONE=$_POST['phone'];
			 $EMAIL=$_POST['Email'];
			 $WEBSITE=$_POST['PersonalWebsite'];
			 $USERNAME=$_POST['Username'];
			 $PASSWORD=$_POST['password'];	
			 $response2 = $stmt2->execute();
			
			if ($response2)
				{	
					header("Location:LOG_IN.php");
					echo "<h3>Registration successful</h3>";
				}

				else
				{
					echo "<h3>Unique field Violation</h3>";
					echo "<h3>Please submit again</h3>";
			
				}		
		}
		else{
			echo "<h3>Please submit again.</h3>";
		}
	}	
?>
	
	</fieldset>
	</body>
	</html>