<?php
	require "classes/troponin.php";

	header('Content-Type: application/json');
	$conn       = $pdo->open();
	$data 	    = file_get_contents("php://input");
	$request    = json_decode($data);
	$id 		= Methods::validate_string($request->id);
	$patient_id = Methods::validate_string($request->patient_id);
	$troponin_i = Methods::strtocapital(Methods::validate_string($request->troponin_i));
	$troponin_t = Methods::strtocapital(Methods::validate_string($request->troponin_t));
	$comments   = Methods::strtocapital(Methods::validate_string($request->comments));
	$added_by   = Methods::validate_string($request->entered_by);
	$response   = array();

	if($request) {
		$patient = Methods::read_patientname($patient_id, $conn);
		$result  = Troponin::update_troponin($id, $patient_id, $troponin_i, $troponin_t, $comments, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "Troponin Lab Added Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Added Troponin Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "Troponin Lab Could Not Be Added. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Add Troponin Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>