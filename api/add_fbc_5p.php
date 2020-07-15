<?php
	require "classes/fbc_5p.php";

	header('Content-Type: application/json');
	$conn               = $pdo->open();
	$data 	            = file_get_contents("php://input");
	$request            = json_decode($data);
	$patient_id         = Methods::validate_string($request->patient_id);
	$patient            = Methods::validate_string($request->patient);
	$wbc                = Methods::strtocapital(Methods::validate_string($request->wbc));
	$wbc_flag           = Methods::strtocapital(Methods::validate_string($request->wbc_flag));
	$neu_hash           = Methods::strtocapital(Methods::validate_string($request->neu_hash));
	$neu_hash_flag      = Methods::strtocapital(Methods::validate_string($request->neu_hash_flag));
	$lym_hash           = Methods::strtocapital(Methods::validate_string($request->lym_hash));
	$lym_hash_flag      = Methods::strtocapital(Methods::validate_string($request->lym_hash_flag));
	$mon_hash           = Methods::strtocapital(Methods::validate_string($request->mon_hash));
	$mon_hash_flag      = Methods::strtocapital(Methods::validate_string($request->mon_hash_flag));
	$eos_hash           = Methods::strtocapital(Methods::validate_string($request->eos_hash));
	$eos_hash_flag      = Methods::strtocapital(Methods::validate_string($request->eos_hash_flag));
	$bas_hash           = Methods::strtocapital(Methods::validate_string($request->bas_hash));
	$bas_hash_flag      = Methods::strtocapital(Methods::validate_string($request->bas_hash_flag));
	$neu_percent        = Methods::strtocapital(Methods::validate_string($request->neu_percent));
	$neu_percent_flag   = Methods::strtocapital(Methods::validate_string($request->neu_percent_flag));
	$lym_percent        = Methods::strtocapital(Methods::validate_string($request->lym_percent));
	$lym_percent_flag   = Methods::strtocapital(Methods::validate_string($request->lym_percent_flag));
	$mon_percent        = Methods::strtocapital(Methods::validate_string($request->mon_percent));
	$mon_percent_flag   = Methods::strtocapital(Methods::validate_string($request->mon_percent_flag));
	$eos_percent        = Methods::strtocapital(Methods::validate_string($request->eos_percent));
	$eos_percent_flag   = Methods::strtocapital(Methods::validate_string($request->eos_percent_flag));
	$bas_percent        = Methods::strtocapital(Methods::validate_string($request->bas_percent));
	$bas_percent_flag   = Methods::strtocapital(Methods::validate_string($request->bas_percent_flag));
	$rbc                = Methods::strtocapital(Methods::validate_string($request->rbc));
	$rbc_flag           = Methods::strtocapital(Methods::validate_string($request->rbc_flag));
	$hgb                = Methods::strtocapital(Methods::validate_string($request->hgb));
	$hgb_flag           = Methods::strtocapital(Methods::validate_string($request->hgb_flag));
	$hct                = Methods::strtocapital(Methods::validate_string($request->hct));
	$hct_flag           = Methods::strtocapital(Methods::validate_string($request->hct_flag));
	$mcv                = Methods::strtocapital(Methods::validate_string($request->mcv));
	$mcv_flag           = Methods::strtocapital(Methods::validate_string($request->mcv_flag));
	$mch                = Methods::strtocapital(Methods::validate_string($request->mch));
	$mch_flag           = Methods::strtocapital(Methods::validate_string($request->mch_flag));
	$mchc               = Methods::strtocapital(Methods::validate_string($request->mchc));
	$mchc_flag          = Methods::strtocapital(Methods::validate_string($request->mchc_flag));
	$rdw_cv             = Methods::strtocapital(Methods::validate_string($request->rdw_cv));
	$rdw_cv_flag        = Methods::strtocapital(Methods::validate_string($request->rdw_cv_flag));
	$rdw_sd             = Methods::strtocapital(Methods::validate_string($request->rdw_sd));
	$rdw_sd_flag        = Methods::strtocapital(Methods::validate_string($request->rdw_sd_flag));
	$plt                = Methods::strtocapital(Methods::validate_string($request->plt));
	$plt_flag           = Methods::strtocapital(Methods::validate_string($request->plt_flag));
	$mpv                = Methods::strtocapital(Methods::validate_string($request->mpv));
	$mpv_flag           = Methods::strtocapital(Methods::validate_string($request->mpv_flag));
	$pdw                = Methods::strtocapital(Methods::validate_string($request->pdw));
	$pdw_flag           = Methods::strtocapital(Methods::validate_string($request->pdw_flag));
	$pct                = Methods::strtocapital(Methods::validate_string($request->pct));
	$pct_flag           = Methods::strtocapital(Methods::validate_string($request->pct_flag));
	$p_lcc              = Methods::strtocapital(Methods::validate_string($request->p_lcc));
	$p_lcc_flag         = Methods::strtocapital(Methods::validate_string($request->p_lcc_flag));
	$p_lcr              = Methods::strtocapital(Methods::validate_string($request->p_lcr));
	$p_lcr_flag         = Methods::strtocapital(Methods::validate_string($request->p_lcr_flag));
	$sickling_test      = Methods::strtocapital(Methods::validate_string($request->sickling_test));
	$bf_mps             = Methods::validate_string($request->bf_mps);
	$esr                = Methods::strtocapital(Methods::validate_string($request->esr));
	$blood_film_comment = Methods::strtocapital(Methods::validate_string($request->blood_film_comment));
	$added_by           = Methods::validate_string($request->entered_by);
	$response           = array();

	if($request) {
		$result = FBC_5P::create_fbc_5p($patient_id, $wbc, $wbc_flag, $neu_hash, $neu_hash_flag, $lym_hash, $lym_hash_flag, $mon_hash, $mon_hash_flag, $eos_hash, $eos_hash_flag, $bas_hash, $bas_hash_flag, $neu_percent, $neu_percent_flag, $lym_percent, $lym_percent_flag, $mon_percent, $mon_percent_flag, $eos_percent, $eos_percent_flag, $bas_percent, $bas_percent_flag, $rbc, $rbc_flag, $hgb, $hgb_flag, $hct, $hct_flag, $mcv, $mcv_flag, $mch, $mch_flag, $mchc, $mchc_flag, $rdw_cv, $rdw_cv_flag, $rdw_sd, $rdw_sd_flag, $plt, $plt_flag, $mpv, $mpv_flag, $pdw, $pdw_flag, $pct, $pct_flag, $p_lcc, $p_lcc_flag, $p_lcr, $p_lcr_flag, $sickling_test, $bf_mps, $esr, $blood_film_comment, $added_by, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "FBC 5P Lab Added Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Added FBC 5P Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "FBC 5P Lab Could Not Be Added. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Add FBC 5P Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>