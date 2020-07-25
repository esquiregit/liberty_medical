<?php
	header('Content-Type: application/json');
	require "classes/charge.php";

	$conn     = $pdo->open();
	$data 	  = file_get_contents("php://input");
	$request  = json_decode($data);
	$type     = Methods::strtocapital(Methods::validate_string($request->type));
	$amount   = Methods::validate_string($request->amount);
	$staff    = Methods::validate_string($request->staff);
	$response = array();

	if(!empty($staff) || !empty($id) || !empty($type) || !empty($amount)) {
		if(empty($type)) {
			array_push($response, array(
				"status"  => "Warning",
				"message" => "Please Fill In Charge Name...."
			));
		} else if(Charge::is_charge_entered($type, $conn)) {
			array_push($response, array(
				"status"  => "Warning",
				"message" => "Charge For \"".$type."\" Already Exist...."
			));
			Audit_Trail::create_log($staff, 'Tried To Add '.$type.' To Charges But It Already Existed', $conn);
		} else if(empty($amount)) {
			array_push($response, array(
				"status"  => "Warning",
				"message" => "Please Fill In Charge Amount...."
			));
		} else if(!is_float(floatval($amount))) {
			array_push($response, array(
				"status"  => "Warning",
				"message" => "Invalid Charge Amount Entered...."
			));
		} else {
			$result   = Charge::create_charge($type, $amount, $staff, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => "Charge \"".$type."\" Added Successfully...."
				));
				Audit_Trail::create_log($staff, 'Added '.$type.' To Charges', $conn);
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => "Charge \"".$type."\" Could Not Be Added. Please Try Again...."
				));
				Audit_Trail::create_log($staff, 'Tried To Add '.$type.' To Charges', $conn);
			}
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