<?php
	require "classes/conn.php";
	require "classes/urine_acr.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$labs = UrineACR::read_urine_acrs($conn);
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
			"comments" => $lab->comments,
			"mg_g_indicates" => $lab->mg_g_indicates,
			"micro_albumin_urine" => $lab->micro_albumin_urine,
			"micro_albumin_urine_flag" => $lab->micro_albumin_urine_flag,
			"the_uacr" => $lab->the_uacr,
			"uacr" => $lab->uacr,
			"uacr_flag" => $lab->uacr_flag,
			"urea_creatinine" => $lab->urea_creatinine,
			"urea_creatinine_flag" => $lab->urea_creatinine_flag,
		));
	}

    $pdo->close();
	echo json_encode($response);
?>