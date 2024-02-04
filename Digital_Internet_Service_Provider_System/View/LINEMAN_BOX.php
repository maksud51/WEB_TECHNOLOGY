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
	<title style="text-align:center;">Lineman Box</title>
	<style>
		#msg{
		color:red;
		}
</style>
	<link rel="stylesheet" href="TABLE.css">
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
	<h1 style="text-align:center;" ><u>Lineman Box</u></h1>
</head>
<body id="B_Color">
	<h3 style="text-align:right;" >User: <?php echo $_SESSION['Username']; ?></h3>
	<button style="text-align:right; margin-left: 1270px;" type="button"  onclick="window.location.href='../CONTROLLER/LOG_OUT.php';"><h4>Log out</h4></button>
	<button style="text-align:right; margin-right: 1270px;" type="button"  onclick="window.location.href='../VIEW/PROFILE.php';"><h4>Back</h4></button>
	<br>
	<br>
	
	<form name="jsform" action="<?php echo htmlspecialchars("../CONTROLLER/LINEMAN_BOX_A.php"); ?>" method="POST" onsubmit="sendData(this); return false;">
	<fieldset>
	<u>User Name</u>: <input style="border:2px solid red;" type="text" name="USERNAME">
	<br>
	<br>
	<input type="submit" name="submit" value="Action">
	</fieldset>
	</form>
	<br>
	<br>
	<p id="msg"></p>
	<script>
		function sendData(formData)
		{
			const USERNAME= jsform.USERNAME.value;
			if (USERNAME === "") {
				document.getElementById("msg").innerHTML = "Please fill up the form properly";
				return false;
			}
			else if(USERNAME.toString().length > 50)
			{
				document.getElementById("msg").innerHTML = "Name characters should be equal or less than 50 characters";
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
				"username" : formData.USERNAME.value
				
			}
			xhttp.send("obj="+JSON.stringify(myData));

			setInterval(getData,3000);
		}
	</script>
	
	<button type="button" onclick="getData();">Show details</button>
	<p id="i1"></p>
	<table id="table">
			<tr>
				 <th>Username</th>
				 <th>Area</th>
				 <th>Customer Message</th>
				 <th>Lineman Message</th>
				 <th>Status</th>
			</tr>
		</th>
		<tbody id="i2"></tbody>
	</table>
	
	<script>
		function getData() {
			const xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {

				if (this.readyState === 4 && this.status === 200) {
					const json = JSON.parse(this.responseText);
					
					let x = "";

					for (let i = 0; i < json.length; i++) {
						x += "<tr>" + 
					"<td>" + json[i].name + "</td>" + 
					"<td>" + json[i].area + "</td>" +
					"<td>" + json[i].customer + "</td>" + 
					"<td>" + json[i].lineman + "</td>" + 
					"<td>" + json[i].status + "</td>" +  
					"</tr>"
					}

					document.getElementById("i2").innerHTML = x;
					console.log(x);
				}
			}
			xhttp.open("GET", "../MODEL/LINEMAN_BOX_M.php");
			xhttp.send();
		}
	</script>


		 <br>
		 <br>
<div class="footer">
  		<?php include('../VIEW/HF/FOOTER.html'); ?>	
  </div>

	
</body>
</html>