<?php
	require "classes/conn.php";
	require "classes/eye_swab_cs.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = EyeSwabCS::read_eye_swab_cs($conn);

    $pdo->close();
	echo json_encode($response);
?>