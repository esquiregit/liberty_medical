<?php
	require "classes/staff.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$data 	  = file_get_contents("php://input");
	$request  = json_decode($data);
	$response = array();
	$stafff   = Staff::read_staff($conn);

	foreach ($stafff as $staff) {
		array_push($response, array(
			'branch'           => $staff->branch,
			'created_at'       => date_format(date_create($staff->created_at), 'd F Y \a\t H:i:s'),
			'email_address'    => $staff->email_address,
			'first_name'       => $staff->first_name,
			'username'         => $staff->username,
			'gender'           => $staff->gender,
			'id'               => $staff->id,
			'last_name'        => $staff->last_name,
			'logged_in_before' => $staff->logged_in_before,
			'other_name'       => $staff->other_name,
			'permissions'      => $staff->permissions,
			'phone_number'     => $staff->phone_number,
			'phone_number_two' => $staff->phone_number_two,
			'role'   	 	   => $staff->role,
			'role_id'	 	   => $staff->role_id,
			'staff_id'         => $staff->staff_id,
			'status'   	 	   => $staff->status,
			'name'             => $staff->other_name ? $staff->first_name.' '.$staff->other_name.' '.$staff->last_name : $staff->first_name.' '.$staff->last_name
		));
	}

    $pdo->close();
	echo json_encode($response);
?>