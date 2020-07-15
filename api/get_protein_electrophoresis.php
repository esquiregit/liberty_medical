<?php
	require "classes/conn.php";
	require "classes/protein_electrophoresis.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = ProteinElectrophoresis::read_protein_electrophoresis($conn);

    $pdo->close();
	echo json_encode($response);
?>