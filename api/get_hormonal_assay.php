<?php
	require "classes/conn.php";
	require "classes/hormonal_assay.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = HormonalAssay::read_hormonal_assays($conn);

    $pdo->close();
	echo json_encode($response);
?>