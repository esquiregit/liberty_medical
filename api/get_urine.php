<?php
	require "classes/conn.php";
	require "classes/urine.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = Urine::read_urines($conn);

    $pdo->close();
	echo json_encode($response);
?>