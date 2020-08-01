<?php
	require "classes/conn.php";
	require "classes/blood_cs.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$labs = BloodCS::read_blood_cs($conn);
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
			"antibiotics_seventeen" => $lab->antibiotics_seventeen,
			"antibiotics_eighteen" => $lab->antibiotics_eighteen,
			"antibiotics_nineteen" => $lab->antibiotics_nineteen,
			"antibiotics_twenty" => $lab->antibiotics_twenty,
			"antibiotics_twenty_one" => $lab->antibiotics_twenty_one,
			"antibiotics_twenty_two" => $lab->antibiotics_twenty_two,
			"antibiotics_twenty_three" => $lab->antibiotics_twenty_three,
			"antibiotics_twenty_four" => $lab->antibiotics_twenty_four,
			"bacteria_one" => $lab->bacteria_one,
			"bacteria_two" => $lab->bacteria_two,
			"bacteria_three" => $lab->bacteria_three,
			"comments" => $lab->comments,
			"culture" => $lab->culture,
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
			"sensitivity_seventeen" => $lab->sensitivity_seventeen,
			"sensitivity_eighteen" => $lab->sensitivity_eighteen,
			"sensitivity_nineteen" => $lab->sensitivity_nineteen,
			"sensitivity_twenty" => $lab->sensitivity_twenty,
			"sensitivity_twenty_one" => $lab->sensitivity_twenty_one,
			"sensitivity_twenty_two" => $lab->sensitivity_twenty_two,
			"sensitivity_twenty_three" => $lab->sensitivity_twenty_three,
			"sensitivity_twenty_four" => $lab->sensitivity_twenty_four,
		));
	}

    $pdo->close();
	echo json_encode($response);
?>