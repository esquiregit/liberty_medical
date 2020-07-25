<?php
	header('Content-Type: application/json');
	require "classes/request.php";

	$conn            = $pdo->open();
	$data 	         = file_get_contents("php://input");
	$request         = json_decode($data);

	$request_id      = Methods::validate_string($request[0]->request_id);
	$payment_type    = Methods::validate_string($request[0]->payment_type);
	$discount        = Methods::validate_string($request[0]->discount);
	$discounted_cost = Methods::validate_string($request[0]->discounted_cost);
	$amount_paid     = Methods::validate_string($request[0]->amount);
	$amount          = Methods::validate_string($request[0]->amount);
	$source          = Methods::validate_string($request[0]->source);
	$added_by        = Methods::validate_string($request[0]->staff);
	
	$response        = array();
	
	if(!empty($request_id) && !empty($payment_type) && !empty($discount) && !empty($discounted_cost) && !empty($amount_paid) && !empty($source)) {
		$patient = Request::read_request_patient_name($request_id, $conn);
		$old_payment_type = Request::read_payment_type($request_id, $conn);
		$payment_type = empty($old_payment_type) ? $payment_type : $old_payment_type.', '.$payment_type;
		$result  = Request::pay_request($request_id, $payment_type, $discount, $discounted_cost, $amount_paid, $source, $conn);

		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "Payment Made Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Made Payment Of GHS '.$amount_paid.' For '.$patient.'\'s Request', $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "Payment Could Not Be Made. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Make Payment Of GHS '.$amount_paid.' For '.$patient.'\'s Request', $conn);
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