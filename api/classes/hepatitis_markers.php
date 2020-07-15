<?php
    require_once 'conn.php';
    require_once 'methods.php';
    require_once 'charge.php';

	class HepatitisMarkers {

        // create a hepatitis_markers record
        public static function create_hepatitis_markers($patient_id, $hep_a_igg_antibody, $hep_b_core_igm_antibody, $hep_a_igm_antibody, $hep_be_antigen, $hep_bs_antigen, $hep_be_antibody, $hep_bs_antibody, $hep_c_screen, $hep_b_core_igg_antibody, $comments, $added_by, $conn){
            $invoice_id = Methods::get_invoice_id('Hepatitis Markers', $conn);
            $amount     = Charge::read_charge('44', $conn);
            try{
                $query = $conn->prepare('INSERT INTO hepatitis_markers(invoice_id, patient_id, hep_a_igg_antibody, hep_b_core_igm_antibody, hep_a_igm_antibody, hep_be_antigen, hep_bs_antigen, hep_be_antibody, hep_bs_antibody, hep_c_screen, hep_b_core_igg_antibody, comments, added_by)  VALUES(:invoice_id, :patient_id, :hep_a_igg_antibody, :hep_b_core_igm_antibody, :hep_a_igm_antibody, :hep_be_antigen, :hep_bs_antigen, :hep_be_antibody, :hep_bs_antibody, :hep_c_screen, :hep_b_core_igg_antibody, :comments, :added_by)');
                $query->execute([':invoice_id' => $invoice_id, ':patient_id' => $patient_id, ':hep_a_igg_antibody' => $hep_a_igg_antibody, ':hep_b_core_igm_antibody' => $hep_b_core_igm_antibody, ':hep_a_igm_antibody' => $hep_a_igm_antibody, ':hep_be_antigen' => $hep_be_antigen, ':hep_bs_antigen' => $hep_bs_antigen, ':hep_be_antibody' => $hep_be_antibody, ':hep_bs_antibody' => $hep_bs_antibody, ':hep_c_screen' => $hep_c_screen, ':hep_b_core_igg_antibody' => $hep_b_core_igg_antibody, ':comments' => $comments, ':added_by' => $added_by]);

                return true;
            }catch(PDOException $ex){
            	return false;
            }
        }

        // fetch all hepatitis_markers records
        public static function read_hepatitis_markers($conn){
            try{
                $query = $conn->prepare('SELECT hm.id, hm.invoice_id, hm.patient_id, hm.hep_a_igg_antibody, hm.hep_b_core_igm_antibody, hm.hep_a_igm_antibody, hm.hep_be_antigen, hm.hep_bs_antigen, hm.hep_be_antibody, hm.hep_bs_antibody, hm.hep_c_screen, hm.hep_b_core_igg_antibody, hm.comments, hm.added_by, hm.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM hepatitis_markers hm INNER JOIN patients p ON hm.patient_id = p.patient_id INNER JOIN users u ON hm.added_by = u.staff_id');
                $query->execute();

                return $query->fetchAll(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // fetch a hepatitis_markers record
        public static function read_a_hepatitis_marker($id, $conn){
            try{
                $query = $conn->prepare('SELECT hm.id, hm.invoice_id, hm.patient_id, hm.hep_a_igg_antibody, hm.hep_b_core_igm_antibody, hm.hep_a_igm_antibody, hm.hep_be_antigen, hm.hep_bs_antigen, hm.hep_be_antibody, hm.hep_bs_antibody, hm.hep_c_screen, hm.hep_b_core_igg_antibody, hm.comments, hm.added_by, hm.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM hepatitis_markers hm INNER JOIN patients p ON hm.patient_id = p.patient_id INNER JOIN users u ON hm.added_by = u.staff_id WHERE hm.id = :id');
                $query->execute([':id' => $id]);

                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // update a hepatitis_markers record
        public static function update_hepatitis_markers($id, $patient_id, $hep_a_igg_antibody, $hep_b_core_igm_antibody, $hep_a_igm_antibody, $hep_be_antigen, $hep_bs_antigen, $hep_be_antibody, $hep_bs_antibody, $hep_c_screen, $hep_b_core_igg_antibody, $comments, $added_by, $conn) {
            try{
                $query = $conn->prepare('UPDATE hepatitis_markers SET patient_id = :patient_id, hep_a_igg_antibody = :hep_a_igg_antibody, hep_b_core_igm_antibody = :hep_b_core_igm_antibody, hep_a_igm_antibody = :hep_a_igm_antibody, hep_be_antigen = :hep_be_antigen, hep_bs_antigen = :hep_bs_antigen, hep_be_antibody = :hep_be_antibody, hep_bs_antibody = :hep_bs_antibody, hep_c_screen = :hep_c_screen, hep_b_core_igg_antibody = :hep_b_core_igg_antibody, comments = :comments WHERE id = :id AND patient_id = :patient_id');
                $query->execute([':hep_a_igg_antibody' => $hep_a_igg_antibody, ':hep_b_core_igm_antibody' => $hep_b_core_igm_antibody, ':hep_a_igm_antibody' => $hep_a_igm_antibody, ':hep_be_antigen' => $hep_be_antigen, ':hep_bs_antigen' => $hep_bs_antigen, ':hep_be_antibody' => $hep_be_antibody, ':hep_bs_antibody' => $hep_bs_antibody, ':hep_c_screen' => $hep_c_screen, ':hep_b_core_igg_antibody' => $hep_b_core_igg_antibody, ':comments' => $comments, ':patient_id' => $patient_id, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

	}