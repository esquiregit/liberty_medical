<?php
	require "classes/general_chemistry.php";

	header('Content-Type: application/json');
	$conn            = $pdo->open();
	$data 	         = file_get_contents("php://input");
	$request         = json_decode($data);
	$id      	     = Methods::validate_string($request->id);
	$patient_id      = Methods::validate_string($request->patient_id);
	$amylase         = Methods::strtocapital(Methods::validate_string($request->amylase));
	$creatinine      = Methods::strtocapital(Methods::validate_string($request->creatinine));
	$ldh             = Methods::strtocapital(Methods::validate_string($request->ldh));
	$uric_acid       = Methods::strtocapital(Methods::validate_string($request->uric_acid));
	$creatine_kinase = Methods::strtocapital(Methods::validate_string($request->creatine_kinase));
	$calcium         = Methods::strtocapital(Methods::validate_string($request->calcium));
	$phosphorus      = Methods::strtocapital(Methods::validate_string($request->phosphorus));
	$magnessium      = Methods::strtocapital(Methods::validate_string($request->magnessium));
	$fbs_glucose     = Methods::strtocapital(Methods::validate_string($request->fbs_glucose));
	$globulin        = Methods::strtocapital(Methods::validate_string($request->globulin));
	$bili_indirect   = Methods::strtocapital(Methods::validate_string($request->bili_indirect));
	$glyco_hbg       = Methods::strtocapital(Methods::validate_string($request->glyco_hbg));
	$comments        = Methods::strtocapital(Methods::validate_string($request->comments));
	$added_by        = Methods::validate_string($request->entered_by);
	$response        = array();

	if($request) {
		$patient = Methods::read_patientname($patient_id, $conn);
		$result  = GeneralChemistry::update_general_chemistry($id, $patient_id, $amylase, $creatinine, $ldh, $uric_acid, $creatine_kinase, $calcium, $phosphorus, $magnessium, $fbs_glucose, $globulin, $bili_indirect, $glyco_hbg, $comments, $added_by, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "General Chemistry Lab Updated Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Updated General Chemistry Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "General Chemistry Lab Could Not Be Updated. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Update General Chemistry Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>