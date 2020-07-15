<?php
    require_once 'conn.php';
    require_once 'methods.php';
    require_once 'charge.php';

	class Urine {

        // create a urine record
        public static function create_urine($patient_id, $urine_vma, $urine_calcium, $urine_uric_acid, $urine_creatinine, $serum_creatinine, $twenty_four_hour_urine_volume, $clearance, $comments, $added_by, $conn){
            $invoice_id = Methods::get_invoice_id('Urine', $conn);
            $amount     = Charge::read_charge('79', $conn);
            try{
                $query = $conn->prepare('INSERT INTO urine(invoice_id, patient_id, urine_vma, urine_calcium, urine_uric_acid, urine_creatinine, serum_creatinine, twenty_four_hour_urine_volume, clearance, comments, added_by)  VALUES(:invoice_id, :patient_id, :urine_vma, :urine_calcium, :urine_uric_acid, :urine_creatinine, :serum_creatinine, :twenty_four_hour_urine_volume, :clearance, :comments, :added_by)');
                $query->execute([':invoice_id' => $invoice_id, ':patient_id' => $patient_id, ':urine_vma' => $urine_vma, ':urine_calcium' => $urine_calcium, ':urine_uric_acid' => $urine_uric_acid, ':urine_creatinine' => $urine_creatinine, ':serum_creatinine' => $serum_creatinine, ':twenty_four_hour_urine_volume' => $twenty_four_hour_urine_volume, ':clearance' => $clearance, ':comments' => $comments, ':added_by' => $added_by]);

                return true;
            }catch(PDOException $ex){
            	return false;
            }
        }

        // fetch all urine records
        public static function read_urines($conn){
            try{
                $query = $conn->prepare('SELECT ur.id, ur.invoice_id, ur.patient_id, ur.urine_vma, ur.urine_calcium, ur.urine_uric_acid, ur.urine_creatinine, ur.serum_creatinine, ur.twenty_four_hour_urine_volume, ur.clearance, ur.comments, ur.added_by, ur.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM urine ur INNER JOIN patients p ON ur.patient_id = p.patient_id INNER JOIN users u ON ur.added_by = u.staff_id');
                $query->execute();

                return $query->fetchAll(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // fetch a urine record
        public static function read_urine($id, $conn){
            try{
                $query = $conn->prepare('SELECT ur.id, ur.invoice_id, ur.patient_id, ur.urine_vma, ur.urine_calcium, ur.urine_uric_acid, ur.urine_creatinine, ur.serum_creatinine, ur.twenty_four_hour_urine_volume, ur.clearance, ur.comments, ur.added_by, ur.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM urine ur INNER JOIN patients p ON ur.patient_id = p.patient_id INNER JOIN users u ON ur.added_by = u.staff_id WHERE ur.id = :id');
                $query->execute([':id' => $id]);

                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // update a urine record
        public static function update_urine($id, $patient_id, $urine_vma, $urine_calcium, $urine_uric_acid, $urine_creatinine, $serum_creatinine, $twenty_four_hour_urine_volume, $clearance, $comments, $added_by, $conn) {
            try{
                $query = $conn->prepare('UPDATE urine SET patient_id = :patient_id, urine_vma = :urine_vma, urine_calcium = :urine_calcium, urine_uric_acid = :urine_uric_acid, urine_creatinine = :urine_creatinine, serum_creatinine = :serum_creatinine, twenty_four_hour_urine_volume = :twenty_four_hour_urine_volume, clearance = :clearance, comments = :comments WHERE id = :id AND patient_id = :patient_id');
                $query->execute([':urine_vma' => $urine_vma, ':urine_calcium' => $urine_calcium, ':urine_uric_acid' => $urine_uric_acid, ':urine_creatinine' => $urine_creatinine, ':serum_creatinine' => $serum_creatinine, ':twenty_four_hour_urine_volume' => $twenty_four_hour_urine_volume, ':clearance' => $clearance, ':comments' => $comments, ':patient_id' => $patient_id, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

	}