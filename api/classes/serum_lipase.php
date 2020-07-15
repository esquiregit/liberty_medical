<?php
    require_once 'conn.php';
    require_once 'methods.php';
    require_once 'charge.php';

	class SerumLipase {

        // create a serum_lipase record
        public static function create_serum_lipase($patient_id, $s_lipase, $s_lipase_flag, $comments, $added_by, $conn){
            $invoice_id = Methods::get_invoice_id('Serum Lipase', $conn);
            $amount     = Charge::read_charge('68', $conn);
            try{
                $query = $conn->prepare('INSERT INTO serum_lipase(invoice_id, patient_id, s_lipase, s_lipase_flag, comments, added_by)  VALUES(:invoice_id, :patient_id, :s_lipase, :s_lipase_flag, :comments, :added_by)');
                $query->execute([':invoice_id' => $invoice_id, ':patient_id' => $patient_id, ':s_lipase' => $s_lipase, ':s_lipase_flag' => $s_lipase_flag, ':comments' => $comments, ':added_by' => $added_by]);

                return true;
            }catch(PDOException $ex){
            	return false;
            }
        }

        // fetch all serum_lipase records
        public static function read_serum_lipases($conn){
            try{
                $query = $conn->prepare('SELECT sl.id, sl.invoice_id, sl.patient_id, sl.s_lipase, sl.s_lipase_flag, sl.comments, sl.added_by, sl.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM serum_lipase sl INNER JOIN patients p ON sl.patient_id = p.patient_id INNER JOIN users u ON sl.added_by = u.staff_id');
                $query->execute();

                return $query->fetchAll(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // fetch a serum_lipase record
        public static function read_serum_lipase($id, $conn){
            try{
                $query = $conn->prepare('SELECT sl.id, sl.invoice_id, sl.patient_id, sl.s_lipase, sl.s_lipase_flag, sl.comments, sl.added_by, sl.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM serum_lipase sl INNER JOIN patients p ON sl.patient_id = p.patient_id INNER JOIN users u ON sl.added_by = u.staff_id WHERE sl.id = :id');
                $query->execute([':id' => $id]);

                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // update a serum_lipase record
        public static function update_serum_lipase($id, $patient_id, $s_lipase, $s_lipase_flag, $comments, $conn) {
            try{
                $query = $conn->prepare('UPDATE serum_lipase SET patient_id = :patient_id, s_lipase = :s_lipase, s_lipase_flag = :s_lipase_flag, comments = :comments WHERE id = :id AND patient_id = :patient_id');
                $query->execute([':s_lipase' => $s_lipase, ':s_lipase_flag' => $s_lipase_flag, ':comments' => $comments, ':patient_id' => $patient_id, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_serum_lipase($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE serum_lipase SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

	}