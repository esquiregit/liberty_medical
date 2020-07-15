<?php
	require "classes/consultation.php";

	header('Content-Type: application/json');
	$conn        = $pdo->open();
	$data 	     = file_get_contents("php://input");
	$request     = json_decode($data);
	$staff_id    = Methods::validate_string($request->staff_id);
	$id          = Methods::validate_string($request->id);
	$patient_id  = Methods::validate_string($request->patient_id); 
	$description = Methods::strtocapital(Methods::validate_string($request->description));
	$diagnosis   = Methods::strtocapital(Methods::validate_string($request->diagnosis));
	$response    = array();

	if($request) {
		$patient = Patient::read_patient_name($patient_id, $conn);
		$result  = Consultation::update_consultation($id, $patient_id, $description, $diagnosis, $conn);

		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "Consultation Updated Successfully...."
			));
			Audit_Trail::create_log($staff_id, 'Updated Consultation For '.$patient.'. "Description": '.$description.'. "Diagnosis": '.$diagnosis, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "Consultation Could Not Be Updated. Please Try Again...."
			));
			Audit_Trail::create_log($staff_id, 'Tried To Update Consultation For '.$patient.'. "Description": '.$description.'. "Diagnosis": '.$diagnosis, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>