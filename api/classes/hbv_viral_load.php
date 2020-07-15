<?php
    require_once 'conn.php';
    require_once 'methods.php';
    require_once 'charge.php';

	class HBVViralLoad {

        // create a hbv_viral_load record
        public static function create_hbv_viral_load($patient_id, $hbv_dna, $pcr_hbv_quantitative, $comments, $added_by, $conn){
            $invoice_id = Methods::get_invoice_id('HBV Viral Load', $conn);
            $amount     = Charge::read_charge('41', $conn);
            try{
                $query = $conn->prepare('INSERT INTO hbv_viral_load(invoice_id, patient_id, hbv_dna, pcr_hbv_quantitative, comments, added_by)  VALUES(:invoice_id, :patient_id, :hbv_dna, :pcr_hbv_quantitative, :comments, :added_by)');
                $query->execute([':invoice_id' => $invoice_id, ':patient_id' => $patient_id, ':hbv_dna' => $hbv_dna, ':pcr_hbv_quantitative' => $pcr_hbv_quantitative, ':comments' => $comments, ':added_by' => $added_by]);

                return true;
            }catch(PDOException $ex){
            	return false;
            }
        }

        // fetch all hbv_viral_load records
        public static function read_hbv_viral_loads($conn){
            try{
                $query = $conn->prepare('SELECT c.id, c.invoice_id, c.patient_id, c.hbv_dna, c.pcr_hbv_quantitative, c.comments, c.added_by, c.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM hbv_viral_load c INNER JOIN patients p ON c.patient_id = p.patient_id INNER JOIN users u ON c.added_by = u.staff_id');
                $query->execute();

                return $query->fetchAll(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // fetch a hbv_viral_load record
        public static function read_hbv_viral_load($id, $conn){
            try{
                $query = $conn->prepare('SELECT c.id, c.invoice_id, c.patient_id, c.hbv_dna, c.pcr_hbv_quantitative, c.comments, c.added_by, c.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM hbv_viral_load c INNER JOIN patients p ON c.patient_id = p.patient_id INNER JOIN users u ON c.added_by = u.staff_id WHERE c.id = :id');
                $query->execute([':id' => $id]);

                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // update a hbv_viral_load record
        public static function update_hbv_viral_load($id, $patient_id, $hbv_dna, $pcr_hbv_quantitative, $comments, $conn) {
            try{
                $query = $conn->prepare('UPDATE hbv_viral_load SET patient_id = :patient_id, hbv_dna = :hbv_dna, pcr_hbv_quantitative = :pcr_hbv_quantitative, comments = :comments WHERE id = :id AND patient_id = :patient_id');
                $query->execute([':hbv_dna' => $hbv_dna, ':pcr_hbv_quantitative' => $pcr_hbv_quantitative, ':comments' => $comments, ':patient_id' => $patient_id, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

	}