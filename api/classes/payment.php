<?php
    require_once 'conn.php';
    require_once 'methods.php';

    class Payment {
        
        public static function pay_alpha_feto_protein($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE alpha_feto_protein SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_antenatal_screening($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE antenatal_screening SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_ascitic_fluid_cs($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE ascitic_fluid_cs SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_aspirate_cs($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE aspirate_cs SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_blood_cs($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE blood_cs SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_blood_file_comment($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE bllod_file_comment SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_blood_sugar($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE blood_sugar SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_bue_creatinine($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE bue_creatinine SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_bue_creatinine_egfr($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE bue_creatinine_egfr SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_bue_creatinine_lft($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE bue_creatinine_lft SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_bue_creatinine_lipid($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE bue_creatinine_lipid SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_c_reactive_protein($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE c_reactive_protein SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_ca_one_five_three($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE ca_one_five_three SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_ca_one_two_five($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE ca_one_two_five SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_calcium_profile($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE calcium_profile SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_cardiac_enzyme($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE cardiac_enzyme SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_cd4_count($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE cd4_count SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_cea($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE cea SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_ckmb($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE ckmb SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_clotting_profile($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE clotting_profile SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_compact_chemistry($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE compact_chemistry SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_cortisol($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE cortisol SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_crp($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE crp SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_crp_ultra_sensitive($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE crp_ultra_sensitive SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_csf_biochem($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE csf_biochem SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_d_dimers($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE d_dimers SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_ear_swab_cs($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE ear_swab_cs SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_endocervical_swab_cs($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE endocervical_swab_cs SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_esr($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE esr SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_estrogen($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE estrogen SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_eye_swab_cs($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE eye_swab_cs SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_fbc_3p($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE fbc_3p SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_fbc_5p($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE fbc_5p SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_fbc_children($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE fbc_children SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_folate_b12($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE folate_b12 SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_general_chemistry($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE general_chemistry SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_h_pylori_ag($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE h_pylori_ag SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_h_pylori_ag_blood($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE h_pylori_ag_blood SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_h_pylori_ag_sob($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE h_pylori_ag_sob SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_hba1c($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE hba1c SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_hbv_viral_load($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE hbv_viral_load SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_hepatitis_b_profile($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE hepatitis_b_profile SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_hepatitis_markers($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE hepatitis_markers SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_hiv_viral_load($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE hiv_viral_load SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_hormonal_assay($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE hormonal_assay SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_hvs_cs($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE hvs_cs SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_hvs_re($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE hvs_re SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_hypersensitive_cpr($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE hypersensitive_cpr SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_iron_study($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE iron_study SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_ise($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE ise SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_lft($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE lft SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_lipid_profile($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE lipid_profile SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_m_alb($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE m_alb SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_mantoux($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE mantoux SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_ntc_screening($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE ntc_screening SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_pleural_fluid($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE pleural_fluid SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_pregnancy_test($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE pregnancy_test SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_protein_electrophoresis($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE protein_electrophoresis SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_psa($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE psa SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_pth($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE pth SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_pus_fluid($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE pus_fluid SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_reproductive_assay($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE reproductive_assay SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_rheumatology($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE rheumatology SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_sc3_sc4($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE sc3_sc4 SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_semen_analysis($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE semen_analysis SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_semen_cs($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE semen_cs SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_serum_hcg_b($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE serum_hcg_b SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_serum_lipase($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE serum_lipase SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_skin_snip($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE skin_snip SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_specials($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE specials SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_sputum($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE sputum SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_sputum_afb($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE sputum_afb SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_stock_cs($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE stock_cs SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_stool_re($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE stool_re SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_tft($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE tft SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_throat_swab_cs($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE throat_swab_cs SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_troponin($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE troponin SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_urethral_cs($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE urethral_cs SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_urine($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE urine SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_urine_acr($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE urine_acr SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_urine_cs($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE urine_cs SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_urine_re($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE urine_re SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_widal($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE widal SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_wound_cs($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE wound_cs SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

    }