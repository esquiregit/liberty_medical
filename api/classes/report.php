<?php
    require_once 'conn.php';
    require_once 'methods.php';

    class Report {

        public static function get_patient_report($patient_id, $start_date, $end_date, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.request_id, r.requests, r.date_added, r.added_by, r.status, r.date_done, r.done_by, r.discount, r.total_cost, r.discounted_cost, r.amount_paid, r.payment_status, r.payment_type, r.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM requests r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.request_id, r.requests, r.date_added, r.added_by, r.status, r.date_done, r.done_by, r.discount, r.total_cost, r.discounted_cost, r.amount_paid, r.payment_status, r.payment_type, r.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM requests r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_report($start_date, $end_date, $conn) {
            try{
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.request_id, r.requests, r.date_added, r.added_by, r.status, r.date_done, r.done_by, r.discount, r.total_cost, r.discounted_cost, r.amount_paid, r.payment_status, r.payment_type, r.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM requests r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.date_added BETWEEN :start_date AND :end_date');
                $query->execute([':start_date' => $start_date, ':end_date' => $end_date]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_alpha_feto_protein($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.invoice_id, r.results, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM alpha_feto_protein r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.invoice_id, r.results, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM alpha_feto_protein r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_antenatal_screening($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.blood_group, r.rhd, r.antibody_screening, r.hbsag, r.vdrl, r.hep_c, r.retro_screen, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM antenatal_screening r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.blood_group, r.rhd, r.antibody_screening, r.hbsag, r.vdrl, r.hep_c, r.retro_screen, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM antenatal_screening r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }
                
                

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_ascitic_fluid($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.gram_stain, r.zn_stain, r.fungal_element, r.culture, r.bacteria_one, r.bacteria_two, r.antibiotics_one, r.antibiotics_two, r.antibiotics_three, r.antibiotics_four, r.antibiotics_five, r.antibiotics_six, r.antibiotics_seven, r.antibiotics_eight, r.antibiotics_nine, r.antibiotics_ten, r.antibiotics_eleven, r.antibiotics_twelve, r.antibiotics_thirteen, r.antibiotics_fourteen, r.antibiotics_fifteen, r.antibiotics_sixteen, r.sensitivity_one, r.sensitivity_two, r.sensitivity_three, r.sensitivity_four, r.sensitivity_five, r.sensitivity_six, r.sensitivity_seven, r.sensitivity_eight, r.sensitivity_nine, r.sensitivity_ten, r.sensitivity_eleven, r.sensitivity_twelve, r.sensitivity_thirteen, r.sensitivity_fourteen, r.sensitivity_fifteen, r.sensitivity_sixteen, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM ascitic_fluid_cs r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.gram_stain, r.zn_stain, r.fungal_element, r.culture, r.bacteria_one, r.bacteria_two, r.antibiotics_one, r.antibiotics_two, r.antibiotics_three, r.antibiotics_four, r.antibiotics_five, r.antibiotics_six, r.antibiotics_seven, r.antibiotics_eight, r.antibiotics_nine, r.antibiotics_ten, r.antibiotics_eleven, r.antibiotics_twelve, r.antibiotics_thirteen, r.antibiotics_fourteen, r.antibiotics_fifteen, r.antibiotics_sixteen, r.sensitivity_one, r.sensitivity_two, r.sensitivity_three, r.sensitivity_four, r.sensitivity_five, r.sensitivity_six, r.sensitivity_seven, r.sensitivity_eight, r.sensitivity_nine, r.sensitivity_ten, r.sensitivity_eleven, r.sensitivity_twelve, r.sensitivity_thirteen, r.sensitivity_fourteen, r.sensitivity_fifteen, r.sensitivity_sixteen, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM ascitic_fluid_cs r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_aspirate($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.gram_stain, r.zn_stain, r.fungal_element, r.culture, r.bacteria_one, r.bacteria_two, r.antibiotics_one, r.antibiotics_two, r.antibiotics_three, r.antibiotics_four, r.antibiotics_five, r.antibiotics_six, r.antibiotics_seven, r.antibiotics_eight, r.antibiotics_nine, r.antibiotics_ten, r.antibiotics_eleven, r.antibiotics_twelve, r.antibiotics_thirteen, r.antibiotics_fourteen, r.antibiotics_fifteen, r.antibiotics_sixteen, r.sensitivity_one, r.sensitivity_two, r.sensitivity_three, r.sensitivity_four, r.sensitivity_five, r.sensitivity_six, r.sensitivity_seven, r.sensitivity_eight, r.sensitivity_nine, r.sensitivity_ten, r.sensitivity_eleven, r.sensitivity_twelve, r.sensitivity_thirteen, r.sensitivity_fourteen, r.sensitivity_fifteen, r.sensitivity_sixteen, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM aspirate_cs r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.gram_stain, r.zn_stain, r.fungal_element, r.culture, r.bacteria_one, r.bacteria_two, r.antibiotics_one, r.antibiotics_two, r.antibiotics_three, r.antibiotics_four, r.antibiotics_five, r.antibiotics_six, r.antibiotics_seven, r.antibiotics_eight, r.antibiotics_nine, r.antibiotics_ten, r.antibiotics_eleven, r.antibiotics_twelve, r.antibiotics_thirteen, r.antibiotics_fourteen, r.antibiotics_fifteen, r.antibiotics_sixteen, r.sensitivity_one, r.sensitivity_two, r.sensitivity_three, r.sensitivity_four, r.sensitivity_five, r.sensitivity_six, r.sensitivity_seven, r.sensitivity_eight, r.sensitivity_nine, r.sensitivity_ten, r.sensitivity_eleven, r.sensitivity_twelve, r.sensitivity_thirteen, r.sensitivity_fourteen, r.sensitivity_fifteen, r.sensitivity_sixteen, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM aspirate_cs r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_blood_cs($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.culture, r.bacteria_one, r.bacteria_two, r.bacteria_three, r.antibiotics_one, r.antibiotics_two, r.antibiotics_three, r.antibiotics_four, r.antibiotics_five, r.antibiotics_six, r.antibiotics_seven, r.antibiotics_eight, r.antibiotics_nine, r.antibiotics_ten, r.antibiotics_eleven, r.antibiotics_twelve, r.antibiotics_thirteen, r.antibiotics_fourteen, r.antibiotics_fifteen, r.antibiotics_sixteen, r.antibiotics_seventeen, r.antibiotics_eighteen, r.antibiotics_nineteen, r.antibiotics_twenty, r.antibiotics_twenty_one, r.antibiotics_twenty_two, r.antibiotics_twenty_three, r.antibiotics_twenty_four, r.sensitivity_one, r.sensitivity_two, r.sensitivity_three, r.sensitivity_four, r.sensitivity_five, r.sensitivity_six, r.sensitivity_seven, r.sensitivity_eight, r.sensitivity_nine, r.sensitivity_ten, r.sensitivity_eleven, r.sensitivity_twelve, r.sensitivity_thirteen, r.sensitivity_fourteen, r.sensitivity_fifteen, r.sensitivity_sixteen, r.sensitivity_seventeen, r.sensitivity_eighteen, r.sensitivity_nineteen, r.sensitivity_twenty, r.sensitivity_twenty_one, r.sensitivity_twenty_two, r.sensitivity_twenty_three, r.sensitivity_twenty_four, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM blood_cs r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.culture, r.bacteria_one, r.bacteria_two, r.bacteria_three, r.antibiotics_one, r.antibiotics_two, r.antibiotics_three, r.antibiotics_four, r.antibiotics_five, r.antibiotics_six, r.antibiotics_seven, r.antibiotics_eight, r.antibiotics_nine, r.antibiotics_ten, r.antibiotics_eleven, r.antibiotics_twelve, r.antibiotics_thirteen, r.antibiotics_fourteen, r.antibiotics_fifteen, r.antibiotics_sixteen, r.antibiotics_seventeen, r.antibiotics_eighteen, r.antibiotics_nineteen, r.antibiotics_twenty, r.antibiotics_twenty_one, r.antibiotics_twenty_two, r.antibiotics_twenty_three, r.antibiotics_twenty_four, r.sensitivity_one, r.sensitivity_two, r.sensitivity_three, r.sensitivity_four, r.sensitivity_five, r.sensitivity_six, r.sensitivity_seven, r.sensitivity_eight, r.sensitivity_nine, r.sensitivity_ten, r.sensitivity_eleven, r.sensitivity_twelve, r.sensitivity_thirteen, r.sensitivity_fourteen, r.sensitivity_fifteen, r.sensitivity_sixteen, r.sensitivity_seventeen, r.sensitivity_eighteen, r.sensitivity_nineteen, r.sensitivity_twenty, r.sensitivity_twenty_one, r.sensitivity_twenty_two, r.sensitivity_twenty_three, r.sensitivity_twenty_four, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM blood_cs r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_blood_film_comment($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.rbc, r.wbc, r.platelets, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM blood_film_comment r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.rbc, r.wbc, r.platelets, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM blood_film_comment r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_blood_sugar($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.fasting_blood_sugar, r.random_blood_sugar, r.two_hpp_blood_sugar, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM blood_sugar r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.fasting_blood_sugar, r.random_blood_sugar, r.two_hpp_blood_sugar, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM blood_sugar r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_bue_creatinine($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.sodium, r.sodium_flag, r.potassium, r.potassium_flag, r.chloride, r.chloride_flag, r.urea, r.urea_flag, r.creatinine, r.creatinine_flag, r.egfr, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM bue_creatinine r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.sodium, r.sodium_flag, r.potassium, r.potassium_flag, r.chloride, r.chloride_flag, r.urea, r.urea_flag, r.creatinine, r.creatinine_flag, r.egfr, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM bue_creatinine r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_bue_creatinine_egfr($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.sodium, r.sodium_flag, r.potassium, r.potassium_flag, r.chloride, r.chloride_flag, r.urea, r.urea_flag, r.creatinine, r.creatinine_flag, r.egfr, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM bue_creatinine_egfr r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.sodium, r.sodium_flag, r.potassium, r.potassium_flag, r.chloride, r.chloride_flag, r.urea, r.urea_flag, r.creatinine, r.creatinine_flag, r.egfr, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM bue_creatinine_egfr r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_bue_creatinine_lft($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.sodium, r.sodium_flag, r.potassium, r.potassium_flag, r.chloride, r.chloride_flag, r.urea, r.urea_flag, r.creatinine, r.creatinine_flag, r.egfr, r.got_ast, r.got_ast_flag, r.gpt_alt, r.gpt_alt_flag, r.alkaline_phos, r.alkaline_phos_flag, r.ggt, r.ggt_flag, r.bilirubin_total, r.bilirubin_total_flag, r.bili_indirect, r.bili_indirect_flag, r.bilirubin_direct, r.bilirubin_direct_flag, r.protein_total, r.protein_total_flag, r.albumin, r.albumin_flag, r.globulin, r.globulin_flag, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM bue_creatinine_lft r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.sodium, r.sodium_flag, r.potassium, r.potassium_flag, r.chloride, r.chloride_flag, r.urea, r.urea_flag, r.creatinine, r.creatinine_flag, r.egfr, r.got_ast, r.got_ast_flag, r.gpt_alt, r.gpt_alt_flag, r.alkaline_phos, r.alkaline_phos_flag, r.ggt, r.ggt_flag, r.bilirubin_total, r.bilirubin_total_flag, r.bili_indirect, r.bili_indirect_flag, r.bilirubin_direct, r.bilirubin_direct_flag, r.protein_total, r.protein_total_flag, r.albumin, r.albumin_flag, r.globulin, r.globulin_flag, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM bue_creatinine_lft r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_bue_creatinine_lipid($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.sodium, r.sodium_flag, r.potassium, r.potassium_flag, r.chloride, r.chloride_flag, r.urea, r.urea_flag, r.creatinine, r.creatinine_flag, r.egfr, r.cholesterol_total, r.cholesterol_total_flag, r.triglycerides, r.triglycerides_flag, r.hdl, r.hdl_flag, r.ldl, r.ldl_flag, r.coronary_risk, r.coronary_risk_flag, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM bue_creatinine_lipids r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.sodium, r.sodium_flag, r.potassium, r.potassium_flag, r.chloride, r.chloride_flag, r.urea, r.urea_flag, r.creatinine, r.creatinine_flag, r.egfr, r.cholesterol_total, r.cholesterol_total_flag, r.triglycerides, r.triglycerides_flag, r.hdl, r.hdl_flag, r.ldl, r.ldl_flag, r.coronary_risk, r.coronary_risk_flag, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM bue_creatinine_lipids r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_c_reactive_protein($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.results, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM c_reactive_protein r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.results, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM c_reactive_protein r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_ca_125($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.results, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM ca_one_two_five r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.results, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM ca_one_two_five r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_ca_153($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.results, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM ca_one_five_three r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.results, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM ca_one_five_three r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_calcium_profile($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.s_calcium_total, r.s_calcium_total_flag, r.s_ionized_calcium_calc, r.s_ionized_calcium_calc_flag, r.s_albumin, r.s_albumin_flag, r.s_total_protein, r.s_total_protein_flag, r.corrected_calcium_calc, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM calcium_profile r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.s_calcium_total, r.s_calcium_total_flag, r.s_ionized_calcium_calc, r.s_ionized_calcium_calc_flag, r.s_albumin, r.s_albumin_flag, r.s_total_protein, r.s_total_protein_flag, r.corrected_calcium_calc, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM calcium_profile r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_cardiac_enzyme($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.ast, r.alt, r.creatinine_kinase, r.ck_mb, r.ldh, r.troponin, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM cardiac_enzyme r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.ast, r.alt, r.creatinine_kinase, r.ck_mb, r.ldh, r.troponin, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM cardiac_enzyme r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_cd4_count($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.t_wbc, r.t_wbc_flag, r.cd4_count, r.cd4_count_flag, r.cd3, r.cd3_flag, r.cd4_cd3, r.cd4_cd3_flag, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM cd4_count r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.t_wbc, r.t_wbc_flag, r.cd4_count, r.cd4_count_flag, r.cd3, r.cd3_flag, r.cd4_cd3, r.cd4_cd3_flag, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM cd4_count r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_cea($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.results, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM cea r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.results, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM cea r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_ckmb($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.results, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM ckmb r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.results, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM ckmb r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_clotting_profile($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.bt, r.pt_inr, r.aptt, r.control_time, r.normal_plasma, r.ratio, r.inr, r.factor_viii_assay, r.factor_ix_activity, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM clotting_profile r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.bt, r.pt_inr, r.aptt, r.control_time, r.normal_plasma, r.ratio, r.inr, r.factor_viii_assay, r.factor_ix_activity, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM clotting_profile r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_compact_chemistry($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.sodium, r.sodium_flag, r.potassium, r.potassium_flag, r.chloride, r.chloride_flag, r.urea, r.urea_flag, r.creatinine, r.creatinine_flag, r.got_ast, r.got_ast_flag, r.gpt_alt, r.gpt_alt_flag, r.alkaline_phos, r.alkaline_phos_flag, r.ggt, r.ggt_flag, r.bilirubin_total, r.bilirubin_total_flag, r.bili_indirect, r.bili_indirect_flag, r.bilirubin_direct, r.bilirubin_direct_flag, r.protein_total, r.protein_total_flag, r.albumin, r.albumin_flag, r.globulin, r.globulin_flag, r.cholesterol_total, r.cholesterol_total_flag, r.triglycerides, r.triglycerides_flag, r.alkaline_phos, r.alkaline_phos_flag, r.hdl, r.hdl_flag, r.ldl, r.ldl_flag, r.coronary_risk, r.coronary_risk_flag, r.uric_acid, r.uric_acid_flag, r.fbs, r.fbs_flag, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM compact_chemistry r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.sodium, r.sodium_flag, r.potassium, r.potassium_flag, r.chloride, r.chloride_flag, r.urea, r.urea_flag, r.creatinine, r.creatinine_flag, r.got_ast, r.got_ast_flag, r.gpt_alt, r.gpt_alt_flag, r.alkaline_phos, r.alkaline_phos_flag, r.ggt, r.ggt_flag, r.bilirubin_total, r.bilirubin_total_flag, r.bili_indirect, r.bili_indirect_flag, r.bilirubin_direct, r.bilirubin_direct_flag, r.protein_total, r.protein_total_flag, r.albumin, r.albumin_flag, r.globulin, r.globulin_flag, r.cholesterol_total, r.cholesterol_total_flag, r.triglycerides, r.triglycerides_flag, r.alkaline_phos, r.alkaline_phos_flag, r.hdl, r.hdl_flag, r.ldl, r.ldl_flag, r.coronary_risk, r.coronary_risk_flag, r.uric_acid, r.uric_acid_flag, r.fbs, r.fbs_flag, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM compact_chemistry r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_crp($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.results, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM crp r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.results, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM crp r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_cortisol($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.cortisol_top, r.cortisol_bottom, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM cortisol r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.cortisol_top, r.cortisol_bottom, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM cortisol r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_crp_ultra_sensitive($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.results, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM crp_ultra_sensitive r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.results, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM crp_ultra_sensitive r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_csf_biochem($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.appearance, r.glucose, r.protein, r.globulin, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM csf_biochem r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.appearance, r.glucose, r.protein, r.globulin, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM csf_biochem r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_d_dimers($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.results, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM d_dimers r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.results, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM d_dimers r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_ear_swab($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.culture, r.bacteria_one, r.bacteria_two, r.bacteria_three, r.antibiotics_one, r.antibiotics_two, r.antibiotics_three, r.antibiotics_four, r.antibiotics_five, r.antibiotics_six, r.antibiotics_seven, r.antibiotics_eight, r.antibiotics_nine, r.antibiotics_ten, r.antibiotics_eleven, r.antibiotics_twelve, r.antibiotics_thirteen, r.antibiotics_fourteen, r.antibiotics_fifteen, r.antibiotics_sixteen, r.antibiotics_seventeen, r.antibiotics_eighteen, r.antibiotics_nineteen, r.antibiotics_twenty, r.antibiotics_twenty_one, r.antibiotics_twenty_two, r.antibiotics_twenty_three, r.antibiotics_twenty_four, r.sensitivity_one, r.sensitivity_two, r.sensitivity_three, r.sensitivity_four, r.sensitivity_five, r.sensitivity_six, r.sensitivity_seven, r.sensitivity_eight, r.sensitivity_nine, r.sensitivity_ten, r.sensitivity_eleven, r.sensitivity_twelve, r.sensitivity_thirteen, r.sensitivity_fourteen, r.sensitivity_fifteen, r.sensitivity_sixteen, r.sensitivity_seventeen, r.sensitivity_eighteen, r.sensitivity_nineteen, r.sensitivity_twenty, r.sensitivity_twenty_one, r.sensitivity_twenty_two, r.sensitivity_twenty_three, r.sensitivity_twenty_four, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM ear_swab_cs r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.culture, r.bacteria_one, r.bacteria_two, r.bacteria_three, r.antibiotics_one, r.antibiotics_two, r.antibiotics_three, r.antibiotics_four, r.antibiotics_five, r.antibiotics_six, r.antibiotics_seven, r.antibiotics_eight, r.antibiotics_nine, r.antibiotics_ten, r.antibiotics_eleven, r.antibiotics_twelve, r.antibiotics_thirteen, r.antibiotics_fourteen, r.antibiotics_fifteen, r.antibiotics_sixteen, r.antibiotics_seventeen, r.antibiotics_eighteen, r.antibiotics_nineteen, r.antibiotics_twenty, r.antibiotics_twenty_one, r.antibiotics_twenty_two, r.antibiotics_twenty_three, r.antibiotics_twenty_four, r.sensitivity_one, r.sensitivity_two, r.sensitivity_three, r.sensitivity_four, r.sensitivity_five, r.sensitivity_six, r.sensitivity_seven, r.sensitivity_eight, r.sensitivity_nine, r.sensitivity_ten, r.sensitivity_eleven, r.sensitivity_twelve, r.sensitivity_thirteen, r.sensitivity_fourteen, r.sensitivity_fifteen, r.sensitivity_sixteen, r.sensitivity_seventeen, r.sensitivity_eighteen, r.sensitivity_nineteen, r.sensitivity_twenty, r.sensitivity_twenty_one, r.sensitivity_twenty_two, r.sensitivity_twenty_three, r.sensitivity_twenty_four, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM ear_swab_cs r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_endocervical($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.pus_cells_per_hps, r.rbcs_per_hpf, r.epitheleal_cells_per_hpf, r.t_vaginalis, r.yeast_like_cells, r.gram_stain, r.culture, r.bacteria_one, r.bacteria_two, r.antibiotics_one, r.antibiotics_two, r.antibiotics_three, r.antibiotics_four, r.antibiotics_five, r.antibiotics_six, r.antibiotics_seven, r.antibiotics_eight, r.antibiotics_nine, r.antibiotics_ten, r.antibiotics_eleven, r.antibiotics_twelve, r.antibiotics_thirteen, r.antibiotics_fourteen, r.antibiotics_fifteen, r.antibiotics_sixteen, r.sensitivity_one, r.sensitivity_two, r.sensitivity_three, r.sensitivity_four, r.sensitivity_five, r.sensitivity_six, r.sensitivity_seven, r.sensitivity_eight, r.sensitivity_nine, r.sensitivity_ten, r.sensitivity_eleven, r.sensitivity_twelve, r.sensitivity_thirteen, r.sensitivity_fourteen, r.sensitivity_fifteen, r.sensitivity_sixteen, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM endocervical_swab_cs r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.pus_cells_per_hps, r.rbcs_per_hpf, r.epitheleal_cells_per_hpf, r.t_vaginalis, r.yeast_like_cells, r.gram_stain, r.culture, r.bacteria_one, r.bacteria_two, r.antibiotics_one, r.antibiotics_two, r.antibiotics_three, r.antibiotics_four, r.antibiotics_five, r.antibiotics_six, r.antibiotics_seven, r.antibiotics_eight, r.antibiotics_nine, r.antibiotics_ten, r.antibiotics_eleven, r.antibiotics_twelve, r.antibiotics_thirteen, r.antibiotics_fourteen, r.antibiotics_fifteen, r.antibiotics_sixteen, r.sensitivity_one, r.sensitivity_two, r.sensitivity_three, r.sensitivity_four, r.sensitivity_five, r.sensitivity_six, r.sensitivity_seven, r.sensitivity_eight, r.sensitivity_nine, r.sensitivity_ten, r.sensitivity_eleven, r.sensitivity_twelve, r.sensitivity_thirteen, r.sensitivity_fourteen, r.sensitivity_fifteen, r.sensitivity_sixteen, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM endocervical_swab_cs r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_esr($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.results, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM esr r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.results, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM esr r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_estrogen($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.follicular, r.mid_cycle, r.luteal, r.pm, r.amenorrhoea, r.mem, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM estrogen r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.follicular, r.mid_cycle, r.luteal, r.pm, r.amenorrhoea, r.mem, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM estrogen r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_eye_swab($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.culture, r.bacteria_one, r.bacteria_two, r.bacteria_three, r.antibiotics_one, r.antibiotics_two, r.antibiotics_three, r.antibiotics_four, r.antibiotics_five, r.antibiotics_six, r.antibiotics_seven, r.antibiotics_eight, r.antibiotics_nine, r.antibiotics_ten, r.antibiotics_eleven, r.antibiotics_twelve, r.antibiotics_thirteen, r.antibiotics_fourteen, r.antibiotics_fifteen, r.antibiotics_sixteen, r.antibiotics_seventeen, r.antibiotics_eighteen, r.antibiotics_nineteen, r.antibiotics_twenty, r.antibiotics_twenty_one, r.antibiotics_twenty_two, r.antibiotics_twenty_three, r.antibiotics_twenty_four, r.sensitivity_one, r.sensitivity_two, r.sensitivity_three, r.sensitivity_four, r.sensitivity_five, r.sensitivity_six, r.sensitivity_seven, r.sensitivity_eight, r.sensitivity_nine, r.sensitivity_ten, r.sensitivity_eleven, r.sensitivity_twelve, r.sensitivity_thirteen, r.sensitivity_fourteen, r.sensitivity_fifteen, r.sensitivity_sixteen, r.sensitivity_seventeen, r.sensitivity_eighteen, r.sensitivity_nineteen, r.sensitivity_twenty, r.sensitivity_twenty_one, r.sensitivity_twenty_two, r.sensitivity_twenty_three, r.sensitivity_twenty_four, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM eye_swab_cs r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.culture, r.bacteria_one, r.bacteria_two, r.bacteria_three, r.antibiotics_one, r.antibiotics_two, r.antibiotics_three, r.antibiotics_four, r.antibiotics_five, r.antibiotics_six, r.antibiotics_seven, r.antibiotics_eight, r.antibiotics_nine, r.antibiotics_ten, r.antibiotics_eleven, r.antibiotics_twelve, r.antibiotics_thirteen, r.antibiotics_fourteen, r.antibiotics_fifteen, r.antibiotics_sixteen, r.antibiotics_seventeen, r.antibiotics_eighteen, r.antibiotics_nineteen, r.antibiotics_twenty, r.antibiotics_twenty_one, r.antibiotics_twenty_two, r.antibiotics_twenty_three, r.antibiotics_twenty_four, r.sensitivity_one, r.sensitivity_two, r.sensitivity_three, r.sensitivity_four, r.sensitivity_five, r.sensitivity_six, r.sensitivity_seven, r.sensitivity_eight, r.sensitivity_nine, r.sensitivity_ten, r.sensitivity_eleven, r.sensitivity_twelve, r.sensitivity_thirteen, r.sensitivity_fourteen, r.sensitivity_fifteen, r.sensitivity_sixteen, r.sensitivity_seventeen, r.sensitivity_eighteen, r.sensitivity_nineteen, r.sensitivity_twenty, r.sensitivity_twenty_one, r.sensitivity_twenty_two, r.sensitivity_twenty_three, r.sensitivity_twenty_four, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM eye_swab_cs r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_fbc_3p($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.wbc, r.wbc_info, r.lym, r.lym_info, r.mid, r.mid_info, r.gran, r.gran_info, r.lym_one, r.lym_one_info, r.rbc, r.mid_two, r.mid_two_info, r.gran_three, r.gran_three_info, r.rbc, r.rbc_info, r.hgb, r.hgb_info, r.hct, r.hct_info, r.mcv, r.mcv_info, r.mch, r.mch_info, r.mchc, r.mchc_info, r.rdw_cv, r.rdw_cv_info, r.rdw_sd, r.rdw_sd_info, r.plt, r.plt_info, r.mpv, r.mpv_info, r.pdw, r.pdw_info, r.pct, r.pct_info, r.sickling_test, r.bf_mps, r.esr, r.blood_film_comment, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM fbc_3p r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.wbc, r.wbc_info, r.lym, r.lym_info, r.mid, r.mid_info, r.gran, r.gran_info, r.lym_one, r.lym_one_info, r.rbc, r.mid_two, r.mid_two_info, r.gran_three, r.gran_three_info, r.rbc, r.rbc_info, r.hgb, r.hgb_info, r.hct, r.hct_info, r.mcv, r.mcv_info, r.mch, r.mch_info, r.mchc, r.mchc_info, r.rdw_cv, r.rdw_cv_info, r.rdw_sd, r.rdw_sd_info, r.plt, r.plt_info, r.mpv, r.mpv_info, r.pdw, r.pdw_info, r.pct, r.pct_info, r.sickling_test, r.bf_mps, r.esr, r.blood_film_comment, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM fbc_3p r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_fbc_5p($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.wbc, r.wbc_flag, r.neu_hash, r.neu_hash_flag, r.lym_hash, r.lym_hash_flag, r.mon_hash, r.mon_hash_flag, r.eos_hash, r.eos_hash_flag, r.bas_hash, r.bas_hash_flag, r.neu_percent, r.neu_percent_flag, r.lym_percent, r.lym_percent_flag, r.mon_percent, r.mon_percent_flag, r.eos_percent, r.eos_percent_flag, r.bas_percent, r.bas_percent_flag, r.rbc, r.rbc_flag, r.hgb, r.hgb_flag, r.hct, r.hct_flag, r.mcv, r.mcv_flag, r.mch, r.mch_flag, r.mchc, r.mchc_flag, r.rdw_cv, r.rdw_cv_flag, r.rdw_sd, r.rdw_sd_flag, r.plt, r.plt_flag, r.mpv, r.mpv_flag, r.pdw, r.pdw_flag, r.pct, r.pct_flag, r.p_lcc, r.p_lcc_flag, r.p_lcr, r.p_lcr_flag, r.sickling_test, r.bf_mps, r.esr, r.blood_film_comment, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM fbc_5p r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.wbc, r.wbc_flag, r.neu_hash, r.neu_hash_flag, r.lym_hash, r.lym_hash_flag, r.mon_hash, r.mon_hash_flag, r.eos_hash, r.eos_hash_flag, r.bas_hash, r.bas_hash_flag, r.neu_percent, r.neu_percent_flag, r.lym_percent, r.lym_percent_flag, r.mon_percent, r.mon_percent_flag, r.eos_percent, r.eos_percent_flag, r.bas_percent, r.bas_percent_flag, r.rbc, r.rbc_flag, r.hgb, r.hgb_flag, r.hct, r.hct_flag, r.mcv, r.mcv_flag, r.mch, r.mch_flag, r.mchc, r.mchc_flag, r.rdw_cv, r.rdw_cv_flag, r.rdw_sd, r.rdw_sd_flag, r.plt, r.plt_flag, r.mpv, r.mpv_flag, r.pdw, r.pdw_flag, r.pct, r.pct_flag, r.p_lcc, r.p_lcc_flag, r.p_lcr, r.p_lcr_flag, r.sickling_test, r.bf_mps, r.esr, r.blood_film_comment, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM fbc_5p r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_fbc_children($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.wbc, r.wbc_flag, r.lym, r.lym_flag, r.mid, r.mid_flag, r.gran, r.gran_flag, r.lym_one, r.lym_one_flag, r.rbc, r.mid_two, r.mid_two_flag, r.gran_three, r.gran_three_flag, r.rbc, r.rbc_flag, r.hgb, r.hgb_flag, r.hct, r.hct_flag, r.mcv, r.mcv_flag, r.mch, r.mch_flag, r.mchc, r.mchc_flag, r.rdw_cv, r.rdw_cv_flag, r.rdw_sd, r.rdw_sd_flag, r.plt, r.plt_flag, r.mpv, r.mpv_flag, r.pdw, r.pdw_flag, r.pct, r.pct_flag, r.sickling_test, r.bf_mps, r.esr, r.blood_film_comment, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM fbc_children r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.wbc, r.wbc_flag, r.lym, r.lym_flag, r.mid, r.mid_flag, r.gran, r.gran_flag, r.lym_one, r.lym_one_flag, r.rbc, r.mid_two, r.mid_two_flag, r.gran_three, r.gran_three_flag, r.rbc, r.rbc_flag, r.hgb, r.hgb_flag, r.hct, r.hct_flag, r.mcv, r.mcv_flag, r.mch, r.mch_flag, r.mchc, r.mchc_flag, r.rdw_cv, r.rdw_cv_flag, r.rdw_sd, r.rdw_sd_flag, r.plt, r.plt_flag, r.mpv, r.mpv_flag, r.pdw, r.pdw_flag, r.pct, r.pct_flag, r.sickling_test, r.bf_mps, r.esr, r.blood_film_comment, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM fbc_children r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_folate_b12($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.folate, r.vitamin_b_12, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM folate_b12 r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.folate, r.vitamin_b_12, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM folate_b12 r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_general_chemistry($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.amylase, r.creatinine, r.ldh, r.uric_acid, r.creatine_kinase, r.calcium, r.phosphorus, r.magnessium, r.fbs_glucose, r.globulin, r.bili_indirect, r.glyco_hbg, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM general_chemistry r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.amylase, r.creatinine, r.ldh, r.uric_acid, r.creatine_kinase, r.calcium, r.phosphorus, r.magnessium, r.fbs_glucose, r.globulin, r.bili_indirect, r.glyco_hbg, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM general_chemistry r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_hepatitis_b_profile($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.hbsag, r.hbsab, r.hbeag, r.hbeab, r.hbcab, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM hepatitis_b_profile r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.hbsag, r.hbsab, r.hbeag, r.hbeab, r.hbcab, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM hepatitis_b_profile r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_hepatitis_markers($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.hep_a_igg_antibody, r.hep_b_core_igm_antibody, r.hep_a_igm_antibody, r.hep_be_antigen, r.hep_bs_antigen, r.hep_be_antibody, r.hep_bs_antibody, r.hep_c_screen, r.hep_b_core_igg_antibody, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM hepatitis_markers r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.hep_a_igg_antibody, r.hep_b_core_igm_antibody, r.hep_a_igm_antibody, r.hep_be_antigen, r.hep_bs_antigen, r.hep_be_antibody, r.hep_bs_antibody, r.hep_c_screen, r.hep_b_core_igg_antibody, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM hepatitis_markers r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_h_pylori_ag($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.h_pylori_ag, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM h_pylori_ag r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.h_pylori_ag, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM h_pylori_ag r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_h_pylori_ag_blood($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.h_pylori_ag, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM h_pylori_ag_blood r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.h_pylori_ag, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM h_pylori_ag_blood r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_h_pylori_ag_sob($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.h_pylori_ag, r.stool_occult_blood, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM h_pylori_ag_sob r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.h_pylori_ag, r.stool_occult_blood, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM h_pylori_ag_sob r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_hba1c($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.dcct, r.ifcc, r.average_blood_glucose, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM hba1c r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.dcct, r.ifcc, r.average_blood_glucose, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM hba1c r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_hbv_viral_load($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.hbv_dna, r.pcr_hbv_quantitative, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM hbv_viral_load r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE  r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.hbv_dna, r.pcr_hbv_quantitative, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM hbv_viral_load r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_hiv_viral_load($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.hiv_dna, r.pcr_hiv_quantitative, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM hiv_viral_load r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.hiv_dna, r.pcr_hiv_quantitative, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM hiv_viral_load r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_hormonal_assay($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.results, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM hormonal_assay r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.results, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM hormonal_assay r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_hvs_cs($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.pus_cells_per_hps, r.rbcs_per_hpf, r.epitheleal_cells_per_hpf, r.t_vaginalis, r.yeast_like_cells, r.gram_stain, r.culture, r.bacteria_one, r.bacteria_two, r.antibiotics_one, r.antibiotics_two, r.antibiotics_three, r.antibiotics_four, r.antibiotics_five, r.antibiotics_six, r.antibiotics_seven, r.antibiotics_eight, r.antibiotics_nine, r.antibiotics_ten, r.antibiotics_eleven, r.antibiotics_twelve, r.antibiotics_thirteen, r.antibiotics_fourteen, r.antibiotics_fifteen, r.antibiotics_sixteen, r.sensitivity_one, r.sensitivity_two, r.sensitivity_three, r.sensitivity_four, r.sensitivity_five, r.sensitivity_six, r.sensitivity_seven, r.sensitivity_eight, r.sensitivity_nine, r.sensitivity_ten, r.sensitivity_eleven, r.sensitivity_twelve, r.sensitivity_thirteen, r.sensitivity_fourteen, r.sensitivity_fifteen, r.sensitivity_sixteen, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM hvs_cs r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.pus_cells_per_hps, r.rbcs_per_hpf, r.epitheleal_cells_per_hpf, r.t_vaginalis, r.yeast_like_cells, r.gram_stain, r.culture, r.bacteria_one, r.bacteria_two, r.antibiotics_one, r.antibiotics_two, r.antibiotics_three, r.antibiotics_four, r.antibiotics_five, r.antibiotics_six, r.antibiotics_seven, r.antibiotics_eight, r.antibiotics_nine, r.antibiotics_ten, r.antibiotics_eleven, r.antibiotics_twelve, r.antibiotics_thirteen, r.antibiotics_fourteen, r.antibiotics_fifteen, r.antibiotics_sixteen, r.sensitivity_one, r.sensitivity_two, r.sensitivity_three, r.sensitivity_four, r.sensitivity_five, r.sensitivity_six, r.sensitivity_seven, r.sensitivity_eight, r.sensitivity_nine, r.sensitivity_ten, r.sensitivity_eleven, r.sensitivity_twelve, r.sensitivity_thirteen, r.sensitivity_fourteen, r.sensitivity_fifteen, r.sensitivity_sixteen, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM hvs_cs r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_hvs_re($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.pus_cells_per_hps, r.epitheleal_cells_per_hpf, r.red_blood_cells, r.yeast_like_cells, r.t_vaginalis, r.gnid, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM hvs_re r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.pus_cells_per_hps, r.epitheleal_cells_per_hpf, r.red_blood_cells, r.yeast_like_cells, r.t_vaginalis, r.gnid, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM hvs_re r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_hypersensitive_cpr($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.results, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM hypersensitive_cpr r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.results, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM hypersensitive_cpr r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_iron_study($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.iron, r.iron_flag, r.tibc, r.tibc_flag, r.transferrin_sat, r.transferrin_sat_flag, r.ferritin, r.ferritin_flag, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM iron_study r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.iron, r.iron_flag, r.tibc, r.tibc_flag, r.transferrin_sat, r.transferrin_sat_flag, r.ferritin, r.ferritin_flag, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM iron_study r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_ise($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.sodium, r.sodium_flag, r.potassium, r.potassium_flag, r.chloride, r.chloride_flag, r.carbon_dioxide, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM ise r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.sodium, r.sodium_flag, r.potassium, r.potassium_flag, r.chloride, r.chloride_flag, r.carbon_dioxide, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM ise r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_lft($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.got_ast, r.got_ast_flag, r.gpt_alt, r.gpt_alt_flag, r.alkaline_phos, r.alkaline_phos_flag, r.ggt, r.ggt_flag, r.bilirubin_total, r.bilirubin_total_flag, r.bili_indirect, r.bili_indirect_flag, r.bilirubin_direct, r.bilirubin_direct_flag, r.protein_total, r.protein_total_flag, r.albumin, r.albumin_flag, r.globulin, r.globulin_flag, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM lft r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.got_ast, r.got_ast_flag, r.gpt_alt, r.gpt_alt_flag, r.alkaline_phos, r.alkaline_phos_flag, r.ggt, r.ggt_flag, r.bilirubin_total, r.bilirubin_total_flag, r.bili_indirect, r.bili_indirect_flag, r.bilirubin_direct, r.bilirubin_direct_flag, r.protein_total, r.protein_total_flag, r.albumin, r.albumin_flag, r.globulin, r.globulin_flag, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM lft r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_lipid_profile($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.cholesterol_total, r.cholesterol_total_flag, r.triglycerides, r.triglycerides_flag, r.hdl, r.hdl_flag, r.ldl, r.ldl_flag, r.coronary_risk, r.coronary_risk_flag, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM lipid_profile r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.cholesterol_total, r.cholesterol_total_flag, r.triglycerides, r.triglycerides_flag, r.hdl, r.hdl_flag, r.ldl, r.ldl_flag, r.coronary_risk, r.coronary_risk_flag, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM lipid_profile r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_m_alb($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.results, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM m_alb r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.results, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM m_alb r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_mantoux($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.date_of_injection, r.date_of_reading, r.size_of_induration, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM mantoux r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.date_of_injection, r.date_of_reading, r.size_of_induration, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM mantoux r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_ntc_screening($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.hb, r.hct, r.hepb, r.sickling, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM ntc_screening r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.hb, r.hct, r.hepb, r.sickling, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM ntc_screening r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_pleural_fluid($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.colour, r.appearance, r.appearance_dropdown, r.gram_stain, r.acid_fast_bacilli, r.ph, r.glucose, r.total_protein, r.pleural_fluid_albumin, r.ldh, r.total_wbc_one, r.total_wbc_two, r.lymphocytes_one, r.lymphocytes_two, r.monocytes_one, r.monocytes_two, r.granulocytes_one, r.granulocytes_two, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM pleural_fluid r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.colour, r.appearance, r.appearance_dropdown, r.gram_stain, r.acid_fast_bacilli, r.ph, r.glucose, r.total_protein, r.pleural_fluid_albumin, r.ldh, r.total_wbc_one, r.total_wbc_two, r.lymphocytes_one, r.lymphocytes_two, r.monocytes_one, r.monocytes_two, r.granulocytes_one, r.granulocytes_two, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM pleural_fluid r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_pregnancy_test($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.results, r.specimen, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM pregnancy_test r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.results, r.specimen, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM pregnancy_test r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_protein_electrophoresis($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.total_protein, r.total_protein_flag, r.albumin, r.albumin_flag, r.alpha_1_globulin, r.alpha_1_globulin_flag, r.alpha_2_globulin, r.alpha_2_globulin_flag, r.beta_1_globulin, r.beta_1_globulin_flag, r.beta_2_globulin, r.beta_2_globulin_flag, r.gamma_globulin, r.gamma_globulin_flag, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM protein_electrophoresis r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.total_protein, r.total_protein_flag, r.albumin, r.albumin_flag, r.alpha_1_globulin, r.alpha_1_globulin_flag, r.alpha_2_globulin, r.alpha_2_globulin_flag, r.beta_1_globulin, r.beta_1_globulin_flag, r.beta_2_globulin, r.beta_2_globulin_flag, r.gamma_globulin, r.gamma_globulin_flag, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM protein_electrophoresis r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_psa($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.results, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM psa r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.results, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM psa r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_pth($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.results, r.results_flag, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM pth r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.results, r.results_flag, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM pth r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_pus_fluid($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.colour, r.appearance, r.gram_stain, r.acid_fast_bacilli, r.culture, r.bacteria_one, r.bacteria_two, r.bacteria_three, r.antibiotics_one, r.antibiotics_two, r.antibiotics_three, r.antibiotics_four, r.antibiotics_five, r.antibiotics_six, r.antibiotics_seven, r.antibiotics_eight, r.antibiotics_nine, r.antibiotics_ten, r.antibiotics_eleven, r.antibiotics_twelve, r.antibiotics_thirteen, r.antibiotics_fourteen, r.antibiotics_fifteen, r.antibiotics_sixteen, r.antibiotics_seventeen, r.antibiotics_eighteen, r.antibiotics_nineteen, r.antibiotics_twenty, r.antibiotics_twenty_one, r.antibiotics_twenty_two, r.antibiotics_twenty_three, r.antibiotics_twenty_four, r.sensitivity_one, r.sensitivity_two, r.sensitivity_three, r.sensitivity_four, r.sensitivity_five, r.sensitivity_six, r.sensitivity_seven, r.sensitivity_eight, r.sensitivity_nine, r.sensitivity_ten, r.sensitivity_eleven, r.sensitivity_twelve, r.sensitivity_thirteen, r.sensitivity_fourteen, r.sensitivity_fifteen, r.sensitivity_sixteen, r.sensitivity_seventeen, r.sensitivity_eighteen, r.sensitivity_nineteen, r.sensitivity_twenty, r.sensitivity_twenty_one, r.sensitivity_twenty_two, r.sensitivity_twenty_three, r.sensitivity_twenty_four, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM pus_fluid r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.colour, r.appearance, r.gram_stain, r.acid_fast_bacilli, r.culture, r.bacteria_one, r.bacteria_two, r.bacteria_three, r.antibiotics_one, r.antibiotics_two, r.antibiotics_three, r.antibiotics_four, r.antibiotics_five, r.antibiotics_six, r.antibiotics_seven, r.antibiotics_eight, r.antibiotics_nine, r.antibiotics_ten, r.antibiotics_eleven, r.antibiotics_twelve, r.antibiotics_thirteen, r.antibiotics_fourteen, r.antibiotics_fifteen, r.antibiotics_sixteen, r.antibiotics_seventeen, r.antibiotics_eighteen, r.antibiotics_nineteen, r.antibiotics_twenty, r.antibiotics_twenty_one, r.antibiotics_twenty_two, r.antibiotics_twenty_three, r.antibiotics_twenty_four, r.sensitivity_one, r.sensitivity_two, r.sensitivity_three, r.sensitivity_four, r.sensitivity_five, r.sensitivity_six, r.sensitivity_seven, r.sensitivity_eight, r.sensitivity_nine, r.sensitivity_ten, r.sensitivity_eleven, r.sensitivity_twelve, r.sensitivity_thirteen, r.sensitivity_fourteen, r.sensitivity_fifteen, r.sensitivity_sixteen, r.sensitivity_seventeen, r.sensitivity_eighteen, r.sensitivity_nineteen, r.sensitivity_twenty, r.sensitivity_twenty_one, r.sensitivity_twenty_two, r.sensitivity_twenty_three, r.sensitivity_twenty_four, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM pus_fluid r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_reproductive_assay($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.lh, r.fsh, r.prolactive, r.progesterone, r.oestrogen, r.testosterone, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM reproductive_assay r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.lh, r.fsh, r.prolactive, r.progesterone, r.oestrogen, r.testosterone, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM reproductive_assay r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_semen_analysis($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.volume, r.motility, r.unknown_one, r.unknown_two, r.consistency, r.agglutination, r.ph, r.colour, r.count, r.viability, r.morphology, r.testicular_cells, r.pus_cells, r.epithelial, r.red_blood_cells, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM semen_analysis r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.volume, r.motility, r.unknown_one, r.unknown_two, r.consistency, r.agglutination, r.ph, r.colour, r.count, r.viability, r.morphology, r.testicular_cells, r.pus_cells, r.epithelial, r.red_blood_cells, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM semen_analysis r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_rheumatology($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.le_cells, r.ana_qualitative, r.ana_quantitative, r.ds_dna, r.rheumatoid_factor, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM rheumatology r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.le_cells, r.ana_qualitative, r.ana_quantitative, r.ds_dna, r.rheumatoid_factor, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM rheumatology r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_sc3_sc4($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.s_c3, r.s_c4, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM sc3_sc4 r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.s_c3, r.s_c4, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM sc3_sc4 r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_semen_cs($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.culture, r.bacteria_one, r.bacteria_two, r.bacteria_three, r.antibiotics_one, r.antibiotics_two, r.antibiotics_three, r.antibiotics_four, r.antibiotics_five, r.antibiotics_six, r.antibiotics_seven, r.antibiotics_eight, r.antibiotics_nine, r.antibiotics_ten, r.antibiotics_eleven, r.antibiotics_twelve, r.antibiotics_thirteen, r.antibiotics_fourteen, r.antibiotics_fifteen, r.antibiotics_sixteen, r.antibiotics_seventeen, r.antibiotics_eighteen, r.antibiotics_nineteen, r.antibiotics_twenty, r.antibiotics_twenty_one, r.antibiotics_twenty_two, r.antibiotics_twenty_three, r.antibiotics_twenty_four, r.sensitivity_one, r.sensitivity_two, r.sensitivity_three, r.sensitivity_four, r.sensitivity_five, r.sensitivity_six, r.sensitivity_seven, r.sensitivity_eight, r.sensitivity_nine, r.sensitivity_ten, r.sensitivity_eleven, r.sensitivity_twelve, r.sensitivity_thirteen, r.sensitivity_fourteen, r.sensitivity_fifteen, r.sensitivity_sixteen, r.sensitivity_seventeen, r.sensitivity_eighteen, r.sensitivity_nineteen, r.sensitivity_twenty, r.sensitivity_twenty_one, r.sensitivity_twenty_two, r.sensitivity_twenty_three, r.sensitivity_twenty_four, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM semen_cs r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.culture, r.bacteria_one, r.bacteria_two, r.bacteria_three, r.antibiotics_one, r.antibiotics_two, r.antibiotics_three, r.antibiotics_four, r.antibiotics_five, r.antibiotics_six, r.antibiotics_seven, r.antibiotics_eight, r.antibiotics_nine, r.antibiotics_ten, r.antibiotics_eleven, r.antibiotics_twelve, r.antibiotics_thirteen, r.antibiotics_fourteen, r.antibiotics_fifteen, r.antibiotics_sixteen, r.antibiotics_seventeen, r.antibiotics_eighteen, r.antibiotics_nineteen, r.antibiotics_twenty, r.antibiotics_twenty_one, r.antibiotics_twenty_two, r.antibiotics_twenty_three, r.antibiotics_twenty_four, r.sensitivity_one, r.sensitivity_two, r.sensitivity_three, r.sensitivity_four, r.sensitivity_five, r.sensitivity_six, r.sensitivity_seven, r.sensitivity_eight, r.sensitivity_nine, r.sensitivity_ten, r.sensitivity_eleven, r.sensitivity_twelve, r.sensitivity_thirteen, r.sensitivity_fourteen, r.sensitivity_fifteen, r.sensitivity_sixteen, r.sensitivity_seventeen, r.sensitivity_eighteen, r.sensitivity_nineteen, r.sensitivity_twenty, r.sensitivity_twenty_one, r.sensitivity_twenty_two, r.sensitivity_twenty_three, r.sensitivity_twenty_four, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM semen_cs r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_serum_hcg_b($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.results, r.ranges, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM serum_hcg_b r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE  r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.results, r.ranges, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM serum_hcg_b r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_serum_lipase($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.s_lipase, r.s_lipase_flag, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM serum_lipase r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.s_lipase, r.s_lipase_flag, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM serum_lipase r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_skin_snip($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.onchocerca_volvulus, r.m_streptocerca, r.culture, r.bacteria_one, r.bacteria_two, r.bacteria_three, r.antibiotics_one, r.antibiotics_two, r.antibiotics_three, r.antibiotics_four, r.antibiotics_five, r.antibiotics_six, r.antibiotics_seven, r.antibiotics_eight, r.antibiotics_nine, r.antibiotics_ten, r.antibiotics_eleven, r.antibiotics_twelve, r.antibiotics_thirteen, r.antibiotics_fourteen, r.antibiotics_fifteen, r.antibiotics_sixteen, r.antibiotics_seventeen, r.antibiotics_eighteen, r.antibiotics_nineteen, r.antibiotics_twenty, r.antibiotics_twenty_one, r.antibiotics_twenty_two, r.antibiotics_twenty_three, r.antibiotics_twenty_four, r.sensitivity_one, r.sensitivity_two, r.sensitivity_three, r.sensitivity_four, r.sensitivity_five, r.sensitivity_six, r.sensitivity_seven, r.sensitivity_eight, r.sensitivity_nine, r.sensitivity_ten, r.sensitivity_eleven, r.sensitivity_twelve, r.sensitivity_thirteen, r.sensitivity_fourteen, r.sensitivity_fifteen, r.sensitivity_sixteen, r.sensitivity_seventeen, r.sensitivity_eighteen, r.sensitivity_nineteen, r.sensitivity_twenty, r.sensitivity_twenty_one, r.sensitivity_twenty_two, r.sensitivity_twenty_three, r.sensitivity_twenty_four, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM skin_snip r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.onchocerca_volvulus, r.m_streptocerca, r.culture, r.bacteria_one, r.bacteria_two, r.bacteria_three, r.antibiotics_one, r.antibiotics_two, r.antibiotics_three, r.antibiotics_four, r.antibiotics_five, r.antibiotics_six, r.antibiotics_seven, r.antibiotics_eight, r.antibiotics_nine, r.antibiotics_ten, r.antibiotics_eleven, r.antibiotics_twelve, r.antibiotics_thirteen, r.antibiotics_fourteen, r.antibiotics_fifteen, r.antibiotics_sixteen, r.antibiotics_seventeen, r.antibiotics_eighteen, r.antibiotics_nineteen, r.antibiotics_twenty, r.antibiotics_twenty_one, r.antibiotics_twenty_two, r.antibiotics_twenty_three, r.antibiotics_twenty_four, r.sensitivity_one, r.sensitivity_two, r.sensitivity_three, r.sensitivity_four, r.sensitivity_five, r.sensitivity_six, r.sensitivity_seven, r.sensitivity_eight, r.sensitivity_nine, r.sensitivity_ten, r.sensitivity_eleven, r.sensitivity_twelve, r.sensitivity_thirteen, r.sensitivity_fourteen, r.sensitivity_fifteen, r.sensitivity_sixteen, r.sensitivity_seventeen, r.sensitivity_eighteen, r.sensitivity_nineteen, r.sensitivity_twenty, r.sensitivity_twenty_one, r.sensitivity_twenty_two, r.sensitivity_twenty_three, r.sensitivity_twenty_four, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM skin_snip r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_specials($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.abo_grouping, r.g6pd, r.hgb_genotype, r.sickling, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM specials r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.abo_grouping, r.g6pd, r.hgb_genotype, r.sickling, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM specials r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_sputum_afb($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.appearance, r.gram_stain, r.pus_cells, r.zn_stain, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM sputum_afb r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.appearance, r.gram_stain, r.pus_cells, r.zn_stain, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM sputum_afb r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_sputum_cs($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.appearance, r.gram_stain, r.pus_cells, r.zn_stain, r.culture, r.bacteria_one, r.bacteria_two, r.antibiotics_one, r.antibiotics_two, r.antibiotics_three, r.antibiotics_four, r.antibiotics_five, r.antibiotics_six, r.antibiotics_seven, r.antibiotics_eight, r.antibiotics_nine, r.antibiotics_ten, r.antibiotics_eleven, r.antibiotics_twelve, r.antibiotics_thirteen, r.antibiotics_fourteen, r.antibiotics_fifteen, r.antibiotics_sixteen, r.sensitivity_one, r.sensitivity_two, r.sensitivity_three, r.sensitivity_four, r.sensitivity_five, r.sensitivity_six, r.sensitivity_seven, r.sensitivity_eight, r.sensitivity_nine, r.sensitivity_ten, r.sensitivity_eleven, r.sensitivity_twelve, r.sensitivity_thirteen, r.sensitivity_fourteen, r.sensitivity_fifteen, r.sensitivity_sixteen, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM sputum r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.appearance, r.gram_stain, r.pus_cells, r.zn_stain, r.culture, r.bacteria_one, r.bacteria_two, r.antibiotics_one, r.antibiotics_two, r.antibiotics_three, r.antibiotics_four, r.antibiotics_five, r.antibiotics_six, r.antibiotics_seven, r.antibiotics_eight, r.antibiotics_nine, r.antibiotics_ten, r.antibiotics_eleven, r.antibiotics_twelve, r.antibiotics_thirteen, r.antibiotics_fourteen, r.antibiotics_fifteen, r.antibiotics_sixteen, r.sensitivity_one, r.sensitivity_two, r.sensitivity_three, r.sensitivity_four, r.sensitivity_five, r.sensitivity_six, r.sensitivity_seven, r.sensitivity_eight, r.sensitivity_nine, r.sensitivity_ten, r.sensitivity_eleven, r.sensitivity_twelve, r.sensitivity_thirteen, r.sensitivity_fourteen, r.sensitivity_fifteen, r.sensitivity_sixteen, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM sputum r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_stool_cs($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.culture, r.bacteria_one, r.bacteria_two, r.bacteria_three, r.antibiotics_one, r.antibiotics_two, r.antibiotics_three, r.antibiotics_four, r.antibiotics_five, r.antibiotics_six, r.antibiotics_seven, r.antibiotics_eight, r.antibiotics_nine, r.antibiotics_ten, r.antibiotics_eleven, r.antibiotics_twelve, r.antibiotics_thirteen, r.antibiotics_fourteen, r.antibiotics_fifteen, r.antibiotics_sixteen, r.antibiotics_seventeen, r.antibiotics_eighteen, r.antibiotics_nineteen, r.antibiotics_twenty, r.antibiotics_twenty_one, r.antibiotics_twenty_two, r.antibiotics_twenty_three, r.antibiotics_twenty_four, r.sensitivity_one, r.sensitivity_two, r.sensitivity_three, r.sensitivity_four, r.sensitivity_five, r.sensitivity_six, r.sensitivity_seven, r.sensitivity_eight, r.sensitivity_nine, r.sensitivity_ten, r.sensitivity_eleven, r.sensitivity_twelve, r.sensitivity_thirteen, r.sensitivity_fourteen, r.sensitivity_fifteen, r.sensitivity_sixteen, r.sensitivity_seventeen, r.sensitivity_eighteen, r.sensitivity_nineteen, r.sensitivity_twenty, r.sensitivity_twenty_one, r.sensitivity_twenty_two, r.sensitivity_twenty_three, r.sensitivity_twenty_four, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM stool_cs r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.culture, r.bacteria_one, r.bacteria_two, r.bacteria_three, r.antibiotics_one, r.antibiotics_two, r.antibiotics_three, r.antibiotics_four, r.antibiotics_five, r.antibiotics_six, r.antibiotics_seven, r.antibiotics_eight, r.antibiotics_nine, r.antibiotics_ten, r.antibiotics_eleven, r.antibiotics_twelve, r.antibiotics_thirteen, r.antibiotics_fourteen, r.antibiotics_fifteen, r.antibiotics_sixteen, r.antibiotics_seventeen, r.antibiotics_eighteen, r.antibiotics_nineteen, r.antibiotics_twenty, r.antibiotics_twenty_one, r.antibiotics_twenty_two, r.antibiotics_twenty_three, r.antibiotics_twenty_four, r.sensitivity_one, r.sensitivity_two, r.sensitivity_three, r.sensitivity_four, r.sensitivity_five, r.sensitivity_six, r.sensitivity_seven, r.sensitivity_eight, r.sensitivity_nine, r.sensitivity_ten, r.sensitivity_eleven, r.sensitivity_twelve, r.sensitivity_thirteen, r.sensitivity_fourteen, r.sensitivity_fifteen, r.sensitivity_sixteen, r.sensitivity_seventeen, r.sensitivity_eighteen, r.sensitivity_nineteen, r.sensitivity_twenty, r.sensitivity_twenty_one, r.sensitivity_twenty_two, r.sensitivity_twenty_three, r.sensitivity_twenty_four, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM stool_cs r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_stool_re($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.row_one_one, r.ova_one, r.ova_two, r.row_three_one, r.row_three_two, r.row_four_one, r.row_four_two, r.larvae_one, r.larvae_two, r.cyst_one, r.cyst_two, r.row_seven_one, r.row_seven_two, r.row_eight_one, r.row_eight_two, r.vegetative_form_one, r.vegetative_form_two, r.row_ten_one, r.row_ten_two, r.row_eleven_one, r.row_eleven_two, r.red_blood_cells, r.white_blood_cells, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM stool_re r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.row_one_one, r.ova_one, r.ova_two, r.row_three_one, r.row_three_two, r.row_four_one, r.row_four_two, r.larvae_one, r.larvae_two, r.cyst_one, r.cyst_two, r.row_seven_one, r.row_seven_two, r.row_eight_one, r.row_eight_two, r.vegetative_form_one, r.vegetative_form_two, r.row_ten_one, r.row_ten_two, r.row_eleven_one, r.row_eleven_two, r.red_blood_cells, r.white_blood_cells, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM stool_re r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_tft($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.ft3, r.ft3_flag, r.ft4, r.ft4_flag, r.tsh, r.tsh_flag, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM tft r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.ft3, r.ft3_flag, r.ft4, r.ft4_flag, r.tsh, r.tsh_flag, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM tft r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_throat_swab($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.culture, r.bacteria_one, r.bacteria_two, r.bacteria_three, r.antibiotics_one, r.antibiotics_two, r.antibiotics_three, r.antibiotics_four, r.antibiotics_five, r.antibiotics_six, r.antibiotics_seven, r.antibiotics_eight, r.antibiotics_nine, r.antibiotics_ten, r.antibiotics_eleven, r.antibiotics_twelve, r.antibiotics_thirteen, r.antibiotics_fourteen, r.antibiotics_fifteen, r.antibiotics_sixteen, r.antibiotics_seventeen, r.antibiotics_eighteen, r.antibiotics_nineteen, r.antibiotics_twenty, r.antibiotics_twenty_one, r.antibiotics_twenty_two, r.antibiotics_twenty_three, r.antibiotics_twenty_four, r.sensitivity_one, r.sensitivity_two, r.sensitivity_three, r.sensitivity_four, r.sensitivity_five, r.sensitivity_six, r.sensitivity_seven, r.sensitivity_eight, r.sensitivity_nine, r.sensitivity_ten, r.sensitivity_eleven, r.sensitivity_twelve, r.sensitivity_thirteen, r.sensitivity_fourteen, r.sensitivity_fifteen, r.sensitivity_sixteen, r.sensitivity_seventeen, r.sensitivity_eighteen, r.sensitivity_nineteen, r.sensitivity_twenty, r.sensitivity_twenty_one, r.sensitivity_twenty_two, r.sensitivity_twenty_three, r.sensitivity_twenty_four, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM throat_swab_cs r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.culture, r.bacteria_one, r.bacteria_two, r.bacteria_three, r.antibiotics_one, r.antibiotics_two, r.antibiotics_three, r.antibiotics_four, r.antibiotics_five, r.antibiotics_six, r.antibiotics_seven, r.antibiotics_eight, r.antibiotics_nine, r.antibiotics_ten, r.antibiotics_eleven, r.antibiotics_twelve, r.antibiotics_thirteen, r.antibiotics_fourteen, r.antibiotics_fifteen, r.antibiotics_sixteen, r.antibiotics_seventeen, r.antibiotics_eighteen, r.antibiotics_nineteen, r.antibiotics_twenty, r.antibiotics_twenty_one, r.antibiotics_twenty_two, r.antibiotics_twenty_three, r.antibiotics_twenty_four, r.sensitivity_one, r.sensitivity_two, r.sensitivity_three, r.sensitivity_four, r.sensitivity_five, r.sensitivity_six, r.sensitivity_seven, r.sensitivity_eight, r.sensitivity_nine, r.sensitivity_ten, r.sensitivity_eleven, r.sensitivity_twelve, r.sensitivity_thirteen, r.sensitivity_fourteen, r.sensitivity_fifteen, r.sensitivity_sixteen, r.sensitivity_seventeen, r.sensitivity_eighteen, r.sensitivity_nineteen, r.sensitivity_twenty, r.sensitivity_twenty_one, r.sensitivity_twenty_two, r.sensitivity_twenty_three, r.sensitivity_twenty_four, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM throat_swab_cs r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_troponin($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.troponin_i, r.troponin_t, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM troponin r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.troponin_i, r.troponin_t, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM troponin r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_urethral_cs($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.gram_stain, r.culture, r.bacteria_one, r.bacteria_two, r.bacteria_three, r.antibiotics_one, r.antibiotics_two, r.antibiotics_three, r.antibiotics_four, r.antibiotics_five, r.antibiotics_six, r.antibiotics_seven, r.antibiotics_eight, r.antibiotics_nine, r.antibiotics_ten, r.antibiotics_eleven, r.antibiotics_twelve, r.antibiotics_thirteen, r.antibiotics_fourteen, r.antibiotics_fifteen, r.antibiotics_sixteen, r.antibiotics_seventeen, r.antibiotics_eighteen, r.antibiotics_nineteen, r.antibiotics_twenty, r.antibiotics_twenty_one, r.antibiotics_twenty_two, r.antibiotics_twenty_three, r.antibiotics_twenty_four, r.sensitivity_one, r.sensitivity_two, r.sensitivity_three, r.sensitivity_four, r.sensitivity_five, r.sensitivity_six, r.sensitivity_seven, r.sensitivity_eight, r.sensitivity_nine, r.sensitivity_ten, r.sensitivity_eleven, r.sensitivity_twelve, r.sensitivity_thirteen, r.sensitivity_fourteen, r.sensitivity_fifteen, r.sensitivity_sixteen, r.sensitivity_seventeen, r.sensitivity_eighteen, r.sensitivity_nineteen, r.sensitivity_twenty, r.sensitivity_twenty_one, r.sensitivity_twenty_two, r.sensitivity_twenty_three, r.sensitivity_twenty_four, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM urethral_cs r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.gram_stain, r.culture, r.bacteria_one, r.bacteria_two, r.bacteria_three, r.antibiotics_one, r.antibiotics_two, r.antibiotics_three, r.antibiotics_four, r.antibiotics_five, r.antibiotics_six, r.antibiotics_seven, r.antibiotics_eight, r.antibiotics_nine, r.antibiotics_ten, r.antibiotics_eleven, r.antibiotics_twelve, r.antibiotics_thirteen, r.antibiotics_fourteen, r.antibiotics_fifteen, r.antibiotics_sixteen, r.antibiotics_seventeen, r.antibiotics_eighteen, r.antibiotics_nineteen, r.antibiotics_twenty, r.antibiotics_twenty_one, r.antibiotics_twenty_two, r.antibiotics_twenty_three, r.antibiotics_twenty_four, r.sensitivity_one, r.sensitivity_two, r.sensitivity_three, r.sensitivity_four, r.sensitivity_five, r.sensitivity_six, r.sensitivity_seven, r.sensitivity_eight, r.sensitivity_nine, r.sensitivity_ten, r.sensitivity_eleven, r.sensitivity_twelve, r.sensitivity_thirteen, r.sensitivity_fourteen, r.sensitivity_fifteen, r.sensitivity_sixteen, r.sensitivity_seventeen, r.sensitivity_eighteen, r.sensitivity_nineteen, r.sensitivity_twenty, r.sensitivity_twenty_one, r.sensitivity_twenty_two, r.sensitivity_twenty_three, r.sensitivity_twenty_four, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM urethral_cs r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_urine($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.urine_vma, r.urine_calcium, r.urine_uric_acid, r.urine_creatinine, r.serum_creatinine, r.twenty_four_hour_urine_volume, r.clearance, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM urine r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.urine_vma, r.urine_calcium, r.urine_uric_acid, r.urine_creatinine, r.serum_creatinine, r.twenty_four_hour_urine_volume, r.clearance, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM urine r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_urine_acr($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.urea_creatinine, r.urea_creatinine_flag, r.micro_albumin_urine, r.micro_albumin_urine_flag, r.uacr, r.uacr_flag, r.the_uacr, r.mg_g_indicates, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM urine_acr r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.urea_creatinine, r.urea_creatinine_flag, r.micro_albumin_urine, r.micro_albumin_urine_flag, r.uacr, r.uacr_flag, r.the_uacr, r.mg_g_indicates, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM urine_acr r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_urine_cs($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.pus_cells_per_hps, r.rbcs_per_hpf, r.epitheleal_cells_per_hpf, r.crystals, r.cast, r.gram_reaction, r.yeast_like_cells, r.culture, r.viable_count, r.bacteria_one, r.bacteria_two, r.antibiotics_one, r.antibiotics_two, r.antibiotics_three, r.antibiotics_four, r.antibiotics_five, r.antibiotics_six, r.antibiotics_seven, r.antibiotics_eight, r.antibiotics_nine, r.antibiotics_ten, r.antibiotics_eleven, r.antibiotics_twelve, r.antibiotics_thirteen, r.antibiotics_fourteen, r.antibiotics_fifteen, r.antibiotics_sixteen, r.sensitivity_one, r.sensitivity_two, r.sensitivity_three, r.sensitivity_four, r.sensitivity_five, r.sensitivity_six, r.sensitivity_seven, r.sensitivity_eight, r.sensitivity_nine, r.sensitivity_ten, r.sensitivity_eleven, r.sensitivity_twelve, r.sensitivity_thirteen, r.sensitivity_fourteen, r.sensitivity_fifteen, r.sensitivity_sixteen, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM urine_cs r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.pus_cells_per_hps, r.rbcs_per_hpf, r.epitheleal_cells_per_hpf, r.crystals, r.cast, r.gram_reaction, r.yeast_like_cells, r.culture, r.viable_count, r.bacteria_one, r.bacteria_two, r.antibiotics_one, r.antibiotics_two, r.antibiotics_three, r.antibiotics_four, r.antibiotics_five, r.antibiotics_six, r.antibiotics_seven, r.antibiotics_eight, r.antibiotics_nine, r.antibiotics_ten, r.antibiotics_eleven, r.antibiotics_twelve, r.antibiotics_thirteen, r.antibiotics_fourteen, r.antibiotics_fifteen, r.antibiotics_sixteen, r.sensitivity_one, r.sensitivity_two, r.sensitivity_three, r.sensitivity_four, r.sensitivity_five, r.sensitivity_six, r.sensitivity_seven, r.sensitivity_eight, r.sensitivity_nine, r.sensitivity_ten, r.sensitivity_eleven, r.sensitivity_twelve, r.sensitivity_thirteen, r.sensitivity_fourteen, r.sensitivity_fifteen, r.sensitivity_sixteen, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM urine_cs r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_urine_re($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.appearance, r.colour, r.ph, r.specific_gravity, r.protein, r.leucocytes, r.glucose, r.urobilinogen, r.blood, r.ketones, r.bilirubin, r.nitrites, r.bile_pigment, r.bile_salt, r.urobilin, r.pus_cells_per_hps, r.yeast_like_cells, r.epitheleal_cells_per_hpf, r.s_haematobium, r.rbcs_per_hpf, r.bacteria, r.spermatozoa, r.crystals, r.unknown_one, r.cast, r.unknown_two, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM urine_re r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.appearance, r.colour, r.ph, r.specific_gravity, r.protein, r.leucocytes, r.glucose, r.urobilinogen, r.blood, r.ketones, r.bilirubin, r.nitrites, r.bile_pigment, r.bile_salt, r.urobilin, r.pus_cells_per_hps, r.yeast_like_cells, r.epitheleal_cells_per_hpf, r.s_haematobium, r.rbcs_per_hpf, r.bacteria, r.spermatozoa, r.crystals, r.unknown_one, r.cast, r.unknown_two, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM urine_re r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_widal($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.typhi_to, r.typhi_th, r.paratyphi_a_to, r.paratyphi_a_th, r.paratyphi_b_to, r.paratyphi_b_th, r.paratyphi_c_to, r.paratyphi_c_th, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM widal r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.typhi_to, r.typhi_th, r.paratyphi_a_to, r.paratyphi_a_th, r.paratyphi_b_to, r.paratyphi_b_th, r.paratyphi_c_to, r.paratyphi_c_th, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM widal r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_wound_cs($patient_id, $start_date, $end_date, $branch, $conn) {
            try{
                if($patient_id) {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.gram_stain, r.zn_stain, r.pus_cells, r.fungal_element, r.culture, r.bacteria_one, r.bacteria_two, r.antibiotics_one, r.antibiotics_two, r.antibiotics_three, r.antibiotics_four, r.antibiotics_five, r.antibiotics_six, r.antibiotics_seven, r.antibiotics_eight, r.antibiotics_nine, r.antibiotics_ten, r.antibiotics_eleven, r.antibiotics_twelve, r.antibiotics_thirteen, r.antibiotics_fourteen, r.antibiotics_fifteen, r.antibiotics_sixteen, r.sensitivity_one, r.sensitivity_two, r.sensitivity_three, r.sensitivity_four, r.sensitivity_five, r.sensitivity_six, r.sensitivity_seven, r.sensitivity_eight, r.sensitivity_nine, r.sensitivity_ten, r.sensitivity_eleven, r.sensitivity_twelve, r.sensitivity_thirteen, r.sensitivity_fourteen, r.sensitivity_fifteen, r.sensitivity_sixteen, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM wound_cs r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.patient_id = :patient_id AND p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':patient_id' => $patient_id, ':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.invoice_id, r.gram_stain, r.zn_stain, r.pus_cells, r.fungal_element, r.culture, r.bacteria_one, r.bacteria_two, r.antibiotics_one, r.antibiotics_two, r.antibiotics_three, r.antibiotics_four, r.antibiotics_five, r.antibiotics_six, r.antibiotics_seven, r.antibiotics_eight, r.antibiotics_nine, r.antibiotics_ten, r.antibiotics_eleven, r.antibiotics_twelve, r.antibiotics_thirteen, r.antibiotics_fourteen, r.antibiotics_fifteen, r.antibiotics_sixteen, r.sensitivity_one, r.sensitivity_two, r.sensitivity_three, r.sensitivity_four, r.sensitivity_five, r.sensitivity_six, r.sensitivity_seven, r.sensitivity_eight, r.sensitivity_nine, r.sensitivity_ten, r.sensitivity_eleven, r.sensitivity_twelve, r.sensitivity_thirteen, r.sensitivity_fourteen, r.sensitivity_fifteen, r.sensitivity_sixteen, r.comments, r.added_by, r.date_added, p.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM wound_cs r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch AND r.date_added BETWEEN :start_date AND :end_date');
                    $query->execute([':branch' => $branch, ':start_date' => $start_date, ':end_date' => $end_date]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function get_total_cost($array) {
            $total = 0.00;

            foreach($array as $row) {
                $total += $row->total_cost;
            }

            return number_format($total, 2);
        }

        public static function get_total_paid($array) {
            $total = 0.00;

            foreach($array as $row) {
                $total += $row->amount_paid;
            }

            return number_format($total, 2);
        }
        
    }
    