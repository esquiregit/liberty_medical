<?php
	require "classes/patient.php";

	header('Content-Type: application/json');
	$conn       = $pdo->open();
	$data 	    = file_get_contents("php://input");
	$request    = json_decode($data);
	$patient_id = Methods::validate_string($request->patient_id);
	$patient    = Patient::read_patient($patient_id, $conn);
	$response   = array();

	if($patient) {
		array_push($response, array(
			"id"            => $patient->id,
			"patient_id"    => $patient->patient_id,
			"branch"        => $patient->branch,
			"date_of_birth" => date_format(date_create($patient->date_of_birth), 'd F Y'),
			"email_address" => $patient->email_address,
			"first_name"    => $patient->first_name,
			"middle_name"   => $patient->middle_name,
			"last_name"     => $patient->last_name,
			"gender"        => $patient->gender,
			"name"          => $patient->middle_name ? $patient->first_name.' '.$patient->middle_name.' '.$patient->last_name : $patient->first_name.' '.$patient->last_name,
 		));
	}

    $pdo->close();
	echo json_encode($response);
?>