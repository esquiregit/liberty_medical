<?php
	require "classes/conn.php";
	require "classes/mantoux.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = Mantoux::read_mantouxs($conn);

    $pdo->close();
	echo json_encode($response);
?>