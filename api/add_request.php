<?php
	require "classes/request.php";

	header('Content-Type: application/json');
	$conn        = $pdo->open();
	$data 	     = file_get_contents("php://input");
	$request     = json_decode($data);//die(print_r($request));

	$patient_id  = Methods::validate_string($request->patient_id);
	$requests    = implode(", ", Methods::validate_array($request->requests));
	$added_by    = Methods::validate_string($request->staff);

	$response    = array();
	$ret_request = array();
	$request_id  = '';

	if(!empty($patient_id) && !empty($requests) && !empty($added_by)) {
		$patient = Methods::read_patientname($patient_id, $conn);

		if(!Request::check_pending_request($patient_id, $conn)) {
			$branch 	  = Methods::get_branch($added_by, $conn);
			$total_charge = Request::get_total_charge($request->requests, $conn);
            $request_id   = Request::get_request_id($branch, $conn);
			$result       = Request::create_request($request_id, $patient_id, $requests, $total_charge, $added_by, $branch, $conn);
			if($result) {
				array_push($ret_request, array(
					"request_id"      => $request_id,
					"total_cost"      => number_format($total_charge, 2),
					"discounted_cost" => number_format($total_charge, 2)
				));
				array_push($response, array(
					"status"  => "Success",
					"message" => "Request Added Successfully....",
					"request" => $ret_request
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
				"message" => "Patient Has Pending Requests. Please Complete Those First...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Add Request For '.$patient.' But Patient Had Pending Requests', $conn);
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