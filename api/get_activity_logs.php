<?php
	header('Content-Type: application/json');
	require "classes/conn.php";
	require "classes/audit_trail.php";

	$conn     = $pdo->open();
	$logs     = Audit_Trail::read_all_logs($conn);
	$response = array();

	foreach ($logs as $log) {
		array_push($response, array(
			"staff_id"  => $log->staff_id,
			"name"      => $log->other_name ? $log->first_name.' '.$log->other_name.' '.$log->last_name : $log->first_name.' '.$log->last_name,
			"role_name" => $log->role_name,
			"activity"  => $log->activity,
			"date"      => date_format(date_create($log->date), 'l d F Y \a\t H:i:s'),
		));
	}

    $pdo->close();
	echo json_encode($response);
?>