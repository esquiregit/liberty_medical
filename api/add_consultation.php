<?php
	require "classes/consultation.php";

	header('Content-Type: application/json');
	$conn        = $pdo->open();
	$data 	     = file_get_contents("php://input");
	$request     = json_decode($data);
	$patient_id  = Methods::validate_string($request->patient_id);  
	$description = Methods::strtocapital(Methods::validate_string($request->description));
	$diagnosis   = Methods::strtocapital(Methods::validate_string($request->diagnosis));
	$added_by    = Methods::validate_string($request->added_by);
	$response    = array();

	if($request) {
		$patient = Patient::read_patient_name($patient_id, $conn);
		$result  = Consultation::create_consultation($patient_id, $description, $diagnosis, $added_by, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "Consultation Added Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Added Consultation For '.$patient.'. "Description": '.$description.' "Diagnosis": '.$diagnosis, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "Consultation Could Not Be Added. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Add Consultation For '.$patient.'. "Description": '.$description.' "Diagnosis": '.$diagnosis, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>