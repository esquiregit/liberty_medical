<?php
    require_once 'conn.php';
    require_once 'methods.php';
    require_once 'charge.php';

	class Troponin {

        // create a troponin record
        public static function create_troponin($patient_id, $troponin_i, $troponin_t, $comments, $added_by, $conn){
            $invoice_id = Methods::get_invoice_id('Troponin', $conn);
            $amount     = Charge::read_charge('77', $conn);
            try{
                $query = $conn->prepare('INSERT INTO troponin(invoice_id, patient_id, troponin_i, troponin_t, comments, added_by)  VALUES(:invoice_id, :patient_id, :troponin_i, :troponin_t, :comments, :added_by)');
                $query->execute([':invoice_id' => $invoice_id, ':patient_id' => $patient_id, ':troponin_i' => $troponin_i, ':troponin_t' => $troponin_t, ':comments' => $comments, ':added_by' => $added_by]);

                return true;
            }catch(PDOException $ex){
            	return false;
            }
        }

        // fetch all troponin records
        public static function read_troponins($conn){
            try{
                $query = $conn->prepare('SELECT t.id, t.invoice_id, t.patient_id, t.troponin_i, t.troponin_t, t.comments, t.added_by, t.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM troponin t INNER JOIN patients p ON t.patient_id = p.patient_id INNER JOIN users u ON t.added_by = u.staff_id');
                $query->execute();

                return $query->fetchAll(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // fetch a troponin record
        public static function read_troponin($id, $conn){
            try{
                $query = $conn->prepare('SELECT t.id, t.invoice_id, t.patient_id, t.troponin_i, t.troponin_t, t.comments, t.added_by, t.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM troponin t INNER JOIN patients p ON t.patient_id = p.patient_id INNER JOIN users u ON t.added_by = u.staff_id WHERE t.id = :id');
                $query->execute([':id' => $id]);

                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // update a troponin record
        public static function update_troponin($id, $patient_id, $troponin_i, $troponin_t, $comments, $conn) {
            try{
                $query = $conn->prepare('UPDATE troponin SET patient_id = :patient_id, troponin_i = :troponin_i, troponin_t = :troponin_t, comments = :comments WHERE id = :id AND patient_id = :patient_id');
                $query->execute([':troponin_i' => $troponin_i, ':troponin_t' => $troponin_t, ':comments' => $comments, ':patient_id' => $patient_id, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

	}