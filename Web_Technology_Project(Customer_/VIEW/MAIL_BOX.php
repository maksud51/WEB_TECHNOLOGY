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
            $sql = "SELECT * FROM notifycustomer WHERE username = ?";
            $stmt = $connection->prepare($sql);
            $stmt->bind_param("s", $USERNAME);
            $USERNAME=$_SESSION['Username'];
            $response = $stmt->execute();
            if ($response) {
                $data = $stmt->get_result();
                if ($data->num_rows > 0) 
                {
                  $res=true;
                    
                }
                else
                {
                    $res=false;
                    echo "Row cannot found";
                    
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
         <th> Subject</th>
         <th> Comment</th>
         <th> Manager Name</th>
         
         </tr>
         </thead>
         <tbody>
         <?php
            if($res==true)
            {
                
                    while ($row = $data->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>". $row["subject"]."</td>"; 
                            echo "<td>".$row["comment"]."</td>";
                            echo "<td>".$row["sendby"]."</td>";
                        echo "</tr>";
                        
                    }
            }
            else
            {
                    
                echo "Details Cannot be found";
            }
            
          
         ?>
         </tbody>
         </table> 
    
</body>
</html>