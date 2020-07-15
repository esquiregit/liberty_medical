<?php
	require "classes/lipid_profile.php";

	header('Content-Type: application/json');
	$conn                   = $pdo->open();
	$data 	                = file_get_contents("php://input");
	$request                = json_decode($data);
	$id             		= Methods::validate_string($request->id);
	$patient_id             = Methods::validate_string($request->patient_id);
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
		$patient = Methods::read_patientname($patient_id, $conn);
		$result  = LipidProfile::update_lipid_profile($id, $patient_id, $cholesterol_total, $cholesterol_total_flag, $triglycerides, $triglycerides_flag, $hdl, $hdl_flag, $ldl, $ldl_flag, $coronary_risk, $coronary_risk_flag, $added_by, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "Lipid Profile Lab Updated Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Updated Lipid Profile Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "Lipid Profile Lab Could Not Be Updated. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Update Lipid Profile Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>