<?php
    require_once 'conn.php';
    require_once 'methods.php';
    require_once 'charge.php';

    class DDimers {

        // create a d_dimers record
        public static function create_d_dimers($patient_id, $results, $comments, $added_by, $conn){
            $invoice_id = Methods::get_invoice_id('D-Dimers', $conn);
            $amount     = Charge::read_charge('26', $conn);
            try{
                $query = $conn->prepare('INSERT INTO d_dimers(invoice_id, patient_id, results, comments, added_by)  VALUES(:invoice_id, :patient_id, :results, :comments, :added_by)');
                $query->execute([':invoice_id' => $invoice_id, ':patient_id' => $patient_id, ':results' => $results, ':comments' => $comments, ':added_by' => $added_by]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

        // fetch all d_dimers records
        public static function read_d_dimers($conn){
            try{
                $query = $conn->prepare('SELECT dd.id, dd.invoice_id, dd.patient_id, dd.results, dd.comments, dd.added_by, dd.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM d_dimers dd INNER JOIN patients p ON dd.patient_id = p.patient_id INNER JOIN users u ON dd.added_by = u.staff_id');
                $query->execute();

                return $query->fetchAll(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // fetch a d_dimers record
        public static function read_a_d_dimers($id, $conn){
            try{
                $query = $conn->prepare('SELECT dd.id, dd.invoice_id, dd.patient_id, dd.results, dd.comments, dd.added_by, dd.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM d_dimers dd INNER JOIN patients p ON dd.patient_id = p.patient_id INNER JOIN users u ON dd.added_by = u.staff_id WHERE dd.id = :id');
                $query->execute([':id' => $id]);

                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // update a d_dimers record
        public static function update_d_dimers($id, $patient_id, $results, $comments, $conn) {
            try{
                $query = $conn->prepare('UPDATE d_dimers SET patient_id = :patient_id, results = :results, comments = :comments WHERE id = :id AND patient_id = :patient_id');
                $query->execute([':results' => $results, ':comments' => $comments, ':patient_id' => $patient_id, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

    }