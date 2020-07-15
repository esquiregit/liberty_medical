<?php
	require "classes/conn.php";
	require "classes/antenatal_screening.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = AntenatalScreening::read_antenatal_screenings($conn);

    $pdo->close();
	echo json_encode($response);
?>