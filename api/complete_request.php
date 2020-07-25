<?php
	header('Content-Type: application/json');
	require "classes/request.php";

	$conn       = $pdo->open();
	$data 	    = file_get_contents("php://input");
	$request    = json_decode($data);//die(print_r($request));
	$id  	    = Methods::validate_string($request->id);
	$patient_id = Methods::validate_string($request->patient_id);
	$request_id = Methods::validate_string($request->request_id);
	$done_by    = Methods::validate_string($request->staff);
	$response   = array();

	if(!empty($id) && !empty($patient_id) && !empty($request_id)) {
		$patient = Methods::read_patientname($patient_id, $conn);
		$result  = Request::complete_request($id, $request_id, $done_by, $conn);

		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "Request Completed Successfully...."
			));
			Audit_Trail::create_log($done_by, 'Completed Request For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "Request Could Not Be Completed. Please Try Again...."
			));
			Audit_Trail::create_log($done_by, 'Tried To Complete Request For '.$patient, $conn);
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