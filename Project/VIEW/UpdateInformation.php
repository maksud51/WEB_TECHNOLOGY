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
      <h1 style="text-align:center;"><u><b>Update Information<?php echo $_SESSION['username']; ?></b></u></h1>
	
	<?php
	
		$servername = "localhost";
		$Username = "root";
		$Password = "";
		$dbname = "internet";
		$res="";
		$connection = new mysqli($servername, $Username, $Password, $dbname);
		if ($connection->connect_error) {
		die("Connection failed: " . $connection->connect_error);
		}
			$sql = "SELECT * FROM data WHERE username = ?";
			$stmt = $connection->prepare($sql);
			$stmt->bind_param("s", $username);
			$username=$_SESSION['username'];
			$response = $stmt->execute();
			if ($response) {
				$data = $stmt->get_result();
				if ($data->num_rows > 0) 
				{
				  $res=true;
					
				}
				else
				{
					$res=false;
					echo "Information Cannot Found!!!";
					
				}
			}
			else
			{
				echo "Database Execution failed!!!!!!!!";
			}
		
	?>
	
	<table border="1">
		 
		 <thead>
		 <tr>
		 <th>Name</th>
		 <th>Gender</th>
		 <th>Dob</th>
		 <th>Religion</th>
		 <th>PresentAddress</th>
		 <th>ParmanentAddress</th>
		 <th>Phone</th>
		 <th>Email</th>
		 <th>Username</th>
		 <th>Password</th>
		 
		 </tr>
		 </thead>
		 <tbody>
		 <?php
			if($res==true)
			{
				
					while ($row = $data->fetch_assoc()) {
						echo "<tr>";
						echo "<td>". $row["name"]."</td>"; 
						echo "<td>".$row["gender"]."</td>";
						echo "<td>".$row["dob"]."</td>";
						echo "<td>".$row["religion"]."</td>";
 						echo "<td>".$row["presentaddress"]."</td>";
						echo "<td>".$row["permanentaddress"]."</td>";
						echo "<td>".$row["phone"]."</td>";
						echo "<td>".$row["email"]."</td>";
						echo "<td>".$row["username"]."</td>";
						echo "<td>".$row["password"]."</td>";
						echo "</tr>";
						
					}
			}
			else
			{
					
				echo "Information Cannot Found";
			}
			
		  
		 ?>
		 </tbody>
		 </table>
		 <br>
		 <br>
		 <br>
		 
	
		<form  name="jsform" action="<?php echo htmlspecialchars("../CONTROLLER/UpdateinformationAction.php"); ?>" method="POST" onsubmit="return isValid(this);">
		<fieldset>
		<legend  style="text-align:center";><h3>Basic Information</h3></legend>		
		
			<b>Name</b>: <input type="text" name="name">
			<br>
			<br>
			<b>Gender</b>: 
            <input type="radio" name="gender" value="male">Male
			<input type="radio" name="gender" value="female">Female
			<input type="radio" name="gender" value="other">Other
			<br>
			<br>		
			<b>Birth Date</b>: 
			<input type="date"  name="dob">
			<br>
			<br>
			<b>Religion</b>: 
			<select name="religion">
			    <option value="none">none</option>
				<option value="Islam">Islam</option>
				<option value="Hindu">Hindu</option>
				<option value="Christianity">Christianity</option>
				<option value="Buddhists">Buddhists</option>
				<option value="Others">Others</option>
			</select>
			<br>
			<br>			
		</fieldset>
		<fieldset>
		 <legend  style="text-align:center";><h3>Contact Information</h3></legend>	
		 
		<b>Present Address</b>: 
		<textarea  name="presentaddress" ></textarea>
		<br>
		<br>
		
		<b>Permanent Address</b>: 
		<textarea  name="permanentaddress" ></textarea>
		<br>
		<br>
		
		<b>Phone</b>:
		<input type="tel" id="phone" name="phone" >
		<br>
		<br>
		<b>Email</b>:
		<input type="Email" id="Email" name="email">
		<br>
		<br>
		</fieldset>
		<input type="submit" name="submit" value="Update">
	</form>
	<br>
	<br>
	
	<p id="message"></p>
	
<script>
	      function isValid(jsForm){
		   const name = jsForm.name.value;
		   const gender = jsForm.gender.value;
		   const dob = jsForm.dob.value;
		   const religion = jsForm. religion.value;
		   const presentaddress = jsForm.presentaddress.value;
		   const permanentaddress = jsForm.permanentaddress.value;
		   const  phone= jsForm. phone.value;
		   const  email = jsForm. email.value;

		   
		   //console.log(fname + " " + lname);
		   
		   if(name ==="" || gender ==="" || dob==="" || religion==="" || phone==="" || email==="" || username==="" || password==="" ){
		       document.getElementById("message").innerHTML = "Please fill up the form properly;"
		       return false;
          }
		  
		 else if(name.toString().length > 21)
			{
				document.getElementById("message").innerHTML = "Name must be less than 21 characters*";
				return false;
			}
			
		 else if(gender.toString().length > 8)
			{
				document.getElementById("message").innerHTML = "Gender must be  less than 9 characters*";
				return false;
			}
			
	     else if(dob.toString().length > 16)
			{
				document.getElementById("message").innerHTML = "Date Of Birth must be less than 17 characters*";
				return false;
			}
			
	     else if(religion.toString().length > 10)
			{
				document.getElementById("message").innerHTML = "Religion must be less than 11 characters*";
				return false;
			}
			
	     else if(presentaddress.toString().length > 30)
			{
				document.getElementById("message").innerHTML = "Present Address must be less than 31 characters*";
				return false;
			}
			
	     else if(permanentaddress.toString().length > 30)
			{
				document.getElementById("message").innerHTML = "Permanent Address must be equal or less than 31 characters*";
				return false;
			}
			
			
		else if(phone.toString().length !== 11)
			{
				document.getElementById("message").innerHTML = "Phone number characters should be equal to 11 characters";
				return false;
				
			}
			else if(isNaN(phone))
			{
				document.getElementById("message").innerHTML = "Phone number must be neumeric";
				return false;
			}
			

	     else if(email.toString().length > 40)
			{
				document.getElementById("message").innerHTML = "Email must be less than 41 characters*";
				return false;
			}
			
			

		    return true;
		}
	   
	</script>
	
	
	
	
	
	
    
<?php include('HF/FOOTER.html'); ?>
</body>
</html>