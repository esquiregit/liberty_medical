<?php
	require "classes/rheumatology.php";

	header('Content-Type: application/json');
	$conn              = $pdo->open();
	$data 	           = file_get_contents("php://input");
	$request           = json_decode($data);//die(print_r($request));
	$patient_id        = Methods::validate_string($request->patient_id);
	$patient           = Methods::validate_string($request->patient);
	$le_cells          = Methods::validate_array($request->le_cells);
	$ana_qualitative   = Methods::strtocapital(Methods::validate_string($request->ana_qualitative));
	$ana_quantitative  = Methods::strtocapital(Methods::validate_string($request->ana_quantitative));
	$ds_dna            = Methods::strtocapital(Methods::validate_string($request->ds_dna));
	$rheumatoid_factor = Methods::strtocapital(Methods::validate_string($request->rheumatoid_factor));
	$comments          = Methods::strtocapital(Methods::validate_string($request->comments));
	$added_by          = Methods::validate_string($request->entered_by);
	$response          = array();

	if($request) {
		$result = Rheumatology::create_rheumatology($patient_id, $le_cells, $ana_qualitative, $ana_quantitative, $ds_dna, $rheumatoid_factor, $comments, $added_by, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "Rheumatology Lab Added Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Added Rheumatology Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "Rheumatology Lab Could Not Be Added. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Add Rheumatology Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>