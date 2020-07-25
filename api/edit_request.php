<?php
	header('Content-Type: application/json');
	require "classes/request.php";

	$conn       = $pdo->open();
	$data 	    = file_get_contents("php://input");
	$request    = json_decode($data);//die(print_r($request));
	$id   		= Methods::validate_string($request->id);
	$patient_id = Methods::validate_string($request->patient_id);
	$request_id = Methods::validate_string($request->request_id);
	$requests   = Methods::validate_array($request->requests);
	$added_by   = Methods::validate_string($request->staff);
	$response   = array();

	if(!empty($id) && !empty($patient_id) && !empty($request_id) && !empty($requests) && !empty($added_by)) {
		$patient  = Methods::read_patientname($patient_id, $conn);
		$old_cost = Request::get_request_cost($request_id, $conn);
		$new_cost = Request::get_total_charge($requests, $conn);//die('$new_cost: '.$new_cost);
		$result   = Request::update_request($id, $request_id, $requests, $old_cost, $new_cost, $conn);

		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "Request Updated Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Updated Request For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "Request Could Not Be Updated. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Update Request For '.$patient, $conn);
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