<?php
	require "classes/conn.php";
	require "classes/compact_chemistry.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$labs = CompactChemistry::read_compact_chemistrys($conn);
	$response = array();

	foreach ($labs as $lab) {
		array_push($response, array(
			"date_added" => date_format(date_create($lab->date_added), 'd F Y \a\t H:i:s'),
			"date_of_birth" => date_format(date_create($lab->date_of_birth
			), 'd F Y'),
			"gender" => $lab->gender,
			"id" => $lab->id,
			"invoice_id" => $lab->invoice_id,
			"patient_id" => $lab->patient_id,
			"first_name" => $lab->pfirst_name,
			"middle_name" => $lab->pmiddle_name,
			"last_name" => $lab->plast_name,
			'name'     => $lab->pmiddle_name ? $lab->pfirst_name.' '.$lab->pmiddle_name.' '.$lab->plast_name : $lab->pfirst_name.' '.$lab->plast_name,
			'staff'    => $lab->uother_name ? $lab->ufirst_name.' '.$lab->uother_name.' '.$lab->ulast_name : $lab->ufirst_name.' '.$lab->ulast_name,
			"albumin" => $lab->albumin,
			"albumin_flag" => $lab->albumin_flag,
			"alkaline_phos" => $lab->alkaline_phos,
			"alkaline_phos_flag" => $lab->alkaline_phos_flag,
			"bili_indirect" => $lab->bili_indirect,
			"bili_indirect_flag" => $lab->bili_indirect_flag,
			"bilirubin_direct" => $lab->bilirubin_direct,
			"bilirubin_direct_flag" => $lab->bilirubin_direct_flag,
			"bilirubin_total" => $lab->bilirubin_total,
			"bilirubin_total_flag" => $lab->bilirubin_total_flag,
			"chloride" => $lab->chloride,
			"chloride_flag" => $lab->chloride_flag,
			"cholesterol_total" => $lab->cholesterol_total,
			"cholesterol_total_flag" => $lab->cholesterol_total_flag,
			"coronary_risk" => $lab->coronary_risk,
			"coronary_risk_flag" => $lab->coronary_risk_flag,
			"creatinine" => $lab->creatinine,
			"creatinine_flag" => $lab->creatinine_flag,
			"fbs" => $lab->fbs,
			"fbs_flag" => $lab->fbs_flag,
			"ggt" => $lab->ggt,
			"ggt_flag" => $lab->ggt_flag,
			"globulin" => $lab->globulin,
			"globulin_flag" => $lab->globulin_flag,
			"got_ast" => $lab->got_ast,
			"got_ast_flag" => $lab->got_ast_flag,
			"gpt_alt" => $lab->gpt_alt,
			"gpt_alt_flag" => $lab->gpt_alt_flag,
			"hdl" => $lab->hdl,
			"hdl_flag" => $lab->hdl_flag,
			"ldl" => $lab->ldl,
			"ldl_flag" => $lab->ldl_flag,
			"potassium" => $lab->potassium,
			"potassium_flag" => $lab->potassium_flag,
			"sodium" => $lab->sodium,
			"sodium_flag" => $lab->sodium_flag,
			"protein_total" => $lab->protein_total,
			"protein_total_flag" => $lab->protein_total_flag,
			"triglycerides" => $lab->triglycerides,
			"triglycerides_flag" => $lab->triglycerides_flag,
			"urea" => $lab->urea,
			"urea_flag" => $lab->urea_flag,
			"urea" => $lab->urea,
			"urea_flag" => $lab->urea_flag,
			"uric_acid" => $lab->uric_acid,
			"uric_acid_flag" => $lab->uric_acid_flag,
			"comments" => $lab->comments,
		));
	}

    $pdo->close();
	echo json_encode($response);
?>