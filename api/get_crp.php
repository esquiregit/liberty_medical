<?php
	require "classes/conn.php";
	require "classes/crp.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = CRP::read_crps($conn);

    $pdo->close();
	echo json_encode($response);
?>