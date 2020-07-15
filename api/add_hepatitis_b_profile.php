<?php
	require "classes/hepatitis_b_profile.php";

	header('Content-Type: application/json');
	$conn       = $pdo->open();
	$data 	    = file_get_contents("php://input");
	$request    = json_decode($data);
	$patient_id = Methods::validate_string($request->patient_id);
	$patient    = Methods::validate_string($request->patient);
	$hbsag      = Methods::strtocapital(Methods::validate_string($request->hbsag));
	$hbsab      = Methods::strtocapital(Methods::validate_string($request->hbsab));
	$hbeag      = Methods::strtocapital(Methods::validate_string($request->hbeag));
	$hbeab      = Methods::strtocapital(Methods::validate_string($request->hbeab));
	$hbcab      = Methods::strtocapital(Methods::validate_string($request->hbcab));
	$comments   = Methods::strtocapital(Methods::validate_string($request->comments));
	$added_by   = Methods::validate_string($request->entered_by);
	$response   = array();

	if($request) {
		$result = HepatitisBProfile::create_hepatitis_b_profile($patient_id, $hbsag, $hbsab, $hbeag, $hbeab, $hbcab, $comments, $added_by, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "Hepatitis B Profile Lab Added Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Added Hepatitis B Profile Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "Hepatitis B Profile Lab Could Not Be Added. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Add Hepatitis B Profile Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>