<?php
	require "classes/receipt.php";

	header('Content-Type: application/json');
	$conn       = $pdo->open();
	$data 	    = file_get_contents("php://input");
	$request    = json_decode($data);
	$added_by   = Methods::validate_string($request->added_by);
	$patient_id = Methods::validate_string($request->patient_id);
	$response   = array();
	$data       = array();
	$total_cost = 0.00;
	$patient    = Methods::read_patientname($patient_id, $conn);

	$result     = Receipt::get_alpha_feto_protein($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_antenatal_screening($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_ascitic_fluid($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_blood_film_comment($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_aspirate($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_blood_cs($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_blood_sugar($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_bue_creatinine($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_bue_creatinine_egfr($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_bue_creatinine_lft($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_bue_creatinine_lipid($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_calcium_profile($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_cardiac_enzyme($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_ca_125($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_ca_153($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_cd4_count($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_cea($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_ckmb($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_clotting_profile($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_compact_chemistry($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_cortisol($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_crp($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_crp_ultra_sensitive($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_csf_biochem($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_c_reactive_protein($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_d_dimers($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_ear_swab($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_endocervical($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_esr($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_estrogen($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_eye_swab($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_fbc_3p($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_fbc_5p($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_fbc_children($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_general_chemistry($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_hba1c($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_hbv_viral_load($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_hepatitis_b_profile($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_hepatitis_markers($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_hiv_viral_load($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_hormonal_assay($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_hvs_cs($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_hvs_re($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_h_pylori_ag($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_h_pylori_ag_blood($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_h_pylori_ag_sob($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_hypersensitive_cpr($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_iron_study($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_ise($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_lft($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_lipid_profile($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_m_alb($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_mantoux($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_ntc_screening($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_pleural_fluid($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_pregnancy_test($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_protein_electrophoresis($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_psa($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_pth($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_pus_fluid($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_reproductive_assay($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_semen_analysis($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_rheumatology($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_sc3_sc4($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_semen_cs($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_serum_hcg_b($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_serum_lipase($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_skin_snip($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_specials($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_sputum_afb($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_sputum_cs($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_stool_cs($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_stool_re($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_tft($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_throat_swab($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_troponin($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_urethral_cs($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_urine($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_urine_cs($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_urine_re($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_urine_acr($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_widal($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}

	$result = Receipt::get_wound_cs($patient_id, $conn);
	foreach ($result as $row) {
		array_push($response, array(
			'patient_id'    => $row->patient_id,'invoice_id' => $row->invoice_id,
			'added_by'      => $row->added_by,
			'date_added'    => $row->date_added,
			
			'date_of_birth' => $row->date_of_birth,
			'gender'        => $row->gender,
			'pfirst_name'   => $row->pfirst_name,
			'pmiddle_name'  => $row->pmiddle_name,
			'plast_name'    => $row->plast_name,
			'ufirst_name'   => $row->ufirst_name,
			'uother_name'   => $row->uother_name,
			'ulast_name'    => $row->ulast_name,
		));
	}
	
	Audit_Trail::create_log($added_by, 'Printed Receipt For '.$patient, $conn);
    $pdo->close();
	echo json_encode($response);
?>