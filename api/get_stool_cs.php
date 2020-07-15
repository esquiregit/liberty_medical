<?php
	require "classes/conn.php";
	require "classes/stool_cs.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = StoolCS::read_stool_cs($conn);

    $pdo->close();
	echo json_encode($response);
?>