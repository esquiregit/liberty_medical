<?php
	header('Content-Type: application/json');
	require "classes/role.php";

	$conn     = $pdo->open();
	$response = array();
	$result   = Role::read_roles($conn);

	foreach ($result as $row) {
		array_push($response, array(
			"id"          => $row->id,
			"name"        => $row->name,
			"permissions" => $row->permissions,
			"total"       => count(explode(',', $row->permissions)),
			"added_by"    => $row->added_by
		));
	}

    $pdo->close();
	echo json_encode($response);
?>