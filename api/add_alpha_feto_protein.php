<?php
	require "classes/alpha_feto_protein.php";

	header('Content-Type: application/json');
	$conn       = $pdo->open();
	$data 	    = file_get_contents("php://input");
	$request    = json_decode($data);//die(print_r($request));
	$patient_id = Methods::validate_string($request->patient_id);
	$patient    = Methods::validate_string($request->patient);
	$results    = Methods::strtocapital(Methods::validate_string($request->results));
	$comments   = Methods::strtocapital(Methods::validate_string($request->comments));
	$added_by   = Methods::validate_string($request->entered_by);
	$response   = array();

	if(!empty($patient_id) && !empty($patient) && !empty($results) && !empty($comments) && !empty($added_by)) {
		$result = AlphaFetoProtein::create_alpha_feto_protein($patient_id, $results, $comments, $added_by, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "Alpha Feto Protein Lab Added Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Added Alpha Feto Protein Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "Alpha Feto Protein Lab Could Not Be Added. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Add Alpha Feto Protein Lab For '.$patient, $conn);
		}
	} else {
		array_push($response, array(
			"status"  => "Failure",
			"message" => "Operation Failed. Please Try Again...."
		));
	}

    $pdo->close();
	echo json_encode($response);
?>