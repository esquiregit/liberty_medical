<?php
    require_once 'conn.php';
    require_once 'methods.php';
    require_once 'charge.php';

	class Cortisol {

        // create a cortisol record
        public static function create_cortisol($patient_id, $cortisol_top, $cortisol_bottom, $comments, $added_by, $conn){
            $invoice_id = Methods::get_invoice_id('Cortisol', $conn);
            $amount     = Charge::read_charge('25', $conn);
            try{
                $query = $conn->prepare('INSERT INTO cortisol(invoice_id, patient_id, cortisol_top, cortisol_bottom, comments, added_by)  VALUES(:invoice_id, :patient_id, :cortisol_top, :cortisol_bottom, :comments, :added_by)');
                $query->execute([':invoice_id' => $invoice_id, ':patient_id' => $patient_id, ':cortisol_top' => $cortisol_top, ':cortisol_bottom' => $cortisol_bottom, ':comments' => $comments, ':added_by' => $added_by]);

                return true;
            }catch(PDOException $ex){
            	return false;
            }
        }

        // fetch all cortisol records
        public static function read_cortisols($conn){
            try{
                $query = $conn->prepare('SELECT c.id, c.invoice_id, c.patient_id, c.cortisol_top, c.cortisol_bottom, c.comments, c.added_by, c.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM cortisol c INNER JOIN patients p ON c.patient_id = p.patient_id INNER JOIN users u ON c.added_by = u.staff_id');
                $query->execute();

                return $query->fetchAll(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // fetch a cortisol record
        public static function read_cortisol($id, $conn){
            try{
                $query = $conn->prepare('SELECT c.id, c.invoice_id, c.patient_id, c.cortisol_top, c.cortisol_bottom, c.comments, c.added_by, c.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM cortisol c INNER JOIN patients p ON c.patient_id = p.patient_id INNER JOIN users u ON c.added_by = u.staff_id WHERE c.id = :id');
                $query->execute([':id' => $id]);

                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // update a cortisol record
        public static function update_cortisol($id, $patient_id, $cortisol_top, $cortisol_bottom, $comments, $conn) {
            try{
                $query = $conn->prepare('UPDATE cortisol SET patient_id = :patient_id, cortisol_top = :cortisol_top, cortisol_bottom = :cortisol_bottom, comments = :comments WHERE id = :id AND patient_id = :patient_id');
                $query->execute([':cortisol_top' => $cortisol_top, ':cortisol_bottom' => $cortisol_bottom, ':comments' => $comments, ':patient_id' => $patient_id, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

	}