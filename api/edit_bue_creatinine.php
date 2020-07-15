<?php
	require "classes/bue_creatinine.php";

	header('Content-Type: application/json');
	$conn            = $pdo->open();
	$data 	         = file_get_contents("php://input");
	$request         = json_decode($data);
	$id      		 = Methods::validate_string($request->id);
	$patient_id      = Methods::validate_string($request->patient_id);
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
		$patient = Methods::read_patientname($patient_id, $conn);
		$result  = BueCreatinine::update_bue_creatinine($id, $patient_id, $sodium, $sodium_flag, $potassium, $potassium_flag, $chloride, $chloride_flag, $urea, $urea_flag, $creatinine, $creatinine_flag, $egfr, $comments, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "BUE Creatinine Lab Updated Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Updated BUE Creatinine Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "BUE Creatinine Lab Could Not Be Updated. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Update BUE Creatinine Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>