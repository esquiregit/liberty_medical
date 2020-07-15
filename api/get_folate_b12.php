<?php
	require "classes/conn.php";
	require "classes/folate_b12.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = FolateB12::read_folate_b12s($conn);

    $pdo->close();
	echo json_encode($response);
?>