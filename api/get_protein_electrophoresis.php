<?php
	require "classes/conn.php";
	require "classes/protein_electrophoresis.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$labs 	  = ProteinElectrophoresis::read_protein_electrophoresis($conn);
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
			"albumin" => $lab->albumin,
			"albumin_flag" => $lab->albumin_flag,
			"alpha_1_globulin" => $lab->alpha_1_globulin,
			"alpha_1_globulin_flag" => $lab->alpha_1_globulin_flag,
			"alpha_2_globulin" => $lab->alpha_2_globulin,
			"alpha_2_globulin_flag" => $lab->alpha_2_globulin_flag,
			"beta_1_globulin" => $lab->beta_1_globulin,
			"beta_1_globulin_flag" => $lab->beta_1_globulin_flag,
			"beta_2_globulin" => $lab->beta_2_globulin,
			"beta_2_globulin_flag" => $lab->beta_2_globulin_flag,
			"gamma_globulin" => $lab->gamma_globulin,
			"gamma_globulin_flag" => $lab->gamma_globulin_flag,
			"total_protein" => $lab->total_protein,
			"total_protein_flag" => $lab->total_protein_flag,
		));
	}

    $pdo->close();
	echo json_encode($response);
?>