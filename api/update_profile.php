<?php
	require "classes/staff.php";

	header('Content-Type: application/json');
	$conn             = $pdo->open();
	$data 	          = file_get_contents("php://input");
	$request          = json_decode($data);
	$id               = Methods::validate_string($request->id);
	$staff_id         = Methods::validate_string($request->staff_id);
	$first_name       = Methods::strtocapital(Methods::validate_string($request->first_name));
	$other_name       = Methods::strtocapital(Methods::validate_string($request->other_name));
	$last_name        = Methods::strtocapital(Methods::validate_string($request->last_name));
	$email_address    = strtolower(Methods::validate_string($request->email_address));
	$phone_number     = Methods::validate_string($request->phone_number);
	$phone_number_two = Methods::validate_string($request->phone_number_two);
	$username         = Methods::validate_string($request->username);
	$password         = Methods::validate_string($request->password);        
	$response         = array();
	
	if($request) {
		$pronoun = Staff::read_a_staff($staff_id, $conn)->gender === 'Male' ? 'His' : 'Her';
		if(Staff::is_this_staff_email_taken($staff_id, $email_address, $conn)) {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "Email Address \"". $email_address ."\" Already Taken. Please Choose Another"
			));
			Audit_Trail::create_log($staff_id, 'Tried To Update '.$pronoun.' Profile But Email Address "'.$email_address.'" Was Already Used', $conn);
		} else if(Staff::is_this_staff_username_taken($staff_id, $username, $conn)) {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "Username \"". $username ."\" Already Taken. Please Choose Another"
			));
			Audit_Trail::create_log($staff_id, 'Tried To Update '.$pronoun.' Profile But Username "'.$username.'" Was Already Used', $conn);
		} else {
			if(empty($password)) {
				if(Staff::update_profile_without_password($id, $staff_id, $first_name, $other_name, $last_name, $email_address, $phone_number, $phone_number_two, $username, $conn)) {
					$result  = Staff::read_a_staff($staff_id, $conn);
					$name    = empty($result->other_name)
								? $result->first_name.' '.$result->last_name
								: $result->first_name.' '.$result->other_name.' '.$result->last_name;
					$user    = array(
						"first_name"       => $result->first_name,
						"last_name"        => $result->last_name,
						"other_name"       => $result->other_name,
						"name"       	   => $name,
						"email_address"    => $result->email_address,
						"phone_number"     => $result->phone_number,
						"phone_number_two" => $result->phone_number_two,
						"username"         => $result->username,
					);

					array_push($response, array(
						"status"  => "Success",
						"message" => "Profile Updated Successfully....",
						"user"    => $user
					));
					Audit_Trail::create_log($staff_id, 'Updated '.$pronoun.' Profile', $conn);
				} else {
					array_push($response, array(
						"status"  => "Failed",
						"message" => "Profile Could Not Be Updated. Please Try Again...."
					));
					Audit_Trail::create_log($staff_id, 'Tried To Update '.$pronoun.' Profile', $conn);
				}
			} else {
				if(Staff::update_profile_with_password($id, $staff_id, $first_name, $other_name, $last_name, $email_address, $phone_number, $phone_number_two, $username, $password, $conn)) {
					$result = Staff::read_a_staff($staff_id, $conn);
					$name   = empty($result->other_name)
								? $result->first_name.' '.$result->last_name
								: $result->first_name.' '.$result->other_name.' '.$result->last_name;
					$user   = array(
						"first_name"       => $result->first_name,
						"last_name"        => $result->last_name,
						"other_name"       => $result->other_name,
						"name"       	   => $name,
						"email_address"    => $result->email_address,
						"phone_number"     => $result->phone_number,
						"phone_number_two" => $result->phone_number_two,
						"username"         => $result->username,
					);

					array_push($response, array(
						"status"  => "Success",
						"message" => "Profile Updated Successfully....",
						"user"    => $user
					));
					Audit_Trail::create_log($staff_id, 'Updated '.$pronoun.' Profile', $conn);
				} else {
					array_push($response, array(
						"status"  => "Failed",
						"message" => "Profile Could Not Be Updated. Please Try Again"
					));
					Audit_Trail::create_log($staff_id, 'Tried To Update '.$pronoun.' Profile', $conn);
				}
			}
		}
	}

    $pdo->close();
	echo json_encode($response);
?>