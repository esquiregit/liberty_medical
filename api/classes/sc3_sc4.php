<?php
    require_once 'conn.php';
    require_once 'methods.php';
    require_once 'charge.php';

	class SC3SC4 {

        // create a sc3_sc4 record
        public static function create_sc3_sc4($patient_id, $s_c3, $s_c4, $added_by, $conn){
            $invoice_id = Methods::get_invoice_id('S-C3, S-C4', $conn);
            $amount     = Charge::read_charge('64', $conn);
            try{
                $query = $conn->prepare('INSERT INTO sc3_sc4(invoice_id, patient_id, s_c3, s_c4, added_by)  VALUES(:invoice_id, :patient_id, :s_c3, :s_c4, :added_by)');
                $query->execute([':invoice_id' => $invoice_id, ':patient_id' => $patient_id, ':s_c3' => $s_c3, ':s_c4' => $s_c4, ':added_by' => $added_by]);

                return true;
            }catch(PDOException $ex){
            	return false;
            }
        }

        // fetch all sc3_sc4 records
        public static function read_sc3_sc4s($conn){
            try{
                $query = $conn->prepare('SELECT sc.id, sc.invoice_id, sc.patient_id, sc.s_c3, sc.s_c4, sc.added_by, sc.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM sc3_sc4 sc INNER JOIN patients p ON sc.patient_id = p.patient_id INNER JOIN users u ON sc.added_by = u.staff_id');
                $query->execute();

                return $query->fetchAll(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // fetch a sc3_sc4 record
        public static function read_sc3_sc4($id, $conn){
            try{
                $query = $conn->prepare('SELECT sc.id, sc.invoice_id, sc.patient_id, sc.s_c3, sc.s_c4, sc.added_by, sc.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM sc3_sc4 sc INNER JOIN patients p ON sc.patient_id = p.patient_id INNER JOIN users u ON sc.added_by = u.staff_id WHERE sc.id = :id');
                $query->execute([':id' => $id]);

                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // update a sc3_sc4 record
        public static function update_sc3_sc4($id, $patient_id, $s_c3, $s_c4, $conn) {
            try{
                $query = $conn->prepare('UPDATE sc3_sc4 SET patient_id = :patient_id, s_c3 = :s_c3, s_c4 = :s_c4 WHERE id = :id AND patient_id = :patient_id');
                $query->execute([':s_c3' => $s_c3, ':s_c4' => $s_c4, ':patient_id' => $patient_id, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

	}