<!DOCTYPE html>
<?php include('../VIEW/HEADER.php')?>
<?php
 session_start();
 if(count($_SESSION)===0)
 {
	header("Location:../CONTROLLER/LOG_OUT.php");
 }
?>
 <?php
  include "../MODEL/FUNCTION.php"?>
<html>
<head>
    <title>Buy Package</title>
    <link rel="stylesheet" href="../MODEL/TABLE.css">
    <link rel="stylesheet" href="../VIEW/A.css">
</head>
<body>
    <div class="dropdown" style="float:right;">
  <button class="dropbtn"><h1>. . .</h1></button>
  <div class="dropdown-content">
  <a href="../CONTROLLER/SHOW_A.php">Show my profie</a><br>
  <a href="../CONTROLLER/LOG_OUT.php">Logout</a><br>
  </div>
</div>
     
    <h3 style="text-align:left ;color:#38B6B6;" >User: <?php echo $_SESSION['Username']; ?></h3>
    <br>
        <h3 style="text-align:left;" ><a href="../VIEW/PROFILE.php">Back</a></h3>
		<h1 style="text-align:center;" ><u>Inform Box</u></h1> 
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
		<u>Username  </u>: <input style="margin-left:0px ;border-bottom: 2px solid Orange;"type="text" name="Username">
        <br><br>
        <u>Area  </u>: <input style="margin-left:50px ;border-bottom: 2px solid Orange;"type="text" name="area">
        <br><br>
        <u>Description  </u>: <input style="margin-left:0px ;border-bottom: 2px solid Orange;"type="text" name="description">

        <br><br>
        <input style="margin-left:0px ;border-bottom: 2px solid Orange;"type="submit" name="submit" value="Send">
        <br>
		<?php
		if($_SERVER['REQUEST_METHOD']==="POST")
		{

			$Username=$_SESSION['Username'];
			$isValid=false;
			if(empty($_POST['Username']) or empty($_POST['area']) or empty($_POST['description']))
			{
				$isValid=false;
				echo"<h3>Find empty value in Mandatory section....... </h3>";
				if (!empty($_POST['Username'])) 
					{
			        }
					else 
					{
						echo "What is your Username";
						echo "<br>";
			        }
			        if (!empty($_POST['area'])) 
					{
			        }
					else 
					{
						echo "What is your Area";
						echo "<br>";
			        }
			        if (!empty($_POST['description'])) 
					{
			        }
					else 
					{
						echo " Please write your Problem ";
						echo "<br>";
			        }
			        
			}
			else 
			{
				$isValid = true; 
			}
			if($isValid===true)
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
		           
		              $sql2 = "INSERT INTO communication_box (name, area, customer,lineman, status) 
		            VALUES (?, ?, ?, ?, ?)";
		            $STATUS=" ";
		            $stmt2 = $connection->prepare($sql2);
		            $stmt2->bind_param("sssss", $NAME, $AREA, $CUSTOMER,$LINEMAN ,$STATUS);
		            $USERNAME=$_SESSION['Username'];
		             $NAME=$_POST['Username'];
		             $AREA=$_POST['area'];
		             $CUSTOMER=$_POST['description'];
		             $LINEMAN=" ";
		             $STATUS="Issue Arise";
		             $response2 = $stmt2->execute(); 
		             echo "Successful  ";
            }    
            
            else
            {
                echo "Please fill up all box";
            }

		}

		?>
		<br>
		<br>

</form>
</body>
</head>
</html>