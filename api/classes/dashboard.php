<?php
    require_once 'conn.php';

	class Dashboard {

        public static function get_alpha($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM alpha_feto_protein WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function antenatal_screening($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM antenatal_screening WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function ascitic_fluid_cs($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM ascitic_fluid_cs WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function aspirate_cs($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM aspirate_cs WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function blood_cs($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM blood_cs WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function blood_film_comment($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM blood_film_comment WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function blood_sugar($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM blood_sugar WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function bue_creatinine($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM bue_creatinine WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function bue_creatinine_egfr($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM bue_creatinine_egfr WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function bue_creatinine_lft($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM bue_creatinine_lft WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function bue_creatinine_lipids($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM bue_creatinine_lipids WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function calcium_profile($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM calcium_profile WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function cardiac_enzyme($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM cardiac_enzyme WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function ca_one_two_five($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM ca_one_two_five WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function ca_one_five_three($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM ca_one_five_three WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function cd4_count($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM cd4_count WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function cea($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM cea WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function ckmb($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM ckmb WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function clotting_profile($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM clotting_profile WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function compact_chemistry($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM compact_chemistry WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function cortisol($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM cortisol WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function crp($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM crp WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function crp_ultra_sensitive($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM crp_ultra_sensitive WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function csf_biochem($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM csf_biochem WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function c_reactive_protein($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM c_reactive_protein WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function d_dimers($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM d_dimers WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function ear_swab_cs($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM ear_swab_cs WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function endocervical_swab_cs($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM endocervical_swab_cs WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function eye_swab_cs($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM eye_swab_cs WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function esr($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM esr WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function estrogen($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM estrogen WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function fbc_3p($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM fbc_3p WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function fbc_5p($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM fbc_5p WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function fbc_children($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM fbc_children WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function folate_b12($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM folate_b12 WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function general_chemistry($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM general_chemistry WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function hba1c($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM hba1c WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function hbv_viral_load($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM hbv_viral_load WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function hiv_viral_load($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM hiv_viral_load WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function hepatitis_b_profile($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM hepatitis_b_profile WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function hepatitis_markers($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM hepatitis_markers WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function hormonal_assay($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM hormonal_assay WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function hvs_cs($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM hvs_cs WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function hvs_re($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM hvs_re WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function hypersensitive_cpr($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM hypersensitive_cpr WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function h_pylori_ag($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM h_pylori_ag WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function h_pylori_ag_blood($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM h_pylori_ag_blood WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function h_pylori_ag_sob($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM h_pylori_ag_sob WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function iron_study($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM iron_study WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function ise($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM ise WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function lft($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM lft WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function lipid_profile($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM lipid_profile WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function mantoux($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM mantoux WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function m_alb($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM m_alb WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function ntc_screening($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM ntc_screening WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function pleural_fluid($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM pleural_fluid WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function pregnancy_test($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM pregnancy_test WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function protein_electrophoresis($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM protein_electrophoresis WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function psa($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM psa WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function pth($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM pth WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function pus_fluid($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM pus_fluid WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function reproductive_assay($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM reproductive_assay WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function rheumatology($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM rheumatology WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function sc3_sc4($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM sc3_sc4 WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function semen_analysis($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM semen_analysis WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function semen_cs($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM semen_cs WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function serum_hcg_b($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM serum_hcg_b WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function serum_lipase($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM serum_lipase WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function skin_snip($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM skin_snip WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function specials($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM specials WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function sputum_afb($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM sputum_afb WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function sputum($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM sputum WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function stool_cs($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM stool_cs WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function stool_re($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM stool_re WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function tft($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM tft WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function throat_swab_cs($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM throat_swab_cs WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function troponin($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM troponin WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function urethral_cs($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM urethral_cs WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function urine($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM urine WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function urine_acr($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM urine_acr WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function urine_cs($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM urine_cs WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function urine_re($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM urine_re WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function widal($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM widal WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        public static function wound_cs($conn) {
            $year   = Date('Y-');
            $result = array();

            try {
                for($index = 1; $index < 13; ++$index) {
                    if($index < 10)
                        $index = '0'.$index;

                    $query = $conn->prepare("SELECT * FROM wound_cs WHERE date_added LIKE :date_added");
                    $query->execute([':date_added' => '%'.$year.$index.'%']);

                    array_push($result, $query->rowCount());
                }

                return $result;
            } catch(PDOException $ex){
                return 0;
            }
        }

        // public static function get_ascitic($conn) {
        //     $year   = Date('Y-');
        //     $result = array();

        //     try {
        //         for($index = 1; $index < 13; ++$index) {
        //             if($index < 10)
        //                 $index = '0'.$index;

        //             $query = $conn->prepare("SELECT SUM(`amount`) as amount FROM ascitic_fluid_cs WHERE date_added LIKE :date_added");
        //             $query->execute([':date_added' => '%'.$year.$index.'%']);
        //             $retval = $query->fetch(PDO::FETCH_OBJ)->amount;
        //             $total_sales = $retval === null ? 0 : $retval;

        //             array_push($result, $total_sales);
        //         }

        //         return $result;
        //     } catch(PDOException $ex){
        //         return 0;
        //     }
        // }

	}