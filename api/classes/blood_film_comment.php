<?php
    require_once 'conn.php';
    require_once 'methods.php';
    require_once 'charge.php';

	class BloodFilmComment {

        // create a blood_film_comment record
        public static function create_blood_film_comment($patient_id, $rbc, $wbc, $platelets, $comments, $added_by, $conn){
            $invoice_id = Methods::get_invoice_id('Blood Film Comment', $conn);
            $amount     = Charge::read_charge('9', $conn);
            
            try{
                $query = $conn->prepare('INSERT INTO blood_film_comment(invoice_id, patient_id, rbc, wbc, platelets, comments, added_by) VALUES(:invoice_id, :patient_id, :rbc, :wbc, :platelets, :comments, :added_by)');
                $query->execute([':invoice_id' => $invoice_id, ':patient_id' => $patient_id, ':rbc' => $rbc, ':wbc' => $wbc, ':platelets' => $platelets, ':comments' => $comments, ':added_by' => $added_by]);

                return true;
            }catch(PDOException $ex){
            	return false;
            }
        }

        // fetch all blood_film_comment records
        public static function read_blood_film_comments($conn){
            try{
                $query = $conn->prepare('SELECT bfc.id, bfc.invoice_id, bfc.patient_id, bfc.rbc, bfc.wbc, bfc.platelets, bfc.comments, bfc.added_by, bfc.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM blood_film_comment bfc INNER JOIN patients p ON bfc.patient_id = p.patient_id INNER JOIN users u ON bfc.added_by = u.staff_id');
                $query->execute();

                return $query->fetchAll(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // fetch a blood_film_comment record
        public static function read_blood_film_comment($id, $conn){
            try{
                $query = $conn->prepare('SELECT bfc.id, bfc.invoice_id, bfc.patient_id, bfc.rbc, bfc.wbc, bfc.platelets, bfc.comments, bfc.added_by, bfc.date_added, bfc.amount, bfc.payment_type, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM blood_film_comment bfc INNER JOIN patients p ON bfc.patient_id = p.patient_id INNER JOIN users u ON bfc.added_by = u.staff_id WHERE bfc.id = :id');
                $query->execute([':id' => $id]);

                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // update a blood_film_comment record
        public static function update_blood_film_comment($id, $patient_id, $rbc, $wbc, $platelets, $comments, $conn) {
            try{
                $query = $conn->prepare('UPDATE blood_film_comment SET patient_id = :patient_id, rbc = :rbc, wbc = :wbc, platelets = :platelets, comments = :comments WHERE id = :id AND patient_id = :patient_id');
                $query->execute([':rbc' => $rbc, ':wbc' => $wbc, ':platelets' => $platelets, ':comments' => $comments, ':patient_id' => $patient_id, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

	}