<?php
	require "classes/sputum_afb.php";

	header('Content-Type: application/json');
	$conn       = $pdo->open();
	$data 	    = file_get_contents("php://input");
	$request    = json_decode($data);
	$patient_id = Methods::validate_string($request->patient_id);
	$patient    = Methods::validate_string($request->patient);
	$appearance = Methods::validate_array($request->appearance);
	$gram_stain = Methods::validate_array($request->gram_stain);
	$zn_stain   = Methods::validate_array($request->zn_stain);
	$pus_cells  = Methods::validate_array($request->pus_cells);
	$comments   = Methods::strtocapital(Methods::validate_string($request->comments));
	$added_by   = Methods::validate_string($request->entered_by);
	$response   = array();

	if($request) {
		$result = SputumAFB::create_sputum_afb($patient_id, $appearance, $gram_stain, $pus_cells, $zn_stain, $comments, $added_by, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "Sputum AFB Lab Added Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Added Sputum AFB Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "Sputum AFB Lab Could Not Be Added. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Add Sputum AFB Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>