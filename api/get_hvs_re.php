<?php
	require "classes/conn.php";
	require "classes/hvs_re.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$labs = HVS_RE::read_hvs_re($conn);
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
			"epitheleal_cells_per_hpf" => $lab->epitheleal_cells_per_hpf,
			"gnid" => $lab->gnid,
			"pus_cells_per_hps" => $lab->pus_cells_per_hps,
			"red_blood_cells" => $lab->red_blood_cells,
			"t_vaginalis" => $lab->t_vaginalis,
			"yeast_like_cells" => $lab->yeast_like_cells,
		));
	}

    $pdo->close();
	echo json_encode($response);
?>