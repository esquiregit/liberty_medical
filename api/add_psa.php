<?php
	require "classes/psa.php";

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

	if(!empty($patient_id) && !empty($patient) && !empty($results) && !empty($comments) && !empty($added_by)) {
		$result = PSA::create_psa($patient_id, $results, $comments, $added_by, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "PSA Lab Added Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Added PSA Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "PSA Lab Could Not Be Added. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Add PSA Lab For '.$patient, $conn);
		}
	} else {
		array_push($response, array(
			"status"  => "Failure",
			"message" => "Operation Failed. Please Try Again...."
		));
	}

    $pdo->close();
	echo json_encode($response);
?>