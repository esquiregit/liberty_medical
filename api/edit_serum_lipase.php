<?php
	require "classes/serum_lipase.php";

	header('Content-Type: application/json');
	$conn            = $pdo->open();
	$data 	         = file_get_contents("php://input");
	$request         = json_decode($data);
	$id      		 = Methods::validate_string($request->id);
	$patient_id      = Methods::validate_string($request->patient_id);
	$s_lipase        = Methods::strtocapital(Methods::validate_string($request->s_lipase));
	$s_lipase_flag   = Methods::strtocapital(Methods::validate_string($request->s_lipase_flag));
	$comments        = Methods::strtocapital(Methods::validate_string($request->comments));
	$added_by        = Methods::validate_string($request->entered_by);
	$response        = array();

	if($request) {
		$patient = Methods::read_patientname($patient_id, $conn);
		$result  = SerumLipase::update_serum_lipase($id, $patient_id, $s_lipase, $s_lipase_flag, $comments, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "Serum Lipase Lab Updated Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Updated Serum Lipase Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "Serum Lipase Lab Could Not Be Updated. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Update Serum Lipase Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>