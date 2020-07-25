<?php
	header('Content-Type: application/json');
	require "classes/charge.php";

	$conn     = $pdo->open();
	$data 	  = file_get_contents("php://input");
	$request  = json_decode($data);//die(print_r($request));
	$staff    = Methods::validate_string($request->staff);
	$id       = Methods::validate_string($request->id);
	$type     = Methods::strtocapital(Methods::validate_string($request->type));
	$amount   = Methods::validate_string($request->amount);
	$response = array();

	if(!empty($staff) && !empty($id) && !empty($type) && !empty($amount)) {
		if(empty($type)) {
			array_push($response, array(
				"status"  => "Warning",
				"message" => "Please Fill In Charge Name...."
			));
		} else if(Charge::is_this_charge_entered($id, $type, $conn)) {
			array_push($response, array(
				"status"  => "Warning",
				"message" => "Charge For \"".$type."\" Already Exist...."
			));
			Audit_Trail::create_log($staff, 'Tried To Update Charge '.$old_type.' To '.$type.' But It Already Existed', $conn);
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
			$old_type   = Charge::get_charge_type($id, $conn);
			$old_amount = Charge::read_charge($id, $conn);
			$result     = Charge::update_charge($id, $type, $amount, $conn);

			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => "Charge For \"".$type."\" Updated Successfully...."
				));
				if($old_type === $type) {
					Audit_Trail::create_log($staff, 'Updated Charge "'.$type.'" From GHS '.$old_amount.' To GHS '.number_format($amount, 2), $conn);
				} else {
					Audit_Trail::create_log($staff, 'Updated Charge "'.$old_type.'" To "'.$type.'"', $conn);
				}
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => "Charge For \"".$type."\" Could Not Be Updated. Please Try Again...."
				));
				Audit_Trail::create_log($staff, 'Tried To Update Charge Of "'.$type.'" From "'.$old_amount.'" To "'.$amount.'"', $conn);
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