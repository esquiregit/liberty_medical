<?php
	require "classes/conn.php";
	require "classes/hbv_viral_load.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$labs = HBVViralLoad::read_hbv_viral_loads($conn);
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
			"hbv_dna" => $lab->hbv_dna,
			"pcr_hbv_quantitative" => $lab->pcr_hbv_quantitative,
			"comments" => $lab->comments,
		));
	}

    $pdo->close();
	echo json_encode($response);
?>