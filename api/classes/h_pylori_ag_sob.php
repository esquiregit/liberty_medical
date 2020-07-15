<?php
    require_once 'conn.php';
    require_once 'methods.php';
    require_once 'charge.php';

    class HPyloriAgSOB {

        // create a h_pylori_ag record
        public static function create_h_pylori_ag_sob($patient_id, $h_pylori_ag, $stool_occult_blood, $comments, $added_by, $conn){
            $invoice_id = Methods::get_invoice_id('H. Pylori Ag. / SOB', $conn);
            $amount     = Charge::read_charge('39', $conn);
            try{
                $query = $conn->prepare('INSERT INTO h_pylori_ag_sob(invoice_id, patient_id, h_pylori_ag, stool_occult_blood, comments, added_by)  VALUES(:invoice_id, :patient_id, :h_pylori_ag, :stool_occult_blood, :comments, :added_by)');
                $query->execute([':invoice_id' => $invoice_id, ':patient_id' => $patient_id, ':h_pylori_ag' => $h_pylori_ag, ':stool_occult_blood' => $stool_occult_blood, ':comments' => $comments, ':added_by' => $added_by]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

        // fetch all h_pylori_ag records
        public static function read_h_pylori_ag_sobs($conn){
            try{
                $query = $conn->prepare('SELECT hpa.id, hpa.invoice_id, hpa.patient_id, hpa.h_pylori_ag, hpa.stool_occult_blood, hpa.comments, hpa.added_by, hpa.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM h_pylori_ag_sob hpa INNER JOIN patients p ON hpa.patient_id = p.patient_id INNER JOIN users u ON hpa.added_by = u.staff_id');
                $query->execute();

                return $query->fetchAll(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // fetch a h_pylori_ag record
        public static function read_h_pylori_ag_sob($id, $conn){
            try{
                $query = $conn->prepare('SELECT hpa.id, hpa.invoice_id, hpa.patient_id, hpa.h_pylori_ag, hpa.stool_occult_blood, hpa.comments, hpa.added_by, hpa.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM h_pylori_ag_sob hpa INNER JOIN patients p ON hpa.patient_id = p.patient_id INNER JOIN users u ON hpa.added_by = u.staff_id WHERE hpa.id = :id');
                $query->execute([':id' => $id]);

                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // update a h_pylori_ag record
        public static function update_h_pylori_ag_sob($id, $patient_id, $h_pylori_ag, $stool_occult_blood, $comments, $conn) {
            try{
                $query = $conn->prepare('UPDATE h_pylori_ag_sob SET patient_id = :patient_id, h_pylori_ag = :h_pylori_ag, stool_occult_blood = :stool_occult_blood, comments = :comments WHERE id = :id AND patient_id = :patient_id');
                $query->execute([':h_pylori_ag' => $h_pylori_ag, ':stool_occult_blood' => $stool_occult_blood, ':comments' => $comments, ':patient_id' => $patient_id, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

    }