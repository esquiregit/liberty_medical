<?php
	require "classes/mantoux.php";

	header('Content-Type: application/json');
	$conn               = $pdo->open();
	$data 	            = file_get_contents("php://input");
	$request            = json_decode($data);
	$patient_id         = Methods::validate_string($request->patient_id);
	$patient            = Methods::validate_string($request->patient);
	$date_of_injection  = Methods::strtocapital(Methods::validate_string($request->date_of_injection));
	$date_of_reading    = Methods::strtocapital(Methods::validate_string($request->date_of_reading));
	$size_of_induration = Methods::strtocapital(Methods::validate_string($request->size_of_induration));
	$comments           = Methods::strtocapital(Methods::validate_string($request->comments));
	$added_by           = Methods::validate_string($request->entered_by);
	$response           = array();

	if($request) {
		$result = Mantoux::create_mantoux($patient_id, $date_of_injection, $date_of_reading, $size_of_induration, $comments, $added_by, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "Mantoux Lab Added Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Added Mantoux Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "Mantoux Lab Could Not Be Added. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Add Mantoux Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>