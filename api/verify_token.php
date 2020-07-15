<?php
	require "classes/login.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$data 	  = file_get_contents("php://input");
	$request  = json_decode($data);
	$staff_id = Methods::validate_string($request->staff_id);
	$token    = Methods::validate_string($request->token); 
	$response = array();
	
	$query    = $conn->prepare('SELECT * FROM users WHERE staff_id = :staff_id');
    $query->execute([':staff_id' => $staff_id]);
    $result   = $query->fetch(PDO::FETCH_OBJ);

	if($result) {
		if($token === $result->log_in_token) {
			array_push($response, array(
				"status"  => "true",
				"message" => "Valid Log In Token"
			));
		} else {
			array_push($response, array(
				"status"  => "false",
				"message" => "Invalid Log In Token"
			));
		}
	} else {
		array_push($response, array(
			"status"  => "false",
			"message" => "Invalid Staff ID"
		));
	}

    $pdo->close();
	echo json_encode($response);
?>