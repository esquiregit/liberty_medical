<?php
    require_once 'conn.php';
    require_once 'methods.php';
    require_once 'charge.php';

    class CKMB {

        // create a ckmb record
        public static function create_ckmb($patient_id, $results, $comments, $added_by, $conn){
            $invoice_id = Methods::get_invoice_id('CKMB', $conn);
            $amount     = Charge::read_charge('17', $conn);
            try{
                $query = $conn->prepare('INSERT INTO ckmb(invoice_id, patient_id, results, comments, added_by)  VALUES(:invoice_id, :patient_id, :results, :comments, :added_by)');
                $query->execute([':invoice_id' => $invoice_id, ':patient_id' => $patient_id, ':results' => $results, ':comments' => $comments, ':added_by' => $added_by]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

        // fetch all ckmb records
        public static function read_ckmbs($conn){
            try{
                $query = $conn->prepare('SELECT ca.id, ca.invoice_id, ca.patient_id, ca.results, ca.comments, ca.added_by, ca.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM ckmb ca INNER JOIN patients p ON ca.patient_id = p.patient_id INNER JOIN users u ON ca.added_by = u.staff_id');
                $query->execute();

                return $query->fetchAll(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // fetch a ckmb record
        public static function read_ckmb($id, $conn){
            try{
                $query = $conn->prepare('SELECT ca.id, ca.invoice_id, ca.patient_id, ca.results, ca.comments, ca.added_by, ca.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM ckmb ca INNER JOIN patients p ON ca.patient_id = p.patient_id INNER JOIN users u ON ca.added_by = u.staff_id WHERE ca.id = :id');
                $query->execute([':id' => $id]);

                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // update a ckmb record
        public static function update_ckmb($id, $patient_id, $results, $comments, $conn) {
            try{
                $query = $conn->prepare('UPDATE ckmb SET patient_id = :patient_id, results = :results, comments = :comments WHERE id = :id AND patient_id = :patient_id');
                $query->execute([':results' => $results, ':comments' => $comments, ':patient_id' => $patient_id, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

    }