<?php
    require_once 'conn.php';
    require_once 'methods.php';
    require_once 'charge.php';

    class SputumAFB {

        // create a sputum_afb record
        public static function create_sputum_afb($patient_id, $appearance, $gram_stain, $pus_cells, $zn_stain, $comments, $added_by, $conn){
            $invoice_id = Methods::get_invoice_id('Sputum AFB', $conn);
            $amount     = Charge::read_charge('71', $conn);
            $appearance = implode(', ', $appearance);
            $gram_stain = implode(', ', $gram_stain);
            $pus_cells  = implode(', ', $pus_cells);
            $zn_stain   = implode(', ', $zn_stain);

            try{
                $query = $conn->prepare('INSERT INTO sputum_afb(invoice_id, patient_id, appearance, gram_stain, pus_cells, zn_stain, comments, added_by)  VALUES(:invoice_id, :patient_id, :appearance, :gram_stain, :pus_cells, :zn_stain, :comments, :added_by)');
                $query->execute([':invoice_id' => $invoice_id, ':patient_id' => $patient_id, ':appearance' => $appearance, ':gram_stain' => $gram_stain, ':pus_cells' => $pus_cells, ':zn_stain' => $zn_stain, ':comments' => $comments, ':added_by' => $added_by]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

        // fetch all sputum_afb records
        public static function read_sputum_afb($conn){
            try{
                $query = $conn->prepare('SELECT s.id, s.invoice_id, s.patient_id, s.appearance, s.gram_stain, s.pus_cells, s.zn_stain, s.comments, s.added_by, s.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM sputum_afb s INNER JOIN patients p ON s.patient_id = p.patient_id INNER JOIN users u ON s.added_by = u.staff_id');
                $query->execute();

                return $query->fetchAll(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // fetch a sputum_afb record
        public static function read_a_sputum_afb($id, $conn){
            try{
                $query = $conn->prepare('SELECT s.id, s.invoice_id, s.patient_id, s.appearance, s.gram_stain, s.pus_cells, s.zn_stain, s.comments, s.added_by, s.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM sputum_afb s INNER JOIN patients p ON s.patient_id = p.patient_id INNER JOIN users u ON s.added_by = u.staff_id WHERE s.id = :id');
                $query->execute([':id' => $id]);

                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // update a sputum_afb record
        public static function update_sputum_afb($id, $patient_id, $appearance, $gram_stain, $pus_cells, $zn_stain, $comments, $conn) {
            $appearance = implode(', ', $appearance);
            $gram_stain = implode(', ', $gram_stain);
            $pus_cells  = implode(', ', $pus_cells);
            $zn_stain   = implode(', ', $zn_stain);

            try{
                $query = $conn->prepare('UPDATE sputum_afb SET patient_id = :patient_id, appearance = :appearance, gram_stain = :gram_stain, pus_cells = :pus_cells, zn_stain = :zn_stain, comments = :comments WHERE id = :id AND patient_id = :patient_id');
                $query->execute([':appearance' => $appearance, ':gram_stain' => $gram_stain, ':pus_cells' => $pus_cells, ':zn_stain' => $zn_stain, ':comments' => $comments, ':patient_id' => $patient_id, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

    }