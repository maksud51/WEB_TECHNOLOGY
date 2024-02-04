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
        <h3 style="text-align:left;" ><a href="../VIEW/PROFILE.php">Back</a></h3>
        <br>
        <fieldset>
        <legend>Packages </legend>
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
            $sql3 = "SELECT * FROM packages";
            $stmt3 = $connection->prepare($sql3);
            $response3 = $stmt3->execute();
            if ($response3) {
                $data = $stmt3->get_result();
                if ($data->num_rows > 0) 
                {
                  $res=true;
                }
                else
                {
                    $res=false;
                    echo "Row cannot found";
                    echo "<br>";
                    
                }
            }
            else
            {
                echo "Database Execution failed!!!!!!!!";
            }
        
        
    ?>
    
    <table id="table">
         
         <thead>
         <tr>
         <th> Package Name</th>
         <th> Speed</th>
         <th> Time</th>
         <th> Cable</th>
         <th> Sites</th>
         <th> Offer</th>
         <th> Area</th>
         <th> Amount</th>
         </tr>
         </thead>
         <tbody>
         <?php
            $MANAGER_COMMAND="";
    
            if($res==true)
            {
                
                    while ($row = $data->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>". $row["name"]."</td>"; 
                        echo "<td>".$row["speed"]."</td>";
                        echo "<td>".$row["time"]."</td>";
                        echo "<td>".$row["cable"]."</td>";
                        echo "<td>".$row["sites"]."</td>";
                        echo "<td>".$row["offer"]."</td>";
                        echo "<td>".$row["area"]."</td>";
                        echo "<td>".$row["amount"]."</td>";
                        echo "</tr>";   
                    }
            }
            else
            {
                    
                echo "Details Cannot be found";
                echo "<br>";
            }

         ?>
         </tbody>
         </table>
    

    <form action="<?php echo htmlspecialchars("../CONTROLLER/CHANGE_PACKAGE_A.php"); ?>" method="POST">
    <fieldset>
    <br>
   <u>Package Name  </u><br>
             <input style="margin-left:0px ;border-bottom: 2px solid red;" type="text" name="package_name"><br><br>
    <input style="margin-left:0px ;"type="submit" name="submit" value="Change">
    <br><br>
    </form>

</body>
</html>