<?php
	require "classes/ise.php";

	header('Content-Type: application/json');
	$conn                = $pdo->open();
	$data 	             = file_get_contents("php://input");
	$request             = json_decode($data);
	$patient_id          = Methods::validate_string($request->patient_id);
	$patient             = Methods::validate_string($request->patient);
	$sodium              = Methods::strtocapital(Methods::validate_string($request->sodium));
	$sodium_flag         = Methods::strtocapital(Methods::validate_string($request->sodium_flag));
	$potassium           = Methods::strtocapital(Methods::validate_string($request->potassium));
	$potassium_flag      = Methods::strtocapital(Methods::validate_string($request->potassium_flag));
	$chloride            = Methods::strtocapital(Methods::validate_string($request->chloride));
	$chloride_flag       = Methods::strtocapital(Methods::validate_string($request->chloride_flag));
	$carbon_dioxide      = Methods::strtocapital(Methods::validate_string($request->carbon_dioxide));
	$added_by            = Methods::validate_string($request->entered_by);
	$response            = array();

	if($request) {
		$result = ISE::create_ise($patient_id, $sodium, $sodium_flag, $potassium, $potassium_flag, $chloride, $chloride_flag, $carbon_dioxide, $added_by, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "ISE Lab Added Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Added ISE Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "ISE Lab Could Not Be Added. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Add ISE Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>