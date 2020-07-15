<?php
	require "classes/urine_re.php";

	header('Content-Type: application/json');
	$conn                     = $pdo->open();
	$data 	                  = file_get_contents("php://input");
	$request                  = json_decode($data);//die(print_r($request));
	$id           		      = Methods::validate_string($request->id);
	$patient_id               = Methods::validate_string($request->patient_id);
	$epitheleal_cells_per_hpf = Methods::validate_string($request->epitheleal_cells_per_hpf);
	$pus_cells_per_hps        = Methods::validate_string($request->pus_cells_per_hps);
	$comments                 = Methods::validate_string($request->comments);
	$rbcs_per_hpf             = Methods::validate_string($request->rbcs_per_hpf);
	$appearance               = Methods::validate_array($request->appearance);
	$colour                   = Methods::validate_array($request->colour);
	$ph                       = Methods::validate_array($request->ph);
	$specific_gravity         = Methods::validate_array($request->specific_gravity);
	$protein                  = Methods::validate_array($request->protein);
	$leucocytes               = Methods::validate_array($request->leucocytes);
	$glucose                  = Methods::validate_array($request->glucose);
	$urobilinogen             = Methods::validate_array($request->urobilinogen);
	$blood                    = Methods::validate_array($request->blood);
	$ketones                  = Methods::validate_array($request->ketones);
	$bilirubin                = Methods::validate_array($request->bilirubin);
	$nitrites                 = Methods::validate_array($request->nitrites);
	$bile_pigment             = Methods::validate_array($request->bile_pigment);
	$bile_salt                = Methods::validate_array($request->bile_salt);
	$urobilin                 = Methods::validate_array($request->urobilin);
	$yeast_like_cells         = Methods::validate_array($request->yeast_like_cells);
	$s_haematobium            = Methods::validate_array($request->s_haematobium);
	$bacteria                 = Methods::validate_array($request->bacteria);
	$spermatozoa              = Methods::validate_array($request->spermatozoa);
	$crystals                 = Methods::validate_array($request->crystals);
	$unknown_one              = Methods::validate_array($request->unknown_one);
	$cast                     = Methods::validate_array($request->cast);
	$unknown_two              = Methods::validate_array($request->unknown_two);
	$comments                 = Methods::validate_string($request->comments);
	$added_by                 = Methods::validate_string($request->entered_by);
	$response                 = array();

	if($request) {
		$patient = Methods::read_patientname($patient_id, $conn);
		$result  = Urine_RE::update_urine_re($id, $patient_id, $appearance, $colour, $ph, $specific_gravity, $protein, $leucocytes, $glucose, $urobilinogen, $blood, $ketones, $bilirubin, $nitrites, $bile_pigment, $bile_salt, $urobilin, $pus_cells_per_hps, $yeast_like_cells, $epitheleal_cells_per_hpf, $s_haematobium, $rbcs_per_hpf, $bacteria, $spermatozoa, $crystals, $unknown_one, $cast, $unknown_two, $comments, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "Urine R/E Lab Added Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Added Urine R/E Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "Urine R/E Lab Could Not Be Added. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Add Urine R/E Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>