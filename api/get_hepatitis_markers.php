<?php
	require "classes/conn.php";
	require "classes/hepatitis_markers.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$labs = HepatitisMarkers::read_hepatitis_markers($conn);
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
			"hep_a_igg_antibody" => $lab->hep_a_igg_antibody,
			"hep_a_igm_antibody" => $lab->hep_a_igm_antibody,
			"hep_b_core_igg_antibody" => $lab->hep_b_core_igg_antibody,
			"hep_b_core_igm_antibody" => $lab->hep_b_core_igm_antibody,
			"hep_be_antibody" => $lab->hep_be_antibody,
			"hep_be_antigen" => $lab->hep_be_antigen,
			"hep_bs_antibody" => $lab->hep_bs_antibody,
			"hep_bs_antigen" => $lab->hep_bs_antigen,
			"hep_c_screen" => $lab->hep_c_screen,
		));
	}

    $pdo->close();
	echo json_encode($response);
?>