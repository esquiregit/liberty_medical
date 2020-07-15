<?php
	require "classes/sale.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = Sale::read_sales($conn);

    $pdo->close();
	echo json_encode($response);
?>