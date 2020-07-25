<?php
    require_once 'conn.php';
    require_once 'methods.php';
    require_once 'charge.php';

	class SemenAnalysis {

        // create a semen_analysis record
        public static function create_semen_analysis($patient_id, $volume, $motility, $unknown_one, $unknown_two, $consistency, $agglutination, $ph, $colour, $count, $viability, $morphology, $testicular_cells, $pus_cells, $epithelial, $red_blood_cells, $comments, $added_by, $conn){
            $invoice_id  = Methods::get_invoice_id('Semen Analysis', $conn);
            $amount      = Charge::read_charge('65', $conn);
            $consistency = is_array($consistency) ? implode(', ', $consistency) : $consistency;
            $ph          = is_array($ph) ? implode(', ', $ph) : $ph;
            $colour      = is_array($colour) ? implode(', ', $colour) : $colour;

            try{
                $query = $conn->prepare('INSERT INTO semen_analysis(invoice_id, patient_id, volume, motility, unknown_one, unknown_two, consistency, agglutination, ph, colour, count, viability, morphology, testicular_cells, pus_cells, epithelial, red_blood_cells, comments, added_by)  VALUES(:invoice_id, :patient_id, :volume, :motility, :unknown_one, :unknown_two, :consistency, :agglutination, :ph, :colour, :count, :viability, :morphology, :testicular_cells, :pus_cells, :epithelial, :red_blood_cells, :comments, :added_by)');
                $query->execute([':invoice_id' => $invoice_id, ':patient_id' => $patient_id, ':volume' => $volume, ':motility' => $motility, ':unknown_one' => $unknown_one, ':unknown_two' => $unknown_two, ':consistency' => $consistency, ':agglutination' => $agglutination, ':ph' => $ph, ':colour' => $colour, ':count' => $count, ':viability' => $viability, ':morphology' => $morphology, ':testicular_cells' => $testicular_cells, ':pus_cells' => $pus_cells, ':epithelial' => $epithelial, ':red_blood_cells' => $red_blood_cells, ':comments' => $comments, ':added_by' => $added_by]);

                return true;
            }catch(PDOException $ex){
            	return false;
            }
        }

        // fetch all semen_analysis records
        public static function read_semen_analysis($conn){
            try{
                $query = $conn->prepare('SELECT sa.id, sa.invoice_id, sa.patient_id, sa.volume, sa.motility, sa.unknown_one, sa.unknown_two, sa.consistency, sa.agglutination, sa.ph, sa.colour, sa.count, sa.viability, sa.morphology, sa.testicular_cells, sa.pus_cells, sa.epithelial, sa.red_blood_cells, sa.comments, sa.added_by, sa.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM semen_analysis sa INNER JOIN patients p ON sa.patient_id = p.patient_id INNER JOIN users u ON sa.added_by = u.staff_id');
                $query->execute();

                return $query->fetchAll(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // fetch a semen_analysis record
        public static function read_a_semen_analysis($id, $conn){
            try{
                $query = $conn->prepare('SELECT sa.id, sa.invoice_id, sa.patient_id, sa.volume, sa.motility, sa.unknown_one, sa.unknown_two, sa.consistency, sa.agglutination, sa.ph, sa.colour, sa.count, sa.viability, sa.morphology, sa.testicular_cells, sa.pus_cells, sa.epithelial, sa.red_blood_cells, sa.comments, sa.added_by, sa.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM semen_analysis sa INNER JOIN patients p ON sa.patient_id = p.patient_id INNER JOIN users u ON sa.added_by = u.staff_id WHERE sa.id = :id');
                $query->execute([':id' => $id]);

                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // update a semen_analysis record
        public static function update_semen_analysis($id, $patient_id, $volume, $motility, $unknown_one, $unknown_two, $consistency, $agglutination, $ph, $colour, $count, $viability, $morphology, $testicular_cells, $pus_cells, $epithelial, $red_blood_cells, $comments, $conn) {
            $consistency = is_array($consistency) ? implode(', ', $consistency) : $consistency;
            $ph          = is_array($ph) ? implode(', ', $ph) : $ph;
            $colour      = is_array($colour) ? implode(', ', $colour) : $colour;

            try{
                $query = $conn->prepare('UPDATE semen_analysis SET patient_id = :patient_id, volume = :volume, motility = :motility, unknown_one = :unknown_one, unknown_two = :unknown_two, consistency = :consistency, agglutination = :agglutination, ph = :ph, colour = :colour, count = :count, viability = :viability, morphology = :morphology, testicular_cells = :testicular_cells, pus_cells = :pus_cells, epithelial = :epithelial, red_blood_cells = :red_blood_cells, comments = :comments WHERE id = :id AND patient_id = :patient_id');
                $query->execute([':volume' => $volume, ':motility' => $motility, ':unknown_one' => $unknown_one, ':unknown_two' => $unknown_two, ':consistency' => $consistency, ':agglutination' => $agglutination, ':ph' => $ph, ':colour' => $colour, ':count' => $count, ':viability' => $viability, ':morphology' => $morphology, ':testicular_cells' => $testicular_cells, ':pus_cells' => $pus_cells, ':epithelial' => $epithelial, ':red_blood_cells' => $red_blood_cells, ':comments' => $comments, ':patient_id' => $patient_id, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

	}