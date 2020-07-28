<?php
	require "classes/conn.php";
	require "classes/semen_analysis.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$labs = SemenAnalysis::read_semen_analysis($conn);
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
			"agglutination" => $lab->agglutination,
			"colour" => $lab->colour,
			"comments" => $lab->comments,
			"consistency" => $lab->consistency,
			"count" => $lab->count,
			"epithelial" => $lab->epithelial,
			"morphology" => $lab->morphology,
			"motility" => $lab->motility,
			"ph" => $lab->ph,
			"pus_cells" => $lab->pus_cells,
			"red_blood_cells" => $lab->red_blood_cells,
			"testicular_cells" => $lab->testicular_cells,
			"unknown_one" => $lab->unknown_one,
			"unknown_two" => $lab->unknown_two,
			"viability" => $lab->viability,
			"volume" => $lab->volume,
		));
	}

    $pdo->close();
	echo json_encode($response);
?>