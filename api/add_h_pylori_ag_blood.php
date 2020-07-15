<?php
	require "classes/h_pylori_ag_blood.php";

	header('Content-Type: application/json');
	$conn        = $pdo->open();
	$data 	     = file_get_contents("php://input");
	$request     = json_decode($data);
	$patient_id  = Methods::validate_string($request->patient_id);
	$patient     = Methods::validate_string($request->patient);
	$h_pylori_ag = Methods::strtocapital(Methods::validate_string($request->h_pylori_ag));
	$comments    = Methods::strtocapital(Methods::validate_string($request->comments));
	$added_by    = Methods::validate_string($request->entered_by);
	$response    = array();

	if($request) {
		$result = HPyloriAgBlood::create_h_pylori_ag_blood($patient_id, $h_pylori_ag, $comments, $added_by, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "H. Pylori Ag. Blood Lab Updated Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Updated H. Pylori Ag. Blood Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "H. Pylori Ag. Blood Lab Could Not Be Updated. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Update H. Pylori Ag. Blood Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>