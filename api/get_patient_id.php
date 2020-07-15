<?php
	require "classes/patient.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$data 	  = file_get_contents("php://input");
	$request  = json_decode($data);
	$branch   = Methods::validate_string($request->branch);
	$response = array();
	$result   = Patient::get_patient_id($branch, $conn);

	if($result) {
		array_push($response, array(
			"status"     => 'Success',
			"patient_id" => $result
		));
	} else {
		array_push($response, array(
			"status" => 'Failed'
		));
	}

    $pdo->close();
	echo json_encode($response);
?>