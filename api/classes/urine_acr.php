<?php
    require_once 'conn.php';
    require_once 'methods.php';
    require_once 'charge.php';

	class UrineACR {

        // create a urine_acr record
        public static function create_urine_acr($patient_id, $urea_creatinine, $urea_creatinine_flag, $micro_albumin_urine, $micro_albumin_urine_flag, $uacr, $uacr_flag, $the_uacr, $mg_g_indicates, $comments, $added_by, $conn){
            $invoice_id = Methods::get_invoice_id('Urine ACR', $conn);
            $amount     = Charge::read_charge('80', $conn);
            try{
                $query = $conn->prepare('INSERT INTO urine_acr(invoice_id, patient_id, urea_creatinine, urea_creatinine_flag, micro_albumin_urine, micro_albumin_urine_flag, uacr, uacr_flag, the_uacr, mg_g_indicates, comments, added_by)  VALUES(:invoice_id, :patient_id, :urea_creatinine, :urea_creatinine_flag, :micro_albumin_urine, :micro_albumin_urine_flag, :uacr, :uacr_flag, :the_uacr, :mg_g_indicates, :comments, :added_by)');
                $query->execute([':invoice_id' => $invoice_id, ':patient_id' => $patient_id, ':urea_creatinine' => $urea_creatinine, ':urea_creatinine_flag' => $urea_creatinine_flag, ':micro_albumin_urine' => $micro_albumin_urine, ':micro_albumin_urine_flag' => $micro_albumin_urine_flag, ':uacr' => $uacr, ':uacr_flag' => $uacr_flag, ':the_uacr' => $the_uacr, ':mg_g_indicates' => $mg_g_indicates, ':comments' => $comments, ':added_by' => $added_by]);

                return true;
            }catch(PDOException $ex){
            	return false;
            }
        }

        // fetch all urine_acr records
        public static function read_urine_acrs($conn){
            try{
                $query = $conn->prepare('SELECT ur.id, ur.invoice_id, ur.patient_id, ur.urea_creatinine, ur.urea_creatinine_flag, ur.micro_albumin_urine, ur.micro_albumin_urine_flag, ur.uacr, ur.uacr_flag, ur.the_uacr, ur.mg_g_indicates, ur.comments, ur.added_by, ur.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM urine_acr ur INNER JOIN patients p ON ur.patient_id = p.patient_id INNER JOIN users u ON ur.added_by = u.staff_id');
                $query->execute();

                return $query->fetchAll(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // fetch a urine_acr record
        public static function read_urine_acr($id, $conn){
            try{
                $query = $conn->prepare('SELECT ur.id, ur.invoice_id, ur.patient_id, ur.urea_creatinine, ur.urea_creatinine_flag, ur.micro_albumin_urine, ur.micro_albumin_urine_flag, ur.uacr, ur.uacr_flag, ur.the_uacr, ur.mg_g_indicates, ur.comments, ur.added_by, ur.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM urine_acr ur INNER JOIN patients p ON ur.patient_id = p.patient_id INNER JOIN users u ON ur.added_by = u.staff_id WHERE ur.id = :id');
                $query->execute([':id' => $id]);

                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // update a urine_acr record
        public static function update_urine_acr($id, $patient_id, $urea_creatinine, $urea_creatinine_flag, $micro_albumin_urine, $micro_albumin_urine_flag, $uacr, $uacr_flag, $the_uacr, $mg_g_indicates, $comments, $added_by, $conn) {
            try{
                $query = $conn->prepare('UPDATE urine_acr SET patient_id = :patient_id, urea_creatinine = :urea_creatinine, urea_creatinine_flag = :urea_creatinine_flag, micro_albumin_urine = :micro_albumin_urine, micro_albumin_urine_flag = :micro_albumin_urine_flag, uacr = :uacr, uacr_flag = :uacr_flag, the_uacr = :the_uacr, mg_g_indicates = :mg_g_indicates, comments = :comments WHERE id = :id AND patient_id = :patient_id');
                $query->execute([':urea_creatinine' => $urea_creatinine, ':urea_creatinine_flag' => $urea_creatinine_flag, ':micro_albumin_urine' => $micro_albumin_urine, ':micro_albumin_urine_flag' => $micro_albumin_urine_flag, ':uacr' => $uacr, ':uacr_flag' => $uacr_flag, ':the_uacr' => $the_uacr, ':mg_g_indicates' => $mg_g_indicates, ':comments' => $comments, ':patient_id' => $patient_id, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

	}