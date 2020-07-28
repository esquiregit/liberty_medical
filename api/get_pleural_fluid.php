<?php
	require "classes/conn.php";
	require "classes/pleural_fluid.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$labs = PleuralFluid::read_pleural_fluid($conn);
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
			"acid_fast_bacilli" => $lab->acid_fast_bacilli,
			"appearance" => $lab->appearance,
			"appearance_dropdown" => $lab->appearance_dropdown,
			"colour" => $lab->colour,
			"comments" => $lab->comments,
			"glucose" => $lab->glucose,
			"gram_stain" => $lab->gram_stain,
			"granulocytes_one" => $lab->granulocytes_one,
			"granulocytes_two" => $lab->granulocytes_two,
			"ldh" => $lab->ldh,
			"lymphocytes_one" => $lab->lymphocytes_one,
			"lymphocytes_two" => $lab->lymphocytes_two,
			"monocytes_one" => $lab->monocytes_one,
			"monocytes_two" => $lab->monocytes_two,
			"ph" => $lab->ph,
			"pleural_fluid_albumin" => $lab->pleural_fluid_albumin,
			"total_protein" => $lab->total_protein,
			"total_wbc_one" => $lab->total_wbc_one,
			"total_wbc_two" => $lab->total_wbc_two,
		));
	}

    $pdo->close();
	echo json_encode($response);
?>