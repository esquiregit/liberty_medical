<?php
    require_once 'conn.php';
    require_once 'methods.php';
    require_once 'charge.php';

	class HBA1C {

        // create a hba1c record
        public static function create_hba1c($patient_id, $dcct, $ifcc, $average_blood_glucose, $comments, $added_by, $conn){
            $invoice_id = Methods::get_invoice_id('HBA1C', $conn);
            $amount     = Charge::read_charge('37', $conn);
            try{
                $query = $conn->prepare('INSERT INTO hba1c(invoice_id, patient_id, dcct, ifcc, average_blood_glucose, comments, added_by)  VALUES(:invoice_id, :patient_id, :dcct, :ifcc, :average_blood_glucose, :comments, :added_by)');
                $query->execute([':invoice_id' => $invoice_id, ':patient_id' => $patient_id, ':dcct' => $dcct, ':ifcc' => $ifcc, ':average_blood_glucose' => $average_blood_glucose, ':comments' => $comments, ':added_by' => $added_by]);

                return true;
            }catch(PDOException $ex){
            	return false;
            }
        }

        // fetch all hba1c records
        public static function read_hba1cs($conn){
            try{
                $query = $conn->prepare('SELECT hba.id, hba.invoice_id, hba.patient_id, hba.dcct, hba.ifcc, hba.average_blood_glucose, hba.comments, hba.added_by, hba.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM hba1c hba INNER JOIN patients p ON hba.patient_id = p.patient_id INNER JOIN users u ON hba.added_by = u.staff_id');
                $query->execute();

                return $query->fetchAll(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // fetch a hba1c record
        public static function read_hba1c($id, $conn){
            try{
                $query = $conn->prepare('SELECT hba.id, hba.invoice_id, hba.patient_id, hba.dcct, hba.ifcc, hba.average_blood_glucose, hba.comments, hba.added_by, hba.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM hba1c hba INNER JOIN patients p ON hba.patient_id = p.patient_id INNER JOIN users u ON hba.added_by = u.staff_id WHERE hba.id = :id');
                $query->execute([':id' => $id]);

                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // update a hba1c record
        public static function update_hba1c($id, $patient_id, $dcct, $ifcc, $average_blood_glucose, $comments, $conn) {
            try{
                $query = $conn->prepare('UPDATE hba1c SET patient_id = :patient_id, dcct = :dcct, ifcc = :ifcc, average_blood_glucose = :average_blood_glucose, comments = :comments WHERE id = :id AND patient_id = :patient_id');
                $query->execute([':dcct' => $dcct, ':ifcc' => $ifcc, ':average_blood_glucose' => $average_blood_glucose, ':comments' => $comments, ':patient_id' => $patient_id, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

	}