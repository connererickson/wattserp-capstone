<?php

	//Get Employees
	$id = $_POST['emp_id'];
	$db = new mysqli("localhost", "eswaters", "collinsucksnuts", "wattserp"); if ($db->errno) die("Error opening database: " . $db->error());

	$sql = "SELECT * FROM time_punches WHERE emp_id = ".$id." AND out_note IS NULL";
	$result=mysqli_query($db,$sql);
	
	$i = mysqli_num_rows($result);

	$response = array(
		'status_code' => 100,
		'data' => 'Default Answer'
	);

	if($i != 0)
	{
		$response = array(
			'status_code' => 800,
			'data' => "Currently Clocked In"
		);
	}
	else{
		$response = array(
			'status_code' => 900,
			'data' => 'Currently Clocked Out'
		);
	}
	
	header("Content-Type: application/json");
	echo json_encode($response);
?>