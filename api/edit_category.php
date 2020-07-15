<?php
	require "classes/category.php";

	header('Content-Type: application/json');
	$conn        = $pdo->open();
	$data 	     = file_get_contents("php://input");
	$request     = json_decode($data);
	$staff_id    = Methods::validate_string($request->staff_id);
	$id          = Methods::validate_string($request->id);  
	$name        = Methods::strtocapital(Methods::validate_string($request->name));  
	$description = Methods::strtocapital(Methods::validate_string($request->description));
	$response    = array();

	if($request) {
		$old_name = Category::read_category($id, $conn)->name;
		if(Category::is_this_category_name_taken($id, $name, $conn)) {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "Category \"".$name."\" Already Exist...."
			));
			Audit_Trail::create_log($staff_id, 'Tried To Update Category "'.$old_name.'" To "'.$name.'" But It Already Existed', $conn);
		} else {
			$result = Category::update_category($id, $name, $description, $conn);

			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => "Category \"".$name."\" Updated Successfully...."
				));
				Audit_Trail::create_log($staff_id, 'Updated Category "'.$old_name.'" To "'.$name.'"', $conn);
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => "Category \"".$name."\" Could Not Be Updated. Please Try Again...."
				));
				Audit_Trail::create_log($staff_id, 'Tried To Update Category "'.$old_name.'" To "'.$name.'"', $conn);
			}
		}
	}

    $pdo->close();
	echo json_encode($response);
?>