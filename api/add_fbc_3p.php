<?php
	require "classes/fbc_3p.php";

	header('Content-Type: application/json');
	$conn               = $pdo->open();
	$data 	            = file_get_contents("php://input");
	$request            = json_decode($data);
	$patient_id         = Methods::validate_string($request->patient_id);
	$patient            = Methods::validate_string($request->patient);
	$wbc                = Methods::strtocapital(Methods::validate_string($request->wbc));
	$wbc_info           = Methods::strtocapital(Methods::validate_string($request->wbc_info));
	$lym                = Methods::strtocapital(Methods::validate_string($request->lym));
	$lym_info           = Methods::strtocapital(Methods::validate_string($request->lym_info));
	$mid                = Methods::strtocapital(Methods::validate_string($request->mid));
	$mid_info           = Methods::strtocapital(Methods::validate_string($request->mid_info));
	$gran               = Methods::strtocapital(Methods::validate_string($request->gran));
	$gran_info          = Methods::strtocapital(Methods::validate_string($request->gran_info));
	$lym_one            = Methods::strtocapital(Methods::validate_string($request->lym_one));
	$lym_one_info       = Methods::strtocapital(Methods::validate_string($request->lym_one_info));
	$mid_two            = Methods::strtocapital(Methods::validate_string($request->mid_two));
	$mid_two_info       = Methods::strtocapital(Methods::validate_string($request->mid_two_info));
	$gran_three         = Methods::strtocapital(Methods::validate_string($request->gran_three));
	$gran_three_info    = Methods::strtocapital(Methods::validate_string($request->gran_three_info));
	$rbc                = Methods::strtocapital(Methods::validate_string($request->rbc));
	$rbc_info           = Methods::strtocapital(Methods::validate_string($request->rbc_info));
	$hgb                = Methods::strtocapital(Methods::validate_string($request->hgb));
	$hgb_info           = Methods::strtocapital(Methods::validate_string($request->hgb_info));
	$hct                = Methods::strtocapital(Methods::validate_string($request->hct));
	$hct_info           = Methods::strtocapital(Methods::validate_string($request->hct_info));
	$mcv                = Methods::strtocapital(Methods::validate_string($request->mcv));
	$mcv_info           = Methods::strtocapital(Methods::validate_string($request->mcv_info));
	$mch                = Methods::strtocapital(Methods::validate_string($request->mch));
	$mch_info           = Methods::strtocapital(Methods::validate_string($request->mch_info));
	$mchc               = Methods::strtocapital(Methods::validate_string($request->mchc));
	$mchc_info          = Methods::strtocapital(Methods::validate_string($request->mchc_info));
	$rdw_cv             = Methods::strtocapital(Methods::validate_string($request->rdw_cv));
	$rdw_cv_info        = Methods::strtocapital(Methods::validate_string($request->rdw_cv_info));
	$rdw_sd             = Methods::strtocapital(Methods::validate_string($request->rdw_sd));
	$rdw_sd_info        = Methods::strtocapital(Methods::validate_string($request->rdw_sd_info));
	$plt                = Methods::strtocapital(Methods::validate_string($request->plt));
	$plt_info           = Methods::strtocapital(Methods::validate_string($request->plt_info));
	$mpv                = Methods::strtocapital(Methods::validate_string($request->mpv));
	$mpv_info           = Methods::strtocapital(Methods::validate_string($request->mpv_info));
	$pdw                = Methods::strtocapital(Methods::validate_string($request->pdw));
	$pdw_info           = Methods::strtocapital(Methods::validate_string($request->pdw_info));
	$pct                = Methods::strtocapital(Methods::validate_string($request->pct));
	$pct_info           = Methods::strtocapital(Methods::validate_string($request->pct_info));
	$sickling_test      = Methods::strtocapital(Methods::validate_string($request->sickling_test));
	$bf_mps             = Methods::validate_string($request->bf_mps);
	$esr                = Methods::strtocapital(Methods::validate_string($request->esr));
	$blood_film_comment = Methods::strtocapital(Methods::validate_string($request->blood_film_comment));
	$added_by           = Methods::validate_string($request->entered_by);
	$response           = array();

	if($request) {
		$result = FBC_3P::create_fbc_3p($patient_id, $wbc, $wbc_info, $lym, $lym_info, $mid, $mid_info, $gran, $gran_info, $lym_one, $lym_one_info, $mid_two, $mid_two_info, $gran_three, $gran_three_info, $rbc, $rbc_info, $hgb, $hgb_info, $hct, $hct_info, $mcv, $mcv_info, $mch, $mch_info, $mchc, $mchc_info, $rdw_cv, $rdw_cv_info, $rdw_sd, $rdw_sd_info, $plt, $plt_info, $mpv, $mpv_info, $pdw, $pdw_info, $pct, $pct_info, $sickling_test, $bf_mps, $esr, $blood_film_comment, $added_by, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "FBC 3P Lab Added Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Added FBC 3P Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "FBC 3P Lab Could Not Be Added. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Add FBC 3P Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>