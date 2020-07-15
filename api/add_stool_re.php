<?php
	require "classes/stool_re.php";

	header('Content-Type: application/json');
	$conn                = $pdo->open();
	$data 	             = file_get_contents("php://input");
	$request             = json_decode($data);
	$patient_id          = Methods::validate_string($request->patient_id);
	$patient             = Methods::validate_string($request->patient);
	$row_one_one         = Methods::validate_array($request->row_one_one);
	$ova_one             = Methods::validate_array($request->ova_one);
	$ova_two             = Methods::validate_array($request->ova_two);
	$row_three_one       = Methods::validate_array($request->row_three_one);
	$row_three_two       = Methods::validate_array($request->row_three_two);
	$row_four_one        = Methods::validate_array($request->row_four_one);
	$row_four_two        = Methods::validate_array($request->row_four_two);
	$larvae_one          = Methods::validate_array($request->larvae_one);
	$larvae_two          = Methods::validate_array($request->larvae_two);
	$cyst_one            = Methods::validate_array($request->cyst_one);
	$cyst_two            = Methods::validate_array($request->cyst_two);
	$row_seven_one       = Methods::validate_array($request->row_seven_one);
	$row_seven_two       = Methods::validate_array($request->row_seven_two);
	$row_eight_one       = Methods::validate_array($request->row_eight_one);
	$row_eight_two       = Methods::validate_array($request->row_eight_two);
	$vegetative_form_one = Methods::validate_array($request->vegetative_form_one);
	$vegetative_form_two = Methods::validate_array($request->vegetative_form_two);
	$row_ten_one         = Methods::validate_array($request->row_ten_one);
	$row_ten_two         = Methods::validate_array($request->row_ten_two);
	$row_eleven_one      = Methods::validate_array($request->row_eleven_one);
	$row_eleven_two      = Methods::validate_array($request->row_eleven_two);
	$red_blood_cells     = Methods::validate_array($request->red_blood_cells);
	$red_blood_cells     = Methods::validate_array($request->red_blood_cells);
	$white_blood_cells   = Methods::validate_array($request->white_blood_cells);
	$comments            = Methods::strtocapital(Methods::validate_string($request->comments));
	$added_by            = Methods::validate_string($request->entered_by);
	$response            = array();

	if($request) {
		$result = StoolRE::create_stool_re($patient_id, $row_one_one, $ova_one, $ova_two, $row_three_one, $row_three_two, $row_four_one, $row_four_two, $larvae_one, $larvae_two, $cyst_one, $cyst_two, $row_seven_one, $row_seven_two, $row_eight_one, $row_eight_two, $vegetative_form_one, $vegetative_form_two, $row_ten_one, $row_ten_two, $row_eleven_one, $row_eleven_two, $red_blood_cells, $white_blood_cells, $comments, $added_by, $conn);
		if($result) {
			array_push($response, array(
				"status"  => "Success",
				"message" => "Stool R/E Lab Added Successfully...."
			));
			Audit_Trail::create_log($added_by, 'Added Stool R/E Lab For '.$patient, $conn);
		} else {
			array_push($response, array(
				"status"  => "Failed",
				"message" => "Stool R/E Lab Could Not Be Added. Please Try Again...."
			));
			Audit_Trail::create_log($added_by, 'Tried To Add Stool R/E Lab For '.$patient, $conn);
		}
	}

    $pdo->close();
	echo json_encode($response);
?>