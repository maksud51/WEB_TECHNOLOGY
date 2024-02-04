<?php
 include('../Model/Session.php');
 include('../VIEW/HF/HEADER.html');?>
 <?php 
	  if ($_SERVER['REQUEST_METHOD'] === "POST") {
		$username=$_POST['username'];
		$subject=$_POST['subject'];
		$comment=$_POST['comment'];

		$isValid=false;
		if (empty($username)  or empty($subject) or empty($comment))  
			{
			   $isValid = false;
			   echo "<b>";
			   echo "<h4>Any Ber is Balnk When You Fillup Your  From.Please Re-Submit Your From!!!!!!!!!!<h4>";
			   echo "</b>";
			
			
		
		if (!empty($username)) 
		{
			
        }
		else 
		{
			echo "User Name Textber Is Blank";
			echo "<br>";
			echo "Please Fillup User Name Textber again";
			echo "<br>";
        }
		
		
		if (!empty($subject))
		{
			
        }
		else 
		{
			echo "Subject is not  write";
			echo "<br>";
			
			echo "<br>";
        }
		
		if (!empty($comment))
		{
			
        }
		else 
		{
			echo "Comment is not  Given";
			echo "<br>";
			echo "Please Re-Submit with Your CommentBer";
			echo "<br>";
        }
		
	  }

	else{
		  $isValid = true;
	
	}
	
     if ($isValid) 
		 
	 {	
		$servername = "localhost";
		$Username = "root";
		$Password = "";
		$dbname = "internet";
		$connection = new mysqli($servername, $Username, $Password, $dbname);
		if ($connection->connect_error) {
		die("Connection failed: " . $connection->connect_error);
		}
		
			/*$sql = "SELECT * FROM notifycustomer WHERE username = ?";
			$stmt = $connection->prepare($sql);
			$stmt->bind_param("s", $username,);
			$username = $_POST["username"];
			$response = $stmt->execute();

			if ($response) {
				$data = $stmt->get_result();
				if ($data->num_rows > 0) {
					while ($row = $data->fetch_assoc())
						{
						
						echo "<hr>";
						echo "User Name/Phone Number Is Given!!<br>Please Try Another Way";
						echo "<hr>";
						$isValid=false;
					}$isValid=false;
				}
				else
				{
					
					$isValid=true;
				}
			}*/
		
		if ($isValid) { 
			
			$sql2 = "INSERT INTO notifycustomer (username, subject, comment, sendby) 
			VALUES (?, ?, ?, ?)";
			$stmt2 = $connection->prepare($sql2);
			$stmt2->bind_param("ssss", $username, $subject, $comment,$sendby);
			//session_start();
			 $sendby=$_SESSION['username'];
			 $username=$_POST['username'];
			 $subject=$_POST['subject'];
			 $comment=$_POST['comment'];

			 $response2 = $stmt2->execute();
			
			if ($response2)
				{	
					echo "<h5><b>Send Successful!!!</b></h5>";	
				}

				else
				{
					echo "<h3>Something Erorr</h3>";
					echo "<h3>Please submit again</h3>";
			
				}
				
			}
			else
			{
				echo "<h3>Validation Erorr</h3>";
			}
			
							
		}
		else{
			echo "<h5><b>Plese Notify Customer From Submit Agian</b></h5>";
		}
	}
		 
		
    ?>
	
