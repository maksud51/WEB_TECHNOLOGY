<!DOCTYPE html>
<?php include "FUNCTION.php"?>
<html>
<head>
	<title>PAGE 3[TRANSACTION HISTORY]</title>
</head>
<body>
	<h1 >PAGE 3[TRANSACTION HISTORY]</h1>
	<h3 >DIGITAL WALLET</h3>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
	<p>1. <a href="HOME.php">HOME</a>  2. <a href="ADD_BENEFICIARY.php">ADD_BENEFICIARY</a> 3. <a href="TH.php">Transaction History</a> 
	</p>
	<h3 >TRANSACTION HISTORY: </h3>
	From:
	<input type="date"  name="D1">
	To:
	<input type="date"  name="D2">
	<input type="submit" name="submit" value="Search">
	</form>
	
	<?php 
		$isValid = false;
		if (empty($_POST['D1']) or empty($_POST['D2']))
		{
			$isValid = false;
			echo "Please fill all sections";
		}
		else
		{
			$isValid = true;
		}
		if ($isValid) 
		{
			$filename="HISTORY.json";
			$DATE1=$_POST['D1'];
			$DATE2=$_POST['D2'];
			$A="DATE";
			$B="DATE";
			$US=search($filename, $A,$DATE1);
			$PASS=search($filename, $B,$DATE2 );	
			if($US==true and $PASS==true)
			{
				$handle2 = fopen("HISTORY.json", "r");
				$data = fread($handle2,filesize("HISTORY.json"));
				$explode  = explode("\n",$data);
				array_pop($explode);
				$arr2 = array(); 
				for ($i = 0; $i < count($explode); $i++) {
				$json = json_decode($explode[$i]); 
				array_push($arr2, $json);
				
				$handle3 = fopen("INFO.json", "r");
				$data2 = fread($handle3,filesize("INFO.json"));
				$explode2  = explode("\n",$data);
				array_pop($explode2);
				$arr3 = array(); 
				for ($i = 0; $i < count($explode2); $i++) {
				$json2 = json_decode($explode2[$i]); 
				array_push($arr3, $json);		
			}
				
				
				
			}
		}
			
		}
		else
		{
			echo "Please fill all sections";
		}
		?>

	
	

	
	
	
	<br>
	<br>
	 <table border="1">
		 
		 <thead>
		 <tr>
		 <th>Transaction Category</th>
		 <th>TO</th>
		 <th>Amount</th>
		 <th>Tranfered on</th>
		 </tr>
		 </thead>
		 <tbody>
		 <?php
		 
		 for ($j=0;$j<count($arr2);$j++)
		 {
			 echo "<tr>";
			 echo "<td>".$arr2[$j]-> CATEGORY."</td>";
			 echo "<td>".$arr3[$j]-> MOBILE."</td>";
			 echo "<td>".$arr2[$j]-> AMOUNT."</td>";
			 echo "<td>".$arr2[$j]-> DATE."</td>";
			 echo "</tr>";
		 } 	 
		 ?>
		 </tbody>
		 </table>
	
	
	
</body>
</html>