<?php
	require "classes/conn.php";
	require "classes/estrogen.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = Estrogen::read_estrogens($conn);

    $pdo->close();
	echo json_encode($response);
?>