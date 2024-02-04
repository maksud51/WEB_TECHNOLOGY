
<?php 
	  if ($_SERVER['REQUEST_METHOD'] === "POST") 
	  {
		$decode = json_decode($_POST["obj"], false);
		
		$NAME=$decode->NAME;
		$SPEED=$decode->SPEED;
		$TIME=$decode->TIME;
		$CABLE=$decode->CABLE;
		$SERVER=$decode->SERVER;
		$OFFER=$decode->OFFER;
		$AREA=$decode->AREA;
		$CHARGE=$decode->CHARGE;
		
		$isValid = false;
		if (empty($NAME) or empty($SPEED) or empty($TIME) 
			or empty($CABLE) or empty($SERVER) or empty($CHARGE) ){
			$isValid = false;
		echo "<u>";
		echo "<h3>Find empty value in Mandatory section....... </h3>";
		echo "</u>";
		echo "<br>";
			if (!empty($NAME)) 
		{
        }
		else 
		{
			echo "PACKAGE NAME is not  declared";
			echo "<br>";
        }
		if (!empty($SPEED)) 
		{			
        }
		else 
		{
			echo "TIME is not  declared";
			echo "<br>";		
        }
		if (!empty($TIME)) 
		{			
        }
		else 
		{
			echo "SPEED is not  declared";
			echo "<br>";		
        }
		if (!empty($CABLE)) 
		{
        }
		else 
		{
			echo "CABLE is not  declared";
			echo "<br>";			
        }			
		if (!empty($SERVER)) 
		{
        }
		else 
		{
			echo "CHARGE is not  declared";
			echo "<br>";
			
        }
		if (!empty($CHARGE)) 
		{
        }
		else 
		{
			echo "CHARGE is not  declared";
			echo "<br>";
			
        }
		
		}
		else {
			$isValid = true;
		}
		if($isValid)
		{
			
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "pd";
			$connection = new mysqli($servername, $username, $password, $dbname);
			if ($connection->connect_error) {
			die("Connection failed: " . $connection->connect_error);
			}
			$sql = "SELECT * FROM packages WHERE name = ?";
			$stmt = $connection->prepare($sql);
			$stmt->bind_param("s", $NAME);
			$response = $stmt->execute();

			if ($response) {
				$data = $stmt->get_result();
				if ($data->num_rows > 0) {

					$isValid=false;	
				}
				else
				{
					$isValid=true;
				}
			}
		}
		else{
			echo "<h3>Validation Error</h3>";
		}
		
		
		if ($isValid) { 
		
			
			$sql2 = "INSERT INTO packages (name, speed, time, cable, sites, offer, area, amount) 
			VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
			$stmt2 = $connection->prepare($sql2);
			$stmt2->bind_param("ssssssss", $NAME, $SPEED, $TIME, $CABLE, $SERVER, $OFFER, $AREA, $CHARGE);
			 /*$NAME=$_POST["NAME"];
			 $SPEED=$_POST["SPEED"];
			 $TIME=$_POST["TIME"];
			 $CABLE=$_POST["CABLE"];
			 $SITES=$_POST["SERVER"];
			 $OFFER=$_POST["OFFER"];
			 $AREA=$_POST["AREA"];
			 $AMOUNT=$_POST["CHARGE"];*/
			 $response2 = $stmt2->execute();
			
			if ($response2)
				{	
					//header("Location:../CONTROLLER/PACKAGE_VIEW.php");
					echo "<h3 style=color:green;>Package Created</h3>";
				}

				else
				{
					echo "<h3>Database Execution Error</h3>";
				}
			
		}
		else{
			echo "<h3>Unique field Violation</h3>";
			echo "<h3>Please submit again</h3>";
		}
	}	
	?>
