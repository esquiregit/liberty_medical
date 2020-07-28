<?php
	require "classes/conn.php";
	require "classes/fbc_children.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$labs = FBC_Children::read_fbc_childrens($conn);
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
			"bf_mps" => $lab->bf_mps,
			"blood_film_comment" => $lab->blood_film_comment,
			"esr" => $lab->esr,
			"gran" => $lab->gran,
			"gran_flag" => $lab->gran_flag,
			"gran_three" => $lab->gran_three,
			"gran_three_flag" => $lab->gran_three_flag,
			"hct" => $lab->hct,
			"hct_flag" => $lab->hct_flag,
			"hgb" => $lab->hgb,
			"hgb_flag" => $lab->hgb_flag,
			"lym" => $lab->lym,
			"lym_flag" => $lab->lym_flag,
			"lym_one" => $lab->lym_one,
			"lym_one_flag" => $lab->lym_one_flag,
			"mch" => $lab->mch,
			"mch_flag" => $lab->mch_flag,
			"mchc" => $lab->mchc,
			"mchc_flag" => $lab->mchc_flag,
			"mcv" => $lab->mcv,
			"mcv_flag" => $lab->mcv_flag,
			"mid" => $lab->mid,
			"mid_flag" => $lab->mid_flag,
			"mid_two" => $lab->mid_two,
			"mid_two_flag" => $lab->mid_two_flag,
			"mpv" => $lab->mpv,
			"mpv_flag" => $lab->mpv_flag,
			"pct" => $lab->pct,
			"pct_flag" => $lab->pct_flag,
			"pdw" => $lab->pdw,
			"pdw_flag" => $lab->pdw_flag,
			"plt" => $lab->plt,
			"plt_flag" => $lab->plt_flag,
			"rbc" => $lab->rbc,
			"rbc_flag" => $lab->rbc_flag,
			"rdw_cv" => $lab->rdw_cv,
			"rdw_cv_flag" => $lab->rdw_cv_flag,
			"rdw_sd" => $lab->rdw_sd,
			"rdw_sd_flag" => $lab->rdw_sd_flag,
			"sickling_test" => $lab->sickling_test,
			"wbc" => $lab->wbc,
			"wbc_flag" => $lab->wbc_flag,
		));
	}

    $pdo->close();
	echo json_encode($response);
?>