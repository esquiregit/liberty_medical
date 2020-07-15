<?php
	header('Content-Type: application/json');
	$response = array();
	array_push($response, array(
		"status" => "true"
	));
	echo json_encode($response);
?>