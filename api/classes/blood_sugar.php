<?php
    require_once 'conn.php';
    require_once 'methods.php';
    require_once 'charge.php';

	class BloodSugar {

        // create a blood_sugar record
        public static function create_blood_sugar($patient_id, $fasting_blood_sugar, $random_blood_sugar, $two_hpp_blood_sugar, $comments, $added_by, $conn){
            $invoice_id = Methods::get_invoice_id('Blood Sugar', $conn);
            $amount     = Charge::read_charge('11', $conn);
            try{
                $query = $conn->prepare('INSERT INTO blood_sugar(invoice_id, patient_id, fasting_blood_sugar, random_blood_sugar, two_hpp_blood_sugar, comments, added_by) VALUES(:invoice_id, :patient_id, :fasting_blood_sugar, :random_blood_sugar, :two_hpp_blood_sugar, :comments, :added_by)');
                $query->execute([':invoice_id' => $invoice_id, ':patient_id' => $patient_id, ':fasting_blood_sugar' => $fasting_blood_sugar, ':random_blood_sugar' => $random_blood_sugar, ':two_hpp_blood_sugar' => $two_hpp_blood_sugar, ':comments' => $comments, ':added_by' => $added_by]);

                return true;
            }catch(PDOException $ex){
            	return false;
            }
        }

        // fetch all blood_sugar records
        public static function read_blood_sugars($conn){
            try{
                $query = $conn->prepare('SELECT bs.id, bs.invoice_id, bs.patient_id, bs.fasting_blood_sugar, bs.random_blood_sugar, bs.two_hpp_blood_sugar, bs.comments, bs.added_by, bs.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM blood_sugar bs INNER JOIN patients p ON bs.patient_id = p.patient_id INNER JOIN users u ON bs.added_by = u.staff_id');
                $query->execute();

                return $query->fetchAll(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // fetch a blood_sugar record
        public static function read_blood_sugar($id, $conn){
            try{
                $query = $conn->prepare('SELECT bs.id, bs.invoice_id, bs.patient_id, bs.fasting_blood_sugar, bs.random_blood_sugar, bs.two_hpp_blood_sugar, bs.comments, bs.added_by, bs.date_added, bs.amount, bs.payment_type, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM blood_sugar bs INNER JOIN patients p ON bs.patient_id = p.patient_id INNER JOIN users u ON bs.added_by = u.staff_id WHERE bs.id = :id');
                $query->execute([':id' => $id]);

                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // update a blood_sugar record
        public static function update_blood_sugar($id, $patient_id, $fasting_blood_sugar, $random_blood_sugar, $two_hpp_blood_sugar, $comments, $conn) {
            try{
                $query = $conn->prepare('UPDATE blood_sugar SET patient_id = :patient_id, fasting_blood_sugar = :fasting_blood_sugar, random_blood_sugar = :random_blood_sugar, two_hpp_blood_sugar = :two_hpp_blood_sugar, comments = :comments WHERE id = :id AND patient_id = :patient_id');
                $query->execute([':fasting_blood_sugar' => $fasting_blood_sugar, ':random_blood_sugar' => $random_blood_sugar, ':two_hpp_blood_sugar' => $two_hpp_blood_sugar, ':comments' => $comments, ':patient_id' => $patient_id, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

	}