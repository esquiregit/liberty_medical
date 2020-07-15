<?php
	require "classes/bue_creatinine_lipids.php";

	header('Content-Type: application/json');
	$conn                   = $pdo->open();
	$data 	                = file_get_contents("php://input");
	$request                = json_decode($data);
	$patient_id             = Methods::validate_string($request->patient_id);
	$patient                = Methods::validate_string($request->patient);
	$sodium                 = Methods::strtocapital(Methods::validate_string($request->sodium));
	$sodium_flag            = Methods::strtocapital(Methods::validate_string($request->sodium_flag));
	$potassium              = Methods::strtocapital(Methods::validate_string($request->potassium));
	$potassium_flag         = Methods::strtocapital(Methods::validate_string($request->potassium_flag));
	$chloride               = Methods::strtocapital(Methods::validate_string($request->chloride));
	$chloride_flag          = Methods::strtocapital(Methods::validate_string($request->chloride_flag));
	$urea                   = Methods::strtocapital(Methods::validate_string($request->urea));
	$urea_flag              = Methods::strtocapital(Methods::validate_string($request->urea_flag));
	$creatinine             = Methods::strtocapital(Methods::validate_string($request->creatinine));
	$creatinine_flag        = Methods::strtocapital(Methods::validate_string($request->creatinine_flag));
	$egfr                   = Methods::strtocapital(Methods::validate_string($request->egfr));
	$cholesterol_total      = Methods::strtocapital(Methods::validate_string($request->cholesterol_total));
	$cholesterol_total_flag = Methods::strtocapital(Methods::validate_string($request->cholesterol_total_flag));
	$triglycerides          = Methods::strtocapital(Methods::validate_string($request->triglycerides));
	$triglycerides_flag     = Methods::strtocapital(Methods::validate_string($request->triglycerides_flag));
	$hdl                    = Methods::strtocapital(Methods::validate_string($request->hdl));
	$hdl_flag               = Methods::strtocapital(Methods::validate_string($request->hdl_flag));
	$ldl                    = Methods::strtocapital(Methods::validate_string($request->ldl));
	$ldl_flag               = Methods::strtocapital(Methods::validate_string($request->ldl_flag));
	$coronary_risk          = Methods::strtocapital(Methods::validate_string($request->coronary_risk));
	$coronary_risk_flag     = Methods::strtocapital(Methods::validate_string($request->coronary_risk_flag));
	$comments               = Methods::strtocapital(Methods::validate_string($request->comments));
	$added_by               = Methods::validate_string($request->entered_by);
	$response               = array();

	if($request) {
		$result = BueCreatinineLipids::create_bue_creatinine_lipids($patient_id, $sodium, $sodium_flag, $potassium, $potassium_flag, $chloride, $chloride_flag, $urea, $urea_flag, $creatinine, $creatinine_flag, $egfr, $cholesterol_total, $cholesterol_total_flag, $triglycerides, $triglycerides_flag, $hdl, $hdl_flag, $ldl, $ldl_flag, $coronary_risk, $coronary_risk_flag, $comments, $added_by, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "BUE Lipids Lab Added Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Added BUE Lipids Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "BUE Lipids Lab Could Not Be Added. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Add BUE Lipids Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>