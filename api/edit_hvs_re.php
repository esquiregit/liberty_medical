<?php
	require "classes/hvs_re.php";

	header('Content-Type: application/json');
	$conn                     = $pdo->open();
	$data 	                  = file_get_contents("php://input");
	$request                  = json_decode($data);
	$id             		  = Methods::validate_string($request->id);
	$patient_id               = Methods::validate_string($request->patient_id);
	$pus_cells_per_hps        = Methods::strtocapital(Methods::validate_string($request->pus_cells_per_hps));
	$epitheleal_cells_per_hpf = Methods::strtocapital(Methods::validate_string($request->epitheleal_cells_per_hpf));
	$red_blood_cells          = Methods::validate_array($request->red_blood_cells);
	$yeast_like_cells         = Methods::validate_array($request->yeast_like_cells);
	$t_vaginalis              = Methods::validate_array($request->t_vaginalis);
	$gnid                     = Methods::validate_array($request->gnid);
	$comments                 = Methods::strtocapital(Methods::validate_string($request->comments));
	$added_by                 = Methods::validate_string($request->entered_by);
	$response                 = array();

	if($request) {
		$patient = Methods::read_patientname($patient_id, $conn);
		$result  = HVS_RE::update_hvs_re($id, $patient_id, $pus_cells_per_hps, $epitheleal_cells_per_hpf, $red_blood_cells, $yeast_like_cells, $t_vaginalis, $gnid, $comments, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "HVS R/E Lab Updated Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Updated HVS R/E Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "HVS R/E Lab Could Not Be Updated. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Update HVS R/E Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>