<?php
	require "classes/conn.php";
	require "classes/lipid_profile.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$labs = LipidProfile::read_lipid_profiles($conn);
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
			"cholesterol_total" => $lab->cholesterol_total,
			"cholesterol_total_flag" => $lab->cholesterol_total_flag,
			"coronary_risk" => $lab->coronary_risk,
			"coronary_risk_flag" => $lab->coronary_risk_flag,
			"hdl" => $lab->hdl,
			"hdl_flag" => $lab->hdl_flag,
			"ldl" => $lab->ldl,
			"ldl_flag" => $lab->ldl_flag,
			"triglycerides" => $lab->triglycerides,
			"triglycerides_flag" => $lab->triglycerides_flag,
		));
	}

    $pdo->close();
	echo json_encode($response);
?>