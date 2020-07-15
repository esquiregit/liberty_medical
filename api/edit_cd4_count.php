<?php
	require "classes/cd4_count.php";

	header('Content-Type: application/json');
	$conn           = $pdo->open();
	$data 	        = file_get_contents("php://input");
	$request        = json_decode($data);
	$id   		    = Methods::validate_string($request->id);
	$patient_id     = Methods::validate_string($request->patient_id);
	$t_wbc          = Methods::strtocapital(Methods::validate_string($request->t_wbc));
	$t_wbc_flag     = Methods::strtocapital(Methods::validate_string($request->t_wbc_flag));
	$cd4_count      = Methods::strtocapital(Methods::validate_string($request->cd4_count));
	$cd4_count_flag = Methods::strtocapital(Methods::validate_string($request->cd4_count_flag));
	$cd3            = Methods::strtocapital(Methods::validate_string($request->cd3));
	$cd3_flag       = Methods::strtocapital(Methods::validate_string($request->cd3_flag));
	$cd4_cd3        = Methods::strtocapital(Methods::validate_string($request->cd4_cd3));
	$cd4_cd3_flag   = Methods::strtocapital(Methods::validate_string($request->cd4_cd3_flag));
	$comments       = Methods::strtocapital(Methods::validate_string($request->comments));
	$added_by       = Methods::validate_string($request->entered_by);
	$response       = array();

	if($request) {
		$patient = Methods::read_patientname($patient_id, $conn);
		$result  = CD4Count::update_cd4_count($id, $patient_id, $t_wbc, $t_wbc_flag, $cd4_count, $cd4_count_flag, $cd3, $cd3_flag, $cd4_cd3, $cd4_cd3_flag, $comments, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "CD4 Count Lab Updated Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Updated CD4 Count Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "CD4 Count Lab Could Not Be Updated. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Update CD4 Count Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>