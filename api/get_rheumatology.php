<?php
	require "classes/conn.php";
	require "classes/rheumatology.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = Rheumatology::read_rheumatologies($conn);

    $pdo->close();
	echo json_encode($response);
?>