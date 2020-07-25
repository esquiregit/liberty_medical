<?php
	require "classes/patient.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$data 	  = file_get_contents("php://input");
	$request  = json_decode($data);
	$response = array();
	$result   = Patient::read_dropdown_patients($conn);

	foreach ($result as $patient) {
		array_push($response, array(
			"label" => ($patient->middle_name) ? $patient->first_name.' '.$patient->middle_name.' '.$patient->last_name : $patient->first_name.' '.$patient->last_name,
			"value" => $patient->patient_id,
		));
	}

    $pdo->close();
	echo json_encode($response);
?>