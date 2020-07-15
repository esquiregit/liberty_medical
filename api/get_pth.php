<?php
	require "classes/conn.php";
	require "classes/pth.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = PTH::read_pths($conn);

    $pdo->close();
	echo json_encode($response);
?>