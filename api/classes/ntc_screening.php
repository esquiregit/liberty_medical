<?php
    require_once 'conn.php';
    require_once 'methods.php';
    require_once 'charge.php';

	class NTC_SCREENING {

        // create a ntc_screening record
        public static function create_ntc_screening($patient_id, $hb, $hct, $hepb, $sickling, $comments, $added_by, $conn){
            $invoice_id = Methods::get_invoice_id('NTC Screening', $conn);
            $amount     = Charge::read_charge('55', $conn);
            try{
                $query = $conn->prepare('INSERT INTO ntc_screening(invoice_id, patient_id, hb, hct, hepb, sickling, comments, added_by)  VALUES(:invoice_id, :patient_id, :hb, :hct, :hepb, :sickling, :comments, :added_by)');
                $query->execute([':invoice_id' => $invoice_id, ':patient_id' => $patient_id, ':hb' => $hb, ':hct' => $hct, ':hepb' => $hepb, ':sickling' => $sickling, ':comments' => $comments, ':added_by' => $added_by]);

                return true;
            }catch(PDOException $ex){
            	return false;
            }
        }

        // fetch all ntc_screening records
        public static function read_ntc_screenings($conn){
            try{
                $query = $conn->prepare('SELECT ns.id, ns.invoice_id, ns.patient_id, ns.hb, ns.hct, ns.hepb, ns.sickling, ns.comments, ns.added_by, ns.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM ntc_screening ns INNER JOIN patients p ON ns.patient_id = p.patient_id INNER JOIN users u ON ns.added_by = u.staff_id');
                $query->execute();

                return $query->fetchAll(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // fetch a ntc_screening record
        public static function read_ntc_screening($id, $conn){
            try{
                $query = $conn->prepare('SELECT ns.id, ns.invoice_id, ns.patient_id, ns.hb, ns.hct, ns.hepb, ns.sickling, ns.comments, ns.added_by, ns.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM ntc_screening ns INNER JOIN patients p ON ns.patient_id = p.patient_id INNER JOIN users u ON ns.added_by = u.staff_id WHERE ns.id = :id');
                $query->execute([':id' => $id]);

                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // update a ntc_screening record
        public static function update_ntc_screening($id, $patient_id, $hb, $hct, $hepb, $sickling, $comments, $conn) {
            try{
                $query = $conn->prepare('UPDATE ntc_screening SET patient_id = :patient_id, hb = :hb, hct = :hct, hepb = :hepb, sickling = :sickling, comments = :comments WHERE id = :id AND patient_id = :patient_id');
                $query->execute([':hb' => $hb, ':hct' => $hct, ':hepb' => $hepb, ':sickling' => $sickling, ':comments' => $comments, ':patient_id' => $patient_id, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

	}