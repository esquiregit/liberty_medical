<?php
	header('Content-Type: application/json');
	require "classes/role.php";

	$conn     = $pdo->open();
	$response = array();
	$roles    = Role::read_roles($conn);

	foreach ($roles as $role) {
		array_push($response, array(
			"id"  		  => $role->id,
			"name"  	  => $role->name,
			"permissions" => $role->permissions,
			"total"       => count(explode(',', $role->permissions)),
			"staff"       => $role->other_name ? $role->first_name.' '.$role->other_name.' '.$role->last_name : $role->first_name.' '.$role->last_name,
		));
	}

	// foreach ($roles as $row) {
	// 	array_push($response, array(
	// 		"id"          => $row->id,
	// 		"name"        => $row->name,
	// 		"permissions" => $row->permissions,
	// 		"total"       => count(explode(',', $row->permissions)),
	// 		"added_by"    => $row->added_by
	// 	));
	// }

    $pdo->close();
	echo json_encode($response);
?>