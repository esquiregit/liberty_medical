<?php
    require_once 'conn.php';
    require_once 'methods.php';
    require_once 'charge.php';

	class Mantoux {

        // create a mantoux record
        public static function create_mantoux($patient_id, $date_of_injection, $date_of_reading, $size_of_induration, $comments, $added_by, $conn){
            $date_of_injection = empty($date_of_injection) ? '0000-00-00' : $date_of_injection;
            $date_of_reading   = empty($date_of_injection) ? '0000-00-00' : $date_of_injection;
            $invoice_id        = Methods::get_invoice_id('Mantoux', $conn);
            $amount            = Charge::read_charge('53', $conn);
            try{
                $query = $conn->prepare('INSERT INTO mantoux(invoice_id, patient_id, date_of_injection, date_of_reading, size_of_induration, comments, added_by)  VALUES(:invoice_id, :patient_id, :date_of_injection, :date_of_reading, :size_of_induration, :comments, :added_by)');
                $query->execute([':invoice_id' => $invoice_id, ':patient_id' => $patient_id, ':date_of_injection' => $date_of_injection, ':date_of_reading' => $date_of_reading, ':size_of_induration' => $size_of_induration, ':comments' => $comments, ':added_by' => $added_by]);

                return true;
            }catch(PDOException $ex){
            	return false;
            }
        }

        // fetch all mantoux records
        public static function read_mantouxs($conn){
            try{
                $query = $conn->prepare('SELECT mx.id, mx.invoice_id, mx.patient_id, mx.date_of_injection, mx.date_of_reading, mx.size_of_induration, mx.comments, mx.added_by, mx.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM mantoux mx INNER JOIN patients p ON mx.patient_id = p.patient_id INNER JOIN users u ON mx.added_by = u.staff_id');
                $query->execute();

                return $query->fetchAll(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // fetch a mantoux record
        public static function read_mantoux($id, $conn){
            try{
                $query = $conn->prepare('SELECT mx.id, mx.invoice_id, mx.patient_id, mx.date_of_injection, mx.date_of_reading, mx.size_of_induration, mx.comments, mx.added_by, mx.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM mantoux mx INNER JOIN patients p ON mx.patient_id = p.patient_id INNER JOIN users u ON mx.added_by = u.staff_id WHERE mx.id = :id');
                $query->execute([':id' => $id]);

                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // update a mantoux record
        public static function update_mantoux($id, $patient_id, $date_of_injection, $date_of_reading, $size_of_induration, $comments, $conn) {
            $date_of_injection = empty($date_of_injection) ? '0000-00-00' : $date_of_injection;
            $date_of_reading   = empty($date_of_injection) ? '0000-00-00' : $date_of_injection;
            try{
                $query = $conn->prepare('UPDATE mantoux SET patient_id = :patient_id, date_of_injection = :date_of_injection, date_of_reading = :date_of_reading, size_of_induration = :size_of_induration, comments = :comments WHERE id = :id AND patient_id = :patient_id');
                $query->execute([':date_of_injection' => $date_of_injection, ':date_of_reading' => $date_of_reading, ':size_of_induration' => $size_of_induration, ':comments' => $comments, ':patient_id' => $patient_id, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

	}