<?php
	require "classes/ntc_screening.php";

	header('Content-Type: application/json');
	$conn        = $pdo->open();
	$data 	     = file_get_contents("php://input");
	$request     = json_decode($data);
	$id          = Methods::validate_string($request->id);
	$patient_id  = Methods::validate_string($request->patient_id);
	$hb          = Methods::strtocapital(Methods::validate_string($request->hb));
	$hct         = Methods::strtocapital(Methods::validate_string($request->hct));
	$hepb        = Methods::strtocapital(Methods::validate_string($request->hepb));
	$sickling    = Methods::strtocapital(Methods::validate_string($request->sickling));
	$comments    = Methods::strtocapital(Methods::validate_string($request->comments));
	$added_by    = Methods::validate_string($request->entered_by);
	$response    = array();

	if($request) {
		$patient = Methods::read_patientname($patient_id, $conn);
		$result  = NTC_SCREENING::update_ntc_screening($id, $patient_id, $hb, $hct, $hepb, $sickling, $comments, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "NTC SCREENING Lab Updated Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Updated NTC SCREENING Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "NTC SCREENING Lab Could Not Be Updated. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Update NTC SCREENING Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>