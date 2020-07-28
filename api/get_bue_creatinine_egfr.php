<?php
	require "classes/conn.php";
	require "classes/bue_creatinine_egfr.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$labs = BueCreatinineEgfr::read_bue_creatinine_egfrs($conn);
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
			"chloride" => $lab->chloride,
			"chloride_flag" => $lab->chloride_flag,
			"creatinine" => $lab->creatinine,
			"creatinine_flag" => $lab->creatinine_flag,
			"egfr" => $lab->egfr,
			"potassium" => $lab->potassium,
			"potassium_flag" => $lab->potassium_flag,
			"sodium" => $lab->sodium,
			"sodium_flag" => $lab->sodium_flag,
			"urea" => $lab->urea,
			"urea_flag" => $lab->urea_flag,
			"comments" => $lab->comments,
		));
	}

    $pdo->close();
	echo json_encode($response);
?>