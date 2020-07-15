<?php
	require "classes/staff.php";

	header('Content-Type: application/json');
	$conn       = $pdo->open();
	$data 	    = file_get_contents("php://input");
	$request    = json_decode($data);
	$admin_id   = Methods::validate_string($request->admin_id);
	$staff_id   = Methods::validate_string($request->staff_id);
	$response   = array();

	if($request) {
		$name   = Staff::read_staff_name($staff_id, $conn);
		$result = Staff::block_staff($staff_id, $conn);

		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "Staff \"" . $name . "\" Blocked Successfully...."
			));
			Audit_Trail::create_log($admin_id, 'Blocked Staff "'.$name.'"', $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "Staff \"" . $name . "\" Could Not Be Blocked. Please Try Again...."
			));
			Audit_Trail::create_log($admin_id, 'Tried To Block Staff "'.$name.'"', $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>