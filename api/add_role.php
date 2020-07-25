<?php
	header('Content-Type: application/json');
	require "classes/role.php";

	$conn            = $pdo->open();
	$added_by        = Methods::validate_string($_POST['staff']);
	$name            = Methods::strtocapital(Methods::validate_string($_POST['role']));
	$permissions     = $_POST['permissions'] ? Methods::validate_array($_POST['permissions']) : Methods::validate_string($_POST['permissions']);
    $all_permissions = Methods::validate_string($_POST['all_permissions']);
	$response        = array();
	$count           = is_array($permissions) ? count($permissions) : 0;

	if(empty($added_by) || empty($name) || empty($all_permissions)) {
		array_push($response, array(
			"status"  => "Error",
			"message" => "Operation Failed. Please Try Again....."
		));
	} else {
		if(Role::is_role_available($name, $conn)) {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "Role \"".$name."\" Already Exists...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Create Role "'.$name.'" But It Already Exists', $conn);
		} else if(!$all_permissions && !$permissions) {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "Operation Failed. Please Try Again....."
			));
		} else {
			$permissions = $count ? implode(', ', $permissions) : Role::get_all_permissions();
			$result      = Role::create_role($name, $permissions, $added_by, $conn);
			
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => "Role \"".$name."\" Created Successfully...."
				));
				Audit_Trail::create_log($added_by, 'Created Role "'.$name.'"', $conn);
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => "Role \"".$name."\" Could Not Be Created. Please Try Again...."
				));
				Audit_Trail::create_log($added_by, 'Tried To Create Role "'.$name.'"', $conn);
			}
		}
	}

    $pdo->close();
	echo json_encode($response);
?>