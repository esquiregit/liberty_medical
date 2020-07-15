<?php
	require "classes/hbv_viral_load.php";

	header('Content-Type: application/json');
	$conn                 = $pdo->open();
	$data 	              = file_get_contents("php://input");
	$request              = json_decode($data);
	$patient_id           = Methods::validate_string($request->patient_id);
	$patient              = Methods::validate_string($request->patient);
	$hbv_dna              = Methods::strtocapital(Methods::validate_string($request->hbv_dna));
	$pcr_hbv_quantitative = Methods::strtocapital(Methods::validate_string($request->pcr_hbv_quantitative));
	$comments             = Methods::strtocapital(Methods::validate_string($request->comments));
	$added_by             = Methods::validate_string($request->entered_by);
	$response             = array();

	if($request) {
		$result = HBVViralLoad::create_hbv_viral_load($patient_id, $hbv_dna, $pcr_hbv_quantitative, $comments, $added_by, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "HBV Viral Load Lab Added Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Added HBV Viral Load Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "HBV Viral Load Lab Could Not Be Added. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Add HBV Viral Load Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>