<?php
	require "classes/conn.php";
	require "classes/csf_biochem.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = CSFBiochem::read_csf_biochems($conn);

    $pdo->close();
	echo json_encode($response);
?>