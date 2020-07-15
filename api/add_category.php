<?php
	require "classes/category.php";

	header('Content-Type: application/json');
	$conn        = $pdo->open();
	$data 	     = file_get_contents("php://input");
	$request     = json_decode($data);
	$staff_id    = Methods::validate_string($request->staff_id);
	$name        = Methods::strtocapital(Methods::validate_string($request->name));
	$description = Methods::strtocapital(Methods::validate_string($request->description));
	$response    = array();

	if($request) {
		if(Category::is_category_name_taken($name, $conn)) {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "Category \"".$name."\" Already Exist...."
			));
			Audit_Trail::create_log($staff_id, 'Tried To Add "'.$name.'" To Categories But It Already Existed', $conn);
		} else {
			$result = Category::create_category($name, $description, $conn);

			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => "Category \"".$name."\" Added Successfully...."
				));
				Audit_Trail::create_log($staff_id, 'Added "'.$name.'" To Categories', $conn);
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => "Category \"".$name."\" Could Not Be Added. Please Try Again...."
				));
				Audit_Trail::create_log($staff_id, 'Tried To Add "'.$name.'" To Categories', $conn);
			}
		}
	}

    $pdo->close();
	echo json_encode($response);
?>