<?php
    header('Content-Type: application/json');
    require "classes/conn.php";
    require "classes/staff.php";

    $conn       = $pdo->open();
    $data       = file_get_contents("php://input");
    $request    = json_decode($data);//die(print_r($request));
    $staff_id   = Methods::validate_string($request->i);
    $reset_code = Methods::validate_string($request->c);
    $response   = array();

    if(!empty($staff_id) && !empty($reset_code)) {
        $result = Staff::verify_password_change($staff_id, $reset_code, $conn);

        if($result) {
            array_push($response, array(
                "status"  => "Success",
                "message" => "Proceed With Password Changed...."
            ));
        } else {
            array_push($response, array(
                "status"  => "Error",
                "message" => "Invalid Password Change Request...."
            ));
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
