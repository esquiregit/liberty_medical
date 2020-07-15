<?php
    require_once 'conn.php';
    require_once 'methods.php';
    require_once 'charge.php';

	class TFT {

        // create a tft record
        public static function create_tft($patient_id, $ft3, $ft3_flag, $ft4, $ft4_flag, $tsh, $tsh_flag, $comments, $added_by, $conn){
            $invoice_id = Methods::get_invoice_id('TFT', $conn);
            $amount     = Charge::read_charge('75', $conn);
            try{
                $query = $conn->prepare('INSERT INTO tft(invoice_id, patient_id, ft3, ft3_flag, ft4, ft4_flag, tsh, tsh_flag, comments, added_by)  VALUES(:invoice_id, :patient_id, :ft3, :ft3_flag, :ft4, :ft4_flag, :tsh, :tsh_flag, :comments, :added_by)');
                $query->execute([':invoice_id' => $invoice_id, ':patient_id' => $patient_id, ':ft3' => $ft3, ':ft3_flag' => $ft3_flag, ':ft4' => $ft4, ':ft4_flag' => $ft4_flag, ':tsh' => $tsh, ':tsh_flag' => $tsh_flag, ':comments' => $comments, ':added_by' => $added_by]);

                return true;
            }catch(PDOException $ex){
            	return false;
            }
        }

        // fetch all tft records
        public static function read_tfts($conn){
            try{
                $query = $conn->prepare('SELECT t.id, t.invoice_id, t.patient_id, t.ft3, t.ft3_flag, t.ft4, t.ft4_flag, t.tsh, t.tsh_flag, t.comments, t.added_by, t.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as middle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM tft t INNER JOIN patients p ON t.patient_id = p.patient_id INNER JOIN users u ON t.added_by = u.staff_id');
                $query->execute();

                return $query->fetchAll(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // fetch a tft record
        public static function read_tft($id, $conn){
            try{
                $query = $conn->prepare('SELECT t.id, t.invoice_id, t.patient_id, t.ft3, t.ft3_flag, t.ft4, t.ft4_flag, t.tsh, t.tsh_flag, t.comments, t.added_by, t.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as middle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM tft t INNER JOIN patients p ON t.patient_id = p.patient_id INNER JOIN users u ON t.added_by = u.staff_id WHERE t.id = :id');
                $query->execute([':id' => $id]);

                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // update a tft record
        public static function update_tft($id, $patient_id, $ft3, $ft3_flag, $ft4, $ft4_flag, $tsh, $tsh_flag, $comments, $added_by, $conn) {
            try{
                $query = $conn->prepare('UPDATE tft SET patient_id = :patient_id, ft3 = :ft3, ft3_flag = :ft3_flag, ft4 = :ft4, ft4_flag = :ft4_flag, tsh = :tsh, tsh_flag = :tsh_flag, comments = :comments WHERE id = :id AND patient_id = :patient_id');
                $query->execute([':ft3' => $ft3, ':ft3_flag' => $ft3_flag, ':ft4' => $ft4, ':ft4_flag' => $ft4_flag, ':tsh' => $tsh, ':tsh_flag' => $tsh_flag, ':comments' => $comments, ':patient_id' => $patient_id, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

	}