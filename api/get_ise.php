<?php
	require "classes/conn.php";
	require "classes/ise.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = ISE::read_ises($conn);

    $pdo->close();
	echo json_encode($response);
?>