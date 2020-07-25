<?php
	header('Content-Type: application/json');
	require "classes/patient.php";

	$conn               = $pdo->open();
	$data 	            = file_get_contents("php://input");
	$request            = json_decode($data);
	$staff_id           = Methods::validate_string($request->staff_id); 
	$id       	        = Methods::validate_string($request->id); 
	$patient_id         = Methods::validate_string($request->patient_id); 
	$title              = Methods::strtocapital(Methods::validate_string($request->title)); 
	$first_name         = Methods::strtocapital(Methods::validate_string($request->first_name)); 
	$middle_name        = Methods::strtocapital(Methods::validate_string($request->middle_name)); 
	$last_name          = Methods::strtocapital(Methods::validate_string($request->last_name)); 
	$date_of_birth      = Methods::validate_string($request->date_of_birth); 
	$gender             = Methods::validate_string($request->gender); 
	$email_address      = strtolower(Methods::validate_email($request->email_address)); 
	$home_phone         = Methods::validate_string($request->home_phone); 
	$mobile_phone       = Methods::validate_string($request->mobile_phone); 
	$work_phone         = Methods::validate_string($request->work_phone); 
	$next_of_kin_name   = Methods::strtocapital(Methods::validate_string($request->next_of_kin_name)); 
	$next_of_kin_number = Methods::validate_string($request->next_of_kin_number);
	$name               = $middle_name ? $first_name.' '.$middle_name.' '.$last_name : $first_name.' '.$last_name;
	$response           = array();
	$todays_date 	    = date("Y-m-d", strtotime(Date("Y-m-d")));
	
	if(!empty($staff_id) && !empty($id) && !empty($patient_id) && !empty($title) && !empty($first_name) && !empty($last_name) && !empty($date_of_birth) && !empty($gender) && !empty($mobile_phone) && !empty($next_of_kin_name) && !empty($next_of_kin_number)) {
		if(empty($title)) {
			array_push($response, array(
				"status"  => "Warning",
				"message" => "Please Select Patient's Title...."
			));
		} else if(strtolower($title) !== 'mr.' && strtolower($title) !== 'mrs.' && strtolower($title) !== 'ms.' && strtolower($title) !== 'prof.' && strtolower($title) !== 'dr.') {
			array_push($response, array(
				"status"  => "Warning",
				"message" => "Invalid Title Selected...."
			));
		} else if(empty($first_name)) {
			array_push($response, array(
				"status"  => "Warning",
				"message" => "Please Fill In Patient's First Name...."
			));
		} else if(empty($last_name)) {
			array_push($response, array(
				"status"  => "Warning",
				"message" => "Please Fill In Patient's Last Name...."
			));
		} else if(empty($gender)) {
			array_push($response, array(
				"status"  => "Warning",
				"message" => "Please Select Patient's Gender...."
			));
		} else if(strtolower($gender) !== 'male' && strtolower($gender) !== 'female') {
			array_push($response, array(
				"status"  => "Warning",
				"message" => "Invalid Gender Selected...."
			));
		} else if(empty($date_of_birth)) {
			array_push($response, array(
				"status"  => "Warning",
				"message" => "Please Fill In Patient's Date of Birth"
			));
		} else if($date_of_birth > $todays_date) {
			array_push($response, array(
				"status"  => "Warning",
				"message" => "Date Of Birth Cannot Be In The Future"
			));
		} else if(strlen($email_address) && !Methods::valid_email_format($email_address)) {
	        array_push($response, array(
				"status"  => "Warning",
				"message" => "Invalid Email Address Format Entered"
			));
	    } else if(strlen($email_address) && Patient::is_this_patient_email_taken($patient_id, $email_address, $conn)) {
			array_push($response, array(
				"status"  => "Warning",
				"message" => "Email Address \"" . $email_address . "\" Already Exists. Please Choose Another...."
			));
			Audit_Trail::create_log($staff_id, 'Tried To Add Patient "'.$name.'" But Email Address "'.$email_address.'" Was Already Used', $conn);
		} else if(empty($mobile_phone)) {
			array_push($response, array(
				"status"  => "Warning",
				"message" => "Please Fill In Patient's Mobile Phone Number...."
			));
		} else if(!ctype_digit($mobile_phone)) {
			array_push($response, array(
				"status"  => "Warning",
				"message" => "Mobile Phone Number Must Contain ONLY Digits...."
			));
		} else if(strlen($mobile_phone) !== 10) {
			array_push($response, array(
				"status"  => "Warning",
				"message" => "Mobile Phone Number MUST Contain 10 Digits...."
			));
		} else if(!Methods::is_prefix_valid($mobile_phone)) {
			array_push($response, array(
				"status"  => "Warning",
				"message" => "Invalid Mobile Phone Number Prefix...."
			));
		} else if(!empty($home_phone) && !ctype_digit($home_phone)) {
			array_push($response, array(
				"status"  => "Warning",
				"message" => "Home Phone Number Must Contain ONLY Digits...."
			));
		} else if(!empty($home_phone) && strlen($home_phone) !== 10) {
			array_push($response, array(
				"status"  => "Warning",
				"message" => "Home Phone Number MUST Contain 10 Digits...."
			));
		} else if(!empty($home_phone) && !Methods::is_prefix_valid($home_phone)) {
			array_push($response, array(
				"status"  => "Warning",
				"message" => "Invalid Home Phone Number Prefix...."
			));
		} else if(!empty($work_phone) && !ctype_digit($work_phone)) {
			array_push($response, array(
				"status"  => "Warning",
				"message" => "Work Phone Number Must Contain ONLY Digits...."
			));
		} else if(!empty($work_phone) && strlen($work_phone) !== 10) {
			array_push($response, array(
				"status"  => "Warning",
				"message" => "Work Phone Number MUST Contain 10 Digits...."
			));
		} else if(!empty($work_phone) && !Methods::is_prefix_valid($work_phone)) {
			array_push($response, array(
				"status"  => "Warning",
				"message" => "Invalid Work Phone Number Prefix...."
			));
		} else if(empty($next_of_kin_name)) {
			array_push($response, array(
				"status"  => "Warning",
				"message" => "Please Fill In Patient's Next Of Kin...."
			));
		} else if(empty($next_of_kin_number)) {
			array_push($response, array(
				"status"  => "Warning",
				"message" => "Please Fill In Patient's Next Of Kin's Phone Number...."
			));
		} else if(!ctype_digit($next_of_kin_number)) {
			array_push($response, array(
				"status"  => "Warning",
				"message" => "Next Of Kin's Phone Number Must Contain ONLY Digits...."
			));
		} else if(strlen($next_of_kin_number) !== 10) {
			array_push($response, array(
				"status"  => "Warning",
				"message" => "Next Of Kin's Phone Number MUST Contain 10 Digits...."
			));
		} else if(!Methods::is_prefix_valid($next_of_kin_number)) {
			array_push($response, array(
				"status"  => "Warning",
				"message" => "Invalid Next Of Kin's Phone Number Prefix...."
			));
		} else { 
			$result = Patient::update_patient($id, $patient_id, $title, $first_name, $middle_name, $last_name, $date_of_birth, $gender, $email_address, $home_phone, $mobile_phone, $work_phone, $next_of_kin_name, $next_of_kin_number, $conn);

			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => "Patient \"" . $name . "\" Updated Successfully...."
				));
				Audit_Trail::create_log($staff_id, 'Updated Patient "'.$name.'"', $conn);
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => "Patient \"" . $name . "\" Could Not Be Updated. Please Try Again...."
				));
				Audit_Trail::create_log($staff_id, 'Tried To Update Patient "'.$name.'"', $conn);
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