<?php
	require "classes/conn.php";
	require "classes/tft.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$labs = TFT::read_tfts($conn);
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
			"middle_name" => $lab->middle_name,
			"last_name" => $lab->plast_name,
			'name'     => $lab->middle_name ? $lab->pfirst_name.' '.$lab->middle_name.' '.$lab->plast_name : $lab->pfirst_name.' '.$lab->plast_name,
			'staff'    => $lab->uother_name ? $lab->ufirst_name.' '.$lab->uother_name.' '.$lab->ulast_name : $lab->ufirst_name.' '.$lab->ulast_name,
			"ft3" => $lab->ft3,
			"ft3_flag" => $lab->ft3_flag,
			"ft4" => $lab->ft4,
			"ft4_flag" => $lab->ft4_flag,
			"tsh" => $lab->tsh,
			"tsh_flag" => $lab->tsh_flag,
			"comments" => $lab->comments,
		));
	}

    $pdo->close();
	echo json_encode($response);
?>