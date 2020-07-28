<?php
	require "classes/conn.php";
	require "classes/widal.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$labs = Widal::read_widal($conn);
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
			"paratyphi_a_th" => $lab->paratyphi_a_th,
			"paratyphi_a_to" => $lab->paratyphi_a_to,
			"paratyphi_b_th" => $lab->paratyphi_b_th,
			"paratyphi_b_to" => $lab->paratyphi_b_to,
			"paratyphi_c_th" => $lab->paratyphi_c_th,
			"paratyphi_c_to" => $lab->paratyphi_c_to,
			"typhi_th" => $lab->typhi_th,
			"typhi_to" => $lab->typhi_to,
		));
	}

    $pdo->close();
	echo json_encode($response);
?>