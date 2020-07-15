<?php
	require "classes/cortisol.php";

	header('Content-Type: application/json');
	$conn            = $pdo->open();
	$data 	         = file_get_contents("php://input");
	$request         = json_decode($data);
	$patient_id      = Methods::validate_string($request->patient_id);
	$patient         = Methods::validate_string($request->patient);
	$cortisol_top    = Methods::strtocapital(Methods::validate_string($request->cortisol_top));
	$cortisol_bottom = Methods::strtocapital(Methods::validate_string($request->cortisol_bottom));
	$comments        = Methods::strtocapital(Methods::validate_string($request->comments));
	$added_by        = Methods::validate_string($request->entered_by);
	$response        = array();

	if($request) {
		$result = Cortisol::create_cortisol($patient_id, $cortisol_top, $cortisol_bottom, $comments, $added_by, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "Cortisol Lab Added Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Added Cortisol Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "Cortisol Lab Could Not Be Added. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Add Cortisol Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>