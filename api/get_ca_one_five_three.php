<?php
	require "classes/conn.php";
	require "classes/ca_one_five_three.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = CaOneFiveThree::read_ca_one_five_threes($conn);

    $pdo->close();
	echo json_encode($response);
?>