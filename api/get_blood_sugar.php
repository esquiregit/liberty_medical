<?php
	require "classes/conn.php";
	require "classes/blood_sugar.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = BloodSugar::read_blood_sugars($conn);

    $pdo->close();
	echo json_encode($response);
?>