<?php
	require "classes/conn.php";
	require "classes/charge.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$charges  = Charge::read_charges($conn);
	$response = array();

	foreach ($charges as $charge) {
		array_push($response, array(
			"id"  		 => $charge->id,
			"type"  	 => $charge->type,
			"amount"     => 'GHS '.$charge->amount,
			"amount_raw" => $charge->amount,
			"date_added" => date_format(date_create($charge->date_added), 'l d F Y \a\t H:i:s'),
			"staff"      => $charge->uother_name ? $charge->ufirst_name.' '.$charge->uother_name.' '.$charge->ulast_name : $charge->ufirst_name.' '.$charge->ulast_name,
		));
	}

    $pdo->close();
	echo json_encode($response);
?>