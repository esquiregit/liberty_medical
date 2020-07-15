<?php
	require "classes/conn.php";
	require "classes/fbc_5p.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = FBC_5P::read_fbc_5ps($conn);

    $pdo->close();
	echo json_encode($response);
?>