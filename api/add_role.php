<?php
	require "classes/role.php";

	header('Content-Type: application/json');
	$conn        = $pdo->open();
	$data 	     = file_get_contents("php://input");
	$request     = json_decode($data);
	$added_by    = Methods::validate_string($request->staff_id);
	$name        = Methods::strtocapital(Methods::validate_string($request->name));
	$permissions = Methods::validate_array($request->permissions);
	$response    = array();

	if($request) {
		if(!Role::is_role_available($name, $conn)) {
			$result = Role::create_role($name, $permissions, $added_by, $conn);
			
			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => "Role Created Successfully...."
				));
				Audit_Trail::create_log($added_by, 'Created Role '.$name.'', $conn);
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => "Role Could Not Be Created. Please Try Again...."
				));
				Audit_Trail::create_log($added_by, 'Tried To Create Role '.$name.'', $conn);
			}
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "Role $name Already Exists...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Create Role '.$name.' But It Already Exists', $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>