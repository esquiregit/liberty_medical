<?php
	require "classes/sale.php";

	header('Content-Type: application/json');
	$conn           = $pdo->open();
	$data 	        = file_get_contents("php://input");
	$request        = json_decode($data);
	$staff_id       = Methods::validate_string($request->staff_id);
	$id             = Methods::validate_string($request->id);  
	$invoice_id     = Methods::validate_string($request->invoice_id);
	$old_product_id = Methods::validate_string($request->old_product_id);
	$product_id     = Methods::validate_string($request->product_id);
	// $patient_id     = Methods::validate_string($request->patient_id);
	$old_quantity   = Methods::validate_string($request->old_quantity);
	$quantity       = Methods::validate_string($request->quantity);
	$price_per_unit = Methods::validate_string($request->price_per_unit);
	$total_sale     = Methods::validate_string($request->total_sale);
	$amount_paid    = Methods::validate_string($request->amount_paid);
	$added_by       = Methods::validate_string($request->added_by);
	$response       = array();

	if($request) {
		$product = Stock::read_product_name($product_id, $conn);
		// $patient = Patient::read_patient_name($patient_id, $conn);

		if(Sale::is_product_available($product_id, $conn)) {
			if(Sale::is_quantity_greater_than_stock($product_id, $quantity, $conn)) {
				$result = Sale::parse_update_sale_data($id, $invoice_id, $product_id, $old_product_id, $quantity, $old_quantity, $price_per_unit, $total_sale, $amount_paid, $conn);
				if($result) {
					array_push($response, array(
						"status"  => "Success",
						"message" => "Sale Of \"".$product."\" Updated Successfully...."
					));
					Audit_Trail::create_log($staff_id, 'Updated Sale Of "'.$quantity.'" "'.$product, $conn);
				} else {
					array_push($response, array(
						"status"  => "Failed",
						"message" => "Sale Of \"".$product."\" Could Not Be Updated. Please Try Again...."
					));
					Audit_Trail::create_log($staff_id, 'Tried To Update Sale Of "'.$quantity.'" "'.$product, $conn);
				}
			} else {
				array_push($response, array(
					"status"  => "Failed",
					"message" => "Quantity In Stock Is Less Than ".$quantity."...."
				));
				Audit_Trail::create_log($staff_id, 'Tried To Update Sale Of "'.$quantity.'" "'.$product.'" But Quantity In Stock Was Less', $conn);
			}
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "\"".$product."\" Is Out Of Stock...."
			));
			Audit_Trail::create_log($staff_id, 'Tried To Update Sale Of "'.$quantity.'" "'.$product.'" But Quantity Was Out Of Stock', $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>