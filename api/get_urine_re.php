<?php
	require "classes/conn.php";
	require "classes/urine_re.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$labs = Urine_RE::read_urine_re($conn);
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
			"bacteria" => $lab->bacteria,
			"bile_pigment" => $lab->bile_pigment,
			"bile_salt" => $lab->bile_salt,
			"bilirubin" => $lab->bilirubin,
			"blood" => $lab->blood,
			"cast" => $lab->cast,
			"colour" => $lab->colour,
			"comments" => $lab->comments,
			"crystals" => $lab->crystals,
			"epitheleal_cells_per_hpf" => $lab->epitheleal_cells_per_hpf,
			"glucose" => $lab->glucose,
			"ketones" => $lab->ketones,
			"leucocytes" => $lab->leucocytes,
			"nitrites" => $lab->nitrites,
			"ph" => $lab->ph,
			"protein" => $lab->protein,
			"pus_cells_per_hps" => $lab->pus_cells_per_hps,
			"rbcs_per_hpf" => $lab->rbcs_per_hpf,
			"s_haematobium" => $lab->s_haematobium,
			"specific_gravity" => $lab->specific_gravity,
			"spermatozoa" => $lab->spermatozoa,
			"unknown_one" => $lab->unknown_one,
			"unknown_two" => $lab->unknown_two,
			"urobilin" => $lab->urobilin,
			"urobilinogen" => $lab->urobilinogen,
			"yeast_like_cells" => $lab->yeast_like_cells,
		));
	}

    $pdo->close();
	echo json_encode($response);
?>