<?php
	require "classes/conn.php";
	require "classes/serum_lipase.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = SerumLipase::read_serum_lipases($conn);

    $pdo->close();
	echo json_encode($response);
?>