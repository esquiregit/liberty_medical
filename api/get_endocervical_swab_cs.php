<?php
	require "classes/conn.php";
	require "classes/endocervical_swab_cs.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = EndocervicalSwabCS::read_endocervical_swab_cs($conn);

    $pdo->close();
	echo json_encode($response);
?>