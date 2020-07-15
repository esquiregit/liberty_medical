<?php
	require "classes/conn.php";
	require "classes/crp_ultra_sensitive.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = CrpUltraSensitive::read_crp_ultra_sensitives($conn);

    $pdo->close();
	echo json_encode($response);
?>