<?php
	require "classes/conn.php";
	require "classes/urine_cs.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = Urine_CS::read_urine_cs($conn);

    $pdo->close();
	echo json_encode($response);
?>