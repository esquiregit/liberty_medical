<?php
	require "classes/conn.php";
	require "classes/d_dimers.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = DDimers::read_d_dimers($conn);

    $pdo->close();
	echo json_encode($response);
?>