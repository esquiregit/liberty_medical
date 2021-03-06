<?php
	require "classes/widal.php";

	header('Content-Type: application/json');
	$conn           = $pdo->open();
	$data 	        = file_get_contents("php://input");
	$request        = json_decode($data);
	$patient_id     = Methods::validate_string($request->patient_id);
	$patient        = Methods::validate_string($request->patient);
	$typhi_to       = Methods::validate_array($request->typhi_to);
	$typhi_th       = Methods::validate_array($request->typhi_th);
	$paratyphi_a_to = Methods::validate_array($request->paratyphi_a_to);
	$paratyphi_a_th = Methods::validate_array($request->paratyphi_a_th);
	$paratyphi_b_to = Methods::validate_array($request->paratyphi_b_to);
	$paratyphi_b_th = Methods::validate_array($request->paratyphi_b_th);
	$paratyphi_c_to = Methods::validate_array($request->paratyphi_c_to);
	$paratyphi_c_th = Methods::validate_array($request->paratyphi_c_th);
	$comments       = Methods::strtocapital(Methods::validate_string($request->comments));
	$added_by       = Methods::validate_string($request->entered_by);
	$response       = array();

	if($request) {
		$result = Widal::create_widal($patient_id, $typhi_to, $typhi_th, $paratyphi_a_to, $paratyphi_a_th, $paratyphi_b_to, $paratyphi_b_th, $paratyphi_c_to, $paratyphi_c_th, $comments, $added_by, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "Widal Lab Added Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Added Widal Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "Widal Lab Could Not Be Added. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Add Widal Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>