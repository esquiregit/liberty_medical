<?php
	require "classes/conn.php";
	require "classes/semen_cs.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = SemenCS::read_semen_cs($conn);

    $pdo->close();
	echo json_encode($response);
?>