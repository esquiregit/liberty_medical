<?php
    require_once 'conn.php';
    require_once 'methods.php';
    require_once 'charge.php';

	class CD4Count {

        // create a cd4_count record
        public static function create_cd4_count($patient_id, $t_wbc, $t_wbc_flag, $cd4_count, $cd4_count_flag, $cd3, $cd3_flag, $cd4_cd3, $cd4_cd3_flag, $comments, $added_by, $conn){
            $invoice_id = Methods::get_invoice_id('CD4 Count', $conn);
            $amount     = Charge::read_charge('15', $conn);
            try{
                $query = $conn->prepare('INSERT INTO cd4_count(invoice_id, patient_id, t_wbc, t_wbc_flag, cd4_count, cd4_count_flag, cd3, cd3_flag, cd4_cd3, cd4_cd3_flag, comments, added_by)  VALUES(:invoice_id, :patient_id, :t_wbc, :t_wbc_flag, :cd4_count, :cd4_count_flag, :cd3, :cd3_flag, :cd4_cd3, :cd4_cd3_flag, :comments, :added_by)');
                $query->execute([':invoice_id' => $invoice_id, ':patient_id' => $patient_id, ':t_wbc' => $t_wbc, ':t_wbc_flag' => $t_wbc_flag, ':cd4_count' => $cd4_count, ':cd4_count_flag' => $cd4_count_flag, ':cd3' => $cd3, ':cd3_flag' => $cd3_flag, ':cd4_cd3' => $cd4_cd3, ':cd4_cd3_flag' => $cd4_cd3_flag, ':comments' => $comments, ':added_by' => $added_by]);

                return true;
            }catch(PDOException $ex){
            	return false;
            }
        }

        // fetch all cd4_count records
        public static function read_cd4_counts($conn){
            try{
                $query = $conn->prepare('SELECT cd4.id, cd4.invoice_id, cd4.patient_id, cd4.t_wbc, cd4.t_wbc_flag, cd4.cd4_count, cd4.cd4_count_flag, cd4.cd3, cd4.cd3_flag, cd4.cd4_cd3, cd4.cd4_cd3_flag, cd4.comments, cd4.added_by, cd4.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM cd4_count cd4 INNER JOIN patients p ON cd4.patient_id = p.patient_id INNER JOIN users u ON cd4.added_by = u.staff_id');
                $query->execute();

                return $query->fetchAll(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // fetch a cd4_count record
        public static function read_cd4_count($id, $conn){
            try{
                $query = $conn->prepare('SELECT cd4.id, cd4.invoice_id, cd4.patient_id, cd4.t_wbc, cd4.t_wbc_flag, cd4.cd4_count, cd4.cd4_count_flag, cd4.cd3, cd4.cd3_flag, cd4.cd4_cd3, cd4.cd4_cd3_flag, cd4.comments, cd4.added_by, cd4.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM cd4_count cd4 INNER JOIN patients p ON cd4.patient_id = p.patient_id INNER JOIN users u ON cd4.added_by = u.staff_id WHERE cd4.id = :id');
                $query->execute([':id' => $id]);

                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // update a cd4_count record
        public static function update_cd4_count($id, $patient_id, $t_wbc, $t_wbc_flag, $cd4_count, $cd4_count_flag, $cd3, $cd3_flag, $cd4_cd3, $cd4_cd3_flag, $comments, $conn) {
            try{
                $query = $conn->prepare('UPDATE cd4_count SET patient_id = :patient_id, t_wbc = :t_wbc, t_wbc_flag = :t_wbc_flag, cd4_count = :cd4_count, cd4_count_flag = :cd4_count_flag, cd3 = :cd3, cd3_flag = :cd3_flag, cd4_cd3 = :cd4_cd3, cd4_cd3_flag = :cd4_cd3_flag, comments = :comments WHERE id = :id AND patient_id = :patient_id');
                $query->execute([':t_wbc' => $t_wbc, ':t_wbc_flag' => $t_wbc_flag, ':cd4_count' => $cd4_count, ':cd4_count_flag' => $cd4_count_flag, ':cd3' => $cd3, ':cd3_flag' => $cd3_flag, ':cd4_cd3' => $cd4_cd3, ':cd4_cd3_flag' => $cd4_cd3_flag, ':comments' => $comments, ':patient_id' => $patient_id, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

	}