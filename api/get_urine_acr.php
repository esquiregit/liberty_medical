<?php
	require "classes/conn.php";
	require "classes/urine_acr.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = UrineACR::read_urine_acrs($conn);

    $pdo->close();
	echo json_encode($response);
?>