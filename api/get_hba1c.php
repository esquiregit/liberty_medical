<?php
	require "classes/conn.php";
	require "classes/hba1c.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = HBA1C::read_hba1cs($conn);

    $pdo->close();
	echo json_encode($response);
?>