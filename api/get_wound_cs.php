<?php
	require "classes/conn.php";
	require "classes/wound_cs.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = WoundCS::read_wound_cs($conn);

    $pdo->close();
	echo json_encode($response);
?>