<?php
	require "classes/m_alb.php";

	header('Content-Type: application/json');
	$conn        = $pdo->open();
	$data 	     = file_get_contents("php://input");
	$request     = json_decode($data);
	$id  		 = Methods::validate_string($request->id);
	$patient_id  = Methods::validate_string($request->patient_id);
	$results     = Methods::strtocapital(Methods::validate_string($request->results));
	$comments    = Methods::strtocapital(Methods::validate_string($request->comments));
	$added_by    = Methods::validate_string($request->entered_by);
	$response    = array();

	if($request) {
		$patient = Methods::read_patientname($patient_id, $conn);
		$result  = MALB::update_m_alb($id, $patient_id, $results, $comments, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "M-ALB Lab Added Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Added M-ALB Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "M-ALB Lab Could Not Be Added. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Add M-ALB Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>