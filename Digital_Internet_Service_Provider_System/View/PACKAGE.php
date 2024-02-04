<?php
 session_start();
 if(count($_SESSION)===0)
 {
	header("Location:../CONTROLLER/LOG_OUT.php");
 }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title style="text-align:center;">Create Packages</title>
	<style>
		#msg{
		color:red;
		}
</style>

	<link rel="stylesheet" href="../VIEW/A.css">
	<style type="text/css">
	div.sticky 
	{
	  position: -webkit-sticky;
	  position: sticky;
	  top: 0;
	  background-color: #74A7CE;
	  padding: 5px;
	  font-size: 20px;
	}
	.footer 
	{
	   left: 0;
	   bottom: 0;
	   width: 100%;
	   background-color: #74A7CE;
	   color: black;
	   margin: 0px;
	   text-align: center;
	}

	.dropbtn 
	{
	  background-color: #8CE5E5;
	  border-radius: 25px;
	  color: white;
	  padding: 6px;
	  font-size: 10px;
	  border: none;
	  cursor: pointer;
	  margin-left: 200px;
	}

	.dropdown 
	{
	  position: relative;
	  display: inline-block;
	}

	.dropdown-content 
	{
	  display: none;
	  position: absolute;
	  right: 0;
	  background-color: #f9f9f9;
	  min-width: 130px;
	  box-shadow: 0px 6px 16px 0px rgba(0,0,0,0.2);
	  z-index: 1;
	}

	.dropdown-content a 
	{
	  color: black;
	  padding: 12px 16px;
	  text-decoration: none;
	  display: block;
	}

	.dropdown-content a:hover {background-color: #38B6B6;}

	.dropdown:hover .dropdown-content 
	{
	  display: block;
	}

	.dropdown:hover .dropbtn 
	{
	  background-color: #38B6B6;
	   border-radius: 25px;
	}
	</style>
	<div class="sticky">
		<?php include('../VIEW/HF/HEADER.html')?>
	</div>
	<h1 style="text-align:center;" ><u>Create Packages</u></h1>
</head>
<body id="B_Color">
	<h3 style="text-align:right;" >User: <?php echo $_SESSION['Username']; ?></h3>
	<button style="text-align:right; margin-left: 1270px;" type="button"  onclick="window.location.href='../CONTROLLER/LOG_OUT.php';"><h4>Log out</h4></button>
	<button style="text-align:right; margin-right: 1270px;" type="button"  onclick="window.location.href='../VIEW/PROFILE.php';"><h4>Back</h4></button>
	<br>
	<button style="text-align:right; margin-right: 1200px;" type="button"  onclick="window.location.href='../CONTROLLER/PACKAGE_VIEW.php';"><h4>View Packages</h4></button>
	<br>
	<br>

		<form name="jsform" action="<?php echo htmlspecialchars("../CONTROLLER/PACKAGE_A.php"); ?>" method="POST" onsubmit="sendData(this); return false;">
		<fieldset>
		<legend>Package information </legend>
		
			<u> Package Name*</u>: <input type="text" name="NAME">
			<br>
			<br>
			<u>Speed*</u>: <br>
			<input type="radio" name="SPEED" value="1MBPS">1 MBPS<br>
			<input type="radio" name="SPEED" value="5MBPS">5 MBPS<br>
			<input type="radio" name="SPEED" value="10MBPS">10 MBPS<br>
			<input type="radio" name="SPEED" value="15MBPS">15MBPS<br>
			<input type="radio" name="SPEED" value="20MBPS">20MBPS<br>
			<br>
			<br>		
			<u>Using Time*</u>: 
			<select name="TIME">
			    <option value="none">none</option>
				<option value="12 Hour">12 Hour</option>
				<option value="24 Hour">24 Hour</option>
			</select>
			<br>
			<br>
			<u>Using Cable*</u>: <br>
			<input type="radio" name="CABLE" value="FIBRE">FIBRE OPTICS CABLE<br>
			<input type="radio" name="CABLE" value="TWISTED">TWISTED PAIR CABLES<br>
			<input type="radio" name="CABLE" value="SHIELDED">SHIELDED CABLES<br>
			<br>
			<br>
			<u>Free Server Sites Provides*</u>: 
			<select name="SERVER">
				<option value="12 Hour">5</option><br>
				<option value="24 Hour">10</option><br>
				<option value="24 Hour">15</option><br>
			</select>
			<br>
			<br>
			<u>Other Offers</u>: 
			<textarea  name="OFFER" ></textarea>
			<br>
			<br>
			<u>preferable Area</u>: 
			<textarea  name="AREA" ></textarea>
			<br>
			<br>
			<u>Charge*</u>: <br>
			<input type="radio" name="CHARGE" value="500">500tk<br>
			<input type="radio" name="CHARGE" value="800">800tk<br>
			<input type="radio" name="CHARGE" value="1000">1000tk<br>
			<input type="radio" name="CHARGE" value="2000">2000tk<br>
			<br>
			<br>
			<input type="submit" name="submit" value="submit">
		</form>
		<br>
		<br>
		<p id="msg"></p>
		<script>
		function sendData(formData) {
			const NAME= jsform.NAME.value;
			const SPEED= jsform.SPEED.value;
			const TIME= jsform.TIME.value;
			const CABLE= jsform.CABLE.value;
			const SERVER= jsform.SERVER.value;
			const OFFER= jsform.SERVER.value;
			const AREA= jsform.SERVER.value;
			const CHARGE= jsform.CHARGE.value;
			if ( NAME === "" || SPEED === "" || CABLE === "" ||
				TIME === "none" || SERVER === "" || CHARGE === "" ) 
			{
				document.getElementById("msg").innerHTML = "Please fill up the form properly";
				return false;
			}
			else if(NAME.toString().length > 50)
			{
				document.getElementById("msg").innerHTML = "Name characters should be equal or less than 50 characters";
				return false;
			}
			else if(SPEED.toString().length > 50)
			{
				document.getElementById("msg").innerHTML = "SPEED characters should be equal or less than 50 characters";
				return false;
			}
			else if(TIME.toString().length > 50)
			{
				document.getElementById("msg").innerHTML = "TIME characters should be equal or less than 50 characters";
				return false;
			}
			else if(CABLE.toString().length > 50)
			{
				document.getElementById("msg").innerHTML = "CABLE characters should be equal or less than 50 characters";
				return false;
			}
			else if(SERVER.toString().length > 10)
			{
				document.getElementById("msg").innerHTML = "Site characters should be equal or less than 50 characters";
				return false;
			}
			else if(OFFER.toString().length > 100)
			{
				document.getElementById("msg").innerHTML = "Offer characters should be equal or less than 50 characters";
				return false;
			}
			else if(AREA.toString().length > 100)
			{
				document.getElementById("msg").innerHTML = "Area characters should be equal or less than 50 characters";
				return false;
			}
			else if(CHARGE.toString().length > 100)
			{
				document.getElementById("msg").innerHTML = "Amount characters should be equal or less than 50 characters";
				return false;
			}
			const xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState === 4 && this.status === 200) {
					document.getElementById("msg").innerHTML = this.responseText;
				}
			}
			xhttp.open(formData.method, formData.action);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			const myData = {
				"NAME" : formData.NAME.value,
				"SPEED" : formData.SPEED.value,
				"TIME" : formData.TIME.value,
				"CABLE" : formData.CABLE.value,
				"SERVER" : formData.SERVER.value,
				"OFFER" : formData.OFFER.value,
				"AREA" : formData.AREA.value,
				"CHARGE" : formData.CHARGE.value
			}
			xhttp.send("obj="+JSON.stringify(myData));	
			
		}
	</script>
	


		 <br>
		 <br>
	
	<div class="footer">
  		<?php include('../VIEW/HF/FOOTER.html'); ?>	
  	</div>			
</body>
</html>			
			
