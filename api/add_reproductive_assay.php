<?php
	require "classes/reproductive_assay.php";

	header('Content-Type: application/json');
	$conn         = $pdo->open();
	$data 	      = file_get_contents("php://input");
	$request      = json_decode($data);

	$patient_id   = Methods::validate_string($request->patient_id);
	$patient      = Methods::validate_string($request->patient);
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
		$result = ReproductiveAssay::create_reproductive_assay($patient_id, $lh, $fsh, $prolactive, $progesterone, $oestrogen, $testosterone, $comments, $added_by, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "Reproductive Assay Lab Added Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Added Reproductive Assay Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "Reproductive Assay Lab Could Not Be Added. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Add Reproductive Assay Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>