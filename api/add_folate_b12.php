<?php
	require "classes/folate_b12.php";

	header('Content-Type: application/json');
	$conn         = $pdo->open();
	$data 	      = file_get_contents("php://input");
	$request      = json_decode($data);
	$patient_id   = Methods::validate_string($request->patient_id);
	$patient      = Methods::validate_string($request->patient);
	$folate       = Methods::strtocapital(Methods::validate_string($request->folate));
	$vitamin_b_12 = Methods::strtocapital(Methods::validate_string($request->vitamin_b_12));
	$comments     = Methods::strtocapital(Methods::validate_string($request->comments));
	$added_by     = Methods::validate_string($request->entered_by);
	$response     = array();

	if($request) {
		$result = FolateB12::create_folate_b12($patient_id, $folate, $vitamin_b_12, $comments, $added_by, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "Folate/B12 Lab Added Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Added Folate/B12 Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "Folate/B12 Lab Could Not Be Added. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Add Folate/B12 Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>