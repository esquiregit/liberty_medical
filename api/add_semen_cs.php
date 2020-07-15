<?php
	require "classes/semen_cs.php";

	header('Content-Type: application/json');
	$conn                      = $pdo->open();
	$data 	                   = file_get_contents("php://input");
	$request                   = json_decode($data);
	$patient_id                = Methods::validate_string($request->patient_id);
	$patient                   = Methods::validate_string($request->patient);
	$culture                   = Methods::validate_array($request->culture);
	$bacteria_one              = Methods::validate_array($request->bacteria_one);
	$bacteria_two              = Methods::validate_array($request->bacteria_two);
	$bacteria_three            = Methods::validate_array($request->bacteria_three);
	$antibiotics_one           = Methods::validate_array($request->antibiotics_one);
	$antibiotics_two           = Methods::validate_array($request->antibiotics_two);
	$antibiotics_three         = Methods::validate_array($request->antibiotics_three);
	$antibiotics_four          = Methods::validate_array($request->antibiotics_four);
	$antibiotics_five          = Methods::validate_array($request->antibiotics_five);
	$antibiotics_six           = Methods::validate_array($request->antibiotics_six);
	$antibiotics_seven         = Methods::validate_array($request->antibiotics_seven);
	$antibiotics_eight         = Methods::validate_array($request->antibiotics_eight);
	$antibiotics_nine          = Methods::validate_array($request->antibiotics_nine);
	$antibiotics_ten           = Methods::validate_array($request->antibiotics_ten);
	$antibiotics_eleven        = Methods::validate_array($request->antibiotics_eleven);
	$antibiotics_twelve        = Methods::validate_array($request->antibiotics_twelve);
	$antibiotics_thirteen      = Methods::validate_array($request->antibiotics_thirteen);
	$antibiotics_fourteen      = Methods::validate_array($request->antibiotics_fourteen);
	$antibiotics_fifteen       = Methods::validate_array($request->antibiotics_fifteen);
	$antibiotics_sixteen       = Methods::validate_array($request->antibiotics_sixteen);
	$antibiotics_seventeen     = Methods::validate_array($request->antibiotics_seventeen);
	$antibiotics_eighteen      = Methods::validate_array($request->antibiotics_eighteen);
	$antibiotics_nineteen      = Methods::validate_array($request->antibiotics_nineteen);
	$antibiotics_twenty        = Methods::validate_array($request->antibiotics_twenty);
	$antibiotics_twenty_one    = Methods::validate_array($request->antibiotics_twenty_one);
	$antibiotics_twenty_two    = Methods::validate_array($request->antibiotics_twenty_two);
	$antibiotics_twenty_three  = Methods::validate_array($request->antibiotics_twenty_three);
	$antibiotics_twenty_four   = Methods::validate_array($request->antibiotics_twenty_four);
	$sensitivity_one           = Methods::strtocapital(Methods::validate_string($request->sensitivity_one));
	$sensitivity_two           = Methods::strtocapital(Methods::validate_string($request->sensitivity_two));
	$sensitivity_three         = Methods::strtocapital(Methods::validate_string($request->sensitivity_three));
	$sensitivity_four          = Methods::strtocapital(Methods::validate_string($request->sensitivity_four));
	$sensitivity_five          = Methods::strtocapital(Methods::validate_string($request->sensitivity_five));
	$sensitivity_six           = Methods::strtocapital(Methods::validate_string($request->sensitivity_six));
	$sensitivity_seven         = Methods::strtocapital(Methods::validate_string($request->sensitivity_seven));
	$sensitivity_eight         = Methods::strtocapital(Methods::validate_string($request->sensitivity_eight));
	$sensitivity_nine          = Methods::strtocapital(Methods::validate_string($request->sensitivity_nine));
	$sensitivity_ten           = Methods::strtocapital(Methods::validate_string($request->sensitivity_ten));
	$sensitivity_eleven        = Methods::strtocapital(Methods::validate_string($request->sensitivity_eleven));
	$sensitivity_twelve        = Methods::strtocapital(Methods::validate_string($request->sensitivity_twelve));
	$sensitivity_thirteen      = Methods::strtocapital(Methods::validate_string($request->sensitivity_thirteen));
	$sensitivity_fourteen      = Methods::strtocapital(Methods::validate_string($request->sensitivity_fourteen));
	$sensitivity_fifteen       = Methods::strtocapital(Methods::validate_string($request->sensitivity_fifteen));
	$sensitivity_sixteen       = Methods::strtocapital(Methods::validate_string($request->sensitivity_sixteen));
	$sensitivity_seventeen     = Methods::strtocapital(Methods::validate_string($request->sensitivity_seventeen));
	$sensitivity_eighteen      = Methods::strtocapital(Methods::validate_string($request->sensitivity_eighteen));
	$sensitivity_nineteen      = Methods::strtocapital(Methods::validate_string($request->sensitivity_nineteen));
	$sensitivity_twenty        = Methods::strtocapital(Methods::validate_string($request->sensitivity_twenty));
	$sensitivity_twenty_one    = Methods::strtocapital(Methods::validate_string($request->sensitivity_twenty_one));
	$sensitivity_twenty_two    = Methods::strtocapital(Methods::validate_string($request->sensitivity_twenty_two));
	$sensitivity_twenty_three  = Methods::strtocapital(Methods::validate_string($request->sensitivity_twenty_three));
	$sensitivity_twenty_four   = Methods::strtocapital(Methods::validate_string($request->sensitivity_twenty_four));
	$comments                  = Methods::strtocapital(Methods::validate_string($request->comments));
	$added_by                  = Methods::validate_string($request->entered_by);
	$response                  = array();

	if($request) {
		$result = SemenCS::create_semen_cs($patient_id, $culture, $bacteria_one, $bacteria_two, $bacteria_three, $antibiotics_one, $antibiotics_two, $antibiotics_three, $antibiotics_four, $antibiotics_five, $antibiotics_six, $antibiotics_seven, $antibiotics_eight, $antibiotics_nine, $antibiotics_ten, $antibiotics_eleven, $antibiotics_twelve, $antibiotics_thirteen, $antibiotics_fourteen, $antibiotics_fifteen, $antibiotics_sixteen, $antibiotics_seventeen, $antibiotics_eighteen, $antibiotics_nineteen, $antibiotics_twenty, $antibiotics_twenty_one, $antibiotics_twenty_two, $antibiotics_twenty_three, $antibiotics_twenty_four, $sensitivity_one, $sensitivity_two, $sensitivity_three, $sensitivity_four, $sensitivity_five, $sensitivity_six, $sensitivity_seven, $sensitivity_eight, $sensitivity_nine, $sensitivity_ten, $sensitivity_eleven, $sensitivity_twelve, $sensitivity_thirteen, $sensitivity_fourteen, $sensitivity_fifteen, $sensitivity_sixteen, $sensitivity_seventeen, $sensitivity_eighteen, $sensitivity_nineteen, $sensitivity_twenty, $sensitivity_twenty_one, $sensitivity_twenty_two, $sensitivity_twenty_three, $sensitivity_twenty_four, $comments, $added_by, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "Semen C/S Lab Added Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Added Semen C/S Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "Semen C/S Lab Could Not Be Added. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Add Semen C/S Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>