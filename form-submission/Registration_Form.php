 <!DOCTYPE html>
<html>
<head>
	<title>Form Submission</title>
</head>
<body style="background-color:LightGray;">


	<h1><u>Registration Form</u></h1>
 
 
 <?php 
	if ($_SERVER['REQUEST_METHOD'] === "POST") {
		
		$Religion=$_POST['Religion'];
		
		if (!empty($_POST["firstname"])) 
		{
			echo "First Name: ";
			echo "<th>" .$_POST['firstname']. "</th>";
			echo "<br>";
        }
		else 
		{
			echo "First Name is not  declared";
			echo "<br>";
        }
		
		if (!empty($_POST["lastname"])) 
		{
			echo "Last Name: ";
			echo "<th>" .$_POST['lastname'] . "</th>";
			echo "<br>";
        }
		else 
		{
			echo "Last Name is not  declared";
			echo "<br>";
        }
		
		if (!empty($_POST["gender"])) 
		{
			echo "Gender: ";
			echo "<th>" .$_POST['gender'] . "</th>";
			echo "<br>";
			
        }
		else 
		{
			echo "gender is not  declared";
			echo "<br>";
			
        }
		
		if (!empty($_POST['Dob'])) 
		{
			echo "Dob: ";
			echo "<th>" .$_POST['Dob'] . "</th>";
			echo "<br>";
			
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
			echo "Religion: ";
			echo $Religion;
			echo "<br>";
			
        }
		echo "Present Address: ";
		echo "<th>" .$_POST['PreAddress']. "</th>";
		echo "<br>";
		echo "Permanent Address: ";
		echo "<th>" .$_POST['PerAddress']. "</th>";
		echo "<br>";
		if (!empty($_POST['phone'])) 
		{
			echo "Phone: ";
			echo "<th>" .$_POST['phone']. "</th>";
			echo "<br>";
			
        }
		else 
		{
			echo "Phone number is not  declared";
			echo "<br>";
			
        }
		
		if (!empty($_POST['Email'])) 
		{
			echo "Email: ";
			echo "<th>" .$_POST['Email']. "</th>";
			echo "<br>";
			
        }
		else 
		{
			echo "Email is not  declared";
			echo "<br>";
			
        }
		echo "Personal Website: ";
		echo "<th>" .$_POST['PersonalWebsite']. "</th>";
		echo "<br>";
		
		
		if (!empty($_POST['Username'])) 
		{
			echo "User Name: ";
			echo "<th>" .$_POST['Username']. "</th>";
			echo "<br>";
			
        }
		else 
		{
			echo "Username is not  declared";
			echo "<br>";
			
        }
			if (!empty($_POST['password'])) 
		{
			echo "Password: ";
			echo "<th>" .$_POST['password']. "</th>";
			echo "<br>";
			
        }
		else 
		{
			echo "password is not  declared";
			echo "<br>";
			
        }

	}
    ?>