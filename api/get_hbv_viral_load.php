<?php
	require "classes/conn.php";
	require "classes/hbv_viral_load.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = HBVViralLoad::read_hbv_viral_loads($conn);

    $pdo->close();
	echo json_encode($response);
?>