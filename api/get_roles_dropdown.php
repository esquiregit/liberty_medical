<?php
	header('Content-Type: application/json');
	require "classes/role.php";

	$conn     = $pdo->open();
	$response = array();
	$result   = Role::read_roles($conn);

	foreach ($result as $row) {
		array_push($response, array(
			"value" => $row->id,
			"label" => $row->name
		));
	}

    $pdo->close();
	echo json_encode($response);
?>