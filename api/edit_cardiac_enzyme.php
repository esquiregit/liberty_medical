<?php
	require "classes/cardiac_enzyme.php";

	header('Content-Type: application/json');
	$conn              = $pdo->open();
	$data 	           = file_get_contents("php://input");
	$request           = json_decode($data);
	$id      		   = Methods::validate_string($request->id);
	$patient_id        = Methods::validate_string($request->patient_id);
	$ast               = Methods::strtocapital(Methods::validate_string($request->ast));
	$alt               = Methods::strtocapital(Methods::validate_string($request->alt));
	$creatinine_kinase = Methods::strtocapital(Methods::validate_string($request->creatinine_kinase));
	$ck_mb             = Methods::strtocapital(Methods::validate_string($request->ck_mb));
	$ldh               = Methods::strtocapital(Methods::validate_string($request->ldh));
	$troponin          = Methods::strtocapital(Methods::validate_string($request->troponin));
	$comments          = Methods::strtocapital(Methods::validate_string($request->comments));
	$added_by          = Methods::validate_string($request->entered_by);
	$response          = array();

	if($request) {
		$patient = Methods::read_patientname($patient_id, $conn);
		$result  = CardiacEnzyme::update_cardiac_enzyme($id, $patient_id, $ast, $alt, $creatinine_kinase, $ck_mb, $ldh, $troponin, $comments, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "Cardiac Enzyme Lab Updated Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Updated Cardiac Enzyme Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "Cardiac Enzyme Lab Could Not Be Updated. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Update Cardiac Enzyme Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>