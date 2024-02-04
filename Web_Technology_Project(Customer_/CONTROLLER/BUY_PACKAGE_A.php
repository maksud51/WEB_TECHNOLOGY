<!DOCTYPE html>
<?php
 session_start();
 if(count($_SESSION)===0)
 {
	header("Location:../CONTROLLER/LOG_OUT.php");
 }
?>
<?php
    
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "pd";
        $res="";
        $connection = new mysqli($servername, $username, $password, $dbname);
        if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
        }
            $sql = "SELECT * FROM control WHERE name = ?";
            $stmt = $connection->prepare($sql);
            $stmt->bind_param("s", $USERNAME);
            $USERNAME=$_SESSION['Username'];
            $response = $stmt->execute();
            if ($response) {
                $data = $stmt->get_result();
                if ($data->num_rows > 0) 
                {
                  $res=true;
                    echo "You already buy a package. You only can change your package ";
                    echo <<<HTML
                    <a href="../CONTROLLER/CHANGE_PACKAGE_A.php">Click here</a>
                    HTML;
                 
                }
                else
                {
                    $res=false;
                    echo "Row cannot found";

                    $sql2 = "INSERT INTO control (name, area, package, status, manager_command, customer_request, date) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt2 = $connection->prepare($sql2);
            $stmt2->bind_param("sssssss", $NAME, $AREA, $PACKAGE, $STATUS, $MANAGER_COMMAND, $CUSTOMER_REQUEST, $DATE);
            echo "Row cannot found 2 ";
             $NAME=$USERNAME;
             $AREA=$_POST['area'];
             $PACKAGE=$_POST['package_name'];
             $STATUS=" ";
             $MANAGER_COMMAND=" ";
             $CUSTOMER_REQUEST=" ";
             $DATE=$_POST['Dob'];
               $response2 = $stmt2->execute();     
                }
            }
            else
            {
                echo "Database Execution failed!!!!!!!!";
            }
        
    ?>



 
<br><br>
<a href="../VIEW/BUY_PACKAGE.php">BACK </a> <br><br>
<a href="../VIEW/PAY_BILL.php">Pay Bill.</a> 
</body>
</html>
