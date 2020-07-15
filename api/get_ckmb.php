<?php
	require "classes/conn.php";
	require "classes/ckmb.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = CKMB::read_ckmbs($conn);

    $pdo->close();
	echo json_encode($response);
?>