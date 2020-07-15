<?php
	require "classes/patient.php";
	require "classes/sale.php";

	header('Content-Type: application/json');
	$conn       = $pdo->open();
	$data 	    = file_get_contents("php://input");
	$request    = json_decode($data);
	$admin_id   = Methods::validate_string($request->admin_id);
	$id         = Methods::validate_string($request->saleData->id);
	// $patient_id = Methods::validate_string($request->saleData->patient_id);
	$product_id = Methods::validate_string($request->saleData->product_id);
	$quantity   = Methods::validate_string($request->saleData->quantity);
	$response   = array();

	if($request) {
		// $patient = Patient::read_patient_name($patient_id, $conn);
		$product = Stock::read_product($product_id, $conn)->product;
		$result  = Sale::pay_sale($id, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "Purchase Paid Successfully...."
			));
			Audit_Trail::create_log($admin_id, 'Paid For Purchase Of "'.$quantity.'" "'.$product.'s"', $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "Purchase Could Not Be Paid. Please Try Again...."
			));
			Audit_Trail::create_log($admin_id, 'Tried To Pay For "'.$patient.'"\s Purchase Of "'.$quantity.'" "'.$product.'s"', $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>