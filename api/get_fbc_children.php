<?php
	require "classes/conn.php";
	require "classes/fbc_children.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = FBC_Children::read_fbc_childrens($conn);

    $pdo->close();
	echo json_encode($response);
?>