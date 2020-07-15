<?php
	require "classes/lipid_profile.php";

	header('Content-Type: application/json');
	$conn                   = $pdo->open();
	$data 	                = file_get_contents("php://input");
	$request                = json_decode($data);
	$patient_id             = Methods::validate_string($request->patient_id);
	$patient                = Methods::validate_string($request->patient);
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
	$added_by               = Methods::validate_string($request->entered_by);
	$response               = array();

	if($request) {
		$result = LipidProfile::create_lipid_profile($patient_id, $cholesterol_total, $cholesterol_total_flag, $triglycerides, $triglycerides_flag, $hdl, $hdl_flag, $ldl, $ldl_flag, $coronary_risk, $coronary_risk_flag, $added_by, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "Lipid Profile Lab Added Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Added Lipid Profile Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "Lipid Profile Lab Could Not Be Added. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Add Lipid Profile Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>