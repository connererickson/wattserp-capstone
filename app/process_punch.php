<?php
    //include "init.php";
		
	// Data URL to image.S

	// exit immediately if the data url was not passed.
	if (!isset($_REQUEST['data_url'])) {
		exit();
	}
	
	$type = $_REQUEST['type'];
	$id = $_REQUEST['emp_id'];
	$note = $_REQUEST['note'];
	$datetime = date("Y-m-d") . " " . date("h:i:sa");

	// Get the data url.
	$img = $_REQUEST['data_url'];
	
	// Clean up the data url string a bit.
	$img = str_replace('data:image/png;base64,', '', $img);
	$img = str_replace(' ', '+', $img);
	
	// Decode the image.
	$decodedImage = base64_decode($img);
	
	// Generate a random filename.
	$filename = md5(time()).$_REQUEST['emp_id'].'.png';

	// Save the file to the server and generate a response.
	if (file_put_contents('../public/images/snaps/'. $filename, $decodedImage)) {
		$imageURL = 'http://' . $_SERVER['HTTP_HOST'] . '/clock/app/snaps/' . $filename;
		$response = array(
			'status_code' => 200,
			'data' => array(
				'image_url' => $imageURL
			)
		);
	} else {
		$response = array(
			'status_code' => 500
		);
	}

	$db = new mysqli("localhost", "eswaters", "collinsucksnuts", "wattserp"); if ($db->errno) die("Error opening database: " . $db->error());

	$sql = "SELECT * FROM time_punches";
	if ($result=mysqli_query($db,$sql)) {
		$rowcount=mysqli_num_rows($result);
	}

	//clock in type = 1, clock out type = 0
	if($type == 1) {
		// check if there is a clock_in with clock_out  = null
		//if there is one with null dont add clock_in
		//Tell user to clock_out first
		// if id is varcahr use '".$id."' if int use '.$id.'
		$sql = "SELECT * FROM time_punches where emp_id = '".$id."'";
		$result=mysqli_query($db,$sql);
		

		
		$i = mysqli_num_rows($result);
		debug_to_console("$i");
		
		if($i == 0){
			$query = 'INSERT INTO time_punches (id, emp_id, in_img, in_note, in_datetime) VALUES (?,?,?,?,?)'; 
			$result = $db->prepare($query); $result->bind_param('issss', $rowcount, $id, $filename, $note, $datetime); 
			$result->execute(); 
			free($result);
		}	
		else{
			$query = "UPDATE time_punches SET out_img = '$filename', out_note = '$note', out_datetime = '$datetime' WHERE emp_id = $id";
			$result = $db->prepare($query); 
			$result->execute(); 
			free($result);

			$query = 'INSERT INTO time_punches (id, emp_id, in_img, in_note, in_datetime) VALUES (?,?,?,?,?)'; 
			$result = $db->prepare($query); $result->bind_param('issss', $rowcount, $id, $filename, $note, $datetime); 
			$result->execute(); 
			free($result);
		}
		
		
		// insert data into most recent row

		//$query = 'INSERT INTO time_punches (id, emp_id, in_img, in_note, in_datetime) VALUES (?,?,?,?,?)'; 
		//$result = $db->prepare($query); $result->bind_param('issss', $rowcount, $id, $filename, $note, $datetime); 
		//$result->execute(); 
		//free($result);
	}

	if($type == 0) {
		// update table row with emp_id = $id with clockout info
		// order by in_datetime descending
		// check if id has clock_in with clock_out = null
		$query = "UPDATE time_punches SET out_img = '$filename', out_note = '$note', out_datetime = '$datetime' WHERE emp_id = $id";
		$result = $db->prepare($query); 
		$result->execute(); 
		free($result);	
	}

	/*if ($_POST['type'] == 0){
		if(isset($_POST['emp_id'])){
			$result = $clock->check_clock_status($_POST['emp_id']);
			if ($result == 0){
				$response = array(
					'status_code' => 900,
					'data' => 'ALEADY PUNCHED OUT!'
				);
			}
			else{
				$result = $clock->clock_out($_POST, $filename);
				$response = array(
					'status_code' => 200,
					'data' => $result
				);
			}
		}
		else{
			$response = array(
				'status_code' => 600,
				'data' => 'Please complete the form.'
			);
		}
	}
	
	if ($_POST['type'] == 1){
		if(isset($_POST['emp_id'])){
			$result = $clock->check_clock_status($_POST['emp_id']);
			if ($result == 0){
				$result = $clock->clock_in($_POST, $filename);
				$response = array(
					'status_code' => 200,
					'data' => $result
				);
			}
			else{
				$response = array(
					'status_code' => 800,
					'data' => 'ALEADY PUNCHED IN!'
				);
			}
		}
		else{
			$response = array(
				'status_code' => 600,
				'data' => 'Please complete the form.'
			);
		}
	}*/
	
	// Return JSON response.
	header("Content-Type: application/json");
	echo json_encode($response);
?>