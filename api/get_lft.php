<?php
	require "classes/conn.php";
	require "classes/lft.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = LFT::read_lfts($conn);

    $pdo->close();
	echo json_encode($response);
?>