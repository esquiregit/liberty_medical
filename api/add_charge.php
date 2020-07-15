<?php
	require "classes/charge.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$data 	  = file_get_contents("php://input");
	$request  = json_decode($data);
	$type     = Methods::strtocapital(Methods::validate_string($request->type));
	$amount   = Methods::validate_string($request->amount);
	$added_by = Methods::validate_string($request->added_by);
	$response = array();

	if($request) {
		if(Charge::is_charge_entered($type, $conn)) {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "Charge For \"".$type."\" Already Exist...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Add '.$type.' To Charges But It Already Existed', $conn);
		} else {
			$result   = Charge::create_charge($type, $amount, $added_by, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => "Charge Added Successfully...."
				));
				Audit_Trail::create_log($added_by, 'Added '.$type.' To Charges', $conn);
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => "Charge Could Not Be Added. Please Try Again...."
				));
				Audit_Trail::create_log($added_by, 'Tried To Add '.$type.' To Charges', $conn);
			}
		}
	}

    $pdo->close();
	echo json_encode($response);
?>