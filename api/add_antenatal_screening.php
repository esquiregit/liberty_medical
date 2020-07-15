<?php
	require "classes/antenatal_screening.php";

	header('Content-Type: application/json');
	$conn               = $pdo->open();
	$data 	            = file_get_contents("php://input");
	$request            = json_decode($data);
	$patient_id         = Methods::validate_string($request->patient_id);
	$patient            = Methods::validate_string($request->patient);
	$blood_group        = Methods::validate_array($request->blood_group);
	$rhd                = Methods::validate_array($request->rhd);
	$antibody_screening = Methods::validate_array($request->antibody_screening);
	$hbsag              = Methods::validate_array($request->hbsag);
	$vdrl               = Methods::validate_array($request->vdrl);
	$hep_c              = Methods::validate_array($request->hep_c);
	$retro_screen       = Methods::validate_array($request->retro_screen);
	$comments           = Methods::strtocapital(Methods::validate_string($request->comments));
	$added_by           = Methods::validate_string($request->entered_by);
	$response           = array();

	if($request) {
		$result = AntenatalScreening::create_antenatal_screening($patient_id, $blood_group, $rhd, $antibody_screening, $hbsag, $vdrl, $hep_c, $retro_screen, $comments, $added_by, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "Antenatal Screening Lab Added Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Added Antenatal Screening Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "Antenatal Screening Lab Could Not Be Added. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Add Antenatal Screening Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>