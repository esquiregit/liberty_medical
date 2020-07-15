<?php
	require "classes/antenatal_screening.php";

	header('Content-Type: application/json');
	$conn               = $pdo->open();
	$data 	            = file_get_contents("php://input");
	$request            = json_decode($data);
	$id      		    = Methods::validate_string($request->id);
	$patient_id         = Methods::validate_string($request->patient_id);
	$patient            = Methods::validate_string($request->patient);
	$blood_group        = Methods::strtocapital(Methods::validate_string($request->blood_group));
	$rhd                = Methods::strtocapital(Methods::validate_string($request->rhd));
	$antibody_screening = Methods::strtocapital(Methods::validate_string($request->antibody_screening));
	$hbsag              = Methods::strtocapital(Methods::validate_string($request->hbsag));
	$vdrl               = Methods::strtocapital(Methods::validate_string($request->vdrl));
	$hep_c              = Methods::strtocapital(Methods::validate_string($request->hep_c));
	$retro_screen       = Methods::strtocapital(Methods::validate_string($request->retro_screen));
	$comments           = Methods::strtocapital(Methods::validate_string($request->comments));
	$added_by           = Methods::validate_string($request->entered_by);
	$response           = array();

	if($request) {
		$result = AntenatalScreening::update_antenatal_screening($id, $patient_id, $blood_group, $rhd, $antibody_screening, $hbsag, $vdrl, $hep_c, $retro_screen, $comments, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "Antenatal Screening Lab Updated Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Updated Antenatal Screening Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "Antenatal Screening Lab Could Not Be Updated. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Update Antenatal Screening Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>