<?php
	require "classes/request.php";

	header('Content-Type: application/json');
	$conn            = $pdo->open();
	$data 	         = file_get_contents("php://input");
	$request         = json_decode($data);
	$request_id      = Methods::validate_string($request->request_id);
	$payment_type    = Methods::validate_string($request->payment_type);
	$discount        = Methods::validate_string($request->discount);
	$discounted_cost = Methods::validate_string($request->discounted);
	$amount_paid     = Methods::validate_string($request->amount_paid);
	$source          = Methods::validate_string($request->source);
	$added_by        = Methods::validate_string($request->added_by);
	$response        = array();
	
	if($request) {
		$patient = Request::read_request_patient_name($request_id, $conn);
		$result  = Request::pay_request($request_id, $payment_type, $discount, $discounted_cost, $amount_paid, $source, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "Payment Made Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Made Payment Of GHS'.$amount_paid.' For '.$patient.'\'s Request', $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "Payment Could Not Be Made. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Make Payment Of GHS'.$amount_paid.' For '.$patient.'\'s Request', $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>