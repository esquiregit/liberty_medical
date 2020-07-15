<?php
	require "classes/conn.php";
	require "classes/bue_creatinine_lipids.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = BueCreatinineLipids::read_bue_creatinine_lipids($conn);

    $pdo->close();
	echo json_encode($response);
?>