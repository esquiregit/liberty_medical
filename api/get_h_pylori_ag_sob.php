<?php
	require "classes/conn.php";
	require "classes/h_pylori_ag_sob.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = HPyloriAgSOB::read_h_pylori_ag_sobs($conn);

    $pdo->close();
	echo json_encode($response);
?>