<?php
	require "classes/pth.php";

	header('Content-Type: application/json');
	$conn         = $pdo->open();
	$data 	      = file_get_contents("php://input");
	$request      = json_decode($data);
	$id           = Methods::validate_string($request->id);
	$patient_id   = Methods::validate_string($request->patient_id);
	$results      = Methods::strtocapital(Methods::validate_string($request->results));
	$results_flag = Methods::strtocapital(Methods::validate_string($request->results_flag));
	$comments     = Methods::strtocapital(Methods::validate_string($request->comments));
	$added_by     = Methods::validate_string($request->entered_by);
	$response     = array();

	if($request) {
		$patient = Methods::read_patientname($patient_id, $conn);
		$result  = PTH::update_pth($id, $patient_id, $results, $results_flag, $comments, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "PTH Lab Updated Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Updated PTH Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "PTH Lab Could Not Be Updated. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Update PTH Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>