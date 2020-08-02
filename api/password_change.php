<?php
    header('Content-Type: application/json');
    require "classes/staff.php";

    $conn             = $pdo->open();
    $data             = file_get_contents("php://input");
    $request          = json_decode($data);//die(print_r($request));
    $staff_id         = Methods::validate_string($request->i);
    $reset_code       = Methods::validate_string($request->c);
    $password         = Methods::validate_string($request->p);
    $confirm_password = Methods::validate_string($request->cp);
    $response         = array();

    if($password && $confirm_password && $staff_id && $reset_code) {
         if(strlen($password) < 8) {
            array_push($response, array(
                "status"  => "Warning",
                "message" => "Password Must Contain At Least 8 Characters...."
            ));
        } else if($password !== $confirm_password) {
            array_push($response, array(
                "status"  => "Warning",
                "message" => "Passwords Don't Match...."
            ));
        } else {
            $result = Staff::change_password($staff_id, $password, $reset_code, $conn);

            if($result) {
                array_push($response, array(
                    "status"  => "Success",
                    "message" => "Password Changed Successfully. You Can Log In Now...."
                ));
            } else {
                array_push($response, array(
                    "status"  => "Error",
                    "message" => "Couldn't Update Password. Please Try Again...."
                ));
            }
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
