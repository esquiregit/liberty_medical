<?php
	require "classes/conn.php";
	require "classes/hypersensitive_cpr.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = HypersensitiveCPR::read_hypersensitive_cprs($conn);

    $pdo->close();
	echo json_encode($response);
?>