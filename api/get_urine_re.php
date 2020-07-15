<?php
	require "classes/conn.php";
	require "classes/urine_re.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = Urine_RE::read_urine_re($conn);

    $pdo->close();
	echo json_encode($response);
?>