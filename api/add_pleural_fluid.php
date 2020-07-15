<?php
	require "classes/pleural_fluid.php";

	header('Content-Type: application/json');
	$conn                  = $pdo->open();
	$data 	               = file_get_contents("php://input");
	$request               = json_decode($data);
	$patient_id            = Methods::validate_string($request->patient_id);
	$patient               = Methods::validate_string($request->patient);
	$colour                = Methods::strtocapital(Methods::validate_string($request->colour));
	$appearance            = Methods::strtocapital(Methods::validate_string($request->appearance));
	$appearance_dropdown   = Methods::validate_array($request->appearance_dropdown);
	$gram_stain            = Methods::validate_array($request->gram_stain);
	$acid_fast_bacilli     = Methods::strtocapital(Methods::validate_string($request->acid_fast_bacilli));
	$ph                    = Methods::strtocapital(Methods::validate_string($request->ph));
	$glucose               = Methods::strtocapital(Methods::validate_string($request->glucose));
	$total_protein         = Methods::strtocapital(Methods::validate_string($request->total_protein));
	$pleural_fluid_albumin = Methods::strtocapital(Methods::validate_string($request->pleural_fluid_albumin));
	$ldh     			   = Methods::strtocapital(Methods::validate_string($request->ldh));
	$total_wbc_one         = Methods::strtocapital(Methods::validate_string($request->total_wbc_one));
	$total_wbc_two         = Methods::strtocapital(Methods::validate_string($request->total_wbc_two));
	$lymphocytes_one       = Methods::strtocapital(Methods::validate_string($request->lymphocytes_one));
	$lymphocytes_two       = Methods::strtocapital(Methods::validate_string($request->lymphocytes_two));
	$monocytes_one         = Methods::strtocapital(Methods::validate_string($request->monocytes_one));
	$monocytes_two         = Methods::strtocapital(Methods::validate_string($request->monocytes_two));
	$granulocytes_one      = Methods::strtocapital(Methods::validate_string($request->granulocytes_one));
	$granulocytes_two      = Methods::strtocapital(Methods::validate_string($request->granulocytes_two));
	$comments              = Methods::strtocapital(Methods::validate_string($request->comments));
	$added_by              = Methods::validate_string($request->entered_by);
	$response              = array();

	if($request) {
		$result = PleuralFluid::create_pleural_fluid($patient_id, $colour, $appearance, $appearance_dropdown, $gram_stain, $acid_fast_bacilli, $ph, $glucose, $total_protein, $pleural_fluid_albumin, $ldh, $total_wbc_one, $total_wbc_two, $lymphocytes_one, $lymphocytes_two, $monocytes_one, $monocytes_two, $granulocytes_one, $granulocytes_two, $comments, $added_by, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "Pleural Fluid Lab Added Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Added Pleural Fluid Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "Pleural Fluid Lab Could Not Be Added. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Add Pleural Fluid Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>