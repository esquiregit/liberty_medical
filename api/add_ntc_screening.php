<?php
	require "classes/ntc_screening.php";

	header('Content-Type: application/json');
	$conn        = $pdo->open();
	$data 	     = file_get_contents("php://input");
	$request     = json_decode($data);
	$patient_id  = Methods::validate_string($request->patient_id);
	$patient     = Methods::validate_string($request->patient);
	$hb          = Methods::strtocapital(Methods::validate_string($request->hb));
	$hct         = Methods::strtocapital(Methods::validate_string($request->hct));
	$hepb        = Methods::strtocapital(Methods::validate_string($request->hepb));
	$sickling    = Methods::strtocapital(Methods::validate_string($request->sickling));
	$comments    = Methods::strtocapital(Methods::validate_string($request->comments));
	$added_by    = Methods::validate_string($request->entered_by);
	$response    = array();

	if($request) {
		$result = NTC_SCREENING::create_ntc_screening($patient_id, $hb, $hct, $hepb, $sickling, $comments, $added_by, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "NTC SCREENING Lab Added Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Added NTC SCREENING Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "NTC SCREENING Lab Could Not Be Added. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Add NTC SCREENING Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>