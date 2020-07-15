<?php
	require "classes/conn.php";
	require "classes/semen_analysis.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = SemenAnalysis::read_semen_analysis($conn);

    $pdo->close();
	echo json_encode($response);
?>