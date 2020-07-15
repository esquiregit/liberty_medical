<?php
	require "classes/conn.php";
	require "classes/sc3_sc4.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = SC3SC4::read_sc3_sc4s($conn);

    $pdo->close();
	echo json_encode($response);
?>