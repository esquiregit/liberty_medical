<?php
	require "classes/mantoux.php";

	header('Content-Type: application/json');
	$conn               = $pdo->open();
	$data 	            = file_get_contents("php://input");
	$request            = json_decode($data);
	$id       		    = Methods::validate_string($request->id);
	$patient_id         = Methods::validate_string($request->patient_id);
	$date_of_injection  = Methods::strtocapital(Methods::validate_string($request->date_of_injection));
	$date_of_reading    = Methods::strtocapital(Methods::validate_string($request->date_of_reading));
	$size_of_induration = Methods::strtocapital(Methods::validate_string($request->size_of_induration));
	$comments           = Methods::strtocapital(Methods::validate_string($request->comments));
	$added_by           = Methods::validate_string($request->entered_by);
	$response           = array();

	if($request) {
		$patient = Methods::read_patientname($patient_id, $conn);
		$result  = Mantoux::update_mantoux($id, $patient_id, $date_of_injection, $date_of_reading, $size_of_induration, $comments, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "Mantoux Lab Updated Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Updated Mantoux Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "Mantoux Lab Could Not Be Updated. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Update Mantoux Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>