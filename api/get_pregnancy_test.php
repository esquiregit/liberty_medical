<?php
	require "classes/conn.php";
	require "classes/pregnancy_test.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = PregnancyTest::read_pregnancy_tests($conn);

    $pdo->close();
	echo json_encode($response);
?>