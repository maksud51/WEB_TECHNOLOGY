<!DOCTYPE html>
<?php include('../VIEW/HEADER.php')?>
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
	<title>Rating</title>
</head>
<body>
	<a href="../CONTROLLER/LOG_OUT.php">Log Out</a> 
	<p> || </p>
	<a href="../VIEW/PROFILE.php">HOME</a>
	<p> || </p>
	<a href="../VIEW/PROFILE.php">Back</a>
	<h1 style="text-align:center;" ><u>User : <?php echo $_SESSION['Username']; ?></u></h1>
	
	
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
		<fieldset>
			<u>area</u>: <input type="text" name="area">
		<br><br>
			<u>Rating*</u>: 
			<input type="radio" name="rating" value="1">1*
			<input type="radio" name="rating" value="2">2*
			<input type="radio" name="rating" value="3">3*
			<input type="radio" name="rating" value="4">4*
			<input type="radio" name="rating" value="5">5*
			<br>
			<br>
			<u>Feedback</u>: <input type="text" name="feedback">
			<br><br>
		
		<input type="submit" name="submit" value="Chnage">
	</form>
	<?php 
	  if ($_SERVER['REQUEST_METHOD'] === "POST") 
	  {
		$Username=$area=$rating=$feedback=" ";
		$Username=$_SESSION['Username'];
		$isValid = false;
		
		if (empty($_POST['rating']) or empty($_POST['area']) or empty($_POST['feedback']) ){
			$isValid = false;
			echo "<u>";
			echo "<h3>Fill all the sections </h3>";
			echo "</u>";
			echo "<br>";
		}
		else 
		{
			$isValid = true;

			if ($isValid) 
			{
			
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "pd";
                $res="";
                $connection = new mysqli($servername, $username, $password, $dbname);
                if ($connection->connect_error) {
                die("Connection failed: " . $connection->connect_error);
                }
                $sql2 = "INSERT INTO rating (username, area,rating,feedback) 
                    VALUES (?, ?, ?, ?)";
                    $stmt2 = $connection->prepare($sql2);
                    $stmt2->bind_param("ssss", $NAME,$AREA, $RATING,$FEEDBACK);
                     $NAME=$_SESSION['Username'];
                     $AREA=$_POST['area'];
                     $RATING=$_POST['rating'];
                     $FEEDBACK=$_POST['feedback'];
                     $response2 = $stmt2->execute(); 
                     echo "Thanks for your Response ";
			
			}
			else
			{
				echo "<h3>Please Submit again</h3>";
			}		
			}	
		}	
	?>
	

</body>
</html>