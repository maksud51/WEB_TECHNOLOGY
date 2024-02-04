<!DOCTYPE html>
<?php include('../VIEW/HF/HEADER.html')?>

    <?php
         session_start();
         if(count($_SESSION)===0)
          {
	         header("Location:../CONTROLLER/Logout.php");
          }
      ?> 
<html>
<head>
    <meta charset="utf-8">
	<title>ChangePassword</title>
		<title>Registration Form</title>
		
		 <style>
	      #message{
		            color:red;
					}
	 </style>
	
	
</head>
<body>

    <a href="../CONTROLLER/Logout.php">Log Out</a> 
	<a href="../VIEW/Home.php">HOME</a> 

	<h1 style="text-align:center;"><u><b>CHANGE PASSWORDP<br> <?php echo $_SESSION['username'];?></b></u></h1>
	<?php
	?>
	<br>
	
	<fieldset>
	<form name="jsform" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" onsubmit="return isValid(this);">
	
	<h5 style="text-align:center;">
	current Password: 
	<input type="text" name="currentpassword"></h5>

	<h5 style="text-align:center;">
	New Password: 
	<input type="text" name="newpassword"></h5>
	
    <h5 style="text-align:center;">
	Confirm New Password: 
	<input type="text" name="confirmpassword"></h5>
	
	<h5 style="text-align:center;">
	<input type="submit" name="changePassword" value="Change Password"></h5>
	
	</fieldset>
	</form>
	<p id="message"></p>
	
	
	<script>
	
		function isValid(jsform)
		{
			const currentpassword= jsform.currentpassword.value;
			const newpassword= jsform.newpassword.value;
			const confirmpassword= jsform.confirmpassword.value;
			if (confirmpassword === "" || currentpassword === "" || newpassword === "") {
				document.getElementById("message").innerHTML = "Please fill up the form properly*";
				return false;
			}
			
			else if(currentpassword.toString().length > 31)
			{
				document.getElementById("message").innerHTML = "Current Password to much long**";
				return false;
			}
			
			else if(newpassword.toString().length > 31)
			{
				document.getElementById("message").innerHTML = "New Password to much long*";
				return false;
			}
			
			else if(confirmpassword.toString().length > 31)
			{
				document.getElementById("message").innerHTML = "Confirm Password to much long*";
				return false;
			}
			return true;
		}
	</script>
	
	
	
	
	
	
	<?php 
	  if ($_SERVER['REQUEST_METHOD'] === "POST") 
	  {
		$currentpassword=$_POST['currentpassword'];
		$newpassword=$_POST['newpassword'];
		$confirmpassword=$_POST['confirmpassword'];
		
		$isValid = false;
		
		if (empty($currentpassword) or empty($newpassword) 
			or empty($confirmpassword))
		
		{
              $isValid = false;
		   	   echo "<b>";
			   echo "<h4>Any Ber is Balnk When You Fillup Your Change Password From.Please Re-Submit Your From!!!!!!!!!!<h4>";
			   echo "</b>";
		       if (!empty($currentpassword)) 
		{
			
        }
		else 
		{
			echo "Current Password is Blank";
			echo "<br>";
        }
		if (!empty($newpassword))
		{
			
        }
		else 
		{
			echo "New Password is Blank";
			echo "<br>";		
        }
		if (!empty($confirmpassword)) 
		{
			
        }
		else 
		{
			echo "Confirm New Password is Blank";
			echo "<br>";			
        }
		
		}
		
	 else
	 {
		 $isValid = true;
	 }
	 
	        $servername = "localhost";
			$Username = "root";
			$Password = "";
			$dbname = "internet";
			$connection = new mysqli($servername, $Username, $Password, $dbname);
			if ($connection->connect_error) {
			die("Connection failed: " . $connection->connect_error);
			}
			
			
			$sql = "SELECT * FROM data WHERE username = ? and password = ?";
			$stmt = $connection->prepare($sql);
			$stmt->bind_param("ss", $username, $password);
			$username=$_SESSION['username'];
			$password=$_POST['currentpassword'];
			$response = $stmt->execute();
			if ($response) {
				$data = $stmt->get_result();
				
				if ($data->num_rows > 0) {
					while ($row = $data->fetch_assoc()) {

						$isValid=true;
					}
					
				}
			
				else
				{
					$isValid=false;
					echo "<br>";
					echo "Incorrect Current Passowrd!!!" ;
				}
			}
			
			$newpassword=$_POST['newpassword'];
			$confirmpassword=$_POST['confirmpassword'];
			
								
			if($newpassword==$confirmpassword)
			{
				
				if ($isValid) 
				{
					
					$sql2 = "UPDATE data SET password = ? WHERE username = ?";
					$stmt2 = $connection->prepare($sql2);
					$stmt2->bind_param("ss", $newpassword, $username);
					 $newpassword=$_POST['newpassword'];
					 $username=$_SESSION['username'];	
					 $response2 = $stmt2->execute();
					
					if ($response2)
						{	
							echo"<b>Passowrd Change Successfully!!!</b>";
						}

						else
						{
							echo "<h3>Failled!!!Again Try....</h3>";
						}

				
				}
				else{
					echo "<b>Password Changed Failled</b>";
				}	
				
			}
			else
			{
				echo "Current Password and New password is not match";
			}
		
		
	}
	 
 ?>	 
<?php include('../VIEW/HF/FOOTER.html')?>


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
		   const  username = jsForm. username.value;
		   const  password = jsForm. password.value;
	
	
	
	
	
    
</body>	
</html>