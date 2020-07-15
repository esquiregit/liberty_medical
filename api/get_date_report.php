<?php
	require "classes/report.php";

	header('Content-Type: application/json');
	$conn       = $pdo->open();
	$data 	    = file_get_contents("php://input");
	$request    = json_decode($data);
	$staff_id   = Methods::validate_string($request->staff_id);
	$start_date = Methods::validate_string($request->start_date);
	$end_date   = Methods::validate_string($request->end_date);
	$response   = array();

    $date       = date_create($end_date);
    date_add($date, date_interval_create_from_date_string("1 days"));
    $end_date   = date_format($date, "Y-m-d");

	if($request) {
		$result = Report::get_report($start_date, $end_date, $conn);
		array_push($response, array(
			"results" => $result,
			"total"   => count($result)
		));
	}

	Audit_Trail::create_log($staff_id, 'Viewed Report From '.date_format(date_create($start_date), 'd F Y').' To '.date_format(date_create($end_date), 'd F Y'), $conn);
    $pdo->close();
	echo json_encode($response);
?>
