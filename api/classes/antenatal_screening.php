<?php
    require_once 'conn.php';
    require_once 'charge.php';
    require_once 'methods.php';

	class AntenatalScreening {

        // create a antenatal_screening record
        public static function create_antenatal_screening($patient_id, $blood_group, $rhd, $antibody_screening, $hbsag, $vdrl, $hep_c, $retro_screen, $comments, $added_by, $conn){
            $invoice_id         = Methods::get_invoice_id('Antenatal Screening', $conn);
            $amount             = Charge::read_charge('2', $conn);
            $blood_group        = is_array($blood_group) ? implode(', ', $blood_group) : $blood_group;
            $rhd                = is_array($rhd) ? implode(', ', $rhd) : $rhd;
            $antibody_screening = is_array($antibody_screening) ? implode(', ', $antibody_screening) : $antibody_screening;
            $hbsag              = is_array($hbsag) ? implode(', ', $hbsag) : $hbsag;
            $vdrl               = is_array($vrdl) ? implode(', ', $vdrl) : $vrdl;
            $hep_c              = is_array($hep_c) ? implode(', ', $hep_c) : $hep_c;
            $retro_screen       = is_array($retro_screen) ? implode(', ', $retro_screen) : $retro_screen;

            try{
                $query = $conn->prepare('INSERT INTO antenatal_screening(invoice_id, patient_id, blood_group, rhd, antibody_screening, hbsag, vdrl, hep_c, retro_screen, comments, added_by) VALUES(:invoice_id, :patient_id, :blood_group, :rhd, :antibody_screening, :hbsag, :vdrl, :hep_c, :retro_screen, :comments, :added_by)');
                $query->execute([':invoice_id' => $invoice_id, ':patient_id' => $patient_id, ':blood_group' => $blood_group, ':rhd' => $rhd, ':antibody_screening' => $antibody_screening, ':hbsag' => $hbsag, ':vdrl' => $vdrl, ':hep_c' => $hep_c, ':retro_screen' => $retro_screen, ':comments' => $comments, ':added_by' => $added_by]);

                return true;
            }catch(PDOException $ex){
            	return false;
            }
        }

        // fetch all antenatal_screening records
        public static function read_antenatal_screenings($conn){
            try{
                $query = $conn->prepare('SELECT ats.id, ats.invoice_id, ats.patient_id, ats.blood_group, ats.rhd, ats.antibody_screening, ats.hbsag, ats.vdrl, ats.hep_c, ats.retro_screen, ats.comments, ats.added_by, ats.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM antenatal_screening ats INNER JOIN patients p ON ats.patient_id = p.patient_id INNER JOIN users u ON ats.added_by = u.staff_id');
                $query->execute();

                return $query->fetchAll(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // fetch a antenatal_screening record
        public static function read_antenatal_screening($id, $conn){
            try{
                $query = $conn->prepare('SELECT ats.id, ats.invoice_id, ats.patient_id, ats.blood_group, ats.rhd, ats.antibody_screening, ats.hbsag, ats.vdrl, ats.hep_c, ats.retro_screen, ats.comments, ats.added_by, ats.date_added, ats.amount, ats.payment_type, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM antenatal_screening ats INNER JOIN patients p ON ats.patient_id = p.patient_id INNER JOIN users u ON ats.added_by = u.staff_id WHERE ats.id = :id');
                $query->execute([':id' => $id]);

                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // update a antenatal_screening record
        public static function update_antenatal_screening($id, $patient_id, $blood_group, $rhd, $antibody_screening, $hbsag, $vdrl, $hep_c, $retro_screen, $comments, $conn) {
            $blood_group        = is_array($blood_group) ? implode(', ', $blood_group) : $blood_group;
            $rhd                = is_array($rhd) ? implode(', ', $rhd) : $rhd;
            $antibody_screening = is_array($antibody_screening) ? implode(', ', $antibody_screening) : $antibody_screening;
            $hbsag              = is_array($hbsag) ? implode(', ', $hbsag) : $hbsag;
            $vdrl               = is_array($vrdl) ? implode(', ', $vdrl) : $vrdl;
            $hep_c              = is_array($hep_c) ? implode(', ', $hep_c) : $hep_c;
            $retro_screen       = is_array($retro_screen) ? implode(', ', $retro_screen) : $retro_screen;

            try{
                $query = $conn->prepare('UPDATE antenatal_screening SET patient_id = :patient_id, blood_group = :blood_group, rhd = :rhd, antibody_screening = :antibody_screening, hbsag = :hbsag, vdrl = :vdrl, hep_c = :hep_c, retro_screen = :retro_screen, comments = :comments WHERE id = :id AND patient_id = :patient_id');
                $query->execute([':blood_group' => $blood_group, ':rhd' => $rhd, ':antibody_screening' => $antibody_screening, ':hbsag' => $hbsag, ':vdrl' => $vdrl, ':hep_c' => $hep_c, ':retro_screen' => $retro_screen, ':comments' => $comments, ':patient_id' => $patient_id, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

	}