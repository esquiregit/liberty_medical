<?php
	require "classes/conn.php";
	require "classes/calcium_profile.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = CalciumProfile::read_calcium_profiles($conn);

    $pdo->close();
	echo json_encode($response);
?>