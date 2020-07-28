<?php
	require "classes/conn.php";
	require "classes/iron_study.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$labs = IronStudy::read_iron_studys($conn);
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
			"ferritin" => $lab->ferritin,
			"ferritin_flag" => $lab->ferritin_flag,
			"iron" => $lab->iron,
			"iron_flag" => $lab->iron_flag,
			"tibc" => $lab->tibc,
			"tibc_flag" => $lab->tibc_flag,
			"transferrin_sat" => $lab->transferrin_sat,
			"transferrin_sat_flag" => $lab->transferrin_sat_flag,
		));
	}

    $pdo->close();
	echo json_encode($response);
?>