<?php
	require "classes/conn.php";
	require "classes/cea.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = CEA::read_ceas($conn);

    $pdo->close();
	echo json_encode($response);
?>