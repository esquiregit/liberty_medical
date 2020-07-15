<?php
	require "classes/specials.php";

	header('Content-Type: application/json');
	$conn         = $pdo->open();
	$data 	      = file_get_contents("php://input");
	$request      = json_decode($data);
	$patient_id   = Methods::validate_string($request->patient_id);
	$patient      = Methods::validate_string($request->patient);
	$abo_grouping = Methods::validate_array($request->abo_grouping);
	$g6pd         = Methods::validate_array($request->g6pd);
	$hgb_genotype = Methods::validate_array($request->hgb_genotype);
	$sickling     = Methods::validate_array($request->sickling);
	$added_by     = Methods::validate_string($request->entered_by);
	$response     = array();

	if($request) {
		$result = SPECIALS::create_specials($patient_id, $abo_grouping, $g6pd, $hgb_genotype, $sickling, $added_by, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "SPECIALS Lab Added Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Added SPECIALS Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "SPECIALS Lab Could Not Be Added. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Add SPECIALS Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>