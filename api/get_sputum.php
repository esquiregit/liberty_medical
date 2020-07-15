<?php
	require "classes/conn.php";
	require "classes/sputum.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = Sputum::read_sputum($conn);

    $pdo->close();
	echo json_encode($response);
?>