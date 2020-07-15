<?php
	require "classes/conn.php";
	require "classes/specials.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = Specials::read_specials($conn);

    $pdo->close();
	echo json_encode($response);
?>