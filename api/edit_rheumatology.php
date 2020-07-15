<?php
	require "classes/rheumatology.php";

	header('Content-Type: application/json');
	$conn              = $pdo->open();
	$data 	           = file_get_contents("php://input");
	$request           = json_decode($data);
	$id       		   = Methods::validate_string($request->id);
	$patient_id        = Methods::validate_string($request->patient_id);
	$le_cells          = Methods::validate_array($request->le_cells);
	$ana_qualitative   = Methods::strtocapital(Methods::validate_string($request->ana_qualitative));
	$ana_quantitative  = Methods::strtocapital(Methods::validate_string($request->ana_quantitative));
	$ds_dna            = Methods::strtocapital(Methods::validate_string($request->ds_dna));
	$rheumatoid_factor = Methods::strtocapital(Methods::validate_string($request->rheumatoid_factor));
	$comments          = Methods::strtocapital(Methods::validate_string($request->comments));
	$added_by          = Methods::validate_string($request->entered_by);
	$response          = array();

	if($request) {
		$patient = Methods::read_patientname($patient_id, $conn);
		$result  = Rheumatology::update_rheumatology($id, $patient_id, $le_cells, $ana_qualitative, $ana_quantitative, $ds_dna, $rheumatoid_factor, $comments, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "Rheumatology Lab Updated Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Updated Rheumatology Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "Rheumatology Lab Could Not Be Updated. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Update Rheumatology Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>