<?php
	require "classes/conn.php";
	require "classes/alpha_feto_protein.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = AlphaFetoProtein::read_alpha_feto_proteins($conn);

    $pdo->close();
	echo json_encode($response);
?>