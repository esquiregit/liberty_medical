<?php
    require_once 'conn.php';
    require_once 'methods.php';
    require_once 'charge.php';

    class IronStudy {

        // create a iron_study record
        public static function create_iron_study($patient_id, $iron, $iron_flag, $tibc, $tibc_flag, $transferrin_sat, $transferrin_sat_flag, $ferritin, $ferritin_flag, $comments, $added_by, $conn){
            $invoice_id = Methods::get_invoice_id('Iron Study', $conn);
            $amount     = Charge::read_charge('50', $conn);
            try{
                $query = $conn->prepare('INSERT INTO iron_study(invoice_id, patient_id, iron, iron_flag, tibc, tibc_flag, transferrin_sat, transferrin_sat_flag, ferritin, ferritin_flag, comments, added_by)  VALUES(:invoice_id, :patient_id, :iron, :iron_flag, :tibc, :tibc_flag, :transferrin_sat, :transferrin_sat_flag, :ferritin, :ferritin_flag, :comments, :added_by)');
                $query->execute([':invoice_id' => $invoice_id, ':patient_id' => $patient_id, ':iron' => $iron, ':iron_flag' => $iron_flag, ':tibc' => $tibc, ':tibc_flag' => $tibc_flag, ':transferrin_sat' => $transferrin_sat, ':transferrin_sat_flag' => $transferrin_sat_flag, ':ferritin' => $ferritin, ':ferritin_flag' => $ferritin_flag, ':comments' => $comments, ':added_by' => $added_by]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

        // fetch all iron_study records
        public static function read_iron_studys($conn){
            try{
                $query = $conn->prepare('SELECT irs.id, irs.invoice_id, irs.patient_id, irs.iron, irs.iron_flag, irs.tibc, irs.tibc_flag, irs.transferrin_sat, irs.transferrin_sat_flag, irs.ferritin, irs.ferritin_flag, irs.comments, irs.added_by, irs.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM iron_study irs INNER JOIN patients p ON irs.patient_id = p.patient_id INNER JOIN users u ON irs.added_by = u.staff_id');
                $query->execute();

                return $query->fetchAll(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // fetch a iron_study record
        public static function read_iron_study($id, $conn){
            try{
                $query = $conn->prepare('SELECT irs.id, irs.invoice_id, irs.patient_id, irs.iron, irs.iron_flag, irs.tibc, irs.tibc_flag, irs.transferrin_sat, irs.transferrin_sat_flag, irs.ferritin, irs.ferritin_flag, irs.comments, irs.added_by, irs.date_added, irs.amount, irs.payment_type, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM iron_study irs INNER JOIN patients p ON irs.patient_id = p.patient_id INNER JOIN users u ON irs.added_by = u.staff_id WHERE irs.id = :id');
                $query->execute([':id' => $id]);

                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // update a iron_study record
        public static function update_iron_study($id, $patient_id, $iron, $iron_flag, $tibc, $tibc_flag, $transferrin_sat, $transferrin_sat_flag, $ferritin, $ferritin_flag, $comments, $added_by, $conn) {
            try{
                $query = $conn->prepare('UPDATE iron_study SET patient_id = :patient_id, iron = :iron, iron_flag = :iron_flag, tibc = :tibc, tibc_flag = :tibc_flag, transferrin_sat = :transferrin_sat, transferrin_sat_flag = :transferrin_sat_flag, ferritin = :ferritin, ferritin_flag = :ferritin_flag, comments = :comments WHERE id = :id AND patient_id = :patient_id');
                $query->execute([':iron' => $iron, ':iron_flag' => $iron_flag, ':tibc' => $tibc, ':tibc_flag' => $tibc_flag, ':transferrin_sat' => $transferrin_sat, ':transferrin_sat_flag' => $transferrin_sat_flag, ':ferritin' => $ferritin, ':ferritin_flag' => $ferritin_flag, ':comments' => $comments, ':patient_id' => $patient_id, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

    }