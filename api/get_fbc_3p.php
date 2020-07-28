<?php
	require "classes/conn.php";
	require "classes/fbc_3p.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$labs = FBC_3P::read_fbc_3ps($conn);
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
			"gran_info" => $lab->gran_info,
			"gran_three" => $lab->gran_three,
			"gran_three_info" => $lab->gran_three_info,
			"hct" => $lab->hct,
			"hct_info" => $lab->hct_info,
			"hgb" => $lab->hgb,
			"hgb_info" => $lab->hgb_info,
			"lym" => $lab->lym,
			"lym_info" => $lab->lym_info,
			"lym_one" => $lab->lym_one,
			"lym_one_info" => $lab->lym_one_info,
			"mch" => $lab->mch,
			"mch_info" => $lab->mch_info,
			"mchc" => $lab->mchc,
			"mchc_info" => $lab->mchc_info,
			"mcv" => $lab->mcv,
			"mcv_info" => $lab->mcv_info,
			"mid" => $lab->mid,
			"mid_info" => $lab->mid_info,
			"mid_two" => $lab->mid_two,
			"mid_two_info" => $lab->mid_two_info,
			"mpv" => $lab->mpv,
			"mpv_info" => $lab->mpv_info,
			"pct" => $lab->pct,
			"pct_info" => $lab->pct_info,
			"pdw" => $lab->pdw,
			"pdw_info" => $lab->pdw_info,
			"plt" => $lab->plt,
			"plt_info" => $lab->plt_info,
			"rbc" => $lab->rbc,
			"rbc_info" => $lab->rbc_info,
			"rdw_cv" => $lab->rdw_cv,
			"rdw_cv_info" => $lab->rdw_cv_info,
			"rdw_sd" => $lab->rdw_sd,
			"rdw_sd_info" => $lab->rdw_sd_info,
			"sickling_test" => $lab->sickling_test,
			"wbc" => $lab->wbc,
			"wbc_info" => $lab->wbc_info,
		));
	}

    $pdo->close();
	echo json_encode($response);
?>