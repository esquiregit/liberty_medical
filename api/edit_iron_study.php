<?php
	require "classes/iron_study.php";

	header('Content-Type: application/json');
	$conn                 = $pdo->open();
	$data 	              = file_get_contents("php://input");
	$request              = json_decode($data);
	$id           		  = Methods::validate_string($request->id);
	$patient_id           = Methods::validate_string($request->patient_id);
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
		$patient = Methods::read_patientname($patient_id, $conn);
		$result  = IronStudy::update_iron_study($id, $patient_id, $iron, $iron_flag, $tibc, $tibc_flag, $transferrin_sat, $transferrin_sat_flag, $ferritin, $ferritin_flag, $comments, $added_by, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "Iron Study Lab Updated Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Updated Iron Study Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "Iron Study Lab Could Not Be Updated. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Update Iron Study Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>