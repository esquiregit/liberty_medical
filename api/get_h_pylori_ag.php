<?php
	require "classes/conn.php";
	require "classes/h_pylori_ag.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = HPyloriAG::read_h_pylori_ags($conn);

    $pdo->close();
	echo json_encode($response);
?>