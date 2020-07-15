<?php
	require "classes/bue_creatinine_lft.php";

	header('Content-Type: application/json');
	$conn                  = $pdo->open();
	$data 	               = file_get_contents("php://input");
	$request               = json_decode($data);
	$id                    = Methods::validate_string($request->id);
	$patient_id            = Methods::validate_string($request->patient_id);
	$sodium                = Methods::strtocapital(Methods::validate_string($request->sodium));
	$sodium_flag           = Methods::strtocapital(Methods::validate_string($request->sodium_flag));
	$potassium             = Methods::strtocapital(Methods::validate_string($request->potassium));
	$potassium_flag        = Methods::strtocapital(Methods::validate_string($request->potassium_flag));
	$chloride              = Methods::strtocapital(Methods::validate_string($request->chloride));
	$chloride_flag         = Methods::strtocapital(Methods::validate_string($request->chloride_flag));
	$urea                  = Methods::strtocapital(Methods::validate_string($request->urea));
	$urea_flag             = Methods::strtocapital(Methods::validate_string($request->urea_flag));
	$creatinine            = Methods::strtocapital(Methods::validate_string($request->creatinine));
	$creatinine_flag       = Methods::strtocapital(Methods::validate_string($request->creatinine_flag));
	$egfr                  = Methods::strtocapital(Methods::validate_string($request->egfr));
	$got_ast               = Methods::strtocapital(Methods::validate_string($request->got_ast));
	$got_ast_flag          = Methods::strtocapital(Methods::validate_string($request->got_ast_flag));
	$gpt_alt               = Methods::strtocapital(Methods::validate_string($request->gpt_alt));
	$gpt_alt_flag          = Methods::strtocapital(Methods::validate_string($request->gpt_alt_flag));
	$alkaline_phos         = Methods::strtocapital(Methods::validate_string($request->alkaline_phos));
	$alkaline_phos_flag    = Methods::strtocapital(Methods::validate_string($request->alkaline_phos_flag));
	$ggt                   = Methods::strtocapital(Methods::validate_string($request->ggt));
	$ggt_flag              = Methods::strtocapital(Methods::validate_string($request->ggt_flag));
	$bilirubin_total       = Methods::strtocapital(Methods::validate_string($request->bilirubin_total));
	$bilirubin_total_flag  = Methods::strtocapital(Methods::validate_string($request->bilirubin_total_flag));
	$bili_indirect         = Methods::strtocapital(Methods::validate_string($request->bili_indirect));
	$bili_indirect_flag    = Methods::strtocapital(Methods::validate_string($request->bili_indirect_flag));
	$bilirubin_direct      = Methods::strtocapital(Methods::validate_string($request->bilirubin_direct));
	$bilirubin_direct_flag = Methods::strtocapital(Methods::validate_string($request->bilirubin_direct_flag));
	$protein_total         = Methods::strtocapital(Methods::validate_string($request->protein_total));
	$protein_total_flag    = Methods::strtocapital(Methods::validate_string($request->protein_total_flag));
	$albumin               = Methods::strtocapital(Methods::validate_string($request->albumin));
	$albumin_flag          = Methods::strtocapital(Methods::validate_string($request->albumin_flag));
	$globulin              = Methods::strtocapital(Methods::validate_string($request->globulin));
	$globulin_flag         = Methods::strtocapital(Methods::validate_string($request->globulin_flag));
	$comments              = Methods::strtocapital(Methods::validate_string($request->comments));
	$added_by        	   = Methods::validate_string($request->entered_by);
	$response              = array();

	if($request) {
		$patient = Methods::read_patientname($patient_id, $conn);
		$result  = BueCreatinineLFT::update_bue_creatinine_lft($id, $patient_id, $sodium, $sodium_flag, $potassium, $potassium_flag, $chloride, $chloride_flag, $urea, $urea_flag, $creatinine, $creatinine_flag, $egfr, $got_ast, $got_ast_flag, $gpt_alt, $gpt_alt_flag, $alkaline_phos, $alkaline_phos_flag, $ggt, $ggt_flag, $bilirubin_total, $bilirubin_total_flag, $bili_indirect, $bili_indirect_flag, $bilirubin_direct, $bilirubin_direct_flag, $protein_total, $protein_total_flag, $albumin, $albumin_flag, $globulin, $globulin_flag, $comments, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "BUE LFT Lab Added Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Added BUE LFT Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "BUE LFT Lab Could Not Be Added. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Add BUE LFT Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>