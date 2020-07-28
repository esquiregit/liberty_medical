<?php
	require "classes/conn.php";
	require "classes/calcium_profile.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$labs = CalciumProfile::read_calcium_profiles($conn);
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
			"corrected_calcium_calc" => $lab->corrected_calcium_calc,
			"s_total_protein" => $lab->s_total_protein,
			"s_total_protein_flag" => $lab->s_total_protein_flag,
			"s_albumin" => $lab->s_albumin,
			"s_albumin_flag" => $lab->s_albumin_flag,
			"s_calcium_total" => $lab->s_calcium_total,
			"s_calcium_total_flag" => $lab->s_calcium_total_flag,
			"s_ionized_calcium_calc" => $lab->s_ionized_calcium_calc,
			"s_ionized_calcium_calc_flag" => $lab->s_ionized_calcium_calc_flag,
			"comments" => $lab->comments,
		));
	}

    $pdo->close();
	echo json_encode($response);
?>