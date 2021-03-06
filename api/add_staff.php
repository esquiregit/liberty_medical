<?php
	header('Content-Type: application/json');
	require "classes/staff.php";

	$conn             = $pdo->open();
	$data 	          = file_get_contents("php://input");
	$request          = json_decode($data);//die(print_r($request));
	$staff    	      = Methods::validate_string($request->staff);
	$first_name       = Methods::strtocapital(Methods::validate_string($request->first_name)); 
	$other_name       = Methods::strtocapital(Methods::validate_string($request->other_name)); 
	$last_name        = Methods::strtocapital(Methods::validate_string($request->last_name)); 
	$gender           = Methods::validate_string($request->gender); 
	$email_address    = strtolower(Methods::validate_email($request->email_address)); 
	$phone_number     = Methods::validate_string($request->phone_number); 
	$phone_number_two = Methods::validate_string($request->phone_number_two); 
	$branch           = Methods::validate_string($request->branch);
	$role             = Methods::validate_string($request->role);
	$response 		  = array();
	$name             = $other_name ? $first_name.' '.$other_name.' '.$last_name : $first_name.' '.$last_name;
	
	if(!empty($staff) || !empty($first_name) || !empty($last_name) || !empty($email_address) || !empty($gender) || !empty($phone_number) || !empty($role) || !empty($branch)) {
		if(empty($first_name)) {
			array_push($response, array(
				"status"  => "Warning",
				"message" => "Please Fill In Staff's First Name...."
			));
		} else if(empty($last_name)) {
			array_push($response, array(
				"status"  => "Warning",
				"message" => "Please Fill In Staff's Last Name...."
			));
		} else if(empty($gender)) {
			array_push($response, array(
				"status"  => "Warning",
				"message" => "Please Select Staff's Gender...."
			));
		} else if(strtolower($gender) !== 'male' && strtolower($gender) !== 'female') {
			array_push($response, array(
				"status"  => "Warning",
				"message" => "Invalid Gender Selected...."
			));
		} else if(empty($email_address)) {
			array_push($response, array(
				"status"  => "Warning",
				"message" => "Please Fill In Staff's Email Address"
			));
		} else if(!Methods::valid_email_format($email_address)) {
	        array_push($response, array(
				"status"  => "Warning",
				"message" => "Invalid Email Address Format Entered"
			));
	    } else if(Staff::is_staff_email_taken($email_address, $conn)) {
			array_push($response, array(
				"status"  => "Warning",
				"message" => "Email Address \"" . $email_address . "\" Already Exists. Please Choose Another...."
			));
			Audit_Trail::create_log($staff, 'Tried To Add Staff "'.$name.'" But Email Address "'.$email_address.'" Was Already Used', $conn);
		} else if(empty($phone_number)) {
			array_push($response, array(
				"status"  => "Warning",
				"message" => "Please Fill In Staff's Phone Number...."
			));
		} else if(!ctype_digit($phone_number)) {
			array_push($response, array(
				"status"  => "Warning",
				"message" => "Phone Number Must Contain ONLY Digits...."
			));
		} else if(strlen($phone_number) !== 10) {
			array_push($response, array(
				"status"  => "Warning",
				"message" => "Phone Number MUST Contain 10 Digits...."
			));
		} else if(!Methods::is_prefix_valid($phone_number)) {
			array_push($response, array(
				"status"  => "Warning",
				"message" => "Invalid Phone Number Prefix...."
			));
		} else if(!empty($phone_number_two) && !ctype_digit($phone_number_two)) {
			array_push($response, array(
				"status"  => "Warning",
				"message" => "Alternative Phone Number Must Contain ONLY Digits...."
			));
		} else if(!empty($phone_number_two) && strlen($phone_number_two) !== 10) {
			array_push($response, array(
				"status"  => "Warning",
				"message" => "Alternative Phone Number MUST Contain 10 Digits...."
			));
		} else if(!empty($phone_number_two) && !Methods::is_prefix_valid($phone_number_two)) {
			array_push($response, array(
				"status"  => "Warning",
				"message" => "Invalid Alternative Phone Number Prefix...."
			));
		} else if(empty($role)) {
			array_push($response, array(
				"status"  => "Warning",
				"message" => "Please Select Staff's Role...."
			));
		} else if(strtolower($role) !== '1' && strtolower($role) !== '2' && strtolower($role) !== '3') {
			array_push($response, array(
				"status"  => "Warning",
				"message" => "Invalid Role Selected...."
			));
		} else if(empty($branch) || (strtolower($branch) !== 'korle bu' && strtolower($branch) !== 'amasaman' && strtolower($branch) !== 'east legon' && strtolower($branch) !== 'kasoa')) {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "Operation Failed. Please Try Again...."
			));
		} else {
			$result = Staff::create_staff($first_name, $other_name, $last_name, $gender, $email_address, $phone_number, $phone_number_two, $role, $branch, $conn);

			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => "Staff \"" . $name . "\" Added Successfully...."
				));
				Audit_Trail::create_log($staff, 'Added Staff "'.$name.'"', $conn);
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => "Staff \"" . $name . "\" Could Not Be Added. Please Try Again...."
				));
				Audit_Trail::create_log($staff, 'Tried To Add Staff "'.$name.'"', $conn);
			}
		}
	} else {
		array_push($response, array(
			"status"  => "Failure",
			"message" => "Operation Failed. Please Try Again...."
		));
	}

    $pdo->close();
	echo json_encode($response);
?>