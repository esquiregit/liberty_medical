<?php
	header('Content-Type: application/json');
	require "classes/patient.php";

	$conn     = $pdo->open();
	$data 	  = file_get_contents("php://input");
	$request  = json_decode($data);//die(print_r($request));
	$branch   = Methods::validate_string($request->branch);
	$role     = Methods::validate_string($request->role);
	$response = array();

	if(!empty($branch) && !empty($role)) {
		$patients = Patient::read_patients($role, $branch, $conn);

		foreach ($patients as $patient) {
			array_push($response, array(
				'id'                 => $patient->id,
				'patient_id'         => $patient->patient_id,
				'title'              => $patient->title,
				'branch'             => $patient->branch,
				'first_name'         => $patient->first_name,
				'middle_name'        => $patient->middle_name,
				'last_name'          => $patient->last_name,
				'name'               => $patient->middle_name ? $patient->first_name.' '.$patient->middle_name.' '.$patient->last_name : $patient->first_name.' '.$patient->last_name,
				'staff'              => $patient->uother_name ? $patient->ufirst_name.' '.$patient->uother_name.' '.$patient->ulast_name : $patient->ufirst_name.' '.$patient->ulast_name,
				'date_of_birth'      => date_format(date_create($patient->date_of_birth), 'd F Y \- \(l\)'),
				'date_of_birth_raw'  => $patient->date_of_birth,
				'gender'             => $patient->gender,
				'email_address'      => $patient->email_address,
				'home_phone'         => $patient->home_phone,
				'mobile_phone'       => $patient->mobile_phone,
				'work_phone'         => $patient->work_phone,
				'next_of_kin_name'   => $patient->next_of_kin_name,
				'next_of_kin_number' => $patient->next_of_kin_number,
				'date_added'         => date_format(date_create($patient->date_added), 'l d F Y \a\t H:i:s')
			));
		}
	}
	
    $pdo->close();
	echo json_encode($response);
?>