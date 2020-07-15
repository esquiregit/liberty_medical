<?php
	require "classes/conn.php";
	require "classes/blood_cs.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = BloodCS::read_blood_cs($conn);

    $pdo->close();
	echo json_encode($response);
?>