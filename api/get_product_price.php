<?php
	require "classes/stock.php";

	header('Content-Type: application/json');
	$conn       = $pdo->open();
	$data 	    = file_get_contents("php://input");
	$request    = json_decode($data);
	$product_id = Methods::validate_string($request->product_id);
	$response   = array();
	$result     = Stock::read_product_price($product_id, $conn);

	if($product_id) {
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"data"    => $result
			));
		}
	}

    $pdo->close();
	echo json_encode($response);
?>