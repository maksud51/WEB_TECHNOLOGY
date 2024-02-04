<!DOCTYPE html>
<?php
 include('../Model/Session.php');
 include('../VIEW/HF/HEADER.html');?>
<html>
<head>
    <meta charset="utf-8">
	<title>Update</title>
</head>
<body>

      <a href="../VIEW/Login.php">Log Out</a> 
	  <a href="../VIEW/Home.php">HOME</a>
      <h1 style="text-align:center;"><u><b>Update Information</u>

	<?php 
	
	if ($_SERVER['REQUEST_METHOD'] === "POST") 
	  {
		$name=$gender=$dob=$religion=$phone=$email=$username=$password=$presentaddress="";
		$presentaddress="";
		$religion=$_POST['religion'];

		$isValid = false;
		if (empty($_POST['name']) or empty($_POST['gender']) 
			or empty($_POST['dob']) or $religion=="none"  or empty($_POST['email']) )  {
			$isValid = false;
            echo "<b>";
			echo "<h4>Any Ber is Balnk When You Fillup Your Update Information From.Please Re-Submit Your From!!!!!!!!!!<h4>";
		    echo "</b>";
		    echo "<br>";
			if (!empty($_POST['name'])) 
		{
        }
		else 
		{
			echo "Name Textber Is Blank";
			echo "<br>";
			echo "Please Fillup Name Textber again";
			echo "<br>";
			
        }
		if (!empty($_POST['gender'])) 
		{			
        }
		else 
		{
			echo "Gender is not  Selected";
			echo "<br>";
			echo "Please Gender Option select";
			echo "<br>";
			
        }
		if (!empty($_POST['dob'])) 
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
		if (!empty($_POST['email'])) 
		{	
        }
		else 
		{
			echo "Emailber is Blank";
			echo "<br>";
			echo "Please submit again Your Email";
			echo "<br>";			
        }
				
		
		}
		else {
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
		
			$sql = "SELECT * FROM data WHERE username != ? and phone = ?";
			$stmt = $connection->prepare($sql);
			$stmt->bind_param("ss", $username, $phone);
			$username=$_SESSION['username'];
			$phone = $_POST['phone'];
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
			
			$sql2 = "UPDATE data SET name = ?, gender = ? , dob = ?, religion = ?, presentaddress = ?, permanentaddress = ?,
			phone = ?, email = ? WHERE username = ?";
			$stmt2 = $connection->prepare($sql2);
			$stmt2->bind_param("sssssssss", $name, $gender, $dob, $religion, $presentaddress, $permanentaddress, $phone, $email, $username);
			 $name=$_POST['name'];
			 $gender=$_POST['gender'];
			 $dob=$_POST['dob'];
			 $religion=$_POST['religion'];
			 $presentaddress=$_POST['presentaddress'];
			 $permanentaddress=$_POST['permanentaddress'];
			 $phone=$_POST['phone'];
			 $email=$_POST['email'];
			 $username=$_SESSION['username'];	
			 $response2 = $stmt2->execute();
			
			if ($response2)
				{	
					echo "<h3>Update successful</h3>";
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
	<?php include("../VIEW/HF/FOOTER.html")?>
	
	
	
</body>
</html>