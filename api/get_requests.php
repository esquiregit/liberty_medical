<?php
	header('Content-Type: application/json');
	require "classes/request.php";

	$conn     = $pdo->open();
	$data 	  = file_get_contents("php://input");
	$request  = json_decode($data);
	$branch   = Methods::validate_string($request->branch);
	$role     = Methods::validate_string($request->role);
	$response = array();

	if(!empty($branch) && !empty($role)) {
		$requests = Request::read_requests($role, $branch, $conn);

		foreach ($requests as $request) {
			array_push($response, array(
				'id'                 => $request->id,
				'request_id'         => $request->request_id,
				'patient_id'         => $request->patient_id,
				'requests'           => $request->requests,
				'staff'              => $request->uother_name ? $request->ufirst_name.' '.$request->uother_name.' '.$request->ulast_name : $request->ufirst_name.' '.$request->ulast_name,
				'done_staff'         => $request->dother_name ? $request->dfirst_name.' '.$request->dother_name.' '.$request->dlast_name : $request->dfirst_name.' '.$request->dlast_name,
				'date_added'         => date_format(date_create($request->date_added), 'l d F Y \a\t H:i:s'),
				'date_done'          => date_format(date_create($request->date_done), 'l d F Y \a\t H:i:s'),
				'status'             => $request->status,
				'branch'             => $request->branch,
				'total_cost'         => 'GHS '.$request->total_cost,
				'total_cost_raw'     => $request->total_cost,
				'discount'		     => $request->discount,
				'discounted_cost'    => 'GHS '.$request->discounted_cost.' ('.$request->discount.'%)',
				'discounted_cost_raw'=> $request->discounted_cost,
				'amount_paid'        => 'GHS '.$request->amount_paid,
				'amount_paid_raw'    => $request->amount_paid,
				'payment_type'       => $request->payment_type ? $request->payment_type : 'None Yet',
				'payment_status'     => $request->payment_status,
				'patient'            => $request->pmiddle_name ? $request->pfirst_name.' '.$request->pmiddle_name.' '.$request->plast_name : $request->pfirst_name.' '.$request->plast_name,
				'first_name'         => $request->pfirst_name,
				'middle_name'        => $request->pmiddle_name,
				'last_name'          => $request->plast_name,
			));
		}
	}

    $pdo->close();
	echo json_encode($response);
?>