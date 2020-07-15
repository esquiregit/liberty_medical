<?php
	require "classes/blood_sugar.php";

	header('Content-Type: application/json');
	$conn                = $pdo->open();
	$data 	             = file_get_contents("php://input");
	$request             = json_decode($data);
	$id          		 = Methods::validate_string($request->id);
	$patient_id          = Methods::validate_string($request->patient_id);
	$fasting_blood_sugar = Methods::strtocapital(Methods::validate_string($request->fasting_blood_sugar));
	$random_blood_sugar  = Methods::strtocapital(Methods::validate_string($request->random_blood_sugar));
	$two_hpp_blood_sugar = Methods::strtocapital(Methods::validate_string($request->two_hpp_blood_sugar));
	$comments            = Methods::strtocapital(Methods::validate_string($request->comments));
	$added_by            = Methods::validate_string($request->entered_by);
	$response            = array();

	if($request) {
		$patient = Methods::read_patientname($patient_id, $conn);
		$result  = BloodSugar::update_blood_sugar($id, $patient_id, $fasting_blood_sugar, $random_blood_sugar, $two_hpp_blood_sugar, $comments, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "Blood Sugar Lab Updated Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Updated Blood Sugar Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "Blood Sugar Lab Could Not Be Updated. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Update Blood Sugar Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>