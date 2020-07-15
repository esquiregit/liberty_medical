<?php
	require "classes/conn.php";
	require "classes/hepatitis_b_profile.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = HepatitisBProfile::read_hepatitis_b_profiles($conn);

    $pdo->close();
	echo json_encode($response);
?>