<?php
	require "classes/request.php";

	header('Content-Type: application/json');
	$conn     = $pdo->open();
	$data 	  = file_get_contents("php://input");
	$request  = json_decode($data);
	$branch   = Methods::validate_string($request->branch);
	$response = Request::read_requests($conn, $branch);

    $pdo->close();
	echo json_encode($response);
?>