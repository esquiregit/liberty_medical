<?php
	require "classes/conn.php";
	require "classes/cortisol.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = Cortisol::read_cortisols($conn);

    $pdo->close();
	echo json_encode($response);
?>