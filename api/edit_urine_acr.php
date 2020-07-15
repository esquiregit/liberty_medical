<?php
	require "classes/urine_acr.php";

	header('Content-Type: application/json');
	$conn                          = $pdo->open();
	$data 	                       = file_get_contents("php://input");
	$request                       = json_decode($data);
	$id                			   = Methods::validate_string($request->id);
	$patient_id                    = Methods::validate_string($request->patient_id);
	$urea_creatinine               = Methods::strtocapital(Methods::validate_string($request->urea_creatinine));
	$urea_creatinine_flag          = Methods::validate_string($request->urea_creatinine_flag);
	$micro_albumin_urine           = Methods::strtocapital(Methods::validate_string($request->micro_albumin_urine));
	$micro_albumin_urine_flag      = Methods::validate_string($request->micro_albumin_urine_flag);
	$uacr                          = Methods::strtocapital(Methods::validate_string($request->uacr));
	$uacr_flag                     = Methods::validate_string($request->uacr_flag);
	$the_uacr                      = Methods::strtocapital(Methods::validate_string($request->the_uacr));
	$mg_g_indicates                = strtoupper(Methods::validate_string($request->mg_g_indicates));
	$comments                      = Methods::strtocapital(Methods::validate_string($request->comments));
	$added_by                      = Methods::validate_string($request->entered_by);
	$response                      = array();

	if($request) {
		$patient = Methods::read_patientname($patient_id, $conn);
		$result  = UrineACR::update_urine_acr($id, $patient_id, $urea_creatinine, $urea_creatinine_flag, $micro_albumin_urine, $micro_albumin_urine_flag, $uacr, $uacr_flag, $the_uacr, $mg_g_indicates, $comments, $added_by, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "Urine ACR Lab Updated Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Updated Urine ACR Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "Urine ACR Lab Could Not Be Updated. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Update Urine ACR Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>