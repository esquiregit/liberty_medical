<?php
	require "classes/conn.php";
	require "classes/aspirate_cs.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = AspirateCS::read_aspirate_cs($conn);

    $pdo->close();
	echo json_encode($response);
?>