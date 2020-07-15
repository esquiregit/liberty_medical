<?php
	require "classes/consultation.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = Consultation::read_consultations($conn);

    $pdo->close();
	echo json_encode($response);
?>