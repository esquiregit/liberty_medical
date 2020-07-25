<?php
    require "audit_trail.php";
    // require "charge.php";

    class Methods {
        
        static function strtocapital($string){
            $array      = explode(" ", $string);
            $new_string = '';

            foreach($array as $word){
                $first_letter = substr($word, 0, 1);
                $remaining    = substr($word, 1, strlen($word));
                $new_string  .= strtoupper($first_letter) . strtolower($remaining) . ' ';
            }

            return trim($new_string);
        }
        
        // method to verify the first three numbers of phone number
        static function is_prefix_valid($number){
            $valid_values = array('020', '023', '024', '026', '027', '028', '029', '030', '030', '031', '032', '050', '054', '055', '056', '057');
            $first_three = substr($number, 0, 3);

            foreach($valid_values as $value){
                if($value == $first_three){
                    return true;
                }
            }

            return false;
        }
        
        // method to encrypt password
        static function password_hash($password){
            $options = [ 'cost' => 11 ];

            return password_hash($password, PASSWORD_BCRYPT, $options);
        }
        
        // method to verify password
        static function password_verify($password, $password_hash){
            return password_verify($password, $password_hash);
        }

        static function get_log_in_token() {
            $alphabets = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz01234567890';
            $token     = substr(str_shuffle($alphabets), 0, 32);
            
            return $token;
        }

        // method to validate and sanitize email value
        static function validate_email($value){
            return filter_var(htmlspecialchars(stripslashes(strip_tags(trim($value)))), FILTER_SANITIZE_EMAIL);
        }
        
        // method to check if email has valid format
        static function valid_email_format($value){
            return (filter_var($value, FILTER_VALIDATE_EMAIL));
        }

        // method to validate and sanitize array
        static function validate_array($values){
            if(is_array($values)) {
                $new_array = array();
                foreach($values as $value){
                    array_push($new_array, self::validate_string($value));
                }
                
                return $new_array;
            }

            return $values;
        }

        // method to validate and sanitize object
        static function validate_object($values){
            $new_array = array();
            foreach($values as $key => $value){
                $key   = self::validate_string($key);
                $value = self::validate_string($value);

                $new_array[$key] = $value;
            }
            return $new_array;
        }

        // method to validate and sanitize string value
        static function validate_string($value){
            return empty($value) ? $value : filter_var(htmlspecialchars(stripslashes(strip_tags(trim($value)))), FILTER_SANITIZE_STRING);
        }
        
        // method to check if url has valid format
        static function valid_url_format($value){
            return !preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $valid);
        }

        // fetch patient name
        public static function get_branch($staff_id, $conn){
            try{
                $query  = $conn->prepare('SELECT branch FROM users WHERE staff_id = :staff_id');
                $query->execute([':staff_id' => $staff_id]);

                return $query->fetch(PDO::FETCH_OBJ)->branch;
            }catch(PDOException $ex){}
        }

        // fetch patient name
        public static function read_patientname($patient_id, $conn){
            try{
                $query  = $conn->prepare('SELECT first_name, middle_name, last_name FROM patients WHERE patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);
                $result = $query->fetch(PDO::FETCH_OBJ);

                return $result->middle_name ? $result->first_name.' '.$result->middle_name.' '.$result->last_name : $result->first_name.' '.$result->last_name;
            }catch(PDOException $ex){}
        }

        // generate a unique invoice id
        public static function get_invoice_id($table, $conn) {
            $total = 0;
            $rand  = rand(0, 99);
            $rand  = ($rand < 10) ? '0' . $rand : $rand;

            if($table === 'Alpha Feto Protein') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM alpha_feto_protein");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-ALP-FP-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'Antenatal Screening') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM antenatal_screening");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-ANT-SCR-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'Ascitic Fluid C/S') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM ascitic_fluid_cs");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-ASC-FLU-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'Aspirate C/S') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM aspirate_cs");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-ASP-CS-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'BUE Creatinine') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM bue_creatinine");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-BUE-CRT-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'BUE Creatinine eGFR') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM bue_creatinine_egfr");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-BUE-CRT-EGFR-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'BUE LFT') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM bue_creatinine_lft");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-BUE-LFT-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'BUE Lipids') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM bue_creatinine_lipids");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-BUE-LPD-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'Blood Film Comment') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM blood_film_comment");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-BFC-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'Blood Sugar') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM blood_sugar");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-BLD-SUGAR-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'Blood C/S') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM blood_cs");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-BLD-CS-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'C-Reactive Protein') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM c_reactive_protein");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-C-REAC-PRO-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'CA-12.5') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM ca_one_two_five");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-CA-125-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'CA-15.3') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM ca_one_five_three");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-CA-153-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'CD4 Count') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM cd4_count");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-CD4-CNT-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'CEA') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM cea");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-CEA-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'CKMB') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM ckmb");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-CKMB-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'CRP Ultra-Sensitive') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM crp_ultra_sensitive");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-CRP-ULT-SEN-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'CRP') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM crp");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-CRP-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'CSF Biochem') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM csf_biochem");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-CSF-BIO-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'Calcium Profile') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM calcium_profile");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-CALC-PRF-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'Cardiac Enzyme') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM cardiac_enzyme");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-CARD-ENZ-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'Clotting Profile') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM clotting_profile");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-CLOT-PRF-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'Compact Chemistry') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM compact_chemistry");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-COMP-CHE-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'Cortisol') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM cortisol");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-CRTL-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'D-Dimers') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM d_dimers");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-D-DMS-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'ESR') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM esr");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-ESR-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'Ear Swab C/S') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM ear_swab_cs");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-EAR-SCS-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'Eye Swab C/S') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM eye_swab_cs");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-EYE-SCS-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'Endocervical Swab C/S') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM endocervical_swab_cs");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-ENDO-SCS-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'Estrogen') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM estrogen");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-EST-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'FBC 3P') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM fbc_3p");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-FBC-3P-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'FBC 5P') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM fbc_5p");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-FBC-5P-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'FBC Children') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM fbc_children");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-FBC-CHI-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'Folate / B12') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM folate_b12");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-FOL-B12-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'General Chemistry') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM general_chemistry");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-GEN-CHEM-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'HBA1C') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM hba1c");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-HBA1C-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'H. Pylori Ag.') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM h_pylori_ag");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-H-PAG-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'H. Pylori Ag. Blood') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM h_pylori_ag_blood");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-H-PAGB-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'H. Pylori Ag. / SOB') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM h_pylori_ag_sob");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-H-PAG-SOB-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'HBV Viral Load') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM hbv_viral_load");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-HBV-VL-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'HIV Viral Load') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM hiv_viral_load");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-HIV-VL-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'Hepatitis B Profile') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM hepatitis_b_profile");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-HEP-B-PRF-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'Hepatitis Markers') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM hepatitis_markers");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-HEP-MARK-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'HVS C/S') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM hvs_cs");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-HVS-CS-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'HVS R/E') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM hvs_re");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-HVS-RE-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'Hormonal Assay') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM hormonal_assay");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-HORM-ASS-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'Hypersensitive CPR') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM hypersensitive_cpr");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-HYP-CPR-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'ISE') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM ise");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-ISE-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'Iron Study') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM iron_study");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-IRN-STD-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'LFT') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM lft");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-LFT-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'Lipid Profile') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM lipid_profile");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-LPD-PRF-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'Mantoux') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM mantoux");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-MAN-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'M-ALB') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM m_alb");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-M-ALB-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'NTC Screening') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM ntc_screening");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-NTC-SCR-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'PSA') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM psa");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-PSA-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'PTH') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM pth");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-PTH-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'Pleural Fluid') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM pleural_fluid");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-PLEU-FLU-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'Pregnancy Test') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM pregnancy_test");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-PREG-TEST-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'Protein Electrophoresis') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM protein_electrophoresis");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-PROT-ELEC-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'Pus Fluid') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM pus_fluid");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-PUS-FLU-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'Reproductive Assay') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM reproductive_assay");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-REPR-ASS-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'Rheumatology') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM rheumatology");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-RHEU-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'S-C3, S-C4') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM sc3_sc4");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-SC3-SC4-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'Semen Analysis') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM semen_analysis");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-SEM-ANL-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'Semen C/S') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM semen_cs");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-SEM-CS-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'Serum HCG') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM serum_hcg_b");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-SRM-HCG-B-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'Serum Lipase') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM serum_lipase");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-SRM-LIPASE-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'Skin Snip') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM skin_snip");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-SKIN-SNIP-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'Specials') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM specials");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-SPE-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'Sputum AFB') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM sputum_afb");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-SPU-AFB-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'Sputum C/S') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM sputum");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-SPU-CS-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'Stool C/S') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM stool_cs");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-STL-CS-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'Stool R/E') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM stool_re");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-STL-RE-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'TFT') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM tft");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-TFT-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'Throat Swab C/S') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM throat_swab_cs");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-THR-SWB-CS-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'Troponin') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM troponin");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-TRO-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'Urethral C/S') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM urethral_cs");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-URE-CS-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'Urine') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM urine");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-URN-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'Urine ACR') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM urine_acr");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-URN-ACR-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'Urine C/S') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM urine_cs");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-URN-CS-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'Urine R/E') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM urine_re");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-URN-RE-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'Widal') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM widal");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-WDL-' . $rand . $total;
                } catch(PDOException $ex){}
            } else if($table === 'Wound C/S') {
                try {
                    $query  = $conn->prepare("SELECT COUNT(*) as total FROM wound_cs");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    $total  = $total + $result->total;

                    return 'INV-WND-CS-' . $rand . $total;
                } catch(PDOException $ex){}
            }
        }

        public static function get_branch_code($branch) {
            $array = explode(' ', $branch);
            $code  = '';

            if(count($array) === 1) {
                return substr(strtoupper($array[0]), 0, 3);
            } else {
                foreach ($array as $var) {
                    $code .= substr($var, 0, 1);
                }

                return strtoupper(trim($code));
            }
        }

        public static function get_charges($conn){
            try{
                $query = $conn->prepare('SELECT id, type, amount FROM charges ORDER BY type asc');
                $query->execute();

                return $query->fetchAll(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

    }

?>