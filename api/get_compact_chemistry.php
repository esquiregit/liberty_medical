<?php
	require "classes/conn.php";
	require "classes/compact_chemistry.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = CompactChemistry::read_compact_chemistrys($conn);

    $pdo->close();
	echo json_encode($response);
?>