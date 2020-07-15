<?php
	require "classes/hba1c.php";

	header('Content-Type: application/json');
	$conn                  = $pdo->open();
	$data 	               = file_get_contents("php://input");
	$request               = json_decode($data);
	$id          		   = Methods::validate_string($request->id);
	$patient_id            = Methods::validate_string($request->patient_id);
	$dcct                  = Methods::strtocapital(Methods::validate_string($request->dcct));
	$ifcc                  = Methods::strtocapital(Methods::validate_string($request->ifcc));
	$average_blood_glucose = Methods::strtocapital(Methods::validate_string($request->average_blood_glucose));
	$comments              = Methods::strtocapital(Methods::validate_string($request->comments));
	$added_by        	   = Methods::validate_string($request->entered_by);
	$response              = array();

	if($request) {
		$patient = Methods::read_patientname($patient_id, $conn);
		$result  = HBA1C::update_hba1c($id, $patient_id, $dcct, $ifcc, $average_blood_glucose, $comments, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "HBA1C Lab Updated Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Updated HBA1C Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "HBA1C Lab Could Not Be Updated. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Update HBA1C Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>