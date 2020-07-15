<?php
	require "classes/pth.php";

	header('Content-Type: application/json');
	$conn         = $pdo->open();
	$data 	      = file_get_contents("php://input");
	$request      = json_decode($data);
	$patient_id   = Methods::validate_string($request->patient_id);
	$patient      = Methods::validate_string($request->patient);
	$results      = Methods::strtocapital(Methods::validate_string($request->results));
	$results_flag = Methods::strtocapital(Methods::validate_string($request->results_flag));
	$comments     = Methods::strtocapital(Methods::validate_string($request->comments));
	$added_by     = Methods::validate_string($request->entered_by);
	$response     = array();

	if($request) {
		$result = PTH::create_pth($patient_id, $results, $results_flag, $comments, $added_by, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "PTH Lab Added Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Added PTH Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "PTH Lab Could Not Be Added. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Add PTH Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>