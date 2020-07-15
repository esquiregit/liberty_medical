<?php
	require "classes/notification.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$data 	  = file_get_contents("php://input");
	$request  = json_decode($data);
	$staff_id = Methods::validate_string($request->staff_id);
	$id       = Methods::validate_string($request->id);
	$response = array();
	
	if($request) {
		$result = Notification::update_notification($id, $staff_id, $conn);

		if($result) {
			$notification = Notification::read_notification($id, $conn)->description;
			array_push($response, array(
				"status"  => "Success",
				"message" => "Notification Updated Successfully...."
			));
			Audit_Trail::create_log($staff_id, 'Viewed Notification: '.$notification, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "Notification Could Not Be Updated. Please Try Again...."
			));
		}
	}

    $pdo->close();
	echo json_encode($response);
?>