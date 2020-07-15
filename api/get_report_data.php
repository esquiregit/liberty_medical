<?php
	require "classes/report.php";

	header('Content-Type: application/json');
	$conn       = $pdo->open();
	$data 	    = file_get_contents("php://input");
	$request    = json_decode($data);
	$staff_id   = Methods::validate_string($request->staff_id);
	$start_date = Methods::validate_string($request->start_date);
	$end_date   = Methods::validate_string($request->end_date);
	$type   	= Methods::validate_string($request->type);
	$patient_id	= Methods::validate_string($request->patient_id);
	$response   = array();
	$branch     = Methods::get_branch($staff_id, $conn);

    $date       = date_create($end_date);
    date_add($date, date_interval_create_from_date_string("1 days"));
    $end_date   = date_format($date, "Y-m-d");

	if($request) {
		if($type === 'Alpha Feto Protein') {
			$result = Report::get_alpha_feto_protein($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "Alpha Feto Protein",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'Antenatal Screening') {
			$result = Report::get_antenatal_screening($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "Antenatal Screening",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'Ascitic Fluid C/S') {
			$result = Report::get_ascitic_fluid($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "Ascitic Fluid C/S",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'Aspirate C/S') {
			$result = Report::get_aspirate($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "Aspirate C/S",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'BUE + Creatinine') {
			$result = Report::get_bue_creatinine($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "BUE + Creatinine",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'BUE Creatinine + eGFR') {
			$result = Report::get_bue_creatinine_egfr($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "BUE Creatinine + eGFR",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'BUE + LFT') {
			$result = Report::get_bue_creatinine_lft($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "BUE + LFT",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'BUE + Lipids') {
			$result = Report::get_bue_creatinine_lipid($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "BUE + Lipids",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'Blood Film Comment') {
			$result = Report::get_blood_film_comment($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "Blood Film Comment",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'Blood C/S') {
			$result = Report::get_blood_cs($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "Blood C/S",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'Blood Sugar') {
			$result = Report::get_blood_sugar($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "Blood Sugar",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'C-Reactive Protein') {
			$result = Report::get_c_reactive_protein($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "C-Reactive Protein",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'CA-12.5') {
			$result = Report::get_ca_125($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "CA-12.5",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'CA-15.3') {
			$result = Report::get_ca_153($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "CA-15.3",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'CD4 Count') {
			$result = Report::get_cd4_count($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "CD4 Count",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'CEA') {
			$result = Report::get_cea($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "CEA",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'CKMB') {
			$result = Report::get_ckmb($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "CKMB",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'CRP') {
			$result = Report::get_crp($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "CRP",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'CRP Ultra-Sensitive') {
			$result = Report::get_crp_ultra_sensitive($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "CRP Ultra-Sensitive",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'CSF Biochem') {
			$result = Report::get_csf_biochem($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "CSF Biochem",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'Calcium Profile') {
			$result = Report::get_calcium_profile($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "Calcium Profile",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'Cardiac Enzyme') {
			$result = Report::get_cardiac_enzyme($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "Cardiac Enzyme",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'Clotting Profile') {
			$result = Report::get_clotting_profile($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "Clotting Profile",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'Compact Chemistry') {
			$result = Report::get_compact_chemistry($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "Compact Chemistry",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'Cortisol') {
			$result = Report::get_cortisol($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "Cortisol",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'D-Dimers') {
			$result = Report::get_d_dimers($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "D-Dimers",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'ESR') {
			$result = Report::get_esr($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "ESR",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'Ear Swab C/S') {
			$result = Report::get_ear_swab($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "Ear Swab C/S",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'Eye Swab C/S') {
			$result = Report::get_eye_swab($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "Eye Swab C/S",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'Endocervical Swab C/S') {
			$result = Report::get_endocervical($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "Endocervical Swab C/S",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'Estrogen') {
			$result = Report::get_estrogen($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "Estrogen",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'FBC 3P') {
			$result = Report::get_fbc_3p($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "FBC 3P",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'FBC 5P') {
			$result = Report::get_fbc_5p($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "FBC 5P",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'FBC Children') {
			$result = Report::get_fbc_children($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "FBC Children",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'Folate / B12') {
			$result = Report::get_folate_b12($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "Folate / B12",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'General Chemistry') {
			$result = Report::get_general_chemistry($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "General Chemistry",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'HBA1C') {
			$result = Report::get_hba1c($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "HBA1C",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'H. Pylori Ag.') {
			$result = Report::get_h_pylori_ag($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "H. Pylori Ag.",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'H. Pylori Ag. Blood') {
			$result = Report::get_h_pylori_ag_blood($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "H. Pylori Ag. Blood",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'H. Pylori Ag. / SOB') {
			$result = Report::get_h_pylori_ag_sob($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "H. Pylori Ag. / SOB",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'HBV Viral Load') {
			$result = Report::get_hbv_viral_load($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "HBV Viral Load",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'HIV Viral Load') {
			$result = Report::get_hiv_viral_load($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "HIV Viral Load",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'Hepatitis B Profile') {
			$result = Report::get_hepatitis_b_profile($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "Hepatitis B Profile",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'Hepatitis Markers') {
			$result = Report::get_hepatitis_markers($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "Hepatitis Markers",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'HVS C/S') {
			$result = Report::get_hvs_cs($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "HVS C/S",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'HVS R/E') {
			$result = Report::get_hvs_re($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "HVS R/E",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'Hormonal Assay') {
			$result = Report::get_hormonal_assay($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "Hormonal Assay",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'Hypersensitive CPR') {
			$result = Report::get_hypersensitive_cpr($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "Hypersensitive CPR",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'ISE') {
			$result = Report::get_ise($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "ISE",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'Iron Study') {
			$result = Report::get_iron_study($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "Iron Study",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'LFT') {
			$result = Report::get_lft($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "LFT",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'Lipid Profile') {
			$result = Report::get_lipid_profile($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "Lipid Profile",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'Mantoux') {
			$result = Report::get_mantoux($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "Mantoux",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'M-ALB') {
			$result = Report::get_m_alb($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "M-ALB",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'NTC - Screening') {
			$result = Report::get_ntc_screening($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "NTC - Screening",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'PSA') {
			$result = Report::get_psa($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "PSA",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'PTH') {
			$result = Report::get_pth($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "PTH",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'Pleural Fluid') {
			$result = Report::get_pleural_fluid($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "Pleural Fluid",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'Pregnancy Test') {
			$result = Report::get_pregnancy_test($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "Pregnancy Test",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'Protein Electrophoresis') {
			$result = Report::get_protein_electrophoresis($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "Protein Electrophoresis",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'Pus Fluid') {
			$result = Report::get_pus_fluid($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "Pus Fluid",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'Reproductive Assay') {
			$result = Report::get_reproductive_assay($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "Reproductive Assay",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'Rheumatology') {
			$result = Report::get_rheumatology($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "Rheumatology",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'S-C3, S-C4') {
			$result = Report::get_sc3_sc4($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "S-C3, S-C4",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'Semen Analysis') {
			$result = Report::get_semen_analysis($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "Semen Analysis",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'Semen C/S') {
			$result = Report::get_semen_cs($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "Semen C/S",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'Serum HCG') {
			$result = Report::get_serum_hcg_b($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "Serum HCG",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'Serum Lipase') {
			$result = Report::get_serum_lipase($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "Serum Lipase",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'Skin Snip') {
			$result = Report::get_skin_snip($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "Skin Snip",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'Specials') {
			$result = Report::get_specials($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "Specials",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'Sputum AFB') {
			$result = Report::get_sputum_afb($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "Sputum AFB",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'Sputum C/S') {
			$result = Report::get_sputum_cs($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "Sputum C/S",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'Stool C/S') {
			$result = Report::get_stool_cs($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "Stool C/S",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'Stool R/E') {
			$result = Report::get_stool_re($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "Stool R/E",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'TFT') {
			$result = Report::get_tft($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "TFT",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'Throat Swab C/S') {
			$result = Report::get_throat_swab($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "Throat Swab C/S",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'Troponin') {
			$result = Report::get_troponin($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "Troponin",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'Urethral C/S') {
			$result = Report::get_urethral_cs($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "Urethral C/S",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'Urine') {
			$result = Report::get_urine($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "Urine",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'Urine ACR') {
			$result = Report::get_urine_acr($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "Urine ACR",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'Urine C/S') {
			$result = Report::get_urine_cs($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "Urine C/S",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'Urine R/E') {
			$result = Report::get_urine_re($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "Urine R/E",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'Widal') {
			$result = Report::get_widal($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "Widal",
				"data"  => $result,
				"total" => count($result)
			));
		} else if($type === 'Wound C/S') {
			$result = Report::get_wound_cs($patient_id, $start_date, $end_date, $branch, $conn);
			array_push($response, array(
				"type"  => "Wound C/S",
				"data"  => $result,
				"total" => count($result)
			));
		}
	}

	Audit_Trail::create_log($staff_id, 'Viewed '.$type.' Report From '.date_format(date_create($start_date), 'd F Y').' To '.date_format(date_create($end_date), 'd F Y'), $conn);
    $pdo->close();
	echo json_encode($response);
?>