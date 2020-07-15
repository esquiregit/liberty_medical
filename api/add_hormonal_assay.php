<?php
	require "classes/hormonal_assay.php";

	header('Content-Type: application/json');
	$conn        = $pdo->open();
	$data 	     = file_get_contents("php://input");
	$request     = json_decode($data);
	$patient_id  = Methods::validate_string($request->patient_id);
	$patient     = Methods::validate_string($request->patient);
	$results     = Methods::strtocapital(Methods::validate_string($request->results));
	$added_by    = Methods::validate_string($request->entered_by);
	$response    = array();

	if($request) {
		$result = HormonalAssay::create_hormonal_assay($patient_id, $results, $added_by, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "Hormonal Assay Lab Added Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Added Hormonal Assay Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "Hormonal Assay Lab Could Not Be Added. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Add Hormonal Assay Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>