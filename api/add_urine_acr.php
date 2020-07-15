<?php
	require "classes/urine_acr.php";

	header('Content-Type: application/json');
	$conn                          = $pdo->open();
	$data 	                       = file_get_contents("php://input");
	$request                       = json_decode($data);
	$patient_id                    = Methods::validate_string($request->patient_id);
	$patient                       = Methods::validate_string($request->patient);
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
// die(print_r($request));
	if($request) {
		$result = UrineACR::create_urine_acr($patient_id, $urea_creatinine, $urea_creatinine_flag, $micro_albumin_urine, $micro_albumin_urine_flag, $uacr, $uacr_flag, $the_uacr, $mg_g_indicates, $comments, $added_by, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "Urine ACR Lab Added Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Added Urine ACR Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "Urine ACR Lab Could Not Be Added. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Add Urine ACR Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>