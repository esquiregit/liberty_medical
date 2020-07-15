<?php
	require "classes/aspirate_cs.php";

	header('Content-Type: application/json');
	$conn                 = $pdo->open();
	$data 	              = file_get_contents("php://input");
	$request              = json_decode($data);
	$id          		  = Methods::validate_string($request->id);
	$patient_id           = Methods::validate_string($request->patient_id);
	$gram_stain           = Methods::validate_array($request->gram_stain);
	$zn_stain             = Methods::validate_array($request->zn_stain);
	$fungal_element       = Methods::validate_array($request->fungal_element);
	$culture              = Methods::validate_array($request->culture);
	$bacteria_one         = Methods::validate_array($request->bacteria_one);
	$bacteria_two         = Methods::validate_array($request->bacteria_two);
	$antibiotics_one      = Methods::validate_array($request->antibiotics_one);
	$antibiotics_two      = Methods::validate_array($request->antibiotics_two);
	$antibiotics_three    = Methods::validate_array($request->antibiotics_three);
	$antibiotics_four     = Methods::validate_array($request->antibiotics_four);
	$antibiotics_five     = Methods::validate_array($request->antibiotics_five);
	$antibiotics_six      = Methods::validate_array($request->antibiotics_six);
	$antibiotics_seven    = Methods::validate_array($request->antibiotics_seven);
	$antibiotics_eight    = Methods::validate_array($request->antibiotics_eight);
	$antibiotics_nine     = Methods::validate_array($request->antibiotics_nine);
	$antibiotics_ten      = Methods::validate_array($request->antibiotics_ten);
	$antibiotics_eleven   = Methods::validate_array($request->antibiotics_eleven);
	$antibiotics_twelve   = Methods::validate_array($request->antibiotics_twelve);
	$antibiotics_thirteen = Methods::validate_array($request->antibiotics_thirteen);
	$antibiotics_fourteen = Methods::validate_array($request->antibiotics_fourteen);
	$antibiotics_fifteen  = Methods::validate_array($request->antibiotics_fifteen);
	$antibiotics_sixteen  = Methods::validate_array($request->antibiotics_sixteen);
	$sensitivity_one       = Methods::strtocapital(Methods::validate_string($request->sensitivity_one));
	$sensitivity_two       = Methods::strtocapital(Methods::validate_string($request->sensitivity_two));
	$sensitivity_three     = Methods::strtocapital(Methods::validate_string($request->sensitivity_three));
	$sensitivity_four      = Methods::strtocapital(Methods::validate_string($request->sensitivity_four));
	$sensitivity_five      = Methods::strtocapital(Methods::validate_string($request->sensitivity_five));
	$sensitivity_six       = Methods::strtocapital(Methods::validate_string($request->sensitivity_six));
	$sensitivity_seven     = Methods::strtocapital(Methods::validate_string($request->sensitivity_seven));
	$sensitivity_eight     = Methods::strtocapital(Methods::validate_string($request->sensitivity_eight));
	$sensitivity_nine      = Methods::strtocapital(Methods::validate_string($request->sensitivity_nine));
	$sensitivity_ten       = Methods::strtocapital(Methods::validate_string($request->sensitivity_ten));
	$sensitivity_eleven    = Methods::strtocapital(Methods::validate_string($request->sensitivity_eleven));
	$sensitivity_twelve    = Methods::strtocapital(Methods::validate_string($request->sensitivity_twelve));
	$sensitivity_thirteen  = Methods::strtocapital(Methods::validate_string($request->sensitivity_thirteen));
	$sensitivity_fourteen  = Methods::strtocapital(Methods::validate_string($request->sensitivity_fourteen));
	$sensitivity_fifteen   = Methods::strtocapital(Methods::validate_string($request->sensitivity_fifteen));
	$sensitivity_sixteen   = Methods::strtocapital(Methods::validate_string($request->sensitivity_sixteen));
	$comments              = Methods::strtocapital(Methods::validate_string($request->comments));
	$added_by              = Methods::validate_string($request->entered_by);
	$response              = array();

	if($request) {
		$patient = Methods::read_patientname($patient_id, $conn);
		$result  = AspirateCS::update_aspirate_cs($id, $patient_id, $gram_stain, $zn_stain, $fungal_element, $culture, $bacteria_one, $bacteria_two, $antibiotics_one, $antibiotics_two, $antibiotics_three, $antibiotics_four, $antibiotics_five, $antibiotics_six, $antibiotics_seven, $antibiotics_eight, $antibiotics_nine, $antibiotics_ten, $antibiotics_eleven, $antibiotics_twelve, $antibiotics_thirteen, $antibiotics_fourteen, $antibiotics_fifteen, $antibiotics_sixteen, $sensitivity_one, $sensitivity_two, $sensitivity_three, $sensitivity_four, $sensitivity_five, $sensitivity_six, $sensitivity_seven, $sensitivity_eight, $sensitivity_nine, $sensitivity_ten, $sensitivity_eleven, $sensitivity_twelve, $sensitivity_thirteen, $sensitivity_fourteen, $sensitivity_fifteen, $sensitivity_sixteen, $comments, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "Aspirate C/S Lab Updated Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Updated Aspirate C/S Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "Aspirate C/S Lab Could Not Be Updated. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Update Aspirate C/S Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>