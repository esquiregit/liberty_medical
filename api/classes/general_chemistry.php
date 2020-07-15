<?php
    require_once 'conn.php';
    require_once 'methods.php';
    require_once 'charge.php';

	class GeneralChemistry {

        // create a general_chemistry record
        public static function create_general_chemistry($patient_id, $amylase, $creatinine, $ldh, $uric_acid, $creatine_kinase, $calcium, $phosphorus, $magnessium, $fbs_glucose, $globulin, $bili_indirect, $glyco_hbg, $comments, $added_by, $conn){
            $invoice_id = Methods::get_invoice_id('General Chemistry', $conn);
            $amount     = Charge::read_charge('36', $conn);
            try{
                $query = $conn->prepare('INSERT INTO general_chemistry(invoice_id, patient_id, amylase, creatinine, ldh, uric_acid, creatine_kinase, calcium, phosphorus, magnessium, fbs_glucose, globulin, bili_indirect, glyco_hbg, comments, added_by)  VALUES(:invoice_id, :patient_id, :amylase, :creatinine, :ldh, :uric_acid, :creatine_kinase, :calcium, :phosphorus, :magnessium, :fbs_glucose, :globulin, :bili_indirect, :glyco_hbg, :comments, :added_by)');
                $query->execute([':invoice_id' => $invoice_id, ':patient_id' => $patient_id, ':amylase' => $amylase, ':creatinine' => $creatinine, ':ldh' => $ldh, ':uric_acid' => $uric_acid, ':creatine_kinase' => $creatine_kinase, ':calcium' => $calcium, ':phosphorus' => $phosphorus, ':magnessium' => $magnessium, ':fbs_glucose' => $fbs_glucose, ':globulin' => $globulin, ':bili_indirect' => $bili_indirect, ':glyco_hbg' => $glyco_hbg, ':comments' => $comments, ':added_by' => $added_by]);

                return true;
            }catch(PDOException $ex){
            	return false;
            }
        }

        // fetch all general_chemistry records
        public static function read_general_chemistrys($conn){
            try{
                $query = $conn->prepare('SELECT gc.id, gc.invoice_id, gc.patient_id, gc.amylase, gc.creatinine, gc.ldh, gc.uric_acid, gc.creatine_kinase, gc.calcium, gc.phosphorus, gc.magnessium, gc.fbs_glucose, gc.globulin, gc.bili_indirect, gc.glyco_hbg, gc.comments, gc.added_by, gc.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM general_chemistry gc INNER JOIN patients p ON gc.patient_id = p.patient_id INNER JOIN users u ON gc.added_by = u.staff_id');
                $query->execute();

                return $query->fetchAll(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // fetch a general_chemistry record
        public static function read_general_chemistry($id, $conn){
            try{
                $query = $conn->prepare('SELECT gc.id, gc.invoice_id, gc.patient_id, gc.amylase, gc.creatinine, gc.ldh, gc.uric_acid, gc.creatine_kinase, gc.calcium, gc.phosphorus, gc.magnessium, gc.fbs_glucose, gc.globulin, gc.bili_indirect, gc.glyco_hbg, gc.comments, gc.added_by, gc.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM general_chemistry gc INNER JOIN patients p ON gc.patient_id = p.patient_id INNER JOIN users u ON gc.added_by = u.staff_id WHERE gc.id = :id');
                $query->execute([':id' => $id]);

                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // update a general_chemistry record
        public static function update_general_chemistry($id, $patient_id, $amylase, $creatinine, $ldh, $uric_acid, $creatine_kinase, $calcium, $phosphorus, $magnessium, $fbs_glucose, $globulin, $bili_indirect, $glyco_hbg, $comments, $added_by, $conn) {
            try{
                $query = $conn->prepare('UPDATE general_chemistry SET patient_id = :patient_id, amylase = :amylase, creatinine = :creatinine, ldh = :ldh, uric_acid = :uric_acid, creatine_kinase = :creatine_kinase, calcium = :calcium, phosphorus = :phosphorus, magnessium = :magnessium, fbs_glucose = :fbs_glucose, globulin = :globulin, bili_indirect = :bili_indirect, glyco_hbg = :glyco_hbg, comments = :comments WHERE id = :id AND patient_id = :patient_id');
                $query->execute([':amylase' => $amylase, ':creatinine' => $creatinine, ':ldh' => $ldh, ':uric_acid' => $uric_acid, ':creatine_kinase' => $creatine_kinase, ':calcium' => $calcium, ':phosphorus' => $phosphorus, ':magnessium' => $magnessium, ':fbs_glucose' => $fbs_glucose, ':globulin' => $globulin, ':bili_indirect' => $bili_indirect, ':glyco_hbg' => $glyco_hbg, ':comments' => $comments, ':patient_id' => $patient_id, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

	}