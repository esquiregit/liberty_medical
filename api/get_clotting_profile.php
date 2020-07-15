<?php
	require "classes/conn.php";
	require "classes/clotting_profile.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = ClottingProfile::read_clotting_profiles($conn);

    $pdo->close();
	echo json_encode($response);
?>