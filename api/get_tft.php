<?php
	require "classes/conn.php";
	require "classes/tft.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = TFT::read_tfts($conn);

    $pdo->close();
	echo json_encode($response);
?>