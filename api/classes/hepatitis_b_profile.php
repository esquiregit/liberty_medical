<?php
    require_once 'conn.php';
    require_once 'methods.php';
    require_once 'charge.php';

	class HepatitisBProfile {

        // create a hepatitis_b_profile record
        public static function create_hepatitis_b_profile($patient_id, $hbsag, $hbsab, $hbeag, $hbeab, $hbcab, $comments, $added_by, $conn){
            $invoice_id = Methods::get_invoice_id('Hepatitis B Profile', $conn);
            $amount     = Charge::read_charge('43', $conn);
            try{
                $query = $conn->prepare('INSERT INTO hepatitis_b_profile(invoice_id, patient_id, hbsag, hbsab, hbeag, hbeab, hbcab, comments, added_by)  VALUES(:invoice_id, :patient_id, :hbsag, :hbsab, :hbeag, :hbeab, :hbcab, :comments, :added_by)');
                $query->execute([':invoice_id' => $invoice_id, ':patient_id' => $patient_id, ':hbsag' => $hbsag, ':hbsab' => $hbsab, ':hbeab' => $hbeab, ':hbeag' => $hbeag, ':hbcab' => $hbcab, ':comments' => $comments, ':added_by' => $added_by]);

                return true;
            }catch(PDOException $ex){
            	return false;
            }
        }

        // fetch all hepatitis_b_profile records
        public static function read_hepatitis_b_profiles($conn){
            try{
                $query = $conn->prepare('SELECT hbm.id, hbm.invoice_id, hbm.patient_id, hbm.hbsag, hbm.hbsab, hbm.hbeag, hbm.hbeab, hbm.hbcab, hbm.comments, hbm.added_by, hbm.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM hepatitis_b_profile hbm INNER JOIN patients p ON hbm.patient_id = p.patient_id INNER JOIN users u ON hbm.added_by = u.staff_id');
                $query->execute();

                return $query->fetchAll(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // fetch a hepatitis_b_profile record
        public static function read_hepatitis_b_profile($id, $conn){
            try{
                $query = $conn->prepare('SELECT hbm.id, hbm.invoice_id, hbm.patient_id, hbm.hbsag, hbm.hbsab, hbm.hbeag, hbm.hbeab, hbm.hbcab, hbm.comments, hbm.added_by, hbm.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM hepatitis_b_profile hbm INNER JOIN patients p ON hbm.patient_id = p.patient_id INNER JOIN users u ON hbm.added_by = u.staff_id WHERE hbm.id = :id');
                $query->execute([':id' => $id]);

                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // update a hepatitis_b_profile record
        public static function update_hepatitis_b_profile($id, $patient_id, $hbsag, $hbsab, $hbeag, $hbeab, $hbcab, $comments, $conn) {
            try{
                $query = $conn->prepare('UPDATE hepatitis_b_profile SET patient_id = :patient_id, hbsag = :hbsag, hbsab = :hbsab, hbeag = :hbeag, hbeab = :hbeab, hbcab = :hbcab, comments = :comments WHERE id = :id AND patient_id = :patient_id');
                $query->execute([':hbsag' => $hbsag, ':hbsab' => $hbsab, ':hbeab' => $hbeab, ':hbeag' => $hbeag, ':hbcab' => $hbcab, ':comments' => $comments, ':patient_id' => $patient_id, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

	}