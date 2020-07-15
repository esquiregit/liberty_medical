<?php
	require "classes/conn.php";
	require "classes/bue_creatinine.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = BueCreatinine::read_bue_creatinines($conn);

    $pdo->close();
	echo json_encode($response);
?>