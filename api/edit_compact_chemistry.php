<?php
	require "classes/compact_chemistry.php";

	header('Content-Type: application/json');
	$conn                   = $pdo->open();
	$data 	                = file_get_contents("php://input");
	$request                = json_decode($data);
	$id                     = Methods::validate_string($request->id);
	$patient_id             = Methods::validate_string($request->patient_id);
	$sodium                 = Methods::strtocapital(Methods::validate_string($request->sodium));
	$sodium_flag            = Methods::strtocapital(Methods::validate_string($request->sodium_flag));
	$potassium              = Methods::strtocapital(Methods::validate_string($request->potassium));
	$potassium_flag         = Methods::strtocapital(Methods::validate_string($request->potassium_flag));
	$chloride               = Methods::strtocapital(Methods::validate_string($request->chloride));
	$chloride_flag          = Methods::strtocapital(Methods::validate_string($request->chloride_flag));
	$urea                   = Methods::strtocapital(Methods::validate_string($request->urea));
	$urea_flag              = Methods::strtocapital(Methods::validate_string($request->urea_flag));
	$creatinine             = Methods::strtocapital(Methods::validate_string($request->creatinine));
	$creatinine_flag        = Methods::strtocapital(Methods::validate_string($request->creatinine_flag));
	$got_ast                = Methods::strtocapital(Methods::validate_string($request->got_ast));
	$got_ast_flag           = Methods::strtocapital(Methods::validate_string($request->got_ast_flag));
	$gpt_alt                = Methods::strtocapital(Methods::validate_string($request->gpt_alt));
	$gpt_alt_flag           = Methods::strtocapital(Methods::validate_string($request->gpt_alt_flag));
	$alkaline_phos          = Methods::strtocapital(Methods::validate_string($request->alkaline_phos));
	$alkaline_phos_flag     = Methods::strtocapital(Methods::validate_string($request->alkaline_phos_flag));
	$ggt                    = Methods::strtocapital(Methods::validate_string($request->ggt));
	$ggt_flag               = Methods::strtocapital(Methods::validate_string($request->ggt_flag));
	$bilirubin_total        = Methods::strtocapital(Methods::validate_string($request->bilirubin_total));
	$bilirubin_total_flag   = Methods::strtocapital(Methods::validate_string($request->bilirubin_total_flag));
	$bili_indirect          = Methods::strtocapital(Methods::validate_string($request->bili_indirect));
	$bili_indirect_flag     = Methods::strtocapital(Methods::validate_string($request->bili_indirect_flag));
	$bilirubin_direct       = Methods::strtocapital(Methods::validate_string($request->bilirubin_direct));
	$bilirubin_direct_flag  = Methods::strtocapital(Methods::validate_string($request->bilirubin_direct_flag));
	$protein_total          = Methods::strtocapital(Methods::validate_string($request->protein_total));
	$protein_total_flag     = Methods::strtocapital(Methods::validate_string($request->protein_total_flag));
	$albumin                = Methods::strtocapital(Methods::validate_string($request->albumin));
	$albumin_flag           = Methods::strtocapital(Methods::validate_string($request->albumin_flag));
	$globulin               = Methods::strtocapital(Methods::validate_string($request->globulin));
	$globulin_flag          = Methods::strtocapital(Methods::validate_string($request->globulin_flag));
	$cholesterol_total      = Methods::strtocapital(Methods::validate_string($request->cholesterol_total));
	$cholesterol_total_flag = Methods::strtocapital(Methods::validate_string($request->cholesterol_total_flag));
	$triglycerides          = Methods::strtocapital(Methods::validate_string($request->triglycerides));
	$triglycerides_flag     = Methods::strtocapital(Methods::validate_string($request->triglycerides_flag));
	$alkaline_phos          = Methods::strtocapital(Methods::validate_string($request->alkaline_phos));
	$alkaline_phos_flag     = Methods::strtocapital(Methods::validate_string($request->alkaline_phos_flag));
	$hdl                    = Methods::strtocapital(Methods::validate_string($request->hdl));
	$hdl_flag               = Methods::strtocapital(Methods::validate_string($request->hdl_flag));
	$ldl                    = Methods::strtocapital(Methods::validate_string($request->ldl));
	$ldl_flag               = Methods::strtocapital(Methods::validate_string($request->ldl_flag));
	$coronary_risk          = Methods::strtocapital(Methods::validate_string($request->coronary_risk));
	$coronary_risk_flag     = Methods::strtocapital(Methods::validate_string($request->coronary_risk_flag));
	$uric_acid              = Methods::strtocapital(Methods::validate_string($request->uric_acid));
	$uric_acid_flag         = Methods::strtocapital(Methods::validate_string($request->uric_acid_flag));
	$fbs                    = Methods::strtocapital(Methods::validate_string($request->fbs));
	$fbs_flag               = Methods::strtocapital(Methods::validate_string($request->fbs_flag));
	$comments               = Methods::strtocapital(Methods::validate_string($request->comments));
	$added_by        		= Methods::validate_string($request->entered_by);
	$response               = array();
	
	if($request) {
		$patient = Methods::read_patientname($patient_id, $conn);
		$result  = CompactChemistry::update_compact_chemistry($id, $patient_id, $sodium, $sodium_flag, $potassium, $potassium_flag, $chloride, $chloride_flag, $urea, $urea_flag, $creatinine, $creatinine_flag, $got_ast, $got_ast_flag, $gpt_alt, $gpt_alt_flag, $alkaline_phos, $alkaline_phos_flag, $ggt, $ggt_flag, $bilirubin_total, $bilirubin_total_flag, $bili_indirect, $bili_indirect_flag, $bilirubin_direct, $bilirubin_direct_flag, $protein_total, $protein_total_flag, $albumin, $albumin_flag, $globulin, $globulin_flag, $cholesterol_total, $cholesterol_total_flag, $triglycerides, $triglycerides_flag, $hdl, $hdl_flag, $ldl, $ldl_flag, $coronary_risk, $coronary_risk_flag, $uric_acid, $uric_acid_flag, $fbs, $fbs_flag, $comments, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "Compact Chemistry Lab Updated Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Updated Compact Chemistry Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "Compact Chemistry Lab Could Not Be Updated. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Update Compact Chemistry Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>