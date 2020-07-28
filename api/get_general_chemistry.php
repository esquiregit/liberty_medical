<?php
	require "classes/conn.php";
	require "classes/general_chemistry.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$labs = GeneralChemistry::read_general_chemistrys($conn);
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
			"amylase" => $lab->amylase,
			"bili_indirect" => $lab->bili_indirect,
			"calcium" => $lab->calcium,
			"creatine_kinase" => $lab->creatine_kinase,
			"creatinine" => $lab->creatinine,
			"fbs_glucose" => $lab->fbs_glucose,
			"globulin" => $lab->globulin,
			"glyco_hbg" => $lab->glyco_hbg,
			"ldh" => $lab->ldh,
			"magnessium" => $lab->magnessium,
			"phosphorus" => $lab->phosphorus,
			"uric_acid" => $lab->uric_acid,
			"comments" => $lab->comments,
		));
	}

    $pdo->close();
	echo json_encode($response);
?>