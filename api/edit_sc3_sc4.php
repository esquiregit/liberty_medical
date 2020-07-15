<?php
	require "classes/sc3_sc4.php";

	header('Content-Type: application/json');
	$conn       = $pdo->open();
	$data 	    = file_get_contents("php://input");
	$request    = json_decode($data);
	$id 		= Methods::validate_string($request->id);
	$patient_id = Methods::validate_string($request->patient_id);
	$s_c3       = Methods::strtocapital(Methods::validate_string($request->s_c3));
	$s_c4       = Methods::strtocapital(Methods::validate_string($request->s_c4));
	$added_by   = Methods::validate_string($request->entered_by);
	$response   = array();

	if($request) {
		$patient = Methods::read_patientname($patient_id, $conn);
		$result  = SC3SC4::update_sc3_sc4($id, $patient_id, $s_c3, $s_c4, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "S-C3, SC4 Lab Updated Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Updated S-C3, SC4 Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "S-C3, SC4 Lab Could Not Be Updated. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Update S-C3, SC4 Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>