<?php
	require "classes/consultation.php";

	header('Content-Type: application/json');
	$conn                 = $pdo->open();
	$data 	              = file_get_contents("php://input");
	$request              = json_decode($data);
	$old_invoice_id       = Methods::validate_string($request->old_invoice_id);  
	$patient_id           = Methods::validate_string($request->patient_id);  
	$previous_description = Methods::strtocapital(Methods::validate_string($request->previous_description));
	$previous_diagnosis   = Methods::strtocapital(Methods::validate_string($request->previous_diagnosis));
	$new_description      = Methods::strtocapital(Methods::validate_string($request->new_description));
	$new_diagnosis        = Methods::strtocapital(Methods::validate_string($request->new_diagnosis));
	$added_by             = Methods::validate_string($request->added_by);
	$response             = array();

	if($request) {
		$result = Consultation::review_consultation($old_invoice_id, $patient_id, $new_description, $new_diagnosis, $added_by, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "Consultation Review Added Successfully...."
			));
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "Consultation Review Could Not Be Added. Please Try Again...."
			));
		}
	}

    $pdo->close();
	echo json_encode($response);
?>