<?php
    require_once 'conn.php';
    require_once 'methods.php';
    require_once 'charge.php';

	class PleuralFluid {

        // create a pleural_fluid record
        public static function create_pleural_fluid($patient_id, $colour, $appearance, $appearance_dropdown, $gram_stain, $acid_fast_bacilli, $ph, $glucose, $total_protein, $pleural_fluid_albumin, $ldh, $total_wbc_one, $total_wbc_two, $lymphocytes_one, $lymphocytes_two, $monocytes_one, $monocytes_two, $granulocytes_one, $granulocytes_two, $comments, $added_by, $conn){
            $invoice_id          = Methods::get_invoice_id('Pleural Fluid', $conn);
            $amount              = Charge::read_charge('58', $conn);
            $appearance_dropdown = is_array($appearance_dropdown) ? implode(', ', $appearance_dropdown) : $appearance_dropdown;
            $gram_stain          = is_array($gram_stain) ? implode(', ', $gram_stain) : $gram_stain;

            try{
                $query = $conn->prepare('INSERT INTO pleural_fluid(invoice_id, patient_id, colour, appearance, appearance_dropdown, gram_stain, acid_fast_bacilli, ph, glucose, total_protein, pleural_fluid_albumin, ldh, total_wbc_one, total_wbc_two, lymphocytes_one, lymphocytes_two, monocytes_one, monocytes_two, granulocytes_one, granulocytes_two, comments, added_by)  VALUES(:invoice_id, :patient_id, :colour, :appearance, :appearance_dropdown, :gram_stain, :acid_fast_bacilli, :ph, :glucose, :total_protein, :pleural_fluid_albumin, :ldh, :total_wbc_one, :total_wbc_two, :lymphocytes_one, :lymphocytes_two, :monocytes_one, :monocytes_two, :granulocytes_one, :granulocytes_two, :comments, :added_by)');
                $query->execute([':invoice_id' => $invoice_id, ':patient_id' => $patient_id, ':colour' => $colour, ':appearance' => $appearance, ':appearance_dropdown' => $appearance_dropdown, ':gram_stain' => $gram_stain, ':acid_fast_bacilli' => $acid_fast_bacilli, ':ph' => $ph, ':glucose' => $glucose, ':total_protein' => $total_protein, ':pleural_fluid_albumin' => $pleural_fluid_albumin, ':ldh' => $ldh, ':total_wbc_one' => $total_wbc_one, ':total_wbc_two' => $total_wbc_two, ':lymphocytes_one' => $lymphocytes_one, ':lymphocytes_two' => $lymphocytes_two, ':monocytes_one' => $monocytes_one, ':monocytes_two' => $monocytes_two, ':granulocytes_one' => $granulocytes_one, ':granulocytes_two' => $granulocytes_two, ':comments' => $comments, ':added_by' => $added_by]);

                return true;
            }catch(PDOException $ex){
            	return false;
            }
        }

        // fetch all pleural_fluid records
        public static function read_pleural_fluid($conn){
            try{
                $query = $conn->prepare('SELECT pf.id, pf.invoice_id, pf.patient_id, pf.colour, pf.appearance, pf.appearance_dropdown, pf.gram_stain, pf.acid_fast_bacilli, pf.ph, pf.glucose, pf.total_protein, pf.pleural_fluid_albumin, pf.ldh, pf.total_wbc_one, pf.total_wbc_two, pf.lymphocytes_one, pf.lymphocytes_two, pf.monocytes_one, pf.monocytes_two, pf.granulocytes_one, pf.granulocytes_two, pf.comments, pf.added_by, pf.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM pleural_fluid pf INNER JOIN patients p ON pf.patient_id = p.patient_id INNER JOIN users u ON pf.added_by = u.staff_id');
                $query->execute();

                return $query->fetchAll(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // fetch a pleural_fluid record
        public static function read_a_pleural_fluid($id, $conn){
            try{
                $query = $conn->prepare('SELECT pf.id, pf.invoice_id, pf.patient_id, pf.colour, pf.appearance, pf.appearance_dropdown, pf.gram_stain, pf.acid_fast_bacilli, pf.ph, pf.glucose, pf.total_protein, pf.pleural_fluid_albumin, pf.ldh, pf.total_wbc_one, pf.total_wbc_two, pf.lymphocytes_one, pf.lymphocytes_two, pf.monocytes_one, pf.monocytes_two, pf.granulocytes_one, pf.granulocytes_two, pf.comments, pf.added_by, pf.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM pleural_fluid pf INNER JOIN patients p ON pf.patient_id = p.patient_id INNER JOIN users u ON pf.added_by = u.staff_id WHERE pf.id = :id');
                $query->execute([':id' => $id]);

                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // update a pleural_fluid record
        public static function update_pleural_fluid($id, $patient_id, $colour, $appearance, $appearance_dropdown, $gram_stain, $acid_fast_bacilli, $ph, $glucose, $total_protein, $pleural_fluid_albumin, $ldh, $total_wbc_one, $total_wbc_two, $lymphocytes_one, $lymphocytes_two, $monocytes_one, $monocytes_two, $granulocytes_one, $granulocytes_two, $comments, $conn) {
            $appearance_dropdown = is_array($appearance_dropdown) ? implode(', ', $appearance_dropdown) : $appearance_dropdown;
            $gram_stain          = is_array($gram_stain) ? implode(', ', $gram_stain) : $gram_stain;
            
            try{
                $query = $conn->prepare('UPDATE pleural_fluid SET patient_id = :patient_id, colour = :colour, appearance = :appearance, appearance_dropdown = :appearance_dropdown, gram_stain = :gram_stain, acid_fast_bacilli = :acid_fast_bacilli, ph = :ph, glucose = :glucose, total_protein = :total_protein, pleural_fluid_albumin = :pleural_fluid_albumin, ldh = :ldh, total_wbc_one = :total_wbc_one, total_wbc_two = :total_wbc_two, lymphocytes_one = :lymphocytes_one, lymphocytes_two = :lymphocytes_two, monocytes_one = :monocytes_one, monocytes_two = :monocytes_two, granulocytes_one = :granulocytes_one, granulocytes_two = :granulocytes_two, comments = :comments WHERE id = :id AND patient_id = :patient_id');
                $query->execute([':colour' => $colour, ':appearance' => $appearance, ':appearance_dropdown' => $appearance_dropdown, ':gram_stain' => $gram_stain, ':acid_fast_bacilli' => $acid_fast_bacilli, ':ph' => $ph, ':glucose' => $glucose, ':total_protein' => $total_protein, ':pleural_fluid_albumin' => $pleural_fluid_albumin, ':ldh' => $ldh, ':total_wbc_one' => $total_wbc_one, ':total_wbc_two' => $total_wbc_two, ':lymphocytes_one' => $lymphocytes_one, ':lymphocytes_two' => $lymphocytes_two, ':monocytes_one' => $monocytes_one, ':monocytes_two' => $monocytes_two, ':granulocytes_one' => $granulocytes_one, ':granulocytes_two' => $granulocytes_two, ':comments' => $comments, ':patient_id' => $patient_id, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

	}