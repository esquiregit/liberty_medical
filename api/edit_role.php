<?php
	require "classes/role.php";

	header('Content-Type: application/json');
	$conn        = $pdo->open();
	$data 	     = file_get_contents("php://input");
	$request     = json_decode($data);
	$staff_id    = Methods::validate_string($request->staff_id);
	$id    	     = Methods::validate_string($request->id);
	$name        = Methods::strtocapital(Methods::validate_string($request->name));
	$permissions = Methods::validate_array($request->permissions);
	$response    = array();
	
	if($request) {
		if(Role::is_this_role_available($name, $id, $conn)) {
			$result = Role::update_role($id, $name, $permissions, $conn);
			
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => "Role Updated Successfully...."
				));
				Audit_Trail::create_log($staff_id, 'Updated Role '.$name.'', $conn);
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => "Role Could Not Be Updated. Please Try Again...."
				));
				Audit_Trail::create_log($staff_id, 'Tried To Update Role '.$name.'', $conn);
			}
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "Role $name Already Exists...."
			));
			Audit_Trail::create_log($staff_id, 'Tried To Update Role '.$name.' But It Already Exists', $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>