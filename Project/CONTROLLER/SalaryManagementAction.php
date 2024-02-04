<?php include("../VIEW/HF/HEADER.html")?>

 <?php include "../MODEL/Function.php"?>
 <?php 
	  if ($_SERVER['REQUEST_METHOD'] === "POST") {
		$username=$_POST['username'];
		$name=$_POST['name'];
		$es=$_POST['es'];
	  $amount=$_POST['amount'];
		

		$isValid=false;
		if (empty($username)  or empty($name) or empty($es) or empty($amount))  
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
			echo "Please Fillup Name Textber again";
			echo "<br>";
        }
		
		
		if (!empty($name))
		{
			
        }
		else 
		{
			echo "Name is not  Write";
			echo "<br>";
			echo "<br>";
        }
		
		if (!empty($es))
		{
			
        }
		else 
		{
			echo "Employee is not  Given";
			echo "<br>";
			echo "Please Re-Submit with Your CommentBer";
			echo "<br>";
        }
		
		if (!empty($amount))
		{
			
        }
		else 
		{
			echo "Amount is not  Given";
			echo "<br>";
			echo "Please Re-Submit with Your AmountBer";
			echo "<br>";
        }
		
	  
	  }
	  

	else{
		  $isValid = true;
	
	}
		if ($isValid) 
		{ 
			$filename="../MODEL/SalaryManagement.json";
			$arr1 = array('username' => $username,'name' => $name,'es' => $es, 'amount' => $amount );
			
			create($filename,$arr1);
			echo "<h5><b>Salary Done:-$name!!!</b></h5>";				
		}
		else{
              echo "<h5><b>Plese Again Try</b></h5>";
			}  
		}
    ?>
	<?php include("../VIEW/HF/FOOTER.html")?>