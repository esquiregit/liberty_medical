<?php
	require "classes/urine.php";

	header('Content-Type: application/json');
	$conn                          = $pdo->open();
	$data 	                       = file_get_contents("php://input");
	$request                       = json_decode($data);
	$patient_id                    = Methods::validate_string($request->patient_id);
	$patient                       = Methods::validate_string($request->patient);
	$urine_vma                     = Methods::strtocapital(Methods::validate_string($request->urine_vma));
	$urine_calcium                 = Methods::strtocapital(Methods::validate_string($request->urine_calcium));
	$urine_uric_acid               = Methods::strtocapital(Methods::validate_string($request->urine_uric_acid));
	$urine_creatinine              = Methods::strtocapital(Methods::validate_string($request->urine_creatinine));
	$serum_creatinine              = Methods::strtocapital(Methods::validate_string($request->serum_creatinine));
	$twenty_four_hour_urine_volume = Methods::strtocapital(Methods::validate_string($request->twenty_four_hour_urine_volume));
	$clearance                     = Methods::strtocapital(Methods::validate_string($request->clearance));
	$comments                      = Methods::strtocapital(Methods::validate_string($request->comments));
	$added_by                      = Methods::validate_string($request->entered_by);
	$response                      = array();

	if($request) {
		$result = Urine::create_urine($patient_id, $urine_vma, $urine_calcium, $urine_uric_acid, $urine_creatinine, $serum_creatinine, $twenty_four_hour_urine_volume, $clearance, $comments, $added_by, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "Urine Lab Added Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Added Urine Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "Urine Lab Could Not Be Added. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Add Urine Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>