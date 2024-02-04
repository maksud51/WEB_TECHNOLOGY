<?php include("../VIEW/HF/HEADER.html")?>
 <?php 
	  if ($_SERVER['REQUEST_METHOD'] === "POST") {
		$name=$_POST['name'];
		$gender=$_POST['gender'];
		$dob=$_POST['dob'];
		$religion=$_POST['religion'];
		$phone=$_POST['phone'];
		$email=$_POST['email'];
		$username=$_POST['username'];
		$password=$_POST['password'];
		$presentaddress=$_POST['presentaddress'];
		$permanentaddress=$_POST['permanentaddress'];
		
		$isValid=false;
		if (empty($name)  or empty($gender) or empty($dob) or $religion=="none"  or empty($email) 
			or empty($username) or empty($password))  
			{
			   $isValid = false;
			   echo "<b>";
			   echo "<h4>Any Ber is Balnk When You Fillup Your Registration From.Please Re-Submit Your From!!!!!!!!!!<h4>";
			   echo "</b>";
			
			
		
		if (!empty($name)) 
		{
			
        }
		else 
		{
			echo "Name Textber Is Blank";
			echo "<br>";
			echo "Please Fillup Name Textber again";
			echo "<br>";
        }
		
		
		if (!empty($gender))
		{
			
        }
		else 
		{
			echo "Gender is not  Selected";
			echo "<br>";
			echo "Please Gender Option select";
			echo "<br>";
        }
		
		if (!empty($dob))
		{
			
        }
		else 
		{
			echo "Birth Date is not  Given";
			echo "<br>";
			echo "Please Re-Submit with Your Birth Date";
			echo "<br>";
        }
		
		
		if ($religion=="none") 
		{
			echo "Religion is not  Selected";
			echo "<br>";
			
        }
		else
		{
			
        }
		
		if (!empty($presentaddress))
		{
			
        }
		else
		{
			echo "Present Addressber is Blank";
			echo "<br>";
			echo "<br>";
			echo "Please Write your Present Address in Present Addressber";
			echo "<br>";
        }
		
		if (!empty($permanentaddress))
		{
			
        }
		else
		{
			echo "Prmanent Addressber is Blank";
			echo "<br>";
			echo "<br>";
			echo "Please Write your Permanent Address in Present Addressber";
			echo "<br>";
        }
		
		if (!empty($phone)) 
		{
			
        }
		else 
		{
			echo "Phone number is not  Given";
			echo "<br>";
			echo "Please Give Your Cell Phone Number in Your Phoneber ";
			echo "<br>";
			
        }
		
		if (!empty($email))
		{
			
        }
		else 
		{
			echo "Emailber is Blank";
			echo "<br>";
			echo "Please submit again Your Email";
			echo "<br>";
			
        }
		
						
		if (!empty($username))
		{
			
        }
		else 
		{
			echo "Username is not  Given";
			echo "<br>";
			echo "Please submit again your Email in Emailber ";
			echo "<br>";
			
        }
		
		if (!empty($password))
		{
			
        }
		else 
		{
			echo "password is not  Set";
			echo "<br>";
			echo "Please Re-Submit your Password in Passwordber";
			echo "<br>";
			
        }
	  }

	else{
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
		
			$sql = "SELECT * FROM data WHERE username = ? or phone = ?";
			$stmt = $connection->prepare($sql);
			$stmt->bind_param("ss", $username, $phone);
			$username = $_POST["username"];
			$phone = $_POST['phone'];
			$response = $stmt->execute();

			if ($response) {
				$data = $stmt->get_result();
				if ($data->num_rows > 0) {
					while ($row = $data->fetch_assoc()) {
						
						echo "<hr>";
						echo "User Name/Phone Number Is Given!!<br>Please Try Another Way";
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
			
			$sql2 = "INSERT INTO data (name, gender, dob, religion, presentaddress, permanentaddress,phone , email, username, password) 
			VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
			$stmt2 = $connection->prepare($sql2);
			$stmt2->bind_param("ssssssssss", $name, $gender, $dob, $religion, $presentaddress, $permanentaddress, $phone, $email, $username, $password);
			
			 $name=$_POST['name'];
			 $gender=$_POST['gender'];
			 $dob=$_POST['dob'];
			 $religion=$_POST['religion'];
			 $presentaddress=$_POST['presentaddress'];
			 $permanentaddress=$_POST['permanentaddress'];
			 $phone=$_POST['phone'];
			 $email=$_POST['email'];
			 $usernamee=$_POST['username'];
			 $password=$_POST['password'];	
			 $response2 = $stmt2->execute();
			
			if ($response2)
				{	
					echo "<h5><b>Registration Successful!!!</b></h5>";	
				}

				else
				{
					echo "<h3>Something Erorr</h3>";
					echo "<h3>Please submit again</h3>";
			
				}
				
			}
			else
			{
				echo "<h3>Validation Erorr</h3>";
			}
			
							
		}
		else{
			echo "<h5><b>Plese Registration From Submit Agian</b></h5>";
		}
	}
		 
		 
    ?>
	
	
	
	<b>Now?</b>
	<a href="../VIEW/Login.php"><b>Sign in</b></a>
<?php include("../VIEW/HF/FOOTER.html")?>

	 