<?php
	require "classes/conn.php";
	require "classes/bue_creatinine_lft.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$labs = BueCreatinineLFT::read_bue_creatinine_lfts($conn);
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
			"chloride" => $lab->chloride,
			"chloride_flag" => $lab->chloride_flag,
			"creatinine" => $lab->creatinine,
			"creatinine_flag" => $lab->creatinine_flag,
			"egfr" => $lab->egfr,
			"potassium" => $lab->potassium,
			"potassium_flag" => $lab->potassium_flag,
			"sodium" => $lab->sodium,
			"sodium_flag" => $lab->sodium_flag,
			"urea" => $lab->urea,
			"urea_flag" => $lab->urea_flag,
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
			"ggt" => $lab->ggt,
			"ggt_flag" => $lab->ggt_flag,
			"globulin" => $lab->globulin,
			"globulin_flag" => $lab->globulin_flag,
			"got_ast" => $lab->got_ast,
			"got_ast_flag" => $lab->got_ast_flag,
			"gpt_alt" => $lab->gpt_alt,
			"gpt_alt_flag" => $lab->gpt_alt_flag,
			"protein_total" => $lab->protein_total,
			"protein_total_flag" => $lab->protein_total_flag,
			"comments" => $lab->comments,
		));
	}

    $pdo->close();
	echo json_encode($response);
?>