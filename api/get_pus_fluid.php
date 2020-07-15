<?php
	require "classes/conn.php";
	require "classes/pus_fluid.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = PusFluid::read_pus_fluid($conn);

    $pdo->close();
	echo json_encode($response);
?>