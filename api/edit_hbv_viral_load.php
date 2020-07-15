<?php
	require "classes/hbv_viral_load.php";

	header('Content-Type: application/json');
	$conn                 = $pdo->open();
	$data 	              = file_get_contents("php://input");
	$request              = json_decode($data);
	$id          		  = Methods::validate_string($request->id);
	$patient_id           = Methods::validate_string($request->patient_id);
	$hbv_dna              = Methods::strtocapital(Methods::validate_string($request->hbv_dna));
	$pcr_hbv_quantitative = Methods::strtocapital(Methods::validate_string($request->pcr_hbv_quantitative));
	$comments             = Methods::strtocapital(Methods::validate_string($request->comments));
	$added_by             = Methods::validate_string($request->entered_by);
	$response             = array();

	if($request) {
		$patient = Methods::read_patientname($patient_id, $conn);
		$result  = HBVViralLoad::update_hbv_viral_load($id, $patient_id, $hbv_dna, $pcr_hbv_quantitative, $comments, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "HBV Viral Load Lab Updated Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Updated HBV Viral Load Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "HBV Viral Load Lab Could Not Be Updated. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Update HBV Viral Load Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>