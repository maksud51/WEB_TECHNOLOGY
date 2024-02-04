
<?php
 session_start();
 if(count($_SESSION)===0)
 {
	header("Location:../CONTROLLER/LOG_OUT.php");
 }
 ?>

	<?php 
	  if ($_SERVER['REQUEST_METHOD'] === "POST") 
	  {
		$firstname=$gender=$Dob=$Religion=$phone=$Email=$Username=$password=$PreAddress="";
		
		$decode = json_decode($_POST["obj"], false);
		
		$NAME=$decode->firstname;
		$GENDER=$decode->gender;
		$DOB=$decode->Dob;
		$RELIGION=$decode->Religion;
		$ADDRESS=$decode->PreAddress;
		$PHONE=$decode->phone;
		$EMAIL=$decode->Email;

		

		$isValid = false;
		if (empty($NAME) or empty($GENDER) 
			or empty($DOB) or $RELIGION=="none"  or empty($PHONE)or empty($EMAIL))  {
			$isValid = false;
		echo "<u>";
		echo "<h3>Find empty value in Mandatory section....... </h3>";
		echo "</u>";
		echo "<br>";
			if (!empty($NAME)) 
		{
        }
		else 
		{
			echo "Name is not  declared";
			echo "<br>";
        }
		if (!empty($GENDER)) 
		{			
        }
		else 
		{
			echo "gender is not  declared";
			echo "<br>";		
        }
		if (!empty($DOB)) 
		{
        }
		else 
		{
			echo "DOB is not  declared";
			echo "<br>";			
        }
		if ($RELIGION=="none") 
		{
			echo "Religion is not  declared";
			echo "<br>";
			
        }
		else
		{
        }
		if (!empty($EMAIL)) 
		{	
        }
		else 
		{
			echo "Email is not  declared";
			echo "<br>";			
        }
		if (!empty($PHONE)) 
		{	
        }
		else 
		{
			echo "Phone is not  declared";
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
		
			$sql = "SELECT * FROM reg WHERE username != ? and phone = ?";
			$stmt = $connection->prepare($sql);
			$stmt->bind_param("ss", $USERNAME, $PHONE);
			$USERNAME=$_SESSION['Username'];
			$response = $stmt->execute();

			if ($response) {
				$data = $stmt->get_result();
				if ($data->num_rows > 0) {
					while ($row = $data->fetch_assoc()) {
						
						echo "<hr>";
						echo " Phone number is already taken";
						echo "<hr>";
						$isValid=false;
					}
				}
				else
				{
					
					$isValid=true;
				}
			}
		
			
			
		
		
		if($isValid)
		{
			
			$sql2 = "UPDATE reg SET name = ?, gender = ? , dob = ?, religion = ?, address = ?,
			phone = ?, email = ? WHERE username = ?";
			$stmt2 = $connection->prepare($sql2);
			$stmt2->bind_param("ssssssss", $NAME, $GENDER, $DOB, $RELIGION, $ADDRESS, $PHONE, $EMAIL, $USERNAME);
			 $USERNAME=$_SESSION['Username'];	
			 $response2 = $stmt2->execute();
			
			if ($response2)
				{	
					echo "<h3 style=color:green;>Update successful</h3>";
				}

				else
				{
					echo "<h3>Unique field Violation</h3>";
					echo "<h3>Please Update again</h3>";
				}
				
			}
			else
			{
				echo "<h3>Validation Erorr</h3>";
			}
		
	}		
		
		else{
			echo "<h3>Something Validation is error</h3>";
		}
	}	
	?>
	

</body>
</html>