<?php
	require "classes/cardiac_enzyme.php";

	header('Content-Type: application/json');
	$conn              = $pdo->open();
	$data 	           = file_get_contents("php://input");
	$request           = json_decode($data);
	$patient_id        = Methods::validate_string($request->patient_id);
	$patient           = Methods::validate_string($request->patient);
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
		$result = CardiacEnzyme::create_cardiac_enzyme($patient_id, $ast, $alt, $creatinine_kinase, $ck_mb, $ldh, $troponin, $comments, $added_by, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "Cardiac Enzyme Lab Added Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Added Cardiac Enzyme Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "Cardiac Enzyme Lab Could Not Be Added. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Add Cardiac Enzyme Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>