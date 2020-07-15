<?php
	require "classes/hvs_cs.php";

	header('Content-Type: application/json');
	$conn                     = $pdo->open();
	$data 	                  = file_get_contents("php://input");
	$request                  = json_decode($data);
	$id           		      = Methods::validate_string($request->id);
	$patient_id               = Methods::validate_string($request->patient_id);
	$pus_cells_per_hps        = Methods::validate_string($request->pus_cells_per_hps);
	$rbcs_per_hpf             = Methods::validate_string($request->rbcs_per_hpf);
	$epitheleal_cells_per_hpf = Methods::validate_string($request->epitheleal_cells_per_hpf);
	$t_vaginalis              = Methods::validate_array($request->t_vaginalis);
	$yeast_like_cells         = Methods::validate_array($request->yeast_like_cells);
	$gram_stain               = Methods::validate_array($request->gram_stain);
	$culture                  = Methods::validate_array($request->culture);
	$bacteria_one             = Methods::validate_array($request->bacteria_one);
	$bacteria_two             = Methods::validate_array($request->bacteria_two);
	$antibiotics_one          = Methods::validate_array($request->antibiotics_one);
	$antibiotics_two          = Methods::validate_array($request->antibiotics_two);
	$antibiotics_three        = Methods::validate_array($request->antibiotics_three);
	$antibiotics_four         = Methods::validate_array($request->antibiotics_four);
	$antibiotics_five         = Methods::validate_array($request->antibiotics_five);
	$antibiotics_six          = Methods::validate_array($request->antibiotics_six);
	$antibiotics_seven        = Methods::validate_array($request->antibiotics_seven);
	$antibiotics_eight        = Methods::validate_array($request->antibiotics_eight);
	$antibiotics_nine         = Methods::validate_array($request->antibiotics_nine);
	$antibiotics_ten          = Methods::validate_array($request->antibiotics_ten);
	$antibiotics_eleven       = Methods::validate_array($request->antibiotics_eleven);
	$antibiotics_twelve       = Methods::validate_array($request->antibiotics_twelve);
	$antibiotics_thirteen     = Methods::validate_array($request->antibiotics_thirteen);
	$antibiotics_fourteen     = Methods::validate_array($request->antibiotics_fourteen);
	$antibiotics_fifteen      = Methods::validate_array($request->antibiotics_fifteen);
	$antibiotics_sixteen      = Methods::validate_array($request->antibiotics_sixteen);
	$sensitivity_one          = Methods::strtocapital(Methods::validate_string($request->sensitivity_one));
	$sensitivity_two          = Methods::strtocapital(Methods::validate_string($request->sensitivity_two));
	$sensitivity_three        = Methods::strtocapital(Methods::validate_string($request->sensitivity_three));
	$sensitivity_four         = Methods::strtocapital(Methods::validate_string($request->sensitivity_four));
	$sensitivity_five         = Methods::strtocapital(Methods::validate_string($request->sensitivity_five));
	$sensitivity_six          = Methods::strtocapital(Methods::validate_string($request->sensitivity_six));
	$sensitivity_seven        = Methods::strtocapital(Methods::validate_string($request->sensitivity_seven));
	$sensitivity_eight        = Methods::strtocapital(Methods::validate_string($request->sensitivity_eight));
	$sensitivity_nine         = Methods::strtocapital(Methods::validate_string($request->sensitivity_nine));
	$sensitivity_ten          = Methods::strtocapital(Methods::validate_string($request->sensitivity_ten));
	$sensitivity_eleven       = Methods::strtocapital(Methods::validate_string($request->sensitivity_eleven));
	$sensitivity_twelve       = Methods::strtocapital(Methods::validate_string($request->sensitivity_twelve));
	$sensitivity_thirteen     = Methods::strtocapital(Methods::validate_string($request->sensitivity_thirteen));
	$sensitivity_fourteen     = Methods::strtocapital(Methods::validate_string($request->sensitivity_fourteen));
	$sensitivity_fifteen      = Methods::strtocapital(Methods::validate_string($request->sensitivity_fifteen));
	$sensitivity_sixteen      = Methods::strtocapital(Methods::validate_string($request->sensitivity_sixteen));
	$comments                 = Methods::strtocapital(Methods::validate_string($request->comments));
	$added_by                 = Methods::validate_string($request->entered_by);
	$response                 = array();

	if($request) {
		$patient = Methods::read_patientname($patient_id, $conn);
		$result  = HVS_CS::update_hvs_cs($id, $patient_id, $pus_cells_per_hps, $rbcs_per_hpf, $epitheleal_cells_per_hpf, $t_vaginalis, $yeast_like_cells, $gram_stain, $culture, $bacteria_one, $bacteria_two, $antibiotics_one, $antibiotics_two, $antibiotics_three, $antibiotics_four, $antibiotics_five, $antibiotics_six, $antibiotics_seven, $antibiotics_eight, $antibiotics_nine, $antibiotics_ten, $antibiotics_eleven, $antibiotics_twelve, $antibiotics_thirteen, $antibiotics_fourteen, $antibiotics_fifteen, $antibiotics_sixteen, $sensitivity_one, $sensitivity_two, $sensitivity_three, $sensitivity_four, $sensitivity_five, $sensitivity_six, $sensitivity_seven, $sensitivity_eight, $sensitivity_nine, $sensitivity_ten, $sensitivity_eleven, $sensitivity_twelve, $sensitivity_thirteen, $sensitivity_fourteen, $sensitivity_fifteen, $sensitivity_sixteen, $comments, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "HVS C/S Lab Updated Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Updated HVS C/S Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "HVS C/S Lab Could Not Be Updated. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Update HVS C/S Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>