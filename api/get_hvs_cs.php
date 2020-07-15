<?php
	require "classes/conn.php";
	require "classes/hvs_cs.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = HVS_CS::read_hvs_cs($conn);

    $pdo->close();
	echo json_encode($response);
?>