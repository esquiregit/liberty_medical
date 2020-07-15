<?php
	require "classes/conn.php";
	require "classes/sputum_afb.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = SputumAFB::read_sputum_afb($conn);

    $pdo->close();
	echo json_encode($response);
?>