<!DOCTYPE html>
<?php
 session_start();
 if(count($_SESSION)===0)
 {
	header("Location:../CONTROLLER/LOG_OUT.php");
 }
 ?>
<?php include "../MODEL/FUNCTION.php"?>
<html>
<head>
	<meta charset="utf-8">
	<title>WELCOME PAGE</title>
</head>
<body>
	<a href="../CONTROLLER/LOG_OUT.php">Log Out</a> 
	<p> || </p>
	<a href="../VIEW/PROFILE.php">HOME</a> 
	<p> || </p>
	<a href="../VIEW/PROFILE.php">BACK</a>
	<h1 style="text-align:center;" ><u>WELCOME <?php echo $_SESSION['Username']; ?></u></h1>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
	<fieldset>
	<u>User Name</u>: <input type="text" name="Username">
	<br>
	<br>
	<u>Status</u>: <br>
			<input type="radio" name="status" value="Active">Active
			<br>
			<input type="radio" name="status" value="Inactive">Deactive
			<br>
			<br>
	<input type="submit" name="submit" value="Action">
	</fieldset>
	</form>
	<?php
	$filename="../MODEL/USER_PACKAGES.json";
	//$A="Username";
	//$Username=$_POST['Username'];
	//$arr2=read($filename);
	$arr2=read($filename);
	?>
	
		 <table border="1">
		 
		 <thead>
		 <tr>
		 <th>CUSTOMER USER NAME</th>
		 <th>AREA</th>
		 <th>PACKAGE NAME</th>
		 <th>STATUS</th>
		 <th>DATE</th> 
		 </tr>
		 </thead>
		 <tbody>
		 <?php
		 
		 for ($j=0;$j<count($arr2);$j++)
		 {
			 echo "<tr>";
			 echo "<td>".$arr2[$j]-> Username."</td>";
			 echo "<td>".$arr2[$j]-> area."</td>";
			 echo "<td>".$arr2[$j]-> package_name."</td>";
			 echo "<td>".$arr2[$j]-> status."</td>";
			 echo "<td>".$arr2[$j]-> date."</td>";
			 echo "</tr>";
		 } 	 
		 ?>
		 </tbody>
		 </table> 

	
	
	<?php 
	  if ($_SERVER['REQUEST_METHOD'] === "POST") 
	  {
		$Username=$package_name=$status=$area=$date="";
		$isValid = false;
		
		if (empty($_POST['status'])or empty($_POST['Username']) ){
			$isValid = false;
		echo "<u>";
		echo "<h3>Fill all the sections </h3>";
		echo "</u>";
		echo "<br>";
		}
		else {
			$isValid = true;
		}
			
		
			$filename="../MODEL/USER_PACKAGES.json";	
			$A="Username";
			$US=search($filename, $A,$Username);
			if($US == true or empty($_POST['status'])or empty($_POST['Username']))
			{
				$isValid = false;	
				echo "Not buy any package yet";

			}
			else
			{
				$isValid = true;
			}

			if ($isValid) {
			
			
			$A="Username";
			$USERNAME=$_POST['Username'];
			$arr2[]=getone($filename, $A,$USERNAME);
		
			
			 for ($j=0;$j<count($arr2);$j++)
			 {
			 	$Username=$arr2[$j]-> Username;
			 	$area=$arr2[$j]-> area;
			 	$package_name=$arr2[$j]-> package_name;
			 	$status=$arr2[$j]->status;
			 	$date=$arr2[$j]-> date;
				 
				 
			 }
		
			$arr1 = array('Username' => $Username,'area'=>$area,'package_name' => $package_name,'status'=>$_POST['status'],'date'=>$date);
			
			
			$up=update($filename,$arr1,$A,$USERNAME);
			if($up==true)
			{
				"<h3>Rating successful</h3>";
			}
			else
			{
				echo "<h3>submit again update</h3>";
			}
			echo "<h3>Update successful</h3>";
			
			}
			else{
				echo "<h3>Something Validation is error</h3>";
			}		
				
		}	
	?>

	
</body>
</html>