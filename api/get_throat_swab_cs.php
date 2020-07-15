<?php
	require "classes/conn.php";
	require "classes/throat_swab_cs.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = ThroatSwabCS::read_throat_swab_cs($conn);

    $pdo->close();
	echo json_encode($response);
?>