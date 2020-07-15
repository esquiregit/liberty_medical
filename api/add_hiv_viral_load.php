<?php
	require "classes/hiv_viral_load.php";

	header('Content-Type: application/json');
	$conn                 = $pdo->open();
	$data 	              = file_get_contents("php://input");
	$request              = json_decode($data);
	$patient_id           = Methods::validate_string($request->patient_id);
	$patient              = Methods::validate_string($request->patient);
	$hiv_dna              = Methods::strtocapital(Methods::validate_string($request->hiv_dna));
	$pcr_hiv_quantitative = Methods::strtocapital(Methods::validate_string($request->pcr_hiv_quantitative));
	$comments             = Methods::strtocapital(Methods::validate_string($request->comments));
	$added_by             = Methods::validate_string($request->entered_by);
	$response             = array();

	if($request) {
		$result = HIVViralLoad::create_hiv_viral_load($patient_id, $hiv_dna, $pcr_hiv_quantitative, $comments, $added_by, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "HIV Viral Load Lab Added Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Added HIV Viral Load Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "HIV Viral Load Lab Could Not Be Added. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Add HIV Viral Load Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>