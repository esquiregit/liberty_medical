<?php
	require "classes/semen_analysis.php";

	header('Content-Type: application/json');
	$conn             = $pdo->open();
	$data 	          = file_get_contents("php://input");
	$request          = json_decode($data);
	$patient_id       = Methods::validate_string($request->patient_id);
	$patient          = Methods::validate_string($request->patient);
	$volume           = Methods::strtocapital(Methods::validate_string($request->volume));
	$motility         = Methods::strtocapital(Methods::validate_string($request->motility));
	$unknown_one      = Methods::strtocapital(Methods::validate_string($request->unknown_one));
	$unknown_two      = Methods::strtocapital(Methods::validate_string($request->unknown_two));
	$consistency      = Methods::validate_array($request->consistency);
	$agglutination    = Methods::strtocapital(Methods::validate_string($request->agglutination));
	$ph               = Methods::validate_array($request->ph);
	$count            = Methods::strtocapital(Methods::validate_string($request->count));
	$colour           = Methods::validate_array($request->colour);
	$viability        = Methods::strtocapital(Methods::validate_string($request->viability));
	$morphology       = Methods::strtocapital(Methods::validate_string($request->morphology));
	$testicular_cells = Methods::strtocapital(Methods::validate_string($request->testicular_cells));
	$pus_cells        = Methods::strtocapital(Methods::validate_string($request->pus_cells));
	$epithelial       = Methods::strtocapital(Methods::validate_string($request->epithelial));
	$red_blood_cells  = Methods::strtocapital(Methods::validate_string($request->red_blood_cells));
	$comments         = Methods::strtocapital(Methods::validate_string($request->comments));
	$added_by         = Methods::validate_string($request->entered_by);
	$response         = array();

	if($request) {
		$result = SemenAnalysis::create_semen_analysis($patient_id, $volume, $motility, $unknown_one, $unknown_two, $consistency, $agglutination, $ph, $colour, $count, $viability, $morphology, $testicular_cells, $pus_cells, $epithelial, $red_blood_cells, $comments, $added_by, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "Semen Analysis Lab Added Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Added Semen Analysis Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "Semen Analysis Lab Could Not Be Added. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Add Semen Analysis Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>