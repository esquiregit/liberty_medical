<?php
	require "classes/conn.php";
	require "classes/c_reactive_protein.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = CReactiveProtein::read_c_reactive_proteins($conn);

    $pdo->close();
	echo json_encode($response);
?>