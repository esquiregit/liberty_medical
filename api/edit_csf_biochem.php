<?php
	require "classes/csf_biochem.php";

	header('Content-Type: application/json');
	$conn        = $pdo->open();
	$data 	     = file_get_contents("php://input");
	$request     = json_decode($data);
	$id  		 = Methods::validate_string($request->id);
	$patient_id  = Methods::validate_string($request->patient_id);
	$appearance  = Methods::validate_array($request->appearance);
	$glucose     = Methods::strtocapital(Methods::validate_string($request->glucose));
	$protein     = Methods::strtocapital(Methods::validate_string($request->protein));
	$globulin    = Methods::validate_array($request->globulin);
	$comments    = Methods::strtocapital(Methods::validate_string($request->comments));
	$added_by    = Methods::validate_string($request->entered_by);
	$response    = array();

	if($request) {
		$patient = Methods::read_patientname($patient_id, $conn);
		$result  = CSFBiochem::update_csf_biochem($id, $patient_id, $appearance, $glucose, $protein, $globulin, $comments, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "CSF Biochem Lab Updated Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Updated CSF Biochem Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "CSF Biochem Lab Could Not Be Updated. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Update CSF Biochem Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>