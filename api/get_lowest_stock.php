<?php
	require "classes/stock.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = Stock::get_lowest_stock($conn);

    $pdo->close();
	echo json_encode($response);
?>