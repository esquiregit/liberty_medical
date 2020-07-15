<?php
    require_once 'conn.php';
    require_once 'methods.php';
    require_once 'charge.php';

    class LipidProfile {

        // create a lipid_profile record
        public static function create_lipid_profile($patient_id, $cholesterol_total, $cholesterol_total_flag, $triglycerides, $triglycerides_flag, $hdl, $hdl_flag, $ldl, $ldl_flag, $coronary_risk, $coronary_risk_flag, $added_by, $conn){
            $invoice_id = Methods::get_invoice_id('Lipid Profile', $conn);
            $amount     = Charge::read_charge('52', $conn);
            try{
                $query = $conn->prepare('INSERT INTO lipid_profile(invoice_id, patient_id, cholesterol_total, cholesterol_total_flag, triglycerides, triglycerides_flag, hdl, hdl_flag, ldl, ldl_flag, coronary_risk, coronary_risk_flag, added_by)  VALUES(:invoice_id, :patient_id, :cholesterol_total, :cholesterol_total_flag, :triglycerides, :triglycerides_flag, :hdl, :hdl_flag, :ldl, :ldl_flag, :coronary_risk, :coronary_risk_flag, :added_by)');
                $query->execute([':invoice_id' => $invoice_id, ':patient_id' => $patient_id, ':cholesterol_total' => $cholesterol_total, ':cholesterol_total_flag' => $cholesterol_total_flag, ':triglycerides' => $triglycerides, ':triglycerides_flag' => $triglycerides_flag, ':hdl' => $hdl, ':hdl_flag' => $hdl_flag, ':ldl' => $ldl, ':ldl_flag' => $ldl_flag, ':coronary_risk' => $coronary_risk, ':coronary_risk_flag' => $coronary_risk_flag, ':added_by' => $added_by]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

        // fetch all lipid_profile records
        public static function read_lipid_profiles($conn){
            try{
                $query = $conn->prepare('SELECT l.id, l.invoice_id, l.patient_id, l.cholesterol_total, l.cholesterol_total_flag, l.triglycerides, l.triglycerides_flag, l.hdl, l.hdl_flag, l.ldl, l.ldl_flag, l.coronary_risk, l.coronary_risk_flag, l.added_by, l.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM lipid_profile l INNER JOIN patients p ON l.patient_id = p.patient_id INNER JOIN users u ON l.added_by = u.staff_id');
                $query->execute();

                return $query->fetchAll(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // fetch a lipid_profile record
        public static function read_lipid_profile($id, $conn){
            try{
                $query = $conn->prepare('SELECT l.id, l.invoice_id, l.patient_id, l.cholesterol_total, l.cholesterol_total_flag, l.triglycerides, l.triglycerides_flag, l.hdl, l.hdl_flag, l.ldl, l.ldl_flag, l.coronary_risk, l.coronary_risk_flag, l.added_by, l.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM lipid_profile l INNER JOIN patients p ON l.patient_id = p.patient_id INNER JOIN users u ON l.added_by = u.staff_id WHERE l.id = :id');
                $query->execute([':id' => $id]);

                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // update a lipid_profile record
        public static function update_lipid_profile($id, $patient_id, $cholesterol_total, $cholesterol_total_flag, $triglycerides, $triglycerides_flag, $hdl, $hdl_flag, $ldl, $ldl_flag, $coronary_risk, $coronary_risk_flag, $added_by, $conn) {
            try{
                $query = $conn->prepare('UPDATE lipid_profile SET patient_id = :patient_id, cholesterol_total = :cholesterol_total, cholesterol_total_flag = :cholesterol_total_flag, triglycerides = :triglycerides, triglycerides_flag = :triglycerides_flag, hdl = :hdl, hdl_flag = :hdl_flag, ldl = :ldl, ldl_flag = :ldl_flag, coronary_risk = :coronary_risk, coronary_risk_flag = :coronary_risk_flag WHERE id = :id AND patient_id = :patient_id');
                $query->execute([':cholesterol_total' => $cholesterol_total, ':cholesterol_total_flag' => $cholesterol_total_flag, ':triglycerides' => $triglycerides, ':triglycerides_flag' => $triglycerides_flag, ':hdl' => $hdl, ':hdl_flag' => $hdl_flag, ':ldl' => $ldl, ':ldl_flag' => $ldl_flag, ':coronary_risk' => $coronary_risk, ':coronary_risk_flag' => $coronary_risk_flag, ':patient_id' => $patient_id, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

    }