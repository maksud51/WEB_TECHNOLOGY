<?php 
	
	$conn = new mysqli("localhost", "root", "", "chat");
	
	
	$result = $conn->query("select * from communication ");
	$arr1 = array();
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			array_push($arr1, 
				array('sender' => $row['sender'], 'receiver' => $row['receiver'], 
				'message' => $row['message']));
		}
		echo json_encode($arr1);
	}
?>