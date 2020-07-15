<?php
	require "classes/staff.php";

	header('Content-Type: application/json');
	$conn             = $pdo->open();
	$data 	          = file_get_contents("php://input");
	$request          = json_decode($data);
	$id               = Methods::validate_string($request->id);
	$staff_id         = Methods::validate_string($request->staff_id);
	$password         = Methods::validate_string($request->password);        
	$confirm_password = Methods::validate_string($request->confirm_password);        
	$response         = array();

	if($request) {
		$name    = Staff::read_staff_name($staff_id, $conn);
		$result  = Staff::update_password($id, $staff_id, $password, $conn);
		$gender  = Staff::read_a_staff($staff_id, $conn)->gender === 'Male' ? 'His' : 'Her';
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "Password Updated Successfully...."
			));
			Audit_Trail::create_log($staff_id, $name.' Updated '.$gender.' Password After First Login', $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "Password Could Not Be Updated. Please Try Again"
			));
			Audit_Trail::create_log($staff_id, $name.'Tried To Update '.$gender.' Password After First Login', $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>