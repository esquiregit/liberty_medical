<?php
	require "classes/conn.php";
	require "classes/h_pylori_ag_blood.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = HPyloriAgBlood::read_h_pylori_ag_bloods($conn);

    $pdo->close();
	echo json_encode($response);
?>