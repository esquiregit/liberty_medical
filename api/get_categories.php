<?php
	require "classes/category.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = Category::read_categories($conn);

    $pdo->close();
	echo json_encode($response);
?>