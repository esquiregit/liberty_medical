<?php
	require "classes/conn.php";
	require "classes/psa.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = PSA::read_psas($conn);

    $pdo->close();
	echo json_encode($response);
?>