<?php
	require "classes/conn.php";
	require "classes/bue_creatinine_egfr.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = BueCreatinineEgfr::read_bue_creatinine_egfrs($conn);

    $pdo->close();
	echo json_encode($response);
?>