<?php
	require "classes/request.php";

	header('Content-Type: application/json');
	$conn        = $pdo->open();
	$data 	     = file_get_contents("php://input");
	$request     = json_decode($data);
	$id   		 = Methods::validate_string($request->id);
	$patient_id  = Methods::validate_string($request->patient_id);
	$request_id  = Methods::validate_string($request->request_id);
	$requests    = implode(", ", Methods::validate_array($request->requests));
	$added_by    = Methods::validate_string($request->added_by);
	$response    = array();

	if($request) {
		$patient  = Methods::read_patientname($patient_id, $conn);
		$old_cost = Request::get_request_cost($request_id, $conn);
		$new_cost = Request::get_total_charge($request->requests, $conn);
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
	}

    $pdo->close();
	echo json_encode($response);
?>