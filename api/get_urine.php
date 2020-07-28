<?php
	require "classes/conn.php";
	require "classes/urine.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$labs = Urine::read_urines($conn);
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
			"clearance" => $lab->clearance,
			"comments" => $lab->comments,
			"serum_creatinine" => $lab->serum_creatinine,
			"twenty_four_hour_urine_volume" => $lab->twenty_four_hour_urine_volume,
			"urine_calcium" => $lab->urine_calcium,
			"urine_creatinine" => $lab->urine_creatinine,
			"urine_uric_acid" => $lab->urine_uric_acid,
			"urine_vma" => $lab->urine_vma,
		));
	}

    $pdo->close();
	echo json_encode($response);
?>