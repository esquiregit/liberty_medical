<?php
	require "classes/sputum_afb.php";

	header('Content-Type: application/json');
	$conn           = $pdo->open();
	$data 	        = file_get_contents("php://input");
	$request        = json_decode($data);
	$id        		= Methods::validate_string($request->id);
	$patient_id     = Methods::validate_string($request->patient_id);
	$appearance     = Methods::validate_array($request->appearance);
	$gram_stain     = Methods::validate_array($request->gram_stain);
	$zn_stain       = Methods::validate_array($request->zn_stain);
	$pus_cells      = Methods::validate_array($request->pus_cells);
	$comments       = Methods::strtocapital(Methods::validate_string($request->comments));
	$added_by       = Methods::validate_string($request->entered_by);
	$response       = array();

	if($request) {
		$patient = Methods::read_patientname($patient_id, $conn);
		$result  = SputumAFB::update_sputum_afb($id, $patient_id, $appearance, $gram_stain, $pus_cells, $zn_stain, $comments, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "Sputum AFB Lab Updated Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Updated Sputum AFB Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "Sputum AFB Lab Could Not Be Updated. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Update Sputum AFB Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>