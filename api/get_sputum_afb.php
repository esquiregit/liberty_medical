<?php
	require "classes/conn.php";
	require "classes/sputum_afb.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$labs = SputumAFB::read_sputum_afb($conn);
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
			"appearance" => $lab->appearance,
			"comments" => $lab->comments,
			"gram_stain" => $lab->gram_stain,
			"pus_cells" => $lab->pus_cells,
			"zn_stain" => $lab->zn_stain,
		));
	}

    $pdo->close();
	echo json_encode($response);
?>