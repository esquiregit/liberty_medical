<?php
	require "classes/conn.php";
	require "classes/stool_re.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$labs = StoolRE::read_stool_re($conn);
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
			"cyst_one" => $lab->cyst_one,
			"cyst_two" => $lab->cyst_two,
			"larvae_one" => $lab->larvae_one,
			"larvae_two" => $lab->larvae_two,
			"ova_one" => $lab->ova_one,
			"ova_two" => $lab->ova_two,
			"red_blood_cells" => $lab->red_blood_cells,
			"row_one_one" => $lab->row_one_one,
			"row_three_one" => $lab->row_three_one,
			"row_three_two" => $lab->row_three_two,
			"row_four_one" => $lab->row_four_one,
			"row_four_two" => $lab->row_four_two,
			"row_seven_one" => $lab->row_seven_one,
			"row_seven_two" => $lab->row_seven_two,
			"row_eight_one" => $lab->row_eight_one,
			"row_eight_two" => $lab->row_eight_two,
			"row_ten_one" => $lab->row_ten_one,
			"row_ten_two" => $lab->row_ten_two,
			"row_eleven_one" => $lab->row_eleven_one,
			"row_eleven_two" => $lab->row_eleven_two,
			"vegetative_form_one" => $lab->vegetative_form_one,
			"vegetative_form_two" => $lab->vegetative_form_two,
			"white_blood_cells" => $lab->white_blood_cells,
			"comments" => $lab->comments,
		));
	}

    $pdo->close();
	echo json_encode($response);
?>