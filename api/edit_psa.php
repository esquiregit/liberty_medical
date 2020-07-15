<?php
	require "classes/psa.php";

	header('Content-Type: application/json');
	$conn        = $pdo->open();
	$data 	     = file_get_contents("php://input");
	$request     = json_decode($data);
	$id 	     = Methods::validate_string($request->id);
	$patient_id  = Methods::validate_string($request->patient_id);
	$results     = Methods::strtocapital(Methods::validate_string($request->results));
	$comments    = Methods::strtocapital(Methods::validate_string($request->comments));
	$added_by    = Methods::validate_string($request->entered_by);
	$response    = array();

	if($request) {
		$patient = Methods::read_patientname($patient_id, $conn);
		$result  = PSA::update_psa($id, $patient_id, $results, $comments, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "PSA Lab Updated Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Updated PSA Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "PSA Lab Could Not Be Updated. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Update PSA Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>