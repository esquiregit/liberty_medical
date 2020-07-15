<?php
    require_once 'conn.php';
    require_once 'methods.php';
    require_once 'charge.php';

	class SPECIALS {

        // create a specials record
        public static function create_specials($patient_id, $abo_grouping, $g6pd, $hgb_genotype, $sickling, $added_by, $conn){
            $invoice_id   = Methods::get_invoice_id('Specials', $conn);
            $amount       = Charge::read_charge('70', $conn);
            $abo_grouping = implode(', ', $abo_grouping);
            $g6pd         = implode(', ', $g6pd);
            $hgb_genotype = implode(', ', $hgb_genotype);
            $sickling     = implode(', ', $sickling);

            try{
                $query = $conn->prepare('INSERT INTO specials(invoice_id, patient_id, abo_grouping, g6pd, hgb_genotype, sickling, added_by)  VALUES(:invoice_id, :patient_id, :abo_grouping, :g6pd, :hgb_genotype, :sickling, :added_by)');
                $query->execute([':invoice_id' => $invoice_id, ':patient_id' => $patient_id, ':abo_grouping' => $abo_grouping, ':g6pd' => $g6pd, ':hgb_genotype' => $hgb_genotype, ':sickling' => $sickling, ':added_by' => $added_by]);

                return true;
            }catch(PDOException $ex){
            	return false;
            }
        }

        // fetch all specials records
        public static function read_specials($conn){
            try{
                $query = $conn->prepare('SELECT ns.id, ns.invoice_id, ns.patient_id, ns.abo_grouping, ns.g6pd, ns.hgb_genotype, ns.sickling, ns.added_by, ns.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM specials ns INNER JOIN patients p ON ns.patient_id = p.patient_id INNER JOIN users u ON ns.added_by = u.staff_id');
                $query->execute();

                return $query->fetchAll(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // fetch a specials record
        public static function read_a_specials($id, $conn){
            try{
                $query = $conn->prepare('SELECT ns.id, ns.invoice_id, ns.patient_id, ns.abo_grouping, ns.g6pd, ns.hgb_genotype, ns.sickling, ns.added_by, ns.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM specials ns INNER JOIN patients p ON ns.patient_id = p.patient_id INNER JOIN users u ON ns.added_by = u.staff_id WHERE ns.id = :id');
                $query->execute([':id' => $id]);

                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // update a specials record
        public static function update_specials($id, $patient_id, $abo_grouping, $g6pd, $hgb_genotype, $sickling, $conn) {
            $abo_grouping = implode(', ', $abo_grouping);
            $g6pd         = implode(', ', $g6pd);
            $hgb_genotype = implode(', ', $hgb_genotype);
            $sickling     = implode(', ', $sickling);

            try{
                $query = $conn->prepare('UPDATE specials SET patient_id = :patient_id, abo_grouping = :abo_grouping, g6pd = :g6pd, hgb_genotype = :hgb_genotype, sickling = :sickling WHERE id = :id AND patient_id = :patient_id');
                $query->execute([':abo_grouping' => $abo_grouping, ':g6pd' => $g6pd, ':hgb_genotype' => $hgb_genotype, ':sickling' => $sickling, ':patient_id' => $patient_id, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

	}