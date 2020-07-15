<?php
	require "classes/conn.php";
	require "classes/cardiac_enzyme.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = CardiacEnzyme::read_cardiac_enzymes($conn);

    $pdo->close();
	echo json_encode($response);
?>