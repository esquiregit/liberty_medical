<?php
	require "classes/protein_electrophoresis.php";

	header('Content-Type: application/json');
	$conn                  = $pdo->open();
	$data 	               = file_get_contents("php://input");
	$request               = json_decode($data);
	$id                    = Methods::validate_string($request->id);
	$patient_id            = Methods::validate_string($request->patient_id);
	$total_protein         = Methods::strtocapital(Methods::validate_string($request->total_protein));
	$total_protein_flag    = Methods::strtocapital(Methods::validate_string($request->total_protein_flag));
	$albumin               = Methods::strtocapital(Methods::validate_string($request->albumin));
	$albumin_flag          = Methods::strtocapital(Methods::validate_string($request->albumin_flag));
	$alpha_1_globulin      = Methods::strtocapital(Methods::validate_string($request->alpha_1_globulin));
	$alpha_1_globulin_flag = Methods::strtocapital(Methods::validate_string($request->alpha_1_globulin_flag));
	$alpha_2_globulin      = Methods::strtocapital(Methods::validate_string($request->alpha_2_globulin));
	$alpha_2_globulin_flag = Methods::strtocapital(Methods::validate_string($request->alpha_2_globulin_flag));
	$beta_1_globulin       = Methods::strtocapital(Methods::validate_string($request->beta_1_globulin));
	$beta_1_globulin_flag  = Methods::strtocapital(Methods::validate_string($request->beta_1_globulin_flag));
	$beta_2_globulin       = Methods::strtocapital(Methods::validate_string($request->beta_2_globulin));
	$beta_2_globulin_flag  = Methods::strtocapital(Methods::validate_string($request->beta_2_globulin_flag));
	$alpha_2_globulin      = Methods::strtocapital(Methods::validate_string($request->alpha_2_globulin));
	$alpha_2_globulin_flag = Methods::strtocapital(Methods::validate_string($request->alpha_2_globulin_flag));
	$gamma_globulin        = Methods::strtocapital(Methods::validate_string($request->gamma_globulin));
	$gamma_globulin_flag   = Methods::strtocapital(Methods::validate_string($request->gamma_globulin_flag));
	$comments              = Methods::strtocapital(Methods::validate_string($request->comments));
	$added_by              = Methods::validate_string($request->entered_by);
	$response              = array();

	if($request) {
		$patient = Methods::read_patientname($patient_id, $conn);
		$result  = ProteinElectrophoresis::update_protein_electrophoresis($id, $patient_id, $total_protein, $total_protein_flag, $albumin, $albumin_flag, $alpha_1_globulin, $alpha_1_globulin_flag, $alpha_2_globulin, $alpha_2_globulin_flag, $beta_1_globulin, $beta_1_globulin_flag, $beta_2_globulin, $beta_2_globulin_flag, $gamma_globulin, $gamma_globulin_flag, $comments, $added_by, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "Protein Electrophoresis Lab Updated Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Updated Protein Electrophoresis Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "Protein Electrophoresis Lab Could Not Be Updated. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Update Protein Electrophoresis Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>