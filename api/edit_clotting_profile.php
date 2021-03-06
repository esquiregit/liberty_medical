<?php
	require "classes/clotting_profile.php";

	header('Content-Type: application/json');
	$conn               = $pdo->open();
	$data 	            = file_get_contents("php://input");
	$request            = json_decode($data);
	$id       		    = Methods::validate_string($request->id);
	$patient_id         = Methods::validate_string($request->patient_id);
	$bt                 = Methods::strtocapital(Methods::validate_string($request->bt));
	$pt_inr             = Methods::strtocapital(Methods::validate_string($request->pt_inr));
	$aptt               = Methods::strtocapital(Methods::validate_string($request->aptt));
	$control_time       = Methods::strtocapital(Methods::validate_string($request->control_time));
	$normal_plasma      = Methods::strtocapital(Methods::validate_string($request->normal_plasma));
	$ratio              = Methods::strtocapital(Methods::validate_string($request->ratio));
	$inr                = Methods::strtocapital(Methods::validate_string($request->inr));
	$factor_viii_assay  = Methods::strtocapital(Methods::validate_string($request->factor_viii_assay));
	$factor_ix_activity = Methods::strtocapital(Methods::validate_string($request->factor_ix_activity));
	$comments           = Methods::strtocapital(Methods::validate_string($request->comments));
	$added_by           = Methods::validate_string($request->entered_by);
	$response           = array();

	if($request) {
		$patient = Methods::read_patientname($patient_id, $conn);
		$result  = ClottingProfile::update_clotting_profile($id, $patient_id, $bt, $pt_inr, $aptt, $control_time, $normal_plasma, $ratio, $inr, $factor_viii_assay, $factor_ix_activity, $comments, $added_by, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "Clotting Profile Lab Updated Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Updated Clotting Profile Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "Clotting Profile Lab Could Not Be Updated. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Update Clotting Profile Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>