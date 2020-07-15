<?php
	require "classes/login.php";

	header('Content-Type: application/json');
	$conn         = $pdo->open();
	$data 	      = file_get_contents("php://input");
	$request      = json_decode($data);
	$staff_id     = Methods::validate_string($request->staff_id);
	$response     = array();

	if(Audit_Trail::create_log($staff_id, 'Logged Out', $conn)) {
		array_push($response, array(
			"status"  => "Success",
			"message" => "Logout Success"
		));
	} else {
		array_push($response, array(
			"status"  => "Failed",
			"message" => "Logout Failed. Please Try Again...."
		));
	}

    $pdo->close();
	echo json_encode($response);
?>