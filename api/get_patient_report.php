<?php
	require "classes/patient.php";
	require "classes/report.php";

	header('Content-Type: application/json');
	$conn       = $pdo->open();
	$data 	    = file_get_contents("php://input");
	$request    = json_decode($data);
	$staff_id   = Methods::validate_string($request->staff_id);
	$start_date = Methods::validate_string($request->patient_start_date);
	$end_date   = Methods::validate_string($request->patient_end_date);
	$patient_id	= Methods::validate_string($request->patient_id);
	$response   = array();
	$patient    = '';

    $date       = date_create($end_date);
    date_add($date, date_interval_create_from_date_string("1 days"));
    $end_date   = date_format($date, "Y-m-d");

	if($request) {
		$patient  = $patient_id ? Patient::read_patient_name($patient_id, $conn) : '';
		$requests = Report::get_patient_report($patient_id, $start_date, $end_date, $conn);
		array_push($response, array(
			"requests"        => $requests,
			"total"           => count($requests),
			"patient"         => $patient,
			"total_cost"      => Report::get_total_cost($requests, 'total_cost'),
			"total_paid"      => Report::get_total_paid($requests, 'amount_paid'),
		));
	}

	$patient_id ? Audit_Trail::create_log($staff_id, 'Viewed '.$patient.'\'s Report From '.date_format(date_create($start_date), 'd F Y').' To '.date_format(date_create($end_date), 'd F Y'), $conn) : Audit_Trail::create_log($staff_id, 'Viewed Report From '.date_format(date_create($start_date), 'd F Y').' To '.date_format(date_create($end_date), 'd F Y'), $conn);
    $pdo->close();
	echo json_encode($response);
?>
