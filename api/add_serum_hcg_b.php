<?php
	require "classes/serum_hcg_b.php";

	header('Content-Type: application/json');
	$conn        = $pdo->open();
	$data 	     = file_get_contents("php://input");
	$request     = json_decode($data);
	$patient_id  = Methods::validate_string($request->patient_id);
	$patient     = Methods::validate_string($request->patient);
	$results     = Methods::strtocapital(Methods::validate_string($request->results));
	$ranges      = Methods::strtocapital(Methods::validate_string($request->ranges));
	$comments    = Methods::strtocapital(Methods::validate_string($request->comments));
	$added_by    = Methods::validate_string($request->entered_by);
	$response    = array();

	if($request) {
		$result = SerumHCGB::create_serum_hcg_b($patient_id, $results, $ranges, $comments, $added_by, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "B-HCG Serum Lab Added Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Added B-HCG Serum Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "B-HCG Serum Lab Could Not Be Added. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Add B-HCG Serum Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>