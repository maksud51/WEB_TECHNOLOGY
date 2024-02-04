<!DOCTYPE html>
<?php include "FUNCTION.php"?>
<html>
<head>
	<title>PAGE 2[ADD_BENEFICIARY]</title>
</head>
<body>
	<h1 >PAGE 2[ADD_BENEFICIARY]</h1>
	<h3 >DIGITAL WALLET</h3>
	<p>1. <a href="HOME.php">HOME</a>  2. <a href="ADD_BENEFICIARY.php">ADD_BENEFICIARY</a> 3. <a href="TH.php">Transaction History</a> 
	</p>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
	<h3 >ADD_BENEFICIARY: </h3>
	Benenficiary Name:
	<input type="text" name="BNAME">
	Mobile Number:
	<input type="tel" name="MOBILE">
	<input type="submit" name="submit" value="submit">
	</form>
	 <?php 
	  if ($_SERVER['REQUEST_METHOD'] === "POST") 
	  {
		  $BNAME=$MOBILE="";
		  $isValid = false;
		if(empty($_POST['BNAME']) or empty($_POST["MOBILE"]))
		{
			$isValid = false;	
			echo "<h3>Found empty value in Mandatory section....... </h3>";			
		}
		else
		{
			$handle1 = fopen("INFO.json", "a");
			$BNAME=$_POST['BNAME'];
			$MOBILE=$_POST["MOBILE"];
			$arr1 = array('BNAME' =>$BNAME, 'MOBILE' =>$MOBILE);
			$encode = json_encode($arr1);
			$res = fwrite($handle1, $encode . "\n");
			echo "<h3>Adding Successfull</h3>";	
		}
		  
		  
	  }  
	?>
	<?php
			$handle2 = fopen("INFO.json", "r");
			$data = fread($handle2,filesize("INFO.json"));	
	?>
	
	
	<?php
			$explode  = explode("\n",$data);
			array_pop($explode);
		
	?>
	<?php
			$arr2 = array(); 
			for ($i = 0; $i < count($explode); $i++) {
			$json = json_decode($explode[$i]); 
			array_push($arr2, $json);
			}
	?>
	
	
	<br>
	<br>
	 <table border="1">
		 
		 <thead>
		 <tr>
		 <th>BENEFICIARY NAME</th>
		 <th>PHONE NIMBER</th>
		 </tr>
		 </thead>
		 <tbody>
		 <?php
		 
		 for ($j=0;$j<count($arr2);$j++)
		 {
			 echo "<tr>";
			 echo "<td>".$arr2[$j]-> BNAME."</td>";
			 echo "<td>".$arr2[$j]-> MOBILE."</td>";
			 echo "</tr>";
		 } 	 
		 ?>
		 </tbody>
		 </table>
		 
	
	
	
</body>
</html>