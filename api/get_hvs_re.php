<?php
	require "classes/conn.php";
	require "classes/hvs_re.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = HVS_RE::read_hvs_re($conn);

    $pdo->close();
	echo json_encode($response);
?>