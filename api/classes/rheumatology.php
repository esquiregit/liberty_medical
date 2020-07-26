<?php
    require_once 'conn.php';
    require_once 'methods.php';
    require_once 'charge.php';

	class Rheumatology {

        // create a rheumatology record
        public static function create_rheumatology($patient_id, $le_cells, $ana_qualitative, $ana_quantitative, $ds_dna, $rheumatoid_factor, $comments, $added_by, $conn){
            $invoice_id = Methods::get_invoice_id('Rheumatology', $conn);
            $amount     = Charge::read_charge('63', $conn);
            $le_cells   = is_array($le_cells) ? implode(', ', $le_cells) : $le_cells;

            try{
                $query = $conn->prepare('INSERT INTO rheumatology(invoice_id, patient_id, le_cells, ana_qualitative, ana_quantitative, ds_dna, rheumatoid_factor, comments, added_by)  VALUES(:invoice_id, :patient_id, :le_cells, :ana_qualitative, :ana_quantitative, :ds_dna, :rheumatoid_factor, :comments, :added_by)');
                $query->execute([':invoice_id' => $invoice_id, ':patient_id' => $patient_id, ':le_cells' => $le_cells, ':ana_qualitative' => $ana_qualitative, ':ds_dna' => $ds_dna, ':ana_quantitative' => $ana_quantitative, ':rheumatoid_factor' => $rheumatoid_factor, ':comments' => $comments, ':added_by' => $added_by]);

                return true;
            }catch(PDOException $ex){die($ex);
            	return false;
            }
        }

        // fetch all rheumatology records
        public static function read_rheumatologies($conn){
            try{
                $query = $conn->prepare('SELECT rhe.id, rhe.invoice_id, rhe.patient_id, rhe.le_cells, rhe.ana_qualitative, rhe.ana_quantitative, rhe.ds_dna, rhe.rheumatoid_factor, rhe.comments, rhe.added_by, rhe.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM rheumatology rhe INNER JOIN patients p ON rhe.patient_id = p.patient_id INNER JOIN users u ON rhe.added_by = u.staff_id');
                $query->execute();

                return $query->fetchAll(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // fetch a rheumatology record
        public static function read_rheumatology($id, $conn){
            try{
                $query = $conn->prepare('SELECT rhe.id, rhe.invoice_id, rhe.patient_id, rhe.le_cells, rhe.ana_qualitative, rhe.ana_quantitative, rhe.ds_dna, rhe.rheumatoid_factor, rhe.comments, rhe.added_by, rhe.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM rheumatology rhe INNER JOIN patients p ON rhe.patient_id = p.patient_id INNER JOIN users u ON rhe.added_by = u.staff_id WHERE rhe.id = :id');
                $query->execute([':id' => $id]);

                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // update a rheumatology record
        public static function update_rheumatology($id, $patient_id, $le_cells, $ana_qualitative, $ana_quantitative, $ds_dna, $rheumatoid_factor, $comments, $conn) {
            $le_cells = is_array($le_cells) ? implode(', ', $le_cells) : $le_cells;
            
            try{
                $query = $conn->prepare('UPDATE rheumatology SET patient_id = :patient_id, le_cells = :le_cells, ana_qualitative = :ana_qualitative, ana_quantitative = :ana_quantitative, ds_dna = :ds_dna, rheumatoid_factor = :rheumatoid_factor, comments = :comments WHERE id = :id AND patient_id = :patient_id');
                $query->execute([':le_cells' => $le_cells, ':ana_qualitative' => $ana_qualitative, ':ds_dna' => $ds_dna, ':ana_quantitative' => $ana_quantitative, ':rheumatoid_factor' => $rheumatoid_factor, ':comments' => $comments, ':patient_id' => $patient_id, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

	}