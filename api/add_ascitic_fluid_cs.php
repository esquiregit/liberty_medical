<?php
	require "classes/ascitic_fluid_cs.php";

	header('Content-Type: application/json');
	$conn                 = $pdo->open();
	$data 	              = file_get_contents("php://input");
	$request              = json_decode($data);
	$patient_id           = Methods::validate_string($request->patient_id);
	$patient              = Methods::validate_string($request->patient);
	$culture              = Methods::strtocapital(Methods::validate_string($request->culture));
	$bacteria_one         = Methods::strtocapital(Methods::validate_string($request->bacteria_one));
	$bacteria_two         = Methods::strtocapital(Methods::validate_string($request->bacteria_two));
	$antibiotics_one      = Methods::strtocapital(Methods::validate_string($request->antibiotics_one));
	$antibiotics_two      = Methods::strtocapital(Methods::validate_string($request->antibiotics_two));
	$antibiotics_three    = Methods::strtocapital(Methods::validate_string($request->antibiotics_three));
	$antibiotics_four     = Methods::strtocapital(Methods::validate_string($request->antibiotics_four));
	$antibiotics_five     = Methods::strtocapital(Methods::validate_string($request->antibiotics_five));
	$antibiotics_six      = Methods::strtocapital(Methods::validate_string($request->antibiotics_six));
	$antibiotics_seven    = Methods::strtocapital(Methods::validate_string($request->antibiotics_seven));
	$antibiotics_eight    = Methods::strtocapital(Methods::validate_string($request->antibiotics_eight));
	$antibiotics_nine     = Methods::strtocapital(Methods::validate_string($request->antibiotics_nine));
	$antibiotics_ten      = Methods::strtocapital(Methods::validate_string($request->antibiotics_ten));
	$antibiotics_eleven   = Methods::strtocapital(Methods::validate_string($request->antibiotics_eleven));
	$antibiotics_twelve   = Methods::strtocapital(Methods::validate_string($request->antibiotics_twelve));
	$antibiotics_thirteen = Methods::strtocapital(Methods::validate_string($request->antibiotics_thirteen));
	$antibiotics_fourteen = Methods::strtocapital(Methods::validate_string($request->antibiotics_fourteen));
	$antibiotics_fifteen  = Methods::strtocapital(Methods::validate_string($request->antibiotics_fifteen));
	$antibiotics_sixteen  = Methods::strtocapital(Methods::validate_string($request->antibiotics_sixteen));
	$sensitivity_one      = Methods::strtocapital(Methods::validate_string($request->sensitivity_one));
	$sensitivity_two      = Methods::strtocapital(Methods::validate_string($request->sensitivity_two));
	$sensitivity_three    = Methods::strtocapital(Methods::validate_string($request->sensitivity_three));
	$sensitivity_four     = Methods::strtocapital(Methods::validate_string($request->sensitivity_four));
	$sensitivity_five     = Methods::strtocapital(Methods::validate_string($request->sensitivity_five));
	$sensitivity_six      = Methods::strtocapital(Methods::validate_string($request->sensitivity_six));
	$sensitivity_seven    = Methods::strtocapital(Methods::validate_string($request->sensitivity_seven));
	$sensitivity_eight    = Methods::strtocapital(Methods::validate_string($request->sensitivity_eight));
	$sensitivity_nine     = Methods::strtocapital(Methods::validate_string($request->sensitivity_nine));
	$sensitivity_ten      = Methods::strtocapital(Methods::validate_string($request->sensitivity_ten));
	$sensitivity_eleven   = Methods::strtocapital(Methods::validate_string($request->sensitivity_eleven));
	$sensitivity_twelve   = Methods::strtocapital(Methods::validate_string($request->sensitivity_twelve));
	$sensitivity_thirteen = Methods::strtocapital(Methods::validate_string($request->sensitivity_thirteen));
	$sensitivity_fourteen = Methods::strtocapital(Methods::validate_string($request->sensitivity_fourteen));
	$sensitivity_fifteen  = Methods::strtocapital(Methods::validate_string($request->sensitivity_fifteen));
	$sensitivity_sixteen  = Methods::strtocapital(Methods::validate_string($request->sensitivity_sixteen));
	$comments             = Methods::strtocapital(Methods::validate_string($request->comments));
	$added_by             = Methods::validate_string($request->entered_by);
	$response             = array();

	if($request) {
		$result = AsciticFluidCS::create_ascitic_fluid_cs($patient_id, $culture, $bacteria_one, $bacteria_two, $bacteria_three, $antibiotics_one, $antibiotics_two, $antibiotics_three, $antibiotics_four, $antibiotics_five, $antibiotics_six, $antibiotics_seven, $antibiotics_eight, $antibiotics_nine, $antibiotics_ten, $antibiotics_eleven, $antibiotics_twelve, $antibiotics_thirteen, $antibiotics_fourteen, $antibiotics_fifteen, $antibiotics_sixteen, $antibiotics_seventeen, $antibiotics_eighteen, $antibiotics_nineteen, $antibiotics_twenty, $antibiotics_twenty_one, $antibiotics_twenty_two, $antibiotics_twenty_three, $antibiotics_twenty_four, $sensitivity_one, $sensitivity_two, $sensitivity_three, $sensitivity_four, $sensitivity_five, $sensitivity_six, $sensitivity_seven, $sensitivity_eight, $sensitivity_nine, $sensitivity_ten, $sensitivity_eleven, $sensitivity_twelve, $sensitivity_thirteen, $sensitivity_fourteen, $sensitivity_fifteen, $sensitivity_sixteen, $sensitivity_seventeen, $sensitivity_eighteen, $sensitivity_nineteen, $sensitivity_twenty, $sensitivity_twenty_one, $sensitivity_twenty_two, $sensitivity_twenty_three, $sensitivity_twenty_four, $comments, $added_by, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "Ascitic Fluid C/S Lab Added Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Added Ascitic Fluid C/S Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "Ascitic Fluid C/S Lab Could Not Be Added. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Add Ascitic Fluid C/S Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>