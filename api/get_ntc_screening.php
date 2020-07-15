<?php
	require "classes/conn.php";
	require "classes/ntc_screening.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = NTC_SCREENING::read_ntc_screenings($conn);

    $pdo->close();
	echo json_encode($response);
?>