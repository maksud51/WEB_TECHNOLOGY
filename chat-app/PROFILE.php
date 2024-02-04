<!DOCTYPE html>
<?php
 session_start();
 if(count($_SESSION)===0)
 {
	header("Location:LOG_OUT.php");
 }
 ?>
<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "chat";
		$res="";
		$connection = new mysqli($servername, $username, $password, $dbname);
		if ($connection->connect_error) {
		die("Connection failed: " . $connection->connect_error);
		}
?>
<html>
<head>
	<meta charset="utf-8">
	<title style="text-align:center;">Chat Box</title>
	<h1 style="text-align:center;" ><u>Chat Box</u></h1>

</head>
<body>
	<h3 style="text-align:right;" >User: <?php echo $_SESSION['Username']; ?></h3>
	<h3 style="text-align:right;" ><a href="LOG_OUT.php">Log Out</a></h3>
	<h3 style="text-align:right;" ><a href="DELETE.php">DELETE ALL DATA</a></h3>
	<br>
	<br>
	<fieldset>
	<Legend style="text-align:center;" ><h3>Chatbox</h3> </Legend>
	<form action="PROFILE_A.php" method="post" onsubmit="sendData(this); return false;">
	<u>Message</u>: 
		<textarea  name="message" ></textarea>
		<br>
		<br>
	To:
	<select name="RECIEVER">
    <option value="none">Select a member</option>
    <?php
	
		$sql = "SELECT username From reg";
		$stmt = $connection->prepare($sql);
		$response = $stmt->execute();
		
		if ($response) {
				$data = $stmt->get_result();
				if ($data->num_rows > 0) {
					while ($row = $data->fetch_assoc()) {
						
						 echo "<option value='". $row['username'] ."'>" .$row['username'] ."</option>";
						
					}
				}
		}
    ?>  
  </select>
	<input type="submit" name="send" value="send">
	<br>
	<br>
	</form>
	
	<?php
		$_SESSION['SENDER']=$_SESSION['Username'];
	
	?>
	
	<p id="msg"></p>
	<script>
		function sendData(formData) {
			if (formData.message.value === "" || formData.RECIEVER.value === "none") {
				document.getElementById("msg").innerHTML = "Please fill up the form properly";
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
				"message" : formData.message.value,
				"RECIEVER" : formData.RECIEVER.value
			}
			xhttp.send("obj="+JSON.stringify(myData));
		}
	</script>
	<hr>
	<button type="button" onclick="getData();">Show messages</button>
	<hr>
	
<p id="i1"></p>


	<table border="1">
			<tr>
				<td>Sender</td>
				<td>Reciever</td>
				<td>Message</td>
			</tr>
		</th>
		<tbody id="i2"></tbody>
	</table>


	<script>
		setInterval(getData,10000);
		function getData() {
			const xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {

				if (this.readyState === 4 && this.status === 200) {
					const json = JSON.parse(this.responseText);
					
					let x = "";

					for (let i = 0; i < json.length; i++) {
						x += "<tr>" + 
					"<td>" + json[i].sender + "</td>" + 
					"<td>" + json[i].receiver + "</td>" + 
					"<td>" + json[i].message + "</td>" + 
					"</tr>"
					}

					document.getElementById("i2").innerHTML = x;
					console.log(x);
				}
			}
			xhttp.open("GET", "PROFILE_A2.php");
			xhttp.send();
		}
	</script>
	
</body>
</html>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
