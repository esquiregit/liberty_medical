<?php
	require "classes/consultation.php";

	header('Content-Type: application/json');
	$conn       = $pdo->open();
	$response   = array();
	$result     = Consultation::read_consultation_price($conn);

	if($result) {
		array_push($response, array(
			"status" => "Success",
			"price"  => $result
		));
	}

    $pdo->close();
	echo json_encode($response);
?>