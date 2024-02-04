<?php
 session_start();
 if(count($_SESSION)===0)
 {
	header("Location:LOG_OUT.php");
 }
 ?>

<?php 
	
	if ($_SERVER["REQUEST_METHOD"] === "POST") {

		$decode = json_decode($_POST["obj"], false);

		$MESSAGE = $decode->message;
		$RECIEVER = $decode->RECIEVER;
		$SENDER=$_SESSION['Username'];
		

		if ($RECIEVER=="none") {
			echo "Please fill up the form properly";
		}
		else {
		
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "chat";
		$res="";
		$connection = new mysqli($servername, $username, $password, $dbname);
		if ($connection->connect_error) {
		die("Connection failed: " . $connection->connect_error);
		}

				if ($SENDER==$RECIEVER) {
						
						echo "<hr>";
						echo "Sender cannot send message themself";
						echo "<hr>";
						$isValid=false;
					
				}
				else
				{
					
					$isValid=true;
				}
			
		
				if($isValid)
				{
			
					$sql2 = "INSERT INTO communication (sender, receiver, message) VALUES (?, ?, ?)";
					$stmt2 = $connection->prepare($sql2);
					$stmt2->bind_param("sss", $SENDER, $RECIEVER, $MESSAGE);
					$response2 = $stmt2->execute();
					
					if ($response2)
						{	
							echo "<h3>Message sent</h3>";

						}

						else
						{
							echo "<h3>Please submit  again</h3>";
					
						}
			}
			else{
				echo "<h3>Validation Erorr</h3>";
			}
			
		}
	}
?>