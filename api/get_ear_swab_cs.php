<?php
	require "classes/conn.php";
	require "classes/ear_swab_cs.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = EarSwabCS::read_ear_swab_cs($conn);

    $pdo->close();
	echo json_encode($response);
?>