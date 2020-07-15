<?php
    require_once 'conn.php';
    require_once 'methods.php';
    require_once 'charge.php';

	class HormonalAssay {

        // create a hormonal_assay record
        public static function create_hormonal_assay($patient_id, $results, $added_by, $conn){
            $invoice_id = Methods::get_invoice_id('Hormonal Assay', $conn);
            $amount     = Charge::read_charge('47', $conn);
            try{
                $query = $conn->prepare('INSERT INTO hormonal_assay(invoice_id, patient_id, results, added_by)  VALUES(:invoice_id, :patient_id, :results, :added_by)');
                $query->execute([':invoice_id' => $invoice_id, ':patient_id' => $patient_id, ':results' => $results, ':added_by' => $added_by]);

                return true;
            }catch(PDOException $ex){
            	return false;
            }
        }

        // fetch all hormonal_assay records
        public static function read_hormonal_assays($conn){
            try{
                $query = $conn->prepare('SELECT ha.id, ha.invoice_id, ha.patient_id, ha.results, ha.added_by, ha.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM hormonal_assay ha INNER JOIN patients p ON ha.patient_id = p.patient_id INNER JOIN users u ON ha.added_by = u.staff_id');
                $query->execute();

                return $query->fetchAll(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // fetch a hormonal_assay record
        public static function read_hormonal_assay($id, $conn){
            try{
                $query = $conn->prepare('SELECT ha.id, ha.invoice_id, ha.patient_id, ha.results, ha.added_by, ha.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM hormonal_assay ha INNER JOIN patients p ON ha.patient_id = p.patient_id INNER JOIN users u ON ha.added_by = u.staff_id WHERE ha.id = :id');
                $query->execute([':id' => $id]);

                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // update a hormonal_assay record
        public static function update_hormonal_assay($id, $patient_id, $results, $conn) {
            try{
                $query = $conn->prepare('UPDATE hormonal_assay SET patient_id = :patient_id, results = :results WHERE id = :id AND patient_id = :patient_id');
                $query->execute([':results' => $results, ':patient_id' => $patient_id, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

	}