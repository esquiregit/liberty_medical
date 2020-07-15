<?php
	require "classes/patient.php";

	header('Content-Type: application/json');
	$conn       = $pdo->open();
	$data 	    = file_get_contents("php://input");
	$request    = json_decode($data);
	$patient_id = Methods::validate_string($request->patient_id);
	$response   = Patient::read_patient($patient_id, $conn);

    $pdo->close();
	echo json_encode($response);
?>