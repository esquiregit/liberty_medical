<?php
    require_once 'conn.php';
    require_once 'methods.php';
    require_once 'charge.php';

	class CardiacEnzyme {

        // create a cardiac_enzyme record
        public static function create_cardiac_enzyme($patient_id, $ast, $alt, $creatinine_kinase, $ck_mb, $ldh, $troponin, $comments, $added_by, $conn){
            $invoice_id = Methods::get_invoice_id('Cardiac Enzyme', $conn);
            $amount     = Charge::read_charge('22', $conn);
            try{
                $query = $conn->prepare('INSERT INTO cardiac_enzyme(invoice_id, patient_id, ast, alt, creatinine_kinase, ck_mb, ldh, troponin, comments, added_by)  VALUES(:invoice_id, :patient_id, :ast, :alt, :creatinine_kinase, :ck_mb, :ldh, :troponin, :comments, :added_by)');
                $query->execute([':invoice_id' => $invoice_id, ':patient_id' => $patient_id, ':ast' => $ast, ':alt' => $alt, ':creatinine_kinase' => $creatinine_kinase, ':ck_mb' => $ck_mb, ':ldh' => $ldh, ':troponin' => $troponin, ':comments' => $comments, ':added_by' => $added_by]);

                return true;
            }catch(PDOException $ex){
            	return false;
            }
        }

        // fetch all cardiac_enzyme records
        public static function read_cardiac_enzymes($conn){
            try{
                $query = $conn->prepare('SELECT ce.id, ce.invoice_id, ce.patient_id, ce.ast, ce.alt, ce.creatinine_kinase, ce.ck_mb, ce.ldh, ce.troponin, ce.comments, ce.added_by, ce.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM cardiac_enzyme ce INNER JOIN patients p ON ce.patient_id = p.patient_id INNER JOIN users u ON ce.added_by = u.staff_id');
                $query->execute();

                return $query->fetchAll(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // fetch a cardiac_enzyme record
        public static function read_cardiac_enzyme($id, $conn){
            try{
                $query = $conn->prepare('SELECT ce.id, ce.invoice_id, ce.patient_id, ce.ast, ce.alt, ce.creatinine_kinase, ce.ck_mb, ce.ldh, ce.troponin, ce.comments, ce.added_by, ce.date_added, ce.amount, ce.payment_type, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM cardiac_enzyme ce INNER JOIN patients p ON ce.patient_id = p.patient_id INNER JOIN users u ON ce.added_by = u.staff_id WHERE ce.id = :id');
                $query->execute([':id' => $id]);

                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // update a cardiac_enzyme record
        public static function update_cardiac_enzyme($id, $patient_id, $ast, $alt, $creatinine_kinase, $ck_mb, $ldh, $troponin, $comments, $conn) {
            try{
                $query = $conn->prepare('UPDATE cardiac_enzyme SET patient_id = :patient_id, ast = :ast, alt = :alt, creatinine_kinase = :creatinine_kinase, ck_mb = :ck_mb, ldh = :ldh, troponin = :troponin, comments = :comments WHERE id = :id AND patient_id = :patient_id');
                $query->execute([':ast' => $ast, ':alt' => $alt, ':creatinine_kinase' => $creatinine_kinase, ':ck_mb' => $ck_mb, ':ldh' => $ldh, ':troponin' => $troponin, ':comments' => $comments, ':patient_id' => $patient_id, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

	}