<?php
	require "classes/conn.php";
	require "classes/urethral_cs.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = UrethralCS::read_urethral_cs($conn);

    $pdo->close();
	echo json_encode($response);
?>