<?php
	require "classes/conn.php";
	require "classes/bue_creatinine_lft.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = BueCreatinineLFT::read_bue_creatinine_lfts($conn);

    $pdo->close();
	echo json_encode($response);
?>