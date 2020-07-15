<?php
    require_once 'conn.php';
    require_once 'methods.php';
    require_once 'charge.php';

	class PSA {

        // create a psa record
        public static function create_psa($patient_id, $results, $comments, $added_by, $conn){
            $invoice_id = Methods::get_invoice_id('PSA', $conn);
            $amount     = Charge::read_charge('56', $conn);
            try{
                $query = $conn->prepare('INSERT INTO psa(invoice_id, patient_id, results, comments, added_by)  VALUES(:invoice_id, :patient_id, :results, :comments, :added_by)');
                $query->execute([':invoice_id' => $invoice_id, ':patient_id' => $patient_id, ':results' => $results, ':comments' => $comments, ':added_by' => $added_by]);

                return true;
            }catch(PDOException $ex){
            	return false;
            }
        }

        // fetch all psa records
        public static function read_psas($conn){
            try{
                $query = $conn->prepare('SELECT ps.id, ps.invoice_id, ps.patient_id, ps.results, ps.comments, ps.added_by, ps.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM psa ps INNER JOIN patients p ON ps.patient_id = p.patient_id INNER JOIN users u ON ps.added_by = u.staff_id');
                $query->execute();

                return $query->fetchAll(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // fetch a psa record
        public static function read_psa($id, $conn){
            try{
                $query = $conn->prepare('SELECT ps.id, ps.invoice_id, ps.patient_id, ps.results, ps.comments, ps.added_by, ps.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM psa ps INNER JOIN patients p ON ps.patient_id = p.patient_id INNER JOIN users u ON ps.added_by = u.staff_id WHERE ps.id = :id');
                $query->execute([':id' => $id]);

                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // update a psa record
        public static function update_psa($id, $patient_id, $results, $comments, $conn) {
            try{
                $query = $conn->prepare('UPDATE psa SET patient_id = :patient_id, results = :results, comments = :comments WHERE id = :id AND patient_id = :patient_id');
                $query->execute([':results' => $results, ':comments' => $comments, ':patient_id' => $patient_id, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

	}