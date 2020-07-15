<?php
	require "classes/estrogen.php";

	header('Content-Type: application/json');
	$conn        = $pdo->open();
	$data 	     = file_get_contents("php://input");
	$request     = json_decode($data);
	$patient_id  = Methods::validate_string($request->patient_id);
	$patient     = Methods::validate_string($request->patient);
	$follicular  = Methods::strtocapital(Methods::validate_string($request->follicular));
	$mid_cycle   = Methods::strtocapital(Methods::validate_string($request->mid_cycle));
	$luteal      = Methods::strtocapital(Methods::validate_string($request->luteal));
	$pm          = Methods::strtocapital(Methods::validate_string($request->pm));
	$amenorrhoea = Methods::strtocapital(Methods::validate_string($request->amenorrhoea));
	$mem         = Methods::strtocapital(Methods::validate_string($request->mem));
	$comments    = Methods::strtocapital(Methods::validate_string($request->comments));
	$added_by    = Methods::validate_string($request->entered_by);
	$response    = array();

	if($request) {
		$result = Estrogen::create_estrogen($patient_id, $follicular, $mid_cycle, $luteal, $pm, $amenorrhoea, $mem, $comments, $added_by, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "Estrogen Lab Added Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Added Estrogen Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "Estrogen Lab Could Not Be Added. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Add Estrogen Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>