<!DOCTYPE html>
<?php include('../VIEW/HEADER.php')?>
<?php
 session_start();
 if(count($_SESSION)===0)
 {
	header("Location:../CONTROLLER/LOG_OUT.php");
 }
 ?>

<html>
<head>
	<meta charset="utf-8">
	<title style="text-align:center;">Update Profile</title>
	<h1 style="text-align:center;" ><u>Update Profile</u></h1>
	<link rel="stylesheet" href="Reg.css">
	<link rel="stylesheet" href="../MODEL/TABLE.css">
	<style>
.dropbtn {
  background-color: #8CE5E5;
  border-radius: 25px;
  color: white;
  padding: 6px;
  font-size: 10px;
  border: none;
  cursor: pointer;
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
</head>
<body>
<h3 style="text-align:left ;color:#38B6B6;" >User: <?php echo $_SESSION['Username']; ?></h3>
	<h3 style="text-align:left;" ><a href="../VIEW/PROFILE.php">Back</a></h3>
	
	<?php
	
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "pd";
		$res="";
		$connection = new mysqli($servername, $username, $password, $dbname);
		if ($connection->connect_error) {
		die("Connection failed: " . $connection->connect_error);
		}
			$sql = "SELECT * FROM reg WHERE username = ?";
			$stmt = $connection->prepare($sql);
			$stmt->bind_param("s", $USERNAME);
			$USERNAME=$_SESSION['Username'];
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
					echo "Row cannot found";
					
				}
			}
			else
			{
				echo "Database Execution failed!!!!!!!!";
			}
		
	?>


			<div class="dropdown" style="float:right;">
  <button class="dropbtn"><h1>. . .</h1></button>
  <div class="dropdown-content">
  <a href="../CONTROLLER/SHOW_A.php">Show my profie</a><br>
  <a href="../CONTROLLER/LOG_OUT.php">Logout</a><br>
  <br>
  </div>
</div>
<br><br>
<div class="def">	
	<form action="<?php echo htmlspecialchars("../CONTROLLER/UPDATE_A.php"); ?>" method="POST">

			<i>Name*</i>: <input type="text" name="firstname">
			<br>
			<br>
			<i>Gender*</i>: 
			<input type="radio" name="gender" value="male"><i>Male</i>
			<input type="radio" name="gender" value="female"><i>Female</i>
			<input type="radio" name="gender" value="other"><i>Other</i>
			<br>
			<br>		
			<i>Dob*</i>:
			<input type="date"  name="Dob">
			<br>
			<br>
			<i>Religion*</i>: 
			<i><select name="Religion">
			    <option value="none">none</option>
				<option value="Islam">Islam</option>
				<option value="Hindu">Hindu</option>
				<option value="Christianity">Christianity</option>
				<option value="Others">Others</option>
			</select></i>
			<br>
			<br>			

		<i>Address</i>: 
		<i><textarea  name="PreAddress" ></textarea></i>
		<br>
		<br>
		<i>Phone</i>:
		<input type="tel" id="phone" name="phone" >
		<br>
		<br>
		<i>Email*</i>:
		<input type="Email" id="Email" name="Email">
		<br>
		<br>

		<br>
		<input type="submit" name="submit" value="Update">
	</form>
	<div class="abc">

	<br>
		<table id="table">
		 
		 <thead>
		 <tr>
		 <th>Name</th>
		 <th>Gender</th>
		 <th>Date of Birth</th>
		 <th>Religion</th>
		 <th>Address</th>
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
 						echo "<td>".$row["address"]."</td>";
						echo "<td>".$row["phone"]."</td>";
						echo "<td>".$row["email"]."</td>";
						echo "<td>".$row["username"]."</td>";
						echo "<td>".$row["password"]."</td>";
						echo "</tr>";
						
					}
			}
			else
			{
					
				echo "Details Cannot be found";
			}
			
		  
		 ?>
		 </tbody>
		 </table>

	</div>
	<p style="margin-left : 0px;"><?php include('../VIEW/FOOTER.php')?></p>
</div>

</body>
</html>