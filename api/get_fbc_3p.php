<?php
	require "classes/conn.php";
	require "classes/fbc_3p.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = FBC_3P::read_fbc_3ps($conn);

    $pdo->close();
	echo json_encode($response);
?>