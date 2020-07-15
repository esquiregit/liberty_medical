<?php
	require "classes/conn.php";
	require "classes/reproductive_assay.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = ReproductiveAssay::read_reproductive_assays($conn);

    $pdo->close();
	echo json_encode($response);
?>