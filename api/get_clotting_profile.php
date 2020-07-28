<?php
	require "classes/conn.php";
	require "classes/clotting_profile.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$labs = ClottingProfile::read_clotting_profiles($conn);
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
			"aptt" => $lab->aptt,
			"bt" => $lab->bt,
			"comments" => $lab->comments,
			"control_time" => $lab->control_time,
			"factor_ix_activity" => $lab->factor_ix_activity,
			"factor_viii_assay" => $lab->factor_viii_assay,
			"inr" => $lab->inr,
			"normal_plasma" => $lab->normal_plasma,
			"pt_inr" => $lab->pt_inr,
			"ratio" => $lab->ratio,
		));
	}

    $pdo->close();
	echo json_encode($response);
?>