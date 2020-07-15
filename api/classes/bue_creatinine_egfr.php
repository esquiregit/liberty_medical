<?php
    require_once 'conn.php';
    require_once 'methods.php';
    require_once 'charge.php';

	class BueCreatinineEgfr {

        // create a bue_creatinine_egfr record
        public static function create_bue_creatinine_egfr($patient_id, $sodium, $sodium_flag, $potassium, $potassium_flag, $chloride, $chloride_flag, $urea, $urea_flag, $creatinine, $creatinine_flag, $egfr, $comments, $added_by, $conn){
            $invoice_id = Methods::get_invoice_id('BUE Creatinine eGFR', $conn);
            $amount     = Charge::read_charge('6', $conn);
            try{
                $query = $conn->prepare('INSERT INTO bue_creatinine_egfr(invoice_id, patient_id, sodium, sodium_flag, potassium, potassium_flag, chloride, chloride_flag, urea, urea_flag, creatinine, creatinine_flag, egfr, comments, added_by) VALUES(:invoice_id, :patient_id, :sodium, :sodium_flag, :potassium, :potassium_flag, :chloride, :chloride_flag, :urea, :urea_flag, :creatinine, :creatinine_flag, :egfr, :comments, :added_by)');
                $query->execute([':invoice_id' => $invoice_id, ':patient_id' => $patient_id, ':sodium' => $sodium, ':sodium_flag' => $sodium_flag, ':potassium' => $potassium, ':potassium_flag' => $potassium_flag, ':chloride' => $chloride, ':chloride_flag' => $chloride_flag, ':urea' => $urea, ':urea_flag' => $urea_flag, ':creatinine' => $creatinine, ':creatinine_flag' => $creatinine_flag, ':egfr' => $egfr, ':comments' => $comments, ':added_by' => $added_by]);

                return true;
            }catch(PDOException $ex){
            	return false;
            }
        }

        // fetch all bue_creatinine_egfr records
        public static function read_bue_creatinine_egfrs($conn){
            try{
                $query = $conn->prepare('SELECT e.id, e.invoice_id, e.patient_id, e.sodium, e.sodium_flag, e.potassium, e.potassium_flag, e.chloride, e.chloride_flag, e.urea, e.urea_flag, e.creatinine, e.creatinine_flag, e.egfr, e.comments, e.added_by, e.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM bue_creatinine_egfr e INNER JOIN patients p ON e.patient_id = p.patient_id INNER JOIN users u ON e.added_by = u.staff_id');
                $query->execute();

                return $query->fetchAll(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // fetch a bue_creatinine_egfr record
        public static function read_bue_creatinine_egfr($id, $conn){
            try{
                $query = $conn->prepare('SELECT e.id, e.invoice_id, e.patient_id, e.sodium, e.sodium_flag, e.potassium, e.potassium_flag, e.chloride, e.chloride_flag, e.urea, e.urea_flag, e.creatinine, e.creatinine_flag, e.egfr, e.comments, e.added_by, e.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM bue_creatinine_egfr e INNER JOIN patients p ON e.patient_id = p.patient_id INNER JOIN users u ON e.added_by = u.staff_id WHERE e.id = :id');
                $query->execute([':id' => $id]);

                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // update a bue_creatinine_egfr record
        public static function update_bue_creatinine_egfr($id, $patient_id, $sodium, $sodium_flag, $potassium, $potassium_flag, $chloride, $chloride_flag, $urea, $urea_flag, $creatinine, $creatinine_flag, $egfr, $comments, $conn) {
            try{
                $query = $conn->prepare('UPDATE bue_creatinine_egfr SET patient_id = :patient_id, sodium = :sodium, sodium_flag = :sodium_flag, potassium = :potassium, potassium_flag = :potassium_flag, chloride = :chloride, chloride_flag = :chloride_flag, urea = :urea, urea_flag = :urea_flag, creatinine = :creatinine, creatinine_flag = :creatinine_flag, egfr = :egfr, comments = :comments WHERE id = :id AND patient_id = :patient_id');
                $query->execute([':sodium' => $sodium, ':sodium_flag' => $sodium_flag, ':potassium' => $potassium, ':potassium_flag' => $potassium_flag, ':chloride' => $chloride, ':chloride_flag' => $chloride_flag, ':urea' => $urea, ':urea_flag' => $urea_flag, ':creatinine' => $creatinine, ':creatinine_flag' => $creatinine_flag, ':egfr' => $egfr, ':comments' => $comments, ':patient_id' => $patient_id, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

	}