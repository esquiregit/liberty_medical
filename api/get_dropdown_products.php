<?php
	require "classes/stock.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = Stock::read_dropdown_products($conn);

    $pdo->close();
	echo json_encode($response);
?>