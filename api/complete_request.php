<?php
	require "classes/request.php";

	header('Content-Type: application/json');
	$conn        = $pdo->open();
	$data 	     = file_get_contents("php://input");
	$request     = json_decode($data);
	$patient_id  = Methods::validate_string($request->patient_id);
	$id  		 = Methods::validate_string($request->id);
	$request_id  = Methods::validate_string($request->request_id);
	$done_by     = Methods::validate_string($request->done_by);
	$response    = array();

	if($request) {
		$patient = Methods::read_patientname($patient_id, $conn);
		$result  = Request::complete_request($id, $request_id, $done_by, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "Request Updated Successfully...."
			));
			Audit_Trail::create_log($done_by, 'Completed Request For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "Request Could Not Be Completed. Please Try Again...."
			));
			Audit_Trail::create_log($done_by, 'Tried To Complete Request For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>