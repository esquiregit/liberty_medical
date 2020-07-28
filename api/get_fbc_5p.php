<?php
	require "classes/conn.php";
	require "classes/fbc_5p.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$labs = FBC_5P::read_fbc_5ps($conn);
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
			"bas_hash" => $lab->bas_hash,
			"bas_hash_flag" => $lab->bas_hash_flag,
			"bas_percent" => $lab->bas_percent,
			"bas_percent_flag" => $lab->bas_percent_flag,
			"bf_mps" => $lab->bf_mps,
			"blood_film_comment" => $lab->blood_film_comment,
			"eos_hash" => $lab->eos_hash,
			"eos_hash_flag" => $lab->eos_hash_flag,
			"eos_percent" => $lab->eos_percent,
			"eos_percent_flag" => $lab->eos_percent_flag,
			"esr" => $lab->esr,
			"hct" => $lab->hct,
			"hct_flag" => $lab->hct_flag,
			"hgb" => $lab->hgb,
			"hgb_flag" => $lab->hgb_flag,
			"lym_hash" => $lab->lym_hash,
			"lym_hash_flag" => $lab->lym_hash_flag,
			"lym_percent" => $lab->lym_percent,
			"lym_percent_flag" => $lab->lym_percent_flag,
			"mch" => $lab->mch,
			"mch_flag" => $lab->mch_flag,
			"mchc" => $lab->mchc,
			"mchc_flag" => $lab->mchc_flag,
			"mcv" => $lab->mcv,
			"mcv_flag" => $lab->mcv_flag,
			"mon_hash" => $lab->mon_hash,
			"mon_hash_flag" => $lab->mon_hash_flag,
			"mon_percent" => $lab->mon_percent,
			"mon_percent_flag" => $lab->mon_percent_flag,
			"mpv" => $lab->mpv,
			"mpv_flag" => $lab->mpv_flag,
			"neu_hash" => $lab->neu_hash,
			"neu_hash_flag" => $lab->neu_hash_flag,
			"neu_percent" => $lab->neu_percent,
			"neu_percent_flag" => $lab->neu_percent_flag,
			"p_lcc" => $lab->p_lcc,
			"p_lcc_flag" => $lab->p_lcc_flag,
			"p_lcr" => $lab->p_lcr,
			"p_lcr_flag" => $lab->p_lcr_flag,
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