<?php
	require "classes/bue_creatinine.php";

	header('Content-Type: application/json');
	$conn            = $pdo->open();
	$data 	         = file_get_contents("php://input");
	$request         = json_decode($data);
	$patient_id      = Methods::validate_string($request->patient_id);
	$patient         = Methods::validate_string($request->patient);
	$sodium          = Methods::strtocapital(Methods::validate_string($request->sodium));
	$sodium_flag     = Methods::strtocapital(Methods::validate_string($request->sodium_flag));
	$potassium       = Methods::strtocapital(Methods::validate_string($request->potassium));
	$potassium_flag  = Methods::strtocapital(Methods::validate_string($request->potassium_flag));
	$chloride        = Methods::strtocapital(Methods::validate_string($request->chloride));
	$chloride_flag   = Methods::strtocapital(Methods::validate_string($request->chloride_flag));
	$urea            = Methods::strtocapital(Methods::validate_string($request->urea));
	$urea_flag       = Methods::strtocapital(Methods::validate_string($request->urea_flag));
	$creatinine      = Methods::strtocapital(Methods::validate_string($request->creatinine));
	$creatinine_flag = Methods::strtocapital(Methods::validate_string($request->creatinine_flag));
	$egfr            = Methods::strtocapital(Methods::validate_string($request->egfr));
	$comments        = Methods::strtocapital(Methods::validate_string($request->comments));
	$added_by        = Methods::validate_string($request->entered_by);
	$response        = array();

	if($request) {
		$result = BueCreatinine::create_bue_creatinine($patient_id, $sodium, $sodium_flag, $potassium, $potassium_flag, $chloride, $chloride_flag, $urea, $urea_flag, $creatinine, $creatinine_flag, $egfr, $comments, $added_by, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "BUE Creatinine Lab Added Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Added BUE Creatinine Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "BUE Creatinine Lab Could Not Be Added. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Add BUE Creatinine Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>