<?php
    require_once 'conn.php';
    require_once 'methods.php';
    require_once 'charge.php';

	class PTH {

        // create a pth record
        public static function create_pth($patient_id, $results, $results_flag, $comments, $added_by, $conn){
            $invoice_id = Methods::get_invoice_id('PTH', $conn);
            $amount     = Charge::read_charge('57', $conn);
            try{
                $query = $conn->prepare('INSERT INTO pth(invoice_id, patient_id, results, results_flag, comments, added_by)  VALUES(:invoice_id, :patient_id, :results, :results_flag, :comments, :added_by)');
                $query->execute([':invoice_id' => $invoice_id, ':patient_id' => $patient_id, ':results' => $results, ':results_flag' => $results_flag, ':comments' => $comments, ':added_by' => $added_by]);

                return true;
            }catch(PDOException $ex){
            	return false;
            }
        }

        // fetch all pth records
        public static function read_pths($conn){
            try{
                $query = $conn->prepare('SELECT pt.id, pt.invoice_id, pt.patient_id, pt.results, pt.results_flag, pt.comments, pt.added_by, pt.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM pth pt INNER JOIN patients p ON pt.patient_id = p.patient_id INNER JOIN users u ON pt.added_by = u.staff_id');
                $query->execute();

                return $query->fetchAll(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // fetch a pth record
        public static function read_pth($id, $conn){
            try{
                $query = $conn->prepare('SELECT pt.id, pt.invoice_id, pt.patient_id, pt.results, pt.results_flag, pt.comments, pt.added_by, pt.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM pth pt INNER JOIN patients p ON pt.patient_id = p.patient_id INNER JOIN users u ON pt.added_by = u.staff_id WHERE pt.id = :id');
                $query->execute([':id' => $id]);

                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // update a pth record
        public static function update_pth($id, $patient_id, $results, $results_flag, $comments, $conn) {
            try{
                $query = $conn->prepare('UPDATE pth SET patient_id = :patient_id, results = :results, results_flag = :results_flag, comments = :comments WHERE id = :id AND patient_id = :patient_id');
                $query->execute([':results' => $results, ':results_flag' => $results_flag, ':comments' => $comments, ':patient_id' => $patient_id, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

	}