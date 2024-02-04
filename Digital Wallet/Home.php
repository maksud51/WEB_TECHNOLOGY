<!DOCTYPE html>
<?php include "FUNCTION.php"?>
<html>
<head>
	<title>PAGE 1[HOME]</title>
</head>
<body>
	<h1 >PAGE 1[HOME]</h1>
	<h3 >DIGITAL WALLET</h3>
	<p>1. <a href="HOME.php">HOME</a>  2. <a href="ADD_BENEFICIARY.php">ADD_BENEFICIARY</a> 3. <a href="TH.php">Transaction History</a> 
	</p>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
	<h3 >FUND TRANSFER: </h3>
	

	Select Category:
	<select name="CATEGORY">
			    <option value="none">Select a Value</option>
				<option value="SEND_MONEY">Send Money</option>
				<option value="MOBILE_RECHARGE">Mobile Recharge</option>
				<option value="CASH_OUT">Cash Out</option>
			</select>
			<br>
			<br>
	
	To:
	<select name="RECIEVER">
			    <option value="none">Select a Value</option>
				<option value="RATUL">RATUL</option>
				<option value="FORHAD">FORHAD</option>
				<option value="ASHA">ASHA</option>
				<option value="PULOK">PULOK</option>
			</select>
			<br>
			<br>
	Amount:
	<input type="text" name="AMOUNT">
	<br>
	<br>
		
		<input type="submit" name="submit" value="submit">
	</form>
	
	<?php 
	  if ($_SERVER['REQUEST_METHOD'] === "POST") 
	  {
		   $CATEGORY=$RECIEVER=$AMOUNT="";
		   $CATEGORY=$_POST['CATEGORY'];
		   $RECIEVER=$_POST['RECIEVER'];
		   $isValid = false;
		if($CATEGORY=="none" or $RECIEVER=="none" or  empty($_POST['AMOUNT']) )
		{
			$isValid = false;	
			echo "<h3>Found empty value in Mandatory section....... </h3>";			
		}
		else
		{
			$handle1 ="HISTORY.json";
			$CATEGORY=$_POST['CATEGORY'];
			$RECIEVER=$_POST['RECIEVER'];
			$AMOUNT=$_POST['AMOUNT'];
			$DATE=date("Y/m/d");
			
			$arr1 = array('CATEGORY' =>$CATEGORY, 'RECIEVER' =>$RECIEVER,'AMOUNT' =>$AMOUNT,'DATE' =>$DATE );
			create($handle1,$arr1);
			echo "<h3>Adding Successfull</h3>";	
		}
		  
		  
	  }  
	?>
	
	
	
</body>
</html>