<?php
	require "classes/conn.php";
	require "classes/general_chemistry.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = GeneralChemistry::read_general_chemistrys($conn);

    $pdo->close();
	echo json_encode($response);
?>