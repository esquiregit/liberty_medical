<?php
    require_once 'conn.php';
    require_once 'charge.php';
    require_once 'methods.php';

    class AlphaFetoProtein {

        // create a alpha_feto_protein record
        public static function create_alpha_feto_protein($patient_id, $results, $comments, $added_by, $conn){
            $invoice_id = Methods::get_invoice_id('Alpha Feto Protein', $conn);
            $amount     = Charge::read_charge('1', $conn);

            try{
                $query = $conn->prepare('INSERT INTO alpha_feto_protein(invoice_id, patient_id, results, comments, added_by)  VALUES(:invoice_id, :patient_id, :results, :comments, :added_by)');
                $query->execute([':invoice_id' => $invoice_id, ':patient_id' => $patient_id, ':results' => $results, ':comments' => $comments, ':added_by' => $added_by]);

                return true;
            }catch(PDOException $ex) {
                return false;
            }
        }

        // fetch all alpha_feto_protein records
        public static function read_alpha_feto_proteins($conn){
            try{
                $query = $conn->prepare('SELECT afp.invoice_id, afp.id, afp.patient_id, afp.results, afp.comments, afp.added_by, afp.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM alpha_feto_protein afp INNER JOIN patients p ON afp.patient_id = p.patient_id INNER JOIN users u ON afp.added_by = u.staff_id ORDER BY afp.id DESC');
                $query->execute();

                return $query->fetchAll(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // fetch a alpha_feto_protein record
        public static function read_alpha_feto_protein($id, $conn){
            try{
                $query = $conn->prepare('SELECT afp.invoice_id, afp.id, afp.patient_id, afp.results, afp.comments, afp.added_by, afp.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM alpha_feto_protein afp INNER JOIN patients p ON afp.patient_id = p.patient_id INNER JOIN users u ON afp.added_by = u.staff_id WHERE afp.id = :id');
                $query->execute([':id' => $id]);

                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // update a alpha_feto_protein record
        public static function update_alpha_feto_protein($id, $patient_id, $results, $comments, $conn) {
            try{
                $query = $conn->prepare('UPDATE alpha_feto_protein SET patient_id = :patient_id, results = :results, comments = :comments WHERE id = :id AND patient_id = :patient_id');
                $query->execute([':results' => $results, ':comments' => $comments, ':patient_id' => $patient_id, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_alpha_feto_protein($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE alpha_feto_protein SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

    }