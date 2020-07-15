<?php
	require "classes/blood_sugar.php";

	header('Content-Type: application/json');
	$conn                = $pdo->open();
	$data 	             = file_get_contents("php://input");
	$request             = json_decode($data);
	$patient_id          = Methods::validate_string($request->patient_id);
	$patient             = Methods::validate_string($request->patient);
	$fasting_blood_sugar = Methods::strtocapital(Methods::validate_string($request->fasting_blood_sugar));
	$random_blood_sugar  = Methods::strtocapital(Methods::validate_string($request->random_blood_sugar));
	$two_hpp_blood_sugar = Methods::strtocapital(Methods::validate_string($request->two_hpp_blood_sugar));
	$comments            = Methods::strtocapital(Methods::validate_string($request->comments));
	$added_by            = Methods::validate_string($request->entered_by);
	$response            = array();

	if($request) {
		$result = BloodSugar::create_blood_sugar($patient_id, $fasting_blood_sugar, $random_blood_sugar, $two_hpp_blood_sugar, $comments, $added_by, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "Blood Sugar Lab Added Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Added Blood Sugar Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "Blood Sugar Lab Could Not Be Added. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Add Blood Sugar Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>