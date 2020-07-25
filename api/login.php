<?php
	require "classes/login.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$data 	  = file_get_contents("php://input");
	$request  = json_decode($data);//die(print_r($request));
	$username = Methods::validate_string($request->htrfdes);
	$password = Methods::validate_string($request->fdswaq); 
	$response = array();

	if(!empty($username) && !empty($password)) {
		if(empty($username)) {
			array_push($response, array(
				"status"  => "Warning",
				"message" => "Username/Email Address Required...."
			));
		} else {
	    	$result   = Login::login_user($username, $conn);
			if($result) {
				if(strtolower($result->status) == 'inactive' || strtolower($result->status) != 'active') {
					array_push($response, array(
						"status"  => "Failed",
						"message" => "Your Account Has Been Blocked"
					));
					Audit_Trail::create_log($result->staff_id, 'Tried To Log In But Failed Because Their Account Is Inactive', $conn);
				} else {
					if(password_verify($password, $result->password)) {
						if(strtolower($result->status) != 'active' || strtolower($result->status) == 'inactive') {
							array_push($response, array(
								"status"  => "Failed",
								"message" => "Your Account Has Been Blocked"
							));
							Audit_Trail::create_log($result->staff_id, 'Tried To Log In But Failed Because Their Account Is Inactive', $conn);
						} else {
							$log_in_token = Login::update_log_in_token($result->id, $conn);
							$result       = Login::fetch_user($result->staff_id, $conn);
							$name 		  = empty($result->other_name)
									        ? $result->first_name.' '.$result->last_name
									        : $result->first_name.' '.$result->other_name.' '.$result->last_name;
							$user 		  = array(
								"id"         	   => $result->id,
								"staff_id"         => $result->staff_id,
								"first_name"       => $result->first_name,
								"last_name"        => $result->last_name,
								"other_name"       => $result->other_name,
								"name"       	   => $name,
								"email_address"    => $result->email_address,
								"phone_number"     => $result->phone_number,
								"phone_number_two" => $result->phone_number_two,
								"username"         => $result->username,
								"role"             => $result->role,
								"role_name"        => $result->role_name,
								"logged_in_before" => $result->logged_in_before,
								"log_in_token"     => $log_in_token,
								"branch"           => $result->branch
							);
							
							array_push($response, array(
								"status"      => "Success",
								"message"     => "Login Success. Redirecting....",
								"user"        => $user,
								"permissions" => explode(', ', $result->permissions),
							));
					        Audit_Trail::create_log($result->staff_id, 'Logged In', $conn);
						}
					} else {
						array_push($response, array(
							"status"  => "Failed",
							"message" => "Invalid Log In Credentials"
						));
						if($result)
							Audit_Trail::create_log($result->staff_id, 'Tried To Log In But Failed Because They Provided Wrong Password', $conn);
					}
				}
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => "Invalid Log In Credentials"
				));
			}
		}
	} else {
		array_push($response, array(
			"status"  => "Failed",
			"message" => "Empty Strings Not Allowed. Operation Failed...."
		));
	}

    $pdo->close();
	echo json_encode($response);
?>