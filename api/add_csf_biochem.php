<?php
	require "classes/csf_biochem.php";

	header('Content-Type: application/json');
	$conn        = $pdo->open();
	$data 	     = file_get_contents("php://input");
	$request     = json_decode($data);
	$patient_id  = Methods::validate_string($request->patient_id);
	$patient     = Methods::validate_string($request->patient);
	$appearance  = Methods::validate_array($request->appearance);
	$glucose     = Methods::validate_string($request->glucose);
	$protein     = Methods::validate_string($request->protein);
	$globulin    = Methods::validate_array($request->globulin);
	$comments    = Methods::strtocapital(Methods::validate_string($request->comments));
	$added_by    = Methods::validate_string($request->entered_by);
	$response    = array();

	if($request) {
		$result = CSFBiochem::create_csf_biochem($patient_id, $appearance, $glucose, $protein, $globulin, $comments, $added_by, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "CSF Biochem Lab Added Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Added CSF Biochem Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "CSF Biochem Lab Could Not Be Added. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Add CSF Biochem Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>