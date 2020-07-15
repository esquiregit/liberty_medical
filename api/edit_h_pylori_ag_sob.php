<?php
	require "classes/h_pylori_ag_sob.php";

	header('Content-Type: application/json');
	$conn               = $pdo->open();
	$data 	            = file_get_contents("php://input");
	$request            = json_decode($data);
	$id      		    = Methods::validate_string($request->id);
	$patient_id         = Methods::validate_string($request->patient_id);
	$h_pylori_ag        = Methods::strtocapital(Methods::validate_string($request->h_pylori_ag));
	$stool_occult_blood = Methods::strtocapital(Methods::validate_string($request->stool_occult_blood));
	$comments           = Methods::strtocapital(Methods::validate_string($request->comments));
	$added_by           = Methods::validate_string($request->entered_by);
	$response           = array();

	if($request) {
		$patient = Methods::read_patientname($patient_id, $conn);
		$result  = HPyloriAgSOB::update_h_pylori_ag_sob($id, $patient_id, $h_pylori_ag, $stool_occult_blood, $comments, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "H. Pylori Ag / SOB Lab Updated Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Updated H. Pylori Ag / SOB Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "H. Pylori Ag / SOB Lab Could Not Be Updated. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Update H. Pylori Ag / SOB Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>