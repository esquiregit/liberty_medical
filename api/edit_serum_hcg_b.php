<?php
	require "classes/serum_hcg_b.php";

	header('Content-Type: application/json');
	$conn        = $pdo->open();
	$data 	     = file_get_contents("php://input");
	$request     = json_decode($data);
	$id  		 = Methods::validate_string($request->id);
	$patient_id  = Methods::validate_string($request->patient_id);
	$patient     = Methods::validate_string($request->patient);
	$results     = Methods::strtocapital(Methods::validate_string($request->results));
	$ranges      = Methods::strtocapital(Methods::validate_string($request->ranges));
	$comments    = Methods::strtocapital(Methods::validate_string($request->comments));
	$added_by    = Methods::validate_string($request->entered_by);
	$response    = array();

	if($request) {
		$result = SerumHCGB::update_serum_hcg_b($id, $patient_id, $results, $ranges, $comments, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "B-HCG Serum Lab Updated Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Updated B-HCG Serum Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "B-HCG Serum Lab Could Not Be Updated. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Update B-HCG Serum Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>