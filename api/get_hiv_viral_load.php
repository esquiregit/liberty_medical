<?php
	require "classes/conn.php";
	require "classes/hiv_viral_load.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = HIVViralLoad::read_hiv_viral_loads($conn);

    $pdo->close();
	echo json_encode($response);
?>