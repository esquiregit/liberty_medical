<?php
    require_once 'conn.php';
    require_once 'methods.php';
    require_once 'charge.php';

	class CalciumProfile {

        // create a calcium_profile record
        public static function create_calcium_profile($patient_id, $s_calcium_total, $s_calcium_total_flag, $s_ionized_calcium_calc, $s_ionized_calcium_calc_flag, $s_albumin, $s_albumin_flag, $s_total_protein, $s_total_protein_flag, $corrected_calcium_calc, $comments, $added_by, $conn){
            $invoice_id = Methods::get_invoice_id('Calcium Profile', $conn);
            $amount     = Charge::read_charge('21', $conn);
            try{
                $query = $conn->prepare('INSERT INTO calcium_profile(invoice_id, patient_id, s_calcium_total, s_calcium_total_flag, s_ionized_calcium_calc, s_ionized_calcium_calc_flag, s_albumin, s_albumin_flag, s_total_protein, s_total_protein_flag, corrected_calcium_calc, comments, added_by)  VALUES(:invoice_id, :patient_id, :s_calcium_total, :s_calcium_total_flag, :s_ionized_calcium_calc, :s_ionized_calcium_calc_flag, :s_albumin, :s_albumin_flag, :s_total_protein, :s_total_protein_flag, :corrected_calcium_calc, :comments, :added_by)');
                $query->execute([':invoice_id' => $invoice_id, ':patient_id' => $patient_id, ':s_calcium_total' => $s_calcium_total, ':s_calcium_total_flag' => $s_calcium_total_flag, ':s_ionized_calcium_calc' => $s_ionized_calcium_calc, ':s_ionized_calcium_calc_flag' => $s_ionized_calcium_calc_flag, ':s_albumin' => $s_albumin, ':s_albumin_flag' => $s_albumin_flag, ':s_total_protein' => $s_total_protein, ':s_total_protein_flag' => $s_total_protein_flag, ':corrected_calcium_calc' => $corrected_calcium_calc, ':comments' => $comments, ':added_by' => $added_by]);

                return true;
            }catch(PDOException $ex){
            	return false;
            }
        }

        // fetch all calcium_profile records
        public static function read_calcium_profiles($conn){
            try{
                $query = $conn->prepare('SELECT cp.id, cp.invoice_id, cp.patient_id, cp.s_calcium_total, cp.s_calcium_total_flag, cp.s_ionized_calcium_calc, cp.s_ionized_calcium_calc_flag, cp.s_albumin, cp.s_albumin_flag, cp.s_total_protein, cp.s_total_protein_flag, cp.corrected_calcium_calc, cp.comments, cp.added_by, cp.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM calcium_profile cp INNER JOIN patients p ON cp.patient_id = p.patient_id INNER JOIN users u ON cp.added_by = u.staff_id');
                $query->execute();

                return $query->fetchAll(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // fetch a calcium_profile record
        public static function read_calcium_profile($id, $conn){
            try{
                $query = $conn->prepare('SELECT cp.id, cp.invoice_id, cp.patient_id, cp.s_calcium_total, cp.s_calcium_total_flag, cp.s_ionized_calcium_calc, cp.s_ionized_calcium_calc_flag, cp.s_albumin, cp.s_albumin_flag, cp.s_total_protein, cp.s_total_protein_flag, cp.corrected_calcium_calc, cp.comments, cp.added_by, cp.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM calcium_profile cp INNER JOIN patients p ON cp.patient_id = p.patient_id INNER JOIN users u ON cp.added_by = u.staff_id WHERE cp.id = :id');
                $query->execute([':id' => $id]);

                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // update a calcium_profile record
        public static function update_calcium_profile($id, $patient_id, $s_calcium_total, $s_calcium_total_flag, $s_ionized_calcium_calc, $s_ionized_calcium_calc_flag, $s_albumin, $s_albumin_flag, $s_total_protein, $s_total_protein_flag, $corrected_calcium_calc, $comments, $added_by, $conn) {
            try{
                $query = $conn->prepare('UPDATE calcium_profile SET patient_id = :patient_id, s_calcium_total = :s_calcium_total, s_calcium_total_flag = :s_calcium_total_flag, s_ionized_calcium_calc = :s_ionized_calcium_calc, s_ionized_calcium_calc_flag = :s_ionized_calcium_calc_flag, s_albumin = :s_albumin, s_albumin_flag = :s_albumin_flag, s_total_protein = :s_total_protein, s_total_protein_flag = :s_total_protein_flag, corrected_calcium_calc = :corrected_calcium_calc, comments = :comments WHERE id = :id AND patient_id = :patient_id');
                $query->execute([':s_calcium_total' => $s_calcium_total, ':s_calcium_total_flag' => $s_calcium_total_flag, ':s_ionized_calcium_calc' => $s_ionized_calcium_calc, ':s_ionized_calcium_calc_flag' => $s_ionized_calcium_calc_flag, ':s_albumin' => $s_albumin, ':s_albumin_flag' => $s_albumin_flag, ':s_total_protein' => $s_total_protein, ':s_total_protein_flag' => $s_total_protein_flag, ':corrected_calcium_calc' => $corrected_calcium_calc, ':comments' => $comments, ':patient_id' => $patient_id, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

	}