<?php
	require "classes/request.php";

	header('Content-Type: application/json');
	$conn       = $pdo->open();
	$data 	    = file_get_contents("php://input");
	$request    = json_decode($data);
	$added_by   = Methods::validate_string($request->added_by);
	$request_id = Methods::validate_string($request->request_id);
	$response   = array();

	if(!empty($added_by) && !empty($request_id)) {
		$charges    = array();
		$patient    = Methods::read_patientname(Request::get_request_patient_id($request_id, $conn), $conn);
		$result     = Request::read_request($request_id, $conn);
		$requests   = Request::get_requests($request_id, $conn);
		foreach($requests as $row) {
			array_push($charges, array(
				'cost' => Request::get_charge($row, $conn)
			));
		}
		
		if($result){
			array_push($response, array(
				'request_id'      => $result->request_id,
				'requests'        => $result->requests,
				'date_added'      => $result->date_added,
				'added_by'        => $result->added_by,
				'discount'        => $result->discount,
				'total_cost'      => $result->total_cost,
				'discounted_cost' => $result->discounted_cost,
				'amount_paid'     => $result->amount_paid,
				'payment_type'    => $result->payment_type,
				'branch'          => $result->branch,
				'date_of_birth'   => $result->date_of_birth,
				'gender'          => $result->gender,
				'pfirst_name'     => $result->pfirst_name,
				'pmiddle_name'    => $result->pmiddle_name,
				'plast_name'      => $result->plast_name,
				'name'	          => empty($result->uother_name) ? $result->ufirst_name.' '.$result->ulast_name : $result->ufirst_name.' '.$result->uother_name.' '.$result->ulast_name,
				'charges' 		  => $charges,
				'total_charge'    => Request::get_total_charge(explode(', ', $result->requests), $conn)
			));
		}

		Audit_Trail::create_log($added_by, 'Viewed Receipt For '.$patient, $conn);
	}

    $pdo->close();
	echo json_encode($response);
?>