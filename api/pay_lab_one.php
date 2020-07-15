<?php
	require "classes/payment.php";

	header('Content-Type: application/json');
	$conn         = $pdo->open();
	$data 	      = file_get_contents("php://input");
	$request      = json_decode($data);
	$id           = Methods::validate_string($request->id);
	$type         = Methods::validate_string($request->type);
	$payment_type = Methods::validate_string($request->payment_type);
	$response     = array();
	
	if($request) {
		if($type === 'Alpha Feto Protein') {
			$result = Payment::pay_alpha_feto_protein($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'Antenatal Screening') {
			$result = Payment::pay_antenatal_screening($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'Ascitic Fluid C/S') {
			$result = Payment::pay_ascitic_fluid_cs($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'Aspirate C/S') {
			$result = Payment::pay_aspirate_cs($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'Blood C/S') {
			$result = Payment::pay_blood_cs($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'Blood Film Comment') {
			$result = Payment::pay_blood_file_comment($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'Blood Sugar') {
			$result = Payment::pay_blood_sugar($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'BUE Creatinine') {
			$result = Payment::pay_bue_creatinine($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'BUE Creatinine eGFR') {
			$result = Payment::pay_bue_creatinine_egfr($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'BUE Creatinine LFT') {
			$result = Payment::pay_bue_creatinine_lft($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'BUE Creatinine Lipid') {
			$result = Payment::pay_bue_creatinine_lipid($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'Calcium Profile') {
			$result = Payment::pay_calcium_profile($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'Cardiac Enzyme') {
			$result = Payment::pay_cardiac_enzyme($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'CA 12.5') {
			$result = Payment::pay_ca_one_two_five($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'CA 15.3') {
			$result = Payment::pay_ca_one_five_three($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'CEA') {
			$result = Payment::pay_cea($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'CKMB') {
			$result = Payment::pay_ckmb($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'Clotting Profile') {
			$result = Payment::pay_clotting_profile($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'Compact Chemistry') {
			$result = Payment::pay_compact_chemistry($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'Cortisol') {
			$result = Payment::pay_cortisol($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'CD4 Count') {
			$result = Payment::pay_cd4_count($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'CRP') {
			$result = Payment::pay_crp($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'CRP Ultra Sensitive') {
			$result = Payment::pay_crp_ultra_sensitive($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'CSF Biochem') {
			$result = Payment::pay_csf_biochem($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'C-Reactive Protein') {
			$result = Payment::pay_c_reactive_protein($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'D-Dimers') {
			$result = Payment::pay_d_dimers($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'Ear Swab C/S') {
			$result = Payment::pay_ear_swab_cs($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'Endocervical SWAB C/S') {
			$result = Payment::pay_endocervical_swab_cs($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'Eye Swab C/S') {
			$result = Payment::pay_eye_swab_cs($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'ESR') {
			$result = Payment::pay_esr($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'Estrogen') {
			$result = Payment::pay_estrogen($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'FBC 3P') {
			$result = Payment::pay_fbc_3p($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'FBC 5P') {
			$result = Payment::pay_fbc_5p($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'FBC Children') {
			$result = Payment::pay_fbc_children($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'Folate B12') {
			$result = Payment::pay_folate_b12($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'General Chemistry') {
			$result = Payment::pay_general_chemistry($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'HBA1C') {
			$result = Payment::pay_hba1c($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'HBV Viral Load') {
			$result = Payment::pay_hbv_viral_load($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'HIV Viral Load') {
			$result = Payment::pay_hiv_viral_load($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'Hepatitis B Profile') {
			$result = Payment::pay_hepatitis_b_profile($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'Hepatitis Markers') {
			$result = Payment::pay_hepatitis_markers($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'Hormonal Assay') {
			$result = Payment::pay_hormonal_assay($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'HVS C/S') {
			$result = Payment::pay_hvs_cs($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'HVS R/E') {
			$result = Payment::pay_hvs_re($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'Hypersensitive CPR') {
			$result = Payment::pay_hypersensitive_cpr($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'H. Pylori Ag.') {
			$result = Payment::pay_h_pylori_ag($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'H. Pylori Ag. Blood') {
			$result = Payment::pay_h_pylori_ag_blood($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'H. Pylori Ag. / SOB') {
			$result = Payment::pay_h_pylori_ag_sob($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'Iron Study') {
			$result = Payment::pay_iron_study($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'ISE') {
			$result = Payment::pay_ise($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'LFT') {
			$result = Payment::pay_lft($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'Lipid Profile') {
			$result = Payment::pay_lipid_profile($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'Mantoux') {
			$result = Payment::pay_mantoux($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'M-Alb') {
			$result = Payment::pay_m_alb($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'NTC Screening') {
			$result = Payment::pay_ntc_screening($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'Pleural Fluid') {
			$result = Payment::pay_pleural_fluid($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'Pregnancy Test') {
			$result = Payment::pay_pregnancy_test($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'Protein Electrophoresis') {
			$result = Payment::pay_protein_electrophoresis($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'PSA') {
			$result = Payment::pay_psa($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'PTH') {
			$result = Payment::pay_pth($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'Pus Fluid') {
			$result = Payment::pay_pus_fluid($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'Reproductive Assay') {
			$result = Payment::pay_reproductive_assay($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'Rheumatology') {
			$result = Payment::pay_rheumatology($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'SC3 SC4') {
			$result = Payment::pay_sc3_sc4($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'Semen Analysis') {
			$result = Payment::pay_semen_analysis($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'Semen C/S') {
			$result = Payment::pay_semen_cs($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'Serum HCB-B') {
			$result = Payment::pay_serum_hcg_b($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'Serum Lipase') {
			$result = Payment::pay_serum_lipase($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'Skin Snip') {
			$result = Payment::pay_skin_snip($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'Specials') {
			$result = Payment::pay_specials($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'Sputum C/S') {
			$result = Payment::pay_sputum($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'Sputum AFB') {
			$result = Payment::pay_sputum_afb($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'Stool C/S') {
			$result = Payment::pay_stock_cs($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'Stool R/E') {
			$result = Payment::pay_stock_re($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'TFT') {
			$result = Payment::pay_tft($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'Throat Swab C/S') {
			$result = Payment::pay_throat_swab_cs($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'Troponin') {
			$result = Payment::pay_troponin($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'Urethral C/S') {
			$result = Payment::pay_urethral_cs($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'Urine') {
			$result = Payment::pay_urine($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'Urine ACR') {
			$result = Payment::pay_urine_acr($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'Urine C/S') {
			$result = Payment::pay_urine_cs($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'Urine R/E') {
			$result = Payment::pay_urine_re($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'Widal') {
			$result = Payment::pay_widal($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		} else if($type === 'Wound C/S') {
			$result = Payment::pay_wound_cs($id, $payment_type, $conn);
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => $type . " Lab Paid Successfully...."
				));
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => $type . " Lab Could Not Be Paid. Please Try Again...."
				));
			}
		}
	}

    $pdo->close();
	echo json_encode($response);
?>