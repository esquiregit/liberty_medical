<?php
	require "classes/conn.php";
	require "classes/cd4_count.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$labs = CD4Count::read_cd4_counts($conn);
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
			"cd3" => $lab->cd3,
			"cd3_flag" => $lab->cd3_flag,
			"cd4_cd3" => $lab->cd4_cd3,
			"cd4_cd3_flag" => $lab->cd4_cd3_flag,
			"cd4_count" => $lab->cd4_count,
			"cd4_count_flag" => $lab->cd4_count_flag,
			"comments" => $lab->comments,
			"t_wbc" => $lab->t_wbc,
			"t_wbc_flag" => $lab->t_wbc_flag,
		));
	}
    $pdo->close();
	echo json_encode($response);
?>