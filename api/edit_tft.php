<?php
	require "classes/tft.php";

	header('Content-Type: application/json');
	$conn         = $pdo->open();
	$data 	      = file_get_contents("php://input");
	$request      = json_decode($data);
	$id  		  = Methods::validate_string($request->id);
	$patient_id   = Methods::validate_string($request->patient_id);
	$ft3          = Methods::strtocapital(Methods::validate_string($request->ft3));
	$ft3_flag     = Methods::strtocapital(Methods::validate_string($request->ft3_flag));
	$ft4          = Methods::strtocapital(Methods::validate_string($request->ft4));
	$ft4_flag     = Methods::strtocapital(Methods::validate_string($request->ft4_flag));
	$tsh          = Methods::strtocapital(Methods::validate_string($request->tsh));
	$tsh_flag     = Methods::strtocapital(Methods::validate_string($request->tsh_flag));
	$comments     = Methods::strtocapital(Methods::validate_string($request->comments));
	$added_by     = Methods::validate_string($request->entered_by);
	$response     = array();

	if($request) {
		$patient = Methods::read_patientname($patient_id, $conn);
		$result  = TFT::update_tft($id, $patient_id, $ft3, $ft3_flag, $ft4, $ft4_flag, $tsh, $tsh_flag, $comments, $added_by, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "TFT Lab Added Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Updated TFT Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "TFT Lab Could Not Be Updated. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Update TFT Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>