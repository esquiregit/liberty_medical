<?php
    require_once 'conn.php';
    require_once 'methods.php';

	class Receipt {

        public static function get_alpha_feto_protein($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM alpha_feto_protein r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_antenatal_screening($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM antenatal_screening r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_ascitic_fluid($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM ascitic_fluid_cs r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_aspirate($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM aspirate_cs r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_blood_cs($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM blood_cs r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_blood_film_comment($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM blood_film_comment r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_blood_sugar($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM blood_sugar r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_bue_creatinine($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM bue_creatinine r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_bue_creatinine_egfr($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM bue_creatinine_egfr r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_bue_creatinine_lft($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM bue_creatinine_lft r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_bue_creatinine_lipid($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM bue_creatinine_lipids r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_calcium_profile($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM calcium_profile r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_cardiac_enzyme($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM cardiac_enzyme r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_ca_125($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM ca_one_two_five r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_ca_153($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM ca_one_five_three r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_cd4_count($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM cd4_count r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_cea($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM cea r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_ckmb($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM ckmb r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_clotting_profile($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM clotting_profile r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_compact_chemistry($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM compact_chemistry r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_cortisol($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM cortisol r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_crp($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM crp r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_crp_ultra_sensitive($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM crp_ultra_sensitive r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_csf_biochem($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM csf_biochem r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_c_reactive_protein($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM c_reactive_protein r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_d_dimers($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM d_dimers r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_ear_swab($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM ear_swab_cs r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_endocervical($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM endocervical_swab_cs r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_esr($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM esr r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_estrogen($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM estrogen r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_eye_swab($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM eye_swab_cs r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_fbc_3p($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM fbc_3p r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_fbc_5p($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM fbc_5p r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_fbc_children($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM fbc_children r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_folate_b12($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM folate_b12 r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_general_chemistry($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM general_chemistry r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_hba1c($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM hba1c r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_hbv_viral_load($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM hbv_viral_load r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_hepatitis_b_profile($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM hepatitis_b_profile r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_hepatitis_markers($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM hepatitis_markers r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_hiv_viral_load($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM hiv_viral_load r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_hormonal_assay($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM hormonal_assay r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_hvs_cs($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM hvs_cs r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_hvs_re($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM hvs_re r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_h_pylori_ag($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM h_pylori_ag r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_h_pylori_ag_blood($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM h_pylori_ag_blood r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_h_pylori_ag_sob($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM h_pylori_ag_sob r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_hypersensitive_cpr($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM hypersensitive_cpr r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_iron_study($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM iron_study r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_ise($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM ise r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_lft($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM lft r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_lipid_profile($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM lipid_profile r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_m_alb($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM m_alb r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_mantoux($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM mantoux r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_ntc_screening($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM ntc_screening r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_pleural_fluid($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM pleural_fluid r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_pregnancy_test($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM pregnancy_test r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_protein_electrophoresis($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM protein_electrophoresis r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_psa($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM psa r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_pth($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM pth r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_pus_fluid($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM pus_fluid r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_reproductive_assay($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM reproductive_assay r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_semen_analysis($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM semen_analysis r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_rheumatology($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM rheumatology r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_sc3_sc4($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM sc3_sc4 r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_semen_cs($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM semen_cs r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_serum_hcg_b($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM serum_hcg_b r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_serum_lipase($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM serum_lipase r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_skin_snip($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM skin_snip r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_specials($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM specials r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_sputum_afb($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM sputum_afb r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_sputum_cs($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM sputum r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_stool_cs($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM stool_cs r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_stool_re($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM stool_re r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_tft($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM tft r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_throat_swab($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM throat_swab_cs r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_troponin($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM troponin r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_urethral_cs($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM urethral_cs r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_urine($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM urine r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_urine_acr($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM urine_acr r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_urine_cs($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM urine_cs r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_urine_re($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM urine_re r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_widal($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM widal r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_wound_cs($patient_id, $conn) {
            try {
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id,r.added_by, r.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM wound_cs r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_total_cost($array) {
            $total = 0.00;
            
            foreach($array as $row) {
                $total += $row->amount;
            }

            return $total;
        }
        
	}