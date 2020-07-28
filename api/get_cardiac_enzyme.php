<?php
	require "classes/conn.php";
	require "classes/cardiac_enzyme.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$labs = CardiacEnzyme::read_cardiac_enzymes($conn);
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
			"alt" => $lab->alt,
			"ast" => $lab->ast,
			"ck_mb" => $lab->ck_mb,
			"creatinine_kinase" => $lab->creatinine_kinase,
			"ldh" => $lab->ldh,
			"troponin" => $lab->troponin,
			"comments" => $lab->comments,
		));
	}

    $pdo->close();
	echo json_encode($response);
?>