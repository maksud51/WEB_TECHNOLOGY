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
		echo "<h3>Find empty value in Mandatory section....... </h3>";
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
			$handle1 = fopen("data.json", "a");
		$arr1 = array('firstname' => $_POST["firstname"], 'lastname' => $_POST["lastname"],'gender' => $_POST["gender"],
			'Dob' => $_POST['Dob'],'Religion' => $Religion
			,'Present Address' => $_POST['PreAddress'],'Permanent Address' => $_POST['PerAddress'], 'phone' => $_POST['phone'],
			'Email' => $_POST['Email'],'Personal Website' =>$_POST['PersonalWebsite'], 'Username' => $_POST['Username'], 
			'password' => $_POST['password']);
			$encode = json_encode($arr1);
			$res = fwrite($handle1, $encode . "\n");
			echo "<h3>Information saved successully.</h3>";				
		}
		else{
			echo "<h3>Please submit again.</h3>";
		}
	}	
	?>
	<?php
			$handle2 = fopen("data.json", "r");
			$data = fread($handle2,filesize("data.json"));	
	?>
	
	
	<?php
			$explode  = explode("\n",$data);
			array_pop($explode);
		
	?>
	<?php
			$arr1 = array(); 
			for ($i = 0; $i < count($explode); $i++) {
			$json = json_decode($explode[$i]); 
			array_push($arr1, $json);
			}
	?>
	</fieldset>
	
	<fieldset>
	<legend>Log In </legend>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="GET">
	<br>
	<br>
	Username: <input type="text" name="Username">
	<br>
	<br>
	password: <input type="text" name="password">
	<br>
	<br> 
	<input type="submit" name="submit" value="Log in">
	</form>
	
	<?php 
	if($_SERVER['REQUEST_METHOD'] === "GET" and count($_REQUEST) > 0) 
		{ $flag = false;
		for ($k = 0; $k < count($arr1); $k++)
			{ if ($_GET['Username'] === $arr1[$k]->Username and $_GET['password'] === $arr1[$k]->password) 
			{ $flag = true;
		}
	}
			if ($flag) 
			{
			header("Location:WELCOME.php");
			die();
			}
			else 
			{
			echo "<h3>Username or password is incorrect</h3>";
			echo "<h3>Please try again!</h3>";
			}
		}
	?>
	</fieldset>
	</body>
	</html>
