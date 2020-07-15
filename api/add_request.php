<?php
	require "classes/request.php";

	header('Content-Type: application/json');
	$conn        = $pdo->open();
	$data 	     = file_get_contents("php://input");
	$request     = json_decode($data);
	$patient_id  = Methods::validate_string($request->patient_id);
	$requests    = implode(", ", Methods::validate_array($request->requests));
	$added_by    = Methods::validate_string($request->added_by);
	$response    = array();
	$request_id  = '';

	if($request) {
		$patient = Methods::read_patientname($patient_id, $conn);
		if(!Request::check_pending_request($patient_id, $conn)) {
			$branch 	  = Methods::get_branch($added_by, $conn);
			$total_charge = Request::get_total_charge($request->requests, $conn);
            $request_id   = Request::get_request_id($branch, $conn);
			$result       = Request::create_request($request_id, $patient_id, $requests, $total_charge, $added_by, $branch, $conn);
			if($result) {
				array_push($response, array(
					"status"     => "Success",
					"message"    => "Request Added Successfully....",
					"request_id" => $request_id,
					"total_cost" => $total_charge
				));
				Audit_Trail::create_log($added_by, 'Added Request For '.$patient, $conn);
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => "Request Could Not Be Added. Please Try Again...."
				));
				Audit_Trail::create_log($added_by, 'Tried To Add Request For '.$patient, $conn);
			}
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "Patient Has Pending Requests...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Add Request For '.$patient.' But Patient Had Pending Requests', $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>