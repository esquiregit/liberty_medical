<?php
	require "classes/urine.php";

	header('Content-Type: application/json');
	$conn                          = $pdo->open();
	$data 	                       = file_get_contents("php://input");
	$request                       = json_decode($data);
	$id                            = Methods::validate_string($request->id);
	$patient_id                    = Methods::validate_string($request->patient_id);
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
		$patient = Methods::read_patientname($patient_id, $conn);
		$result  = Urine::update_urine($id, $patient_id, $urine_vma, $urine_calcium, $urine_uric_acid, $urine_creatinine, $serum_creatinine, $twenty_four_hour_urine_volume, $clearance, $comments, $added_by, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "Urine Lab Updated Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Updated Urine Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "Urine Lab Could Not Be Updated. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Update Urine Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>