<?php
	require "classes/fbc_children.php";

	header('Content-Type: application/json');
	$conn               = $pdo->open();
	$data 	            = file_get_contents("php://input");
	$request            = json_decode($data);
	$patient_id         = Methods::validate_string($request->patient_id);
	$patient            = Methods::validate_string($request->patient);
	$wbc                = Methods::strtocapital(Methods::validate_string($request->wbc));
	$wbc_flag           = Methods::strtocapital(Methods::validate_string($request->wbc_flag));
	$lym                = Methods::strtocapital(Methods::validate_string($request->lym));
	$lym_flag           = Methods::strtocapital(Methods::validate_string($request->lym_flag));
	$mid                = Methods::strtocapital(Methods::validate_string($request->mid));
	$mid_flag           = Methods::strtocapital(Methods::validate_string($request->mid_flag));
	$gran               = Methods::strtocapital(Methods::validate_string($request->gran));
	$gran_flag          = Methods::strtocapital(Methods::validate_string($request->gran_flag));
	$lym_one            = Methods::strtocapital(Methods::validate_string($request->lym_one));
	$lym_one_flag       = Methods::strtocapital(Methods::validate_string($request->lym_one_flag));
	$mid_two            = Methods::strtocapital(Methods::validate_string($request->mid_two));
	$mid_two_flag       = Methods::strtocapital(Methods::validate_string($request->mid_two_flag));
	$gran_three         = Methods::strtocapital(Methods::validate_string($request->gran_three));
	$gran_three_flag    = Methods::strtocapital(Methods::validate_string($request->gran_three_flag));
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
	$sickling_test      = Methods::strtocapital(Methods::validate_string($request->sickling_test));
	$bf_mps             = Methods::validate_string($request->bf_mps);
	$esr                = Methods::strtocapital(Methods::validate_string($request->esr));
	$blood_film_comment = Methods::strtocapital(Methods::validate_string($request->blood_film_comment));
	$added_by           = Methods::validate_string($request->entered_by);
	$response           = array();

	if($request) {
		$result = FBC_CHILDREN::create_fbc_children($patient_id, $wbc, $wbc_flag, $lym, $lym_flag, $mid, $mid_flag, $gran, $gran_flag, $lym_one, $lym_one_flag, $mid_two, $mid_two_flag, $gran_three, $gran_three_flag, $rbc, $rbc_flag, $hgb, $hgb_flag, $hct, $hct_flag, $mcv, $mcv_flag, $mch, $mch_flag, $mchc, $mchc_flag, $rdw_cv, $rdw_cv_flag, $rdw_sd, $rdw_sd_flag, $plt, $plt_flag, $mpv, $mpv_flag, $pdw, $pdw_flag, $pct, $pct_flag, $sickling_test, $bf_mps, $esr, $blood_film_comment, $added_by, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "FBC CHILDREN Lab Added Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Added FBC CHILDREN Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "FBC CHILDREN Lab Could Not Be Added. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Add FBC CHILDREN Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>