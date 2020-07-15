<?php
	require "classes/conn.php";
	require "classes/hepatitis_markers.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = HepatitisMarkers::read_hepatitis_markers($conn);

    $pdo->close();
	echo json_encode($response);
?>