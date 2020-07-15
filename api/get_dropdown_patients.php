<?php
	require "classes/patient.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$data 	  = file_get_contents("php://input");
	$request  = json_decode($data);
	$branch   = Methods::validate_string($request->branch);
	$response = array();
	$result   = Patient::read_dropdown_patients($branch, $conn);

	foreach ($result as $patient) {
		array_push($response, array(
			"patient_id" => $patient->patient_id,
			"name"       => ($patient->middle_name) ? $patient->first_name.' '.$patient->middle_name.' '.$patient->last_name : $patient->first_name.' '.$patient->last_name
		));
	}

    $pdo->close();
	echo json_encode($response);
?>