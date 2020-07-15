<?php
	require "classes/hepatitis_markers.php";

	header('Content-Type: application/json');
	$conn                    = $pdo->open();
	$data 	                 = file_get_contents("php://input");
	$request                 = json_decode($data);
	$id           		     = Methods::validate_string($request->id);
	$patient_id              = Methods::validate_string($request->patient_id);
	$hep_a_igg_antibody      = Methods::strtocapital(Methods::validate_string($request->hep_a_igg_antibody));
	$hep_b_core_igm_antibody = Methods::strtocapital(Methods::validate_string($request->hep_b_core_igm_antibody));
	$hep_a_igm_antibody      = Methods::strtocapital(Methods::validate_string($request->hep_a_igm_antibody));
	$hep_be_antigen          = Methods::strtocapital(Methods::validate_string($request->hep_be_antigen));
	$hep_bs_antigen          = Methods::strtocapital(Methods::validate_string($request->hep_bs_antigen));
	$hep_be_antibody         = Methods::strtocapital(Methods::validate_string($request->hep_be_antibody));
	$hep_bs_antibody         = Methods::strtocapital(Methods::validate_string($request->hep_bs_antibody));
	$hep_c_screen            = Methods::strtocapital(Methods::validate_string($request->hep_c_screen));
	$hep_b_core_igg_antibody = Methods::strtocapital(Methods::validate_string($request->hep_b_core_igg_antibody));
	$comments                = Methods::strtocapital(Methods::validate_string($request->comments));
	$added_by                = Methods::validate_string($request->entered_by);
	$response                = array();

	if($request) {
		$patient = Methods::read_patientname($patient_id, $conn);
		$result  = HepatitisMarkers::update_hepatitis_markers($id, $patient_id, $hep_a_igg_antibody, $hep_b_core_igm_antibody, $hep_a_igm_antibody, $hep_be_antigen, $hep_bs_antigen, $hep_be_antibody, $hep_bs_antibody, $hep_c_screen, $hep_b_core_igg_antibody, $comments, $added_by, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "Hepatitis Markers Lab Updated Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Updated Hepatitis Markers Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "Hepatitis Markers Lab Could Not Be Updated. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Update Hepatitis Markers Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>