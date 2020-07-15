<?php
	require "classes/conn.php";
	require "classes/serum_hcg_b.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = SerumHCGB::read_serum_hcg_bs($conn);

    $pdo->close();
	echo json_encode($response);
?>