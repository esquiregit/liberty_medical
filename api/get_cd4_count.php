<?php
	require "classes/conn.php";
	require "classes/cd4_count.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = CD4Count::read_cd4_counts($conn);

    $pdo->close();
	echo json_encode($response);
?>