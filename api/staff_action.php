<?php
	header('Content-Type: application/json');
    require "classes/conn.php";
    require "classes/audit_trail.php";
    require "classes/methods.php";
    require "classes/staff.php";

    $conn       = $pdo->open();
	$data 	    = file_get_contents("php://input");
	$request    = json_decode($data);//die(print_r($request));
	$staff_id   = Methods::validate_string($request->staff_id);
	$staff_name = Methods::validate_string($request->staff_name);
	$staff      = Methods::validate_string($request->staff);
	$action     = Methods::validate_string(ucfirst($request->action));
	$response   = array();

	if($staff_id && $staff_name && $action && $staff) {
		if(strtolower($action) === 'unblock') {
			$result = staff::unblock_staff($staff_id, $conn);
		} else if(strtolower($action) === 'block') {
			$result = staff::block_staff($staff_id, $conn);
		}

		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => $staff_name." ".$action."ed Successfully...."
			));
			Audit_Trail::create_log($staff, $action.'ed '.$staff_name, $conn);
		} else {
			array_push($response, array(
				"status"  => "Error",
				"message" => "Couldn't ".$action." ".$staff_name.". Please Try Again...."
			));
			Audit_Trail::create_log($staff, 'Tried To '.$action.' '.$staff_name, $conn);
		}
	} else {
		array_push($response, array(
			"status"  => "Error",
			"message" => "Operation Failed. Please Try Again...."
		));
	}

    $pdo->close();
    echo json_encode($response);
?>
