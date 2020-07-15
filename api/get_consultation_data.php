<?php
	require "classes/consultation.php";

	header('Content-Type: application/json');
	$conn       = $pdo->open();
	$data 	    = file_get_contents("php://input");
	$request    = json_decode($data);
	$patient_id = Methods::validate_string($request->patient_id);
	$response   = array();

	if($request) {
		$result = Consultation::get_patient_consultations($patient_id, $conn);
		if($result) {
			array_push($response, array(
				"status" => "Success",
				"data"   => $result,
				"name"   => Consultation::read_patient_name($patient_id, $conn)
			));
		} else {
			array_push($response, array(
				"status" => "Failed",
				"name"   => Consultation::read_patient_name($patient_id, $conn)
			));
		}
	}

    $pdo->close();
	echo json_encode($response);
?>