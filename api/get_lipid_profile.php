<?php
	require "classes/conn.php";
	require "classes/lipid_profile.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = LipidProfile::read_lipid_profiles($conn);

    $pdo->close();
	echo json_encode($response);
?>