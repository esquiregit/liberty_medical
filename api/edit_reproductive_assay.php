<?php
	require "classes/reproductive_assay.php";

	header('Content-Type: application/json');
	$conn         = $pdo->open();
	$data 	      = file_get_contents("php://input");
	$request      = json_decode($data);
	$id   		  = Methods::validate_string($request->id);
	$patient_id   = Methods::validate_string($request->patient_id);
	$lh           = Methods::strtocapital(Methods::validate_string($request->lh));
	$fsh          = Methods::strtocapital(Methods::validate_string($request->fsh));
	$prolactive   = Methods::strtocapital(Methods::validate_string($request->prolactive));
	$progesterone = Methods::strtocapital(Methods::validate_string($request->progesterone));
	$oestrogen    = Methods::strtocapital(Methods::validate_string($request->oestrogen));
	$testosterone = Methods::strtocapital(Methods::validate_string($request->testosterone));
	$comments     = Methods::strtocapital(Methods::validate_string($request->comments));
	$added_by     = Methods::validate_string($request->entered_by);
	$response     = array();

	if($request) {
		$patient = Methods::read_patientname($patient_id, $conn);
		$result  = ReproductiveAssay::update_reproductive_assay($id, $patient_id, $lh, $fsh, $prolactive, $progesterone, $oestrogen, $testosterone, $comments, $added_by, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "Reproductive Assay Lab Updated Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Updated Reproductive Assay Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "Reproductive Assay Lab Could Not Be Updated. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Update Reproductive Assay Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>