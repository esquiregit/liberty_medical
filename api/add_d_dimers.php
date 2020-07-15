<?php
	require "classes/d_dimers.php";

	header('Content-Type: application/json');
	$conn       = $pdo->open();
	$data 	    = file_get_contents("php://input");
	$request    = json_decode($data);
	$patient_id = Methods::validate_string($request->patient_id);
	$patient    = Methods::validate_string($request->patient);
	$results    = Methods::strtocapital(Methods::validate_string($request->results));
	$comments   = Methods::strtocapital(Methods::validate_string($request->comments));
	$added_by   = Methods::validate_string($request->entered_by);
	$response   = array();

	if($request) {
		$result = DDimers::create_d_dimers($patient_id, $results, $comments, $added_by, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "D-Dimers Lab Added Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Added D-Dimers Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "D-Dimers Lab Could Not Be Added. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Add D-Dimers Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>