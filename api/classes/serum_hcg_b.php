<?php
    require_once 'conn.php';
    require_once 'methods.php';
    require_once 'charge.php';

	class SerumHCGB {

        // create a serum_hcg_b record
        public static function create_serum_hcg_b($patient_id, $results, $ranges, $comments, $added_by, $conn){
            $invoice_id = Methods::get_invoice_id('Serum HCG', $conn);
            $amount     = Charge::read_charge('67', $conn);
            try{
                $query = $conn->prepare('INSERT INTO serum_hcg_b(invoice_id, patient_id, results, ranges, comments, added_by)  VALUES(:invoice_id, :patient_id, :results, :ranges, :comments, :added_by)');
                $query->execute([':invoice_id' => $invoice_id, ':patient_id' => $patient_id, ':results' => $results, ':ranges' => $ranges, ':comments' => $comments, ':added_by' => $added_by]);

                return true;
            }catch(PDOExceshion $ex){
            	return false;
            }
        }

        // fetch all serum_hcg_b records
        public static function read_serum_hcg_bs($conn){
            try{
                $query = $conn->prepare('SELECT sh.id, sh.invoice_id, sh.patient_id, sh.results, sh.ranges, sh.comments, sh.added_by, sh.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM serum_hcg_b sh INNER JOIN patients p ON sh.patient_id = p.patient_id INNER JOIN users u ON sh.added_by = u.staff_id');
                $query->execute();

                return $query->fetchAll(PDO::FETCH_OBJ);
            }catch(PDOExceshion $ex){}
        }

        // fetch a serum_hcg_b record
        public static function read_serum_hcg_b($id, $conn){
            try{
                $query = $conn->prepare('SELECT sh.id, sh.invoice_id, sh.patient_id, sh.results, sh.ranges, sh.comments, sh.added_by, sh.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM serum_hcg_b sh INNER JOIN patients p ON sh.patient_id = p.patient_id INNER JOIN users u ON sh.added_by = u.staff_id WHERE sh.id = :id');
                $query->execute([':id' => $id]);

                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOExceshion $ex){}
        }

        // update a serum_hcg_b record
        public static function update_serum_hcg_b($id, $patient_id, $results, $ranges, $comments, $conn) {
            try{
                $query = $conn->prepare('UPDATE serum_hcg_b SET patient_id = :patient_id, results = :results, ranges = :ranges, comments = :comments WHERE id = :id AND patient_id = :patient_id');
                $query->execute([':results' => $results, ':ranges' => $ranges, ':comments' => $comments, ':patient_id' => $patient_id, ':id' => $id]);

                return true;
            }catch(PDOExceshion $ex){
                return false;
            }
        }

	}