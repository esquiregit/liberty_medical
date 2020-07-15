<?php
	require "classes/conn.php";
	require "classes/esr.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = ESR::read_esrs($conn);

    $pdo->close();
	echo json_encode($response);
?>