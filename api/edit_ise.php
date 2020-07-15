<?php
	require "classes/ise.php";

	header('Content-Type: application/json');
	$conn                = $pdo->open();
	$data 	             = file_get_contents("php://input");
	$request             = json_decode($data);
	$id         		 = Methods::validate_string($request->id);
	$patient_id          = Methods::validate_string($request->patient_id);
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
		$patient = Methods::read_patientname($patient_id, $conn);
		$result  = ISE::update_ise($id, $patient_id, $sodium, $sodium_flag, $potassium, $potassium_flag, $chloride, $chloride_flag, $carbon_dioxide, $added_by, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "ISE Lab Updated Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Updated ISE Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "ISE Lab Could Not Be Updated. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Update ISE Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>