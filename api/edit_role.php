<?php
	header('Content-Type: application/json');
	require "classes/role.php";
	
	$conn            = $pdo->open();
	$id    	         = Methods::validate_string($_POST['id']);
	$added_by        = Methods::validate_string($_POST['staff']);
	$name            = Methods::strtocapital(Methods::validate_string($_POST['role']));
	$permissions     = $_POST['permissions'] ? Methods::validate_array($_POST['permissions']) : Methods::validate_string($_POST['permissions']);
    $all_permissions = Methods::validate_string($_POST['all_permissions']);
	$response        = array();
	$count           = is_array($permissions) ? count($permissions) : 0;
	$response        = array();
	
	if(empty($id) || empty($added_by) || empty($name) || empty($all_permissions)) {
		array_push($response, array(
			"status"  => "Error",
			"message" => "Operation Failed. Please Try Again....."
		));
	} else {
		if(Role::is_this_role_available($name, $id, $conn)) {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "Role \"".$name."\" Already Exists...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Update Role "'.$name.'" But It Already Exists', $conn);
		} else if(!$all_permissions && !$permissions) {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "Operation Failed. Please Try Again....."
			));
		} else {
			$permissions = $count ? implode(', ', $permissions) : Role::get_all_permissions();
			$result      = Role::update_role($id, $name, $permissions, $conn);
			
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => "Role \"".$name."\" Updated Successfully...."
				));
				Audit_Trail::create_log($added_by, 'Updated Role "'.$name.'"', $conn);
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => "Role \"".$name."\" Could Not Be Updated. Please Try Again...."
				));
				Audit_Trail::create_log($added_by, 'Tried To Update Role "'.$name.'"', $conn);
			}
		}
	}

    $pdo->close();
	echo json_encode($response);
?>