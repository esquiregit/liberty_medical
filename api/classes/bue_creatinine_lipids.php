<?php
    require_once 'conn.php';
    require_once 'methods.php';
    require_once 'charge.php';

	class BueCreatinineLipids {

        // create a bue_creatinine_lipids record
        public static function create_bue_creatinine_lipids($patient_id, $sodium, $sodium_flag, $potassium, $potassium_flag, $chloride, $chloride_flag, $urea, $urea_flag, $creatinine, $creatinine_flag, $egfr, $cholesterol_total, $cholesterol_total_flag, $triglycerides, $triglycerides_flag, $hdl, $hdl_flag, $ldl, $ldl_flag, $coronary_risk, $coronary_risk_flag, $comments, $added_by, $conn){
            $invoice_id = Methods::get_invoice_id('BUE Lipids', $conn);
            $amount     = Charge::read_charge('8', $conn);
            try{
                $query = $conn->prepare('INSERT INTO bue_creatinine_lipids(invoice_id, patient_id, sodium, sodium_flag, potassium, potassium_flag, chloride, chloride_flag, urea, urea_flag, creatinine, creatinine_flag, egfr, cholesterol_total, cholesterol_total_flag, triglycerides, triglycerides_flag, hdl, hdl_flag, ldl, ldl_flag, coronary_risk, coronary_risk_flag, comments, added_by) VALUES(:invoice_id, :patient_id, :sodium, :sodium_flag, :potassium, :potassium_flag, :chloride, :chloride_flag, :urea, :urea_flag, :creatinine, :creatinine_flag, :egfr, :cholesterol_total, :cholesterol_total_flag, :triglycerides, :triglycerides_flag, :hdl, :hdl_flag, :ldl, :ldl_flag, :coronary_risk, :coronary_risk_flag, :comments, :added_by)');
                $query->execute([':invoice_id' => $invoice_id, ':patient_id' => $patient_id, ':sodium' => $sodium, ':sodium_flag' => $sodium_flag, ':potassium' => $potassium, ':potassium_flag' => $potassium_flag, ':chloride' => $chloride, ':chloride_flag' => $chloride_flag, ':urea' => $urea, ':urea_flag' => $urea_flag, ':creatinine' => $creatinine, ':creatinine_flag' => $creatinine_flag, ':egfr' => $egfr, ':cholesterol_total' => $cholesterol_total, ':cholesterol_total_flag' => $cholesterol_total_flag, ':triglycerides' => $triglycerides, ':triglycerides_flag' => $triglycerides_flag, ':hdl' => $hdl, ':hdl_flag' => $hdl_flag, ':ldl' => $ldl, ':ldl_flag' => $ldl_flag, ':coronary_risk' => $coronary_risk, ':coronary_risk_flag' => $coronary_risk_flag, ':comments' => $comments, ':added_by' => $added_by]);

                return true;
            }catch(PDOException $ex){
            	return false;
            }
        }

        // fetch all bue_creatinine_lipids records
        public static function read_bue_creatinine_lipids($conn){
            try{
                $query = $conn->prepare('SELECT bcl.id, bcl.invoice_id, bcl.patient_id, bcl.sodium, bcl.sodium_flag, bcl.potassium, bcl.potassium_flag, bcl.chloride, bcl.chloride_flag, bcl.urea, bcl.urea_flag, bcl.creatinine, bcl.creatinine_flag, bcl.egfr, bcl.cholesterol_total, bcl.cholesterol_total_flag, bcl.triglycerides, bcl.triglycerides_flag, bcl.hdl, bcl.hdl_flag, bcl.ldl, bcl.ldl_flag, bcl.coronary_risk, bcl.coronary_risk_flag, bcl.comments, bcl.added_by, bcl.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM bue_creatinine_lipids bcl INNER JOIN patients p ON bcl.patient_id = p.patient_id INNER JOIN users u ON bcl.added_by = u.staff_id');
                $query->execute();

                return $query->fetchAll(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // fetch a bue_creatinine_lipids record
        public static function read_a_bue_creatinine_lipids($id, $conn){
            try{
                $query = $conn->prepare('SELECT bcl.id, bcl.invoice_id, bcl.patient_id, bcl.sodium, bcl.sodium_flag, bcl.potassium, bcl.potassium_flag, bcl.chloride, bcl.chloride_flag, bcl.urea, bcl.urea_flag, bcl.creatinine, bcl.creatinine_flag, bcl.egfr, bcl.cholesterol_total, bcl.cholesterol_total_flag, bcl.triglycerides, bcl.triglycerides_flag, bcl.hdl, bcl.hdl_flag, bcl.ldl, bcl.ldl_flag, bcl.coronary_risk, bcl.coronary_risk_flag, bcl.comments, bcl.added_by, bcl.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM bue_creatinine_lipids bcl INNER JOIN patients p ON bcl.patient_id = p.patient_id INNER JOIN users u ON bcl.added_by = u.staff_id WHERE bcl.id = :id');
                $query->execute([':id' => $id]);

                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // update a bue_creatinine_lipids record
        public static function update_bue_creatinine_lipids($id, $patient_id, $sodium, $sodium_flag, $potassium, $potassium_flag, $chloride, $chloride_flag, $urea, $urea_flag, $creatinine, $creatinine_flag, $egfr, $cholesterol_total, $cholesterol_total_flag, $triglycerides, $triglycerides_flag, $hdl, $hdl_flag, $ldl, $ldl_flag, $coronary_risk, $coronary_risk_flag, $comments, $conn) {
            try{
                $query = $conn->prepare('UPDATE bue_creatinine_lipids SET patient_id = :patient_id, sodium = :sodium, sodium_flag = :sodium_flag, potassium = :potassium, potassium_flag = :potassium_flag, chloride = :chloride, chloride_flag = :chloride_flag, urea = :urea, urea_flag = :urea_flag, creatinine = :creatinine, creatinine_flag = :creatinine_flag, egfr = :egfr, cholesterol_total = :cholesterol_total, cholesterol_total_flag = :cholesterol_total_flag, triglycerides = :triglycerides, triglycerides_flag = :triglycerides_flag, hdl = :hdl, hdl_flag = :hdl_flag, ldl = :ldl, ldl_flag = :ldl_flag, coronary_risk = :coronary_risk, coronary_risk_flag = :coronary_risk_flag, comments = :comments WHERE id = :id AND patient_id = :patient_id');
                $query->execute([':sodium' => $sodium, ':sodium_flag' => $sodium_flag, ':potassium' => $potassium, ':potassium_flag' => $potassium_flag, ':chloride' => $chloride, ':chloride_flag' => $chloride_flag, ':urea' => $urea, ':urea_flag' => $urea_flag, ':creatinine' => $creatinine, ':creatinine_flag' => $creatinine_flag, ':egfr' => $egfr, ':cholesterol_total' => $cholesterol_total, ':cholesterol_total_flag' => $cholesterol_total_flag, ':triglycerides' => $triglycerides, ':triglycerides_flag' => $triglycerides_flag, ':hdl' => $hdl, ':hdl_flag' => $hdl_flag, ':ldl' => $ldl, ':ldl_flag' => $ldl_flag, ':coronary_risk' => $coronary_risk, ':coronary_risk_flag' => $coronary_risk_flag, ':comments' => $comments, ':patient_id' => $patient_id, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

	}