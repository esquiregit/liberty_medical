<?php
    require_once 'conn.php';
    require_once 'methods.php';
    require_once 'charge.php';

    class ProteinElectrophoresis {

        // create a protein_electrophoresis record
        public static function create_protein_electrophoresis($patient_id, $total_protein, $total_protein_flag, $albumin, $albumin_flag, $alpha_1_globulin, $alpha_1_globulin_flag, $alpha_2_globulin, $alpha_2_globulin_flag, $beta_1_globulin, $beta_1_globulin_flag, $beta_2_globulin, $beta_2_globulin_flag, $gamma_globulin, $gamma_globulin_flag, $comments, $added_by, $conn){
            $invoice_id = Methods::get_invoice_id('Protein Electrophoresis', $conn);
            $amount     = Charge::read_charge('60', $conn);
            try{
                $query = $conn->prepare('INSERT INTO protein_electrophoresis(invoice_id, patient_id, total_protein, total_protein_flag, albumin, albumin_flag, alpha_1_globulin, alpha_1_globulin_flag, alpha_2_globulin, alpha_2_globulin_flag, beta_1_globulin, beta_1_globulin_flag, beta_2_globulin, beta_2_globulin_flag, gamma_globulin, gamma_globulin_flag, comments, added_by)  VALUES(:invoice_id, :patient_id, :total_protein, :total_protein_flag, :albumin, :albumin_flag, :alpha_1_globulin, :alpha_1_globulin_flag, :alpha_2_globulin, :alpha_2_globulin_flag, :beta_1_globulin, :beta_1_globulin_flag, :beta_2_globulin, :beta_2_globulin_flag, :gamma_globulin, :gamma_globulin_flag, :comments, :added_by)');
                $query->execute([':invoice_id' => $invoice_id, ':patient_id' => $patient_id, ':total_protein' => $total_protein, ':total_protein_flag' => $total_protein_flag, ':albumin' => $albumin, ':albumin_flag' => $albumin_flag, ':alpha_1_globulin' => $alpha_1_globulin, ':alpha_1_globulin_flag' => $alpha_1_globulin_flag, ':alpha_2_globulin' => $alpha_2_globulin, ':alpha_2_globulin_flag' => $alpha_2_globulin_flag, ':beta_1_globulin' => $beta_1_globulin, ':beta_1_globulin_flag' => $beta_1_globulin_flag, ':beta_2_globulin' => $beta_2_globulin, ':beta_2_globulin_flag' => $beta_2_globulin_flag, ':gamma_globulin' => $gamma_globulin, ':gamma_globulin_flag' => $gamma_globulin_flag, ':comments' => $comments, ':added_by' => $added_by]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

        // fetch all protein_electrophoresis records
        public static function read_protein_electrophoresis($conn){
            try{
                $query = $conn->prepare('SELECT pe.id, pe.invoice_id, pe.patient_id, pe.total_protein, pe.total_protein_flag, pe.albumin, pe.albumin_flag, pe.alpha_1_globulin, pe.alpha_1_globulin_flag, pe.alpha_2_globulin, pe.alpha_2_globulin_flag, pe.beta_1_globulin, pe.beta_1_globulin_flag, pe.beta_2_globulin, pe.beta_2_globulin_flag, pe.gamma_globulin, pe.gamma_globulin_flag, pe.comments, pe.added_by, pe.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM protein_electrophoresis pe INNER JOIN patients p ON pe.patient_id = p.patient_id INNER JOIN users u ON pe.added_by = u.staff_id');
                $query->execute();

                return $query->fetchAll(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // fetch a protein_electrophoresis record
        public static function read_a_protein_electrophoresis($id, $conn){
            try{
                $query = $conn->prepare('SELECT pe.id, pe.invoice_id, pe.patient_id, pe.total_protein, pe.total_protein_flag, pe.albumin, pe.albumin_flag, pe.alpha_1_globulin, pe.alpha_1_globulin_flag, pe.alpha_2_globulin, pe.alpha_2_globulin_flag, pe.beta_1_globulin, pe.beta_1_globulin_flag, pe.beta_2_globulin, pe.beta_2_globulin_flag, pe.gamma_globulin, pe.gamma_globulin_flag, pe.comments, pe.added_by, pe.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM protein_electrophoresis pe INNER JOIN patients p ON pe.patient_id = p.patient_id INNER JOIN users u ON pe.added_by = u.staff_id WHERE pe.id = :id');
                $query->execute([':id' => $id]);

                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // update a protein_electrophoresis record
        public static function update_protein_electrophoresis($id, $patient_id, $total_protein, $total_protein_flag, $albumin, $albumin_flag, $alpha_1_globulin, $alpha_1_globulin_flag, $alpha_2_globulin, $alpha_2_globulin_flag, $beta_1_globulin, $beta_1_globulin_flag, $beta_2_globulin, $beta_2_globulin_flag, $gamma_globulin, $gamma_globulin_flag, $comments, $added_by, $conn) {
            try{
                $query = $conn->prepare('UPDATE protein_electrophoresis SET patient_id = :patient_id, total_protein = :total_protein, total_protein_flag = :total_protein_flag, albumin = :albumin, albumin_flag = :albumin_flag, alpha_1_globulin = :alpha_1_globulin, alpha_1_globulin_flag = :alpha_1_globulin_flag, alpha_2_globulin = :alpha_2_globulin, alpha_2_globulin_flag = :alpha_2_globulin_flag, beta_1_globulin = :beta_1_globulin, beta_1_globulin_flag = :beta_1_globulin_flag, beta_2_globulin = :beta_2_globulin, beta_2_globulin_flag = :beta_2_globulin_flag, gamma_globulin = :gamma_globulin, gamma_globulin_flag = :gamma_globulin_flag, comments = :comments WHERE id = :id AND patient_id = :patient_id');
                $query->execute([':total_protein' => $total_protein, ':total_protein_flag' => $total_protein_flag, ':albumin' => $albumin, ':albumin_flag' => $albumin_flag, ':alpha_1_globulin' => $alpha_1_globulin, ':alpha_1_globulin_flag' => $alpha_1_globulin_flag, ':alpha_2_globulin' => $alpha_2_globulin, ':alpha_2_globulin_flag' => $alpha_2_globulin_flag, ':beta_1_globulin' => $beta_1_globulin, ':beta_1_globulin_flag' => $beta_1_globulin_flag, ':beta_2_globulin' => $beta_2_globulin, ':beta_2_globulin_flag' => $beta_2_globulin_flag, ':gamma_globulin' => $gamma_globulin, ':gamma_globulin_flag' => $gamma_globulin_flag, ':comments' => $comments, ':patient_id' => $patient_id, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

    }