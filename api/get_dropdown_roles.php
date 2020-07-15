<?php
	require "classes/role.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$response = Role::read_dropdown_roles($conn);

    $pdo->close();
	echo json_encode($response);
?>