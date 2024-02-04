<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>WELCOME PAGE</title>
</head>
<body>
	<h1 style="text-align:center;" ><u>WELCOME PAGE</u></h1>
	<br>
	<br>
	<h1 style="text-align:center;" ><u>SHOWING JSON FILE'S ALL ELEMENTS</u></h1>
	<?php
			$handle2 = fopen("data.json", "r");
			$data = fread($handle2,filesize("data.json"));	
	?>
	<?php
			$explode  = explode("\n",$data);
			array_pop($explode);
			var_dump($explode);
	?>
	<?php/*
			$arr1 = array(); 
			for ($i = 0; $i < count($explode); $i++) {
			$json = json_decode($explode[$i]);		
			array_push($arr1, $json);
			}*/
		
	?>
	
	
</body>
</html>