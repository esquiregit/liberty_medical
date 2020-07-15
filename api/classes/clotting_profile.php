<?php
    require_once 'conn.php';
    require_once 'methods.php';
    require_once 'charge.php';

	class ClottingProfile {

        // create a clotting_profile record
        public static function create_clotting_profile($patient_id, $bt, $pt_inr, $aptt, $control_time, $normal_plasma, $ratio, $inr, $factor_viii_assay, $factor_ix_activity, $comments, $added_by, $conn){
            $invoice_id = Methods::get_invoice_id('Clotting Profile', $conn);
            $amount     = Charge::read_charge('23', $conn);
            try{
                $query = $conn->prepare('INSERT INTO clotting_profile(invoice_id, patient_id, bt, pt_inr, aptt, control_time, normal_plasma, ratio, inr, factor_viii_assay, factor_ix_activity, comments, added_by)  VALUES(:invoice_id, :patient_id, :bt, :pt_inr, :aptt, :control_time, :normal_plasma, :ratio, :inr, :factor_viii_assay, :factor_ix_activity, :comments, :added_by)');
                $query->execute([':invoice_id' => $invoice_id, ':patient_id' => $patient_id, ':bt' => $bt, ':pt_inr' => $pt_inr, ':aptt' => $aptt, ':control_time' => $control_time, ':normal_plasma' => $normal_plasma, ':ratio' => $ratio, ':inr' => $inr, ':factor_viii_assay' => $factor_viii_assay, ':factor_ix_activity' => $factor_ix_activity, ':comments' => $comments, ':added_by' => $added_by]);

                return true;
            }catch(PDOException $ex){
            	return false;
            }
        }

        // fetch all clotting_profile records
        public static function read_clotting_profiles($conn){
            try{
                $query = $conn->prepare('SELECT cp.id, cp.invoice_id, cp.patient_id, cp.bt, cp.pt_inr, cp.aptt, cp.control_time, cp.normal_plasma, cp.ratio, cp.inr, cp.factor_viii_assay, cp.factor_ix_activity, cp.comments, cp.added_by, cp.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM clotting_profile cp INNER JOIN patients p ON cp.patient_id = p.patient_id INNER JOIN users u ON cp.added_by = u.staff_id');
                $query->execute();

                return $query->fetchAll(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // fetch a clotting_profile record
        public static function read_clotting_profile($id, $conn){
            try{
                $query = $conn->prepare('SELECT cp.id, cp.invoice_id, cp.patient_id, cp.bt, cp.pt_inr, cp.aptt, cp.control_time, cp.normal_plasma, cp.ratio, cp.inr, cp.factor_viii_assay, cp.factor_ix_activity, cp.comments, cp.added_by, cp.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM clotting_profile cp INNER JOIN patients p ON cp.patient_id = p.patient_id INNER JOIN users u ON cp.added_by = u.staff_id WHERE cp.id = :id');
                $query->execute([':id' => $id]);

                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // update a clotting_profile record
        public static function update_clotting_profile($id, $patient_id, $bt, $pt_inr, $aptt, $control_time, $normal_plasma, $ratio, $inr, $factor_viii_assay, $factor_ix_activity, $comments, $added_by, $conn) {
            try{
                $query = $conn->prepare('UPDATE clotting_profile SET patient_id = :patient_id, bt = :bt, pt_inr = :pt_inr, aptt = :aptt, control_time = :control_time, normal_plasma = :normal_plasma, ratio = :ratio, inr = :inr, factor_viii_assay = :factor_viii_assay, factor_ix_activity = :factor_ix_activity, comments = :comments WHERE id = :id AND patient_id = :patient_id');
                $query->execute([':bt' => $bt, ':pt_inr' => $pt_inr, ':aptt' => $aptt, ':control_time' => $control_time, ':normal_plasma' => $normal_plasma, ':ratio' => $ratio, ':inr' => $inr, ':factor_viii_assay' => $factor_viii_assay, ':factor_ix_activity' => $factor_ix_activity, ':comments' => $comments, ':patient_id' => $patient_id, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

	}