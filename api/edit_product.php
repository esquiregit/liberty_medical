<?php
	require "classes/stock.php";

	header('Content-Type: application/json');
	$conn          = $pdo->open();
	$data 	       = file_get_contents("php://input");
	$request       = json_decode($data);
	$staff_id      = Methods::validate_string($request->staff_id);
	$id            = Methods::validate_string($request->id);  
	$product_id    = Methods::validate_string($request->product_id);  
	$product       = Methods::strtocapital(Methods::validate_string($request->product));
	$category_id   = $request->category_id; 
	$description   = Methods::strtocapital(Methods::validate_string($request->description));
	$quantity      = Methods::strtocapital(Methods::validate_string($request->quantity));  
	$cost_price    = Methods::strtocapital(Methods::validate_string($request->cost_price));  
	$selling_price = Methods::strtocapital(Methods::validate_string($request->selling_price));
	$response      = array();

	if($request) {
		$old_product = Stock::read_a_stock($id, $conn)->product;
		if(Stock::is_this_product_entered($id, $product, $conn)) {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "\"".$product."\" Already Exist...."
			));
			Audit_Trail::create_log($staff_id, 'Tried To Update Product Name From "'.$old_product.'" To "'.$product.'" But It Already Existed', $conn);
		} else {
			$result = Stock::update_product($id, $product_id, $product, $category_id, $description, $quantity, $cost_price, $selling_price, $conn);

			if($result) {
				array_push($response, array(
					"status"  => "Success",
					"message" => "\"".$product."\" Updated Successfully...."
				));
				Audit_Trail::create_log($staff_id, 'Updated Product "'.$product.'"', $conn);
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => "\"".$product."\" Could Not Be Updated. Please Try Again...."
				));
				Audit_Trail::create_log($staff_id, 'Tried To Update Product "'.$product.'"', $conn);
			}
		}
	}

    $pdo->close();
	echo json_encode($response);
?>