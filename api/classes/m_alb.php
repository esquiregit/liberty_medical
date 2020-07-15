<?php
    require_once 'conn.php';
    require_once 'methods.php';
    require_once 'charge.php';

    class MALB {

        // create a m_alb record
        public static function create_m_alb($patient_id, $results, $comments, $added_by, $conn){
            $invoice_id = Methods::get_invoice_id('M-ALB', $conn);
            $amount     = Charge::read_charge('54', $conn);
            try{
                $query = $conn->prepare('INSERT INTO m_alb(invoice_id, patient_id, results, comments, added_by)  VALUES(:invoice_id, :patient_id, :results, :comments, :added_by)');
                $query->execute([':invoice_id' => $invoice_id, ':patient_id' => $patient_id, ':results' => $results, ':comments' => $comments, ':added_by' => $added_by]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

        // fetch all m_alb records
        public static function read_m_albs($conn){
            try{
                $query = $conn->prepare('SELECT m.id, m.invoice_id, m.patient_id, m.results, m.comments, m.added_by, m.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM m_alb m INNER JOIN patients p ON m.patient_id = p.patient_id INNER JOIN users u ON m.added_by = u.staff_id');
                $query->execute();

                return $query->fetchAll(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // fetch a m_alb record
        public static function read_m_alb($id, $conn){
            try{
                $query = $conn->prepare('SELECT m.id, m.invoice_id, m.patient_id, m.results, m.comments, m.added_by, m.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM m_alb m INNER JOIN patients p ON m.patient_id = p.patient_id INNER JOIN users u ON m.added_by = u.staff_id WHERE m.id = :id');
                $query->execute([':id' => $id]);

                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // update a m_alb record
        public static function update_m_alb($id, $patient_id, $results, $comments, $conn) {
            try{
                $query = $conn->prepare('UPDATE m_alb SET patient_id = :patient_id, results = :results, comments = :comments WHERE id = :id AND patient_id = :patient_id');
                $query->execute([':results' => $results, ':comments' => $comments, ':patient_id' => $patient_id, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

    }