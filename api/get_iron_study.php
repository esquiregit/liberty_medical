<?php
	require "classes/conn.php";
	require "classes/iron_study.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = IronStudy::read_iron_studys($conn);

    $pdo->close();
	echo json_encode($response);
?>