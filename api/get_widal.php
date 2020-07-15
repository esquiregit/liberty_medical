<?php
	require "classes/conn.php";
	require "classes/widal.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = Widal::read_widal($conn);

    $pdo->close();
	echo json_encode($response);
?>