<?php
	require "classes/cortisol.php";

	header('Content-Type: application/json');
	$conn            = $pdo->open();
	$data 	         = file_get_contents("php://input");
	$request         = json_decode($data);
	$id      		 = Methods::validate_string($request->id);
	$patient_id      = Methods::validate_string($request->patient_id);
	$cortisol_top    = Methods::strtocapital(Methods::validate_string($request->cortisol_top));
	$cortisol_bottom = Methods::strtocapital(Methods::validate_string($request->cortisol_bottom));
	$comments        = Methods::strtocapital(Methods::validate_string($request->comments));
	$added_by        = Methods::validate_string($request->entered_by);
	$response        = array();

	if($request) {
		$patient = Methods::read_patientname($patient_id, $conn);
		$result  = Cortisol::update_cortisol($id, $patient_id, $cortisol_top, $cortisol_bottom, $comments, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "Cortisol Lab Updated Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Updated Cortisol Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "Cortisol Lab Could Not Be UpdatedPlease Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Update Cortisol Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>