<?php
	require "classes/calcium_profile.php";

	header('Content-Type: application/json');
	$conn                        = $pdo->open();
	$data 	                     = file_get_contents("php://input");
	$request                     = json_decode($data);
	$id                		     = Methods::validate_string($request->id);
	$patient_id                  = Methods::validate_string($request->patient_id);
	$s_calcium_total             = Methods::strtocapital(Methods::validate_string($request->s_calcium_total));
	$s_calcium_total_flag        = Methods::strtocapital(Methods::validate_string($request->s_calcium_total_flag));
	$s_ionized_calcium_calc      = Methods::strtocapital(Methods::validate_string($request->s_ionized_calcium_calc));
	$s_ionized_calcium_calc_flag = Methods::strtocapital(Methods::validate_string($request->s_ionized_calcium_calc_flag));
	$s_albumin                   = Methods::strtocapital(Methods::validate_string($request->s_albumin));
	$s_albumin_flag              = Methods::strtocapital(Methods::validate_string($request->s_albumin_flag));
	$s_total_protein             = Methods::strtocapital(Methods::validate_string($request->s_total_protein));
	$s_total_protein_flag        = Methods::strtocapital(Methods::validate_string($request->s_total_protein_flag));
	$corrected_calcium_calc      = Methods::strtocapital(Methods::validate_string($request->corrected_calcium_calc));
	$comments                    = Methods::strtocapital(Methods::validate_string($request->comments));
	$added_by                    = Methods::validate_string($request->entered_by);
	$response                    = array();

	if($request) {
		$patient = Methods::read_patientname($patient_id, $conn);
		$result  = CalciumProfile::update_calcium_profile($id, $patient_id, $s_calcium_total, $s_calcium_total_flag, $s_ionized_calcium_calc, $s_ionized_calcium_calc_flag, $s_albumin, $s_albumin_flag, $s_total_protein, $s_total_protein_flag, $corrected_calcium_calc, $comments, $added_by, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "Calcium Profile Lab Updated Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Updated Calcium Profile Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "Calcium Profile Lab Could Not Be Updated. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Update Calcium Profile Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>