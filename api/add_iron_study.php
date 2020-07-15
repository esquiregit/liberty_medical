<?php
	require "classes/iron_study.php";

	header('Content-Type: application/json');
	$conn                 = $pdo->open();
	$data 	              = file_get_contents("php://input");
	$request              = json_decode($data);
	$patient_id           = Methods::validate_string($request->patient_id);
	$patient              = Methods::validate_string($request->patient);
	$iron                 = Methods::strtocapital(Methods::validate_string($request->iron));
	$iron_flag            = Methods::strtocapital(Methods::validate_string($request->iron_flag));
	$tibc                 = Methods::strtocapital(Methods::validate_string($request->tibc));
	$tibc_flag            = Methods::strtocapital(Methods::validate_string($request->tibc_flag));
	$transferrin_sat      = Methods::strtocapital(Methods::validate_string($request->transferrin_sat));
	$transferrin_sat_flag = Methods::strtocapital(Methods::validate_string($request->transferrin_sat_flag));
	$ferritin             = Methods::strtocapital(Methods::validate_string($request->ferritin));
	$ferritin_flag        = Methods::strtocapital(Methods::validate_string($request->ferritin_flag));
	$comments             = Methods::strtocapital(Methods::validate_string($request->comments));
	$added_by             = Methods::validate_string($request->entered_by);
	$response             = array();

	if($request) {
		$result = IronStudy::create_iron_study($patient_id, $iron, $iron_flag, $tibc, $tibc_flag, $transferrin_sat, $transferrin_sat_flag, $ferritin, $ferritin_flag, $comments, $added_by, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "Iron Study Lab Added Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Added Iron Study Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "Iron Study Lab Could Not Be Added. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Add Iron Study Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>