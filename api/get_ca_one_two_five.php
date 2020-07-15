<?php
	require "classes/conn.php";
	require "classes/ca_one_two_five.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = CaOneTwoFive::read_ca_one_two_fives($conn);

    $pdo->close();
	echo json_encode($response);
?>