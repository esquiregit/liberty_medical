<?php
	require "classes/conn.php";
	require "classes/m_alb.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = MALB::read_m_albs($conn);

    $pdo->close();
	echo json_encode($response);
?>