<?php
	require "classes/conn.php";
	require "classes/troponin.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = Troponin::read_troponins($conn);

    $pdo->close();
	echo json_encode($response);
?>