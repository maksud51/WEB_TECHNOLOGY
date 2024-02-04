<!DOCTYPE html>
        <?php
         session_start();
         if(count($_SESSION)===0)
         {
            header("Location:../VIEW/LOG_OUT.php");
         }
     ?>

        <?php
        if($_SERVER['REQUEST_METHOD']==="POST")
        {

            $Username=$_SESSION['Username'];

            $isValid=false;
            if(empty($_POST['amount']) or empty($_POST['reference'])or empty($_POST['area']))
            {
                $isValid=false;
                echo"<h3>Find empty value in Mandatory section....... </h3>";
                    if (!empty($_POST['amount'])) 
                    {
                        echo $_POST['amount'];
                    }
                    else 
                    {
                        echo "Please enter your amount";
                        echo "<br>";
                    }
                    if (!empty($_POST['reference'])) 
                    {
                        echo $_POST['reference'];
                    }
                    else 
                    {
                        echo " Please write your Problem ";
                        echo "<br>";
                    }
                    if (!empty($_POST['area'])) 
                    {
                        echo $_POST['reference'];
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
                $sql2 = "INSERT INTO bill (username, area,pakage_name,amount,bill_date) 
                    VALUES (?, ?, ?, ?, ?)";
                    $stmt2 = $connection->prepare($sql2);
                    $stmt2->bind_param("sssis", $NAME,$AREA, $PACKAGE,$AMOUNT,$DATE);
                     $NAME=$_SESSION['Username'];
                     $AREA=$_POST['area'];
                     $PACKAGE=$_POST['reference'];
                     $AMOUNT=$_POST['amount'];
                     $DATE=date('Y/m/d');
                     $response2 = $stmt2->execute(); 
                     echo "Successful  ";
                      echo <<<HTML
                    <a href="../VIEW/PROFILE.php">HOME</a> 
                    HTML;
            }    
            
            else
            {
                echo "Please fill up all box";
            }

        }

        ?>

</form>
</body>
</head>
