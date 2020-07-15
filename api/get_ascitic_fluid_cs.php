<?php
	require "classes/conn.php";
	require "classes/ascitic_fluid_cs.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = AsciticFluidCS::read_ascitic_fluid_cs($conn);

    $pdo->close();
	echo json_encode($response);
?>