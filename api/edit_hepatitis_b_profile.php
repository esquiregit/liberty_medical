<?php
	require "classes/hepatitis_b_profile.php";

	header('Content-Type: application/json');
	$conn       = $pdo->open();
	$data 	    = file_get_contents("php://input");
	$request    = json_decode($data);
	$id 		= Methods::validate_string($request->id);
	$patient_id = Methods::validate_string($request->patient_id);
	$hbsag      = Methods::strtocapital(Methods::validate_string($request->hbsag));
	$hbsab      = Methods::strtocapital(Methods::validate_string($request->hbsab));
	$hbeag      = Methods::strtocapital(Methods::validate_string($request->hbeag));
	$hbeab      = Methods::strtocapital(Methods::validate_string($request->hbeab));
	$hbcab      = Methods::strtocapital(Methods::validate_string($request->hbcab));
	$comments   = Methods::strtocapital(Methods::validate_string($request->comments));
	$added_by   = Methods::validate_string($request->entered_by);
	$response   = array();

	if($request) {
		$patient = Methods::read_patientname($patient_id, $conn);
		$result  = HepatitisBProfile::update_hepatitis_b_profile($id, $patient_id, $hbsag, $hbsab, $hbeag, $hbeab, $hbcab, $comments, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "Hepatitis B Profile Lab Updated Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Updated Hepatitis B Profile Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "Hepatitis B Profile Lab Could Not Be Updated. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Update Hepatitis B Profile Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>