<?php
	require "classes/tft.php";

	header('Content-Type: application/json');
	$conn       = $pdo->open();
	$data 	    = file_get_contents("php://input");
	$request    = json_decode($data);
	$patient_id = Methods::validate_string($request->patient_id);
	$patient    = Methods::validate_string($request->patient);
	$ft3        = Methods::strtocapital(Methods::validate_string($request->ft3));
	$ft3_flag   = Methods::strtocapital(Methods::validate_string($request->ft3_flag));
	$ft4        = Methods::strtocapital(Methods::validate_string($request->ft4));
	$ft4_flag   = Methods::strtocapital(Methods::validate_string($request->ft4_flag));
	$tsh        = Methods::strtocapital(Methods::validate_string($request->tsh));
	$tsh_flag   = Methods::strtocapital(Methods::validate_string($request->tsh_flag));
	$comments   = Methods::strtocapital(Methods::validate_string($request->comments));
	$added_by   = Methods::validate_string($request->entered_by);
	$response   = array();

	if($request) {
		$result = TFT::create_tft($patient_id, $ft3, $ft3_flag, $ft4, $ft4_flag, $tsh, $tsh_flag, $comments, $added_by, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "TFT Lab Added Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Added TFT Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "TFT Lab Could Not Be Added. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Add TFT Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>