<?php
	require "classes/conn.php";
	require "classes/urine_cs.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$labs = Urine_CS::read_urine_cs($conn);
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
			"antibiotics_one" => $lab->antibiotics_one,
			"antibiotics_two" => $lab->antibiotics_two,
			"antibiotics_three" => $lab->antibiotics_three,
			"antibiotics_four" => $lab->antibiotics_four,
			"antibiotics_five" => $lab->antibiotics_five,
			"antibiotics_six" => $lab->antibiotics_six,
			"antibiotics_seven" => $lab->antibiotics_seven,
			"antibiotics_eight" => $lab->antibiotics_eight,
			"antibiotics_nine" => $lab->antibiotics_nine,
			"antibiotics_ten" => $lab->antibiotics_ten,
			"antibiotics_eleven" => $lab->antibiotics_eleven,
			"antibiotics_twelve" => $lab->antibiotics_twelve,
			"antibiotics_thirteen" => $lab->antibiotics_thirteen,
			"antibiotics_fourteen" => $lab->antibiotics_fourteen,
			"antibiotics_fifteen" => $lab->antibiotics_fifteen,
			"antibiotics_sixteen" => $lab->antibiotics_sixteen,
			"bacteria_one" => $lab->bacteria_one,
			"bacteria_two" => $lab->bacteria_two,
			"cast" => $lab->cast,
			"comments" => $lab->comments,
			"crystals" => $lab->crystals,
			"culture" => $lab->culture,
			"epitheleal_cells_per_hpf" => $lab->epitheleal_cells_per_hpf,
			"gram_reaction" => $lab->gram_reaction,
			"pus_cells_per_hps" => $lab->pus_cells_per_hps,
			"rbcs_per_hpf" => $lab->rbcs_per_hpf,
			"sensitivity_one" => $lab->sensitivity_one,
			"sensitivity_two" => $lab->sensitivity_two,
			"sensitivity_three" => $lab->sensitivity_three,
			"sensitivity_four" => $lab->sensitivity_four,
			"sensitivity_five" => $lab->sensitivity_five,
			"sensitivity_six" => $lab->sensitivity_six,
			"sensitivity_seven" => $lab->sensitivity_seven,
			"sensitivity_eight" => $lab->sensitivity_eight,
			"sensitivity_nine" => $lab->sensitivity_nine,
			"sensitivity_ten" => $lab->sensitivity_ten,
			"sensitivity_eleven" => $lab->sensitivity_eleven,
			"sensitivity_twelve" => $lab->sensitivity_twelve,
			"sensitivity_thirteen" => $lab->sensitivity_thirteen,
			"sensitivity_fourteen" => $lab->sensitivity_fourteen,
			"sensitivity_fifteen" => $lab->sensitivity_fifteen,
			"sensitivity_sixteen" => $lab->sensitivity_sixteen,
			"viable_count" => $lab->viable_count,
			"yeast_like_cells" => $lab->yeast_like_cells,
		));
	}

    $pdo->close();
	echo json_encode($response);
?>