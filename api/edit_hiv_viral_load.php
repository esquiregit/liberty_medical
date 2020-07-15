<?php
	require "classes/hiv_viral_load.php";

	header('Content-Type: application/json');
	$conn                 = $pdo->open();
	$data 	              = file_get_contents("php://input");
	$request              = json_decode($data);
	$id        		      = Methods::validate_string($request->id);
	$patient_id           = Methods::validate_string($request->patient_id);
	$hiv_dna              = Methods::strtocapital(Methods::validate_string($request->hiv_dna));
	$pcr_hiv_quantitative = Methods::strtocapital(Methods::validate_string($request->pcr_hiv_quantitative));
	$comments             = Methods::strtocapital(Methods::validate_string($request->comments));
	$added_by             = Methods::validate_string($request->entered_by);
	$response             = array();

	if($request) {
		$patient = Methods::read_patientname($patient_id, $conn);
		$result  = HIVViralLoad::update_hiv_viral_load($id, $patient_id, $hiv_dna, $pcr_hiv_quantitative, $comments, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "HIV Viral Load Lab Updated Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Updated HIV Viral Load Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "HIV Viral Load Lab Could Not Be Updated. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Update HIV Viral Load Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>