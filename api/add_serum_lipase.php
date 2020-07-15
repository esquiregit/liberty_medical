<?php
	require "classes/serum_lipase.php";

	header('Content-Type: application/json');
	$conn            = $pdo->open();
	$data 	         = file_get_contents("php://input");
	$request         = json_decode($data);
	$patient_id      = Methods::validate_string($request->patient_id);
	$patient         = Methods::validate_string($request->patient);
	$s_lipase        = Methods::strtocapital(Methods::validate_string($request->s_lipase));
	$s_lipase_flag   = Methods::strtocapital(Methods::validate_string($request->s_lipase_flag));
	$comments        = Methods::strtocapital(Methods::validate_string($request->comments));
	$added_by        = Methods::validate_string($request->entered_by);
	$response        = array();

	if($request) {
		$result = SerumLipase::create_serum_lipase($patient_id, $s_lipase, $s_lipase_flag, $comments, $added_by, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "Serum Lipase Lab Added Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Added Serum Lipase Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "Serum Lipase Lab Could Not Be Added. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Add Serum Lipase Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>