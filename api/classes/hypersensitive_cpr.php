<?php
    require_once 'conn.php';
    require_once 'methods.php';
    require_once 'charge.php';

	class HypersensitiveCPR {

        // create a hypersensitive_cpr record
        public static function create_hypersensitive_cpr($patient_id, $results, $comments, $added_by, $conn){
            $invoice_id = Methods::get_invoice_id('Hypersensitive CPR', $conn);
            $amount     = Charge::read_charge('48', $conn);
            try{
                $query = $conn->prepare('INSERT INTO hypersensitive_cpr(invoice_id, patient_id, results, comments, added_by)  VALUES(:invoice_id, :patient_id, :results, :comments, :added_by)');
                $query->execute([':invoice_id' => $invoice_id, ':patient_id' => $patient_id, ':results' => $results, ':comments' => $comments, ':added_by' => $added_by]);

                return true;
            }catch(PDOException $ex){
            	return false;
            }
        }

        // fetch all hypersensitive_cpr records
        public static function read_hypersensitive_cprs($conn){
            try{
                $query = $conn->prepare('SELECT hc.id, hc.invoice_id, hc.patient_id, hc.results, hc.comments, hc.added_by, hc.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM hypersensitive_cpr hc INNER JOIN patients p ON hc.patient_id = p.patient_id INNER JOIN users u ON hc.added_by = u.staff_id');
                $query->execute();

                return $query->fetchAll(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // fetch a hypersensitive_cpr record
        public static function read_hypersensitive_cpr($id, $conn){
            try{
                $query = $conn->prepare('SELECT hc.id, hc.invoice_id, hc.patient_id, hc.results, hc.comments, hc.added_by, hc.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM hypersensitive_cpr hc INNER JOIN patients p ON hc.patient_id = p.patient_id INNER JOIN users u ON hc.added_by = u.staff_id WHERE hc.id = :id');
                $query->execute([':id' => $id]);

                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // update a hypersensitive_cpr record
        public static function update_hypersensitive_cpr($id, $patient_id, $results, $comments, $conn) {
            try{
                $query = $conn->prepare('UPDATE hypersensitive_cpr SET patient_id = :patient_id, results = :results, comments = :comments WHERE id = :id AND patient_id = :patient_id');
                $query->execute([':results' => $results, ':comments' => $comments, ':patient_id' => $patient_id, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

	}

?>