<?php
    require_once 'conn.php';
    require_once 'methods.php';
    require_once 'charge.php';

	class CReactiveProtein {

        // create a c_reactive_protein record
        public static function create_c_reactive_protein($patient_id, $results, $comments, $added_by, $conn){
            $invoice_id = Methods::get_invoice_id('C-Reactive Protein', $conn);
            $amount     = Charge::read_charge('12', $conn);
            try{
                $query = $conn->prepare('INSERT INTO c_reactive_protein(invoice_id, patient_id, results, comments, added_by) VALUES(:invoice_id, :patient_id, :results, :comments, :added_by)');
                $query->execute([':invoice_id' => $invoice_id, ':patient_id' => $patient_id, ':results' => $results, ':comments' => $comments, ':added_by' => $added_by]);

                return true;
            }catch(PDOException $ex){
            	return false;
            }
        }

        // fetch all c_reactive_protein records
        public static function read_c_reactive_proteins($conn){
            try{
                $query = $conn->prepare('SELECT crp.id, crp.invoice_id, crp.patient_id, crp.results, crp.comments, crp.added_by, crp.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM c_reactive_protein crp INNER JOIN patients p ON crp.patient_id = p.patient_id INNER JOIN users u ON crp.added_by = u.staff_id');
                $query->execute();

                return $query->fetchAll(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // fetch a c_reactive_protein record
        public static function read_c_reactive_protein($id, $conn){
            try{
                $query = $conn->prepare('SELECT crp.id, crp.invoice_id, crp.patient_id, crp.results, crp.comments, crp.added_by, crp.date_added, p.date_of_birth, crp.amount, crp.payment_type, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM c_reactive_protein crp INNER JOIN patients p ON crp.patient_id = p.patient_id INNER JOIN users u ON crp.added_by = u.staff_id WHERE crp.id = :id');
                $query->execute([':id' => $id]);

                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // update a c_reactive_protein record
        public static function update_c_reactive_protein($id, $patient_id, $results, $comments, $conn) {
            try{
                $query = $conn->prepare('UPDATE c_reactive_protein SET patient_id = :patient_id, results = :results, comments = :comments WHERE id = :id AND patient_id = :patient_id');
                $query->execute([':results' => $results, ':comments' => $comments, ':patient_id' => $patient_id, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

	}