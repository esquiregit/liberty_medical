<?php
	require "classes/sc3_sc4.php";

	header('Content-Type: application/json');
	$conn       = $pdo->open();
	$data 	    = file_get_contents("php://input");
	$request    = json_decode($data);
	$patient_id = Methods::validate_string($request->patient_id);
	$patient    = Methods::validate_string($request->patient);
	$s_c3       = Methods::strtocapital(Methods::validate_string($request->s_c3));
	$s_c4       = Methods::strtocapital(Methods::validate_string($request->s_c4));
	$added_by   = Methods::validate_string($request->entered_by);
	$response   = array();

	if($request) {
		$result = SC3SC4::create_sc3_sc4($patient_id, $s_c3, $s_c4, $added_by, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "S-C3, SC4 Lab Added Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Added S-C3, SC4 Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "S-C3, SC4 Lab Could Not Be Added. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Add S-C3, SC4 Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>