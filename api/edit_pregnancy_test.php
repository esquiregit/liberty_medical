<?php
	require "classes/pregnancy_test.php";

	header('Content-Type: application/json');
	$conn         = $pdo->open();
	$data 	      = file_get_contents("php://input");
	$request      = json_decode($data);
	$id 		  = Methods::validate_string($request->id);
	$patient_id   = Methods::validate_string($request->patient_id);
	$results      = Methods::strtocapital(Methods::validate_string($request->results));
	$specimen     = Methods::strtocapital(Methods::validate_string($request->specimen));
	$comments     = Methods::strtocapital(Methods::validate_string($request->comments));
	$added_by     = Methods::validate_string($request->entered_by);
	$response     = array();

	if($request) {
		$patient = Methods::read_patientname($patient_id, $conn);
		$result  = PregnancyTest::update_pregnancy_test($id, $patient_id, $results, $specimen, $comments, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "Pregnancy Test Lab Updated Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Updated Pregnancy Test Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "Pregnancy Test Lab Could Not Be Updated. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Update Pregnancy Test Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>