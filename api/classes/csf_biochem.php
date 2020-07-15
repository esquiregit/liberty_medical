<?php
    require_once 'conn.php';
    require_once 'methods.php';
    require_once 'charge.php';

	class CSFBiochem {

        // create a csf_biochem record
        public static function create_csf_biochem($patient_id, $appearance, $glucose, $protein, $globulin, $comments, $added_by, $conn){
            $invoice_id = Methods::get_invoice_id('CSF Biochem', $conn);
            $appearance = implode(', ', $appearance);
            $globulin   = implode(', ', $globulin);
            $amount     = Charge::read_charge('20', $conn);

            try{
                $query = $conn->prepare('INSERT INTO csf_biochem(invoice_id, patient_id, appearance, glucose, protein, globulin, comments, added_by)  VALUES(:invoice_id, :patient_id, :appearance, :glucose, :protein, :globulin, :comments, :added_by)');
                $query->execute([':invoice_id' => $invoice_id, ':patient_id' => $patient_id, ':appearance' => $appearance, ':glucose' => $glucose, ':protein' => $protein, ':globulin' => $globulin, ':comments' => $comments, ':added_by' => $added_by]);

                return true;
            }catch(PDOException $ex){
            	return false;
            }
        }

        // fetch all csf_biochem records
        public static function read_csf_biochems($conn){
            try{
                $query = $conn->prepare('SELECT cb.id, cb.invoice_id, cb.patient_id, cb.appearance, cb.glucose, cb.protein, cb.globulin, cb.comments, cb.added_by, cb.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM csf_biochem cb INNER JOIN patients p ON cb.patient_id = p.patient_id INNER JOIN users u ON cb.added_by = u.staff_id');
                $query->execute();

                return $query->fetchAll(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // fetch a csf_biochem record
        public static function read_csf_biochem($id, $conn){
            try{
                $query = $conn->prepare('SELECT cb.id, cb.invoice_id, cb.patient_id, cb.appearance, cb.glucose, cb.protein, cb.globulin, cb.comments, cb.added_by, cb.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM csf_biochem cb INNER JOIN patients p ON cb.patient_id = p.patient_id INNER JOIN users u ON cb.added_by = u.staff_id WHERE cb.id = :id');
                $query->execute([':id' => $id]);

                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // update a csf_biochem record
        public static function update_csf_biochem($id, $patient_id, $appearance, $glucose, $protein, $globulin, $comments, $conn) {
            $appearance = implode(', ', $appearance);
            $globulin = implode(', ', $globulin);
            try{
                $query = $conn->prepare('UPDATE csf_biochem SET patient_id = :patient_id, appearance = :appearance, glucose = :glucose, protein = :protein, globulin = :globulin, comments = :comments WHERE id = :id AND patient_id = :patient_id');
                $query->execute([':appearance' => $appearance, ':glucose' => $glucose, ':protein' => $protein, ':globulin' => $globulin, ':comments' => $comments, ':patient_id' => $patient_id, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

	}