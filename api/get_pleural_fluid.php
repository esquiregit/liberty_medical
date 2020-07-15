<?php
	require "classes/conn.php";
	require "classes/pleural_fluid.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = PleuralFluid::read_pleural_fluid($conn);

    $pdo->close();
	echo json_encode($response);
?>