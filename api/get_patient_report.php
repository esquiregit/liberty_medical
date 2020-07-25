<?php
	header('Content-Type: application/json');
	require "classes/patient.php";
	require "classes/report.php";

	$conn       = $pdo->open();
	$data 	    = file_get_contents("php://input");
	$request    = json_decode($data);//die(print_r($request));
	$staff_id   = Methods::validate_string($request->staff);
	$start_date = Methods::validate_string($request->start_date);
	$end_date   = Methods::validate_string($request->end_date);
	$patient_id	= Methods::validate_string($request->patient_id);
	$response   = array();
	$reports    = array();
	$patient    = '';

    $date       = date_create($end_date);
    date_add($date, date_interval_create_from_date_string("1 days"));
    $end_date   = date_format($date, "Y-m-d");

	if($request) {
		$patient  = $patient_id ? Patient::read_patient_name($patient_id, $conn) : '';
		$requestss = Report::get_patient_report($patient_id, $start_date, $end_date, $conn);

		foreach ($requestss as $request) {
			array_push($reports, array(
				"id"                  => $request->id,
				"request_id"          => $request->request_id,
				"branch"              => $request->branch,
				"amount_paid"         => 'GHS '.$request->amount_paid,
				"amount_paid_raw"     => $request->amount_paid,
				"total_cost"          => 'GHS '.$request->total_cost,
				"total_cost_raw"      => $request->total_cost,
				"discount"            => $request->discount.'%',
				"discounted_cost"     => 'GHS '.$request->discounted_cost.' ('.$request->discount.'%)',
				"discounted_cost_raw" => $request->discounted_cost,
				"payment_status"      => $request->payment_status,
				"payment_type"        => $request->payment_type,
				"requests"            => $request->requests,
				"status"              => $request->status,
				"staff"               => $request->uother_name ? $request->ufirst_name.' '.$request->uother_name.' '.$request->ulast_name : $request->ufirst_name.' '.$request->ulast_name,
				"patient"             => $request->pmiddle_name ? $request->pfirst_name.' '.$request->pmiddle_name.' '.$request->plast_name : $request->pfirst_name.' '.$request->plast_name,
				'date_added'          => date_format(date_create($request->date_added), 'd F Y \a\t H:i:s'),
				'date_done'           => $request->date_done ? date_format(date_create($request->date_done), 'd F Y \a\t H:i:s') : 'Not Yet',
			));
		}

		array_push($response, array(
			"requests"        => $reports,
			"total"           => count($reports),
			"patient"         => $patient,
			"total_cost"      => Report::get_total_cost($reports),
			"total_paid"      => Report::get_total_paid($reports),
			"discounted_cost" => Report::get_total_discount($reports),
		));
	}

	$patient_id ? Audit_Trail::create_log($staff_id, 'Viewed '.$patient.'\'s Report From '.date_format(date_create($start_date), 'd F Y').' To '.date_format(date_create($end_date), 'd F Y'), $conn) : Audit_Trail::create_log($staff_id, 'Viewed Report From '.date_format(date_create($start_date), 'd F Y').' To '.date_format(date_create($end_date), 'd F Y'), $conn);
    $pdo->close();
	echo json_encode($response);
?>
