<?php
	require "classes/blood_film_comment.php";

	header('Content-Type: application/json');
	$conn       = $pdo->open();
	$data 	    = file_get_contents("php://input");
	$request    = json_decode($data);
	$id 	    = Methods::validate_string($request->id);
	$patient_id = Methods::validate_string($request->patient_id);
	$rbc        = Methods::strtocapital(Methods::validate_string($request->rbc));
	$wbc        = Methods::strtocapital(Methods::validate_string($request->wbc));
	$platelets  = Methods::strtocapital(Methods::validate_string($request->platelets));
	$comments   = Methods::strtocapital(Methods::validate_string($request->comments));
	$added_by   = Methods::validate_string($request->entered_by);
	$response   = array();

	if($request) {
		$patient = Methods::read_patientname($patient_id, $conn);
		$result  = BloodFilmComment::update_blood_film_comment($id, $patient_id, $rbc, $wbc, $platelets, $comments, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "Blood Film Comment Lab Updated Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Updated Blood Film Comment Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "Blood Film Comment Lab Could Not Be Updated. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Update Blood Film Comment Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>