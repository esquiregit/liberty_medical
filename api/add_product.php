<?php
	require "classes/stock.php";

	header('Content-Type: application/json');
	$conn          = $pdo->open();
	$data 	       = file_get_contents("php://input");
	$request       = json_decode($data);
	$added_by      = Methods::validate_string($request->added_by);
	$product       = Methods::strtocapital(Methods::validate_string($request->product));  
	$category_id   = Methods::strtocapital(Methods::validate_string($request->category_id->id));  
	$description   = Methods::strtocapital(Methods::validate_string($request->description));
	$quantity      = Methods::strtocapital(Methods::validate_string($request->quantity));  
	$cost_price    = Methods::strtocapital(Methods::validate_string($request->cost_price));  
	$selling_price = Methods::strtocapital(Methods::validate_string($request->selling_price));  
	$added_by      = Methods::validate_string($request->added_by);
	$response      = array();

	if($request) {
		if(Stock::is_product_entered($product, $conn)) {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "\"".$product."\" Already Exist...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Add "'.$product.'" To Products But It Already Existed', $conn);
		} else {
			$result = Stock::create_product($product, $category_id, $description, $quantity, $cost_price, $selling_price, $added_by, $conn);

			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => "\"".$product."\" Added Successfully...."
				));
				Audit_Trail::create_log($added_by, 'Added "'.$product.'" To Products', $conn);
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => "\"".$product."\" Could Not Be Added. Please Try Again...."
				));
				Audit_Trail::create_log($added_by, 'Tried To Add "'.$product.'" To Products', $conn);
			}
		}
	}

    $pdo->close();
	echo json_encode($response);
?>