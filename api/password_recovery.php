<?php
    header('Content-Type: application/json');
    require "classes/email.php";
    require "classes/methods.php";
    require "classes/staff.php";

    $conn          = $pdo->open();
    $data          = file_get_contents("php://input");
    $request       = json_decode($data);//die(print_r($request));
    $email_address = Methods::validate_string($request->email_address);
    $response      = array();

    if($email_address) {
        $result    = Staff::get_staff_by_email($email_address, $conn);

        if($result) {
            $staff_id   = $result->staff_id;
            $name       = $result->first_name.' '.$result->last_name;
            $reset_code = $result->reset_code;
            $message    = Email::get_password_reset_message($staff_id, $name, $reset_code);

            if(Email::send_email($email_address, 'Password Reset Link', $message, $message)) {
                array_push($response, array(
                    "status"  => "Success",
                    "message" => "Password Reset Link Has Been Sent To \"$email_address\"...."
                ));
            } else {
                array_push($response, array(
                    "status"  => "Error",
                    "message" => "Couldn't Send Password Reset Link. Please Try Again...."
                ));
            }
        } else {
            array_push($response, array(
                "status"  => "Error",
                "message" => "Email Address \"$email_address\" Doesn Not Exist...."
            ));
        }
    } else {
        array_push($response, array(
            "status"  => "Error",
            "message" => "Email Address Not Available. Please Try Again...."
        ));
    }

    $pdo->close();
    echo json_encode($response);
?>
