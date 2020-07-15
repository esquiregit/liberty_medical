<?php
    require_once 'conn.php';
    require_once 'methods.php';
    require_once 'charge.php';

	class BueCreatinineLFT {

        // create a bue_creatinine_lft record
        public static function create_bue_creatinine_lft($patient_id, $sodium, $sodium_flag, $potassium, $potassium_flag, $chloride, $chloride_flag, $urea, $urea_flag, $creatinine, $creatinine_flag, $egfr, $got_ast, $got_ast_flag, $gpt_alt, $gpt_alt_flag, $alkaline_phos, $alkaline_phos_flag, $ggt, $ggt_flag, $bilirubin_total, $bilirubin_total_flag, $bili_indirect, $bili_indirect_flag, $bilirubin_direct, $bilirubin_direct_flag, $protein_total, $protein_total_flag, $albumin, $albumin_flag, $globulin, $globulin_flag, $comments, $added_by, $conn){
            $invoice_id = Methods::get_invoice_id('BUE LFT', $conn);
            $amount     = Charge::read_charge('7', $conn);
            try{
                $query = $conn->prepare('INSERT INTO bue_creatinine_lft(invoice_id, patient_id, sodium, sodium_flag, potassium, potassium_flag, chloride, chloride_flag, urea, urea_flag, creatinine, creatinine_flag, egfr, got_ast, got_ast_flag, gpt_alt, gpt_alt_flag, alkaline_phos, alkaline_phos_flag, ggt, ggt_flag, bilirubin_total, bilirubin_total_flag, bili_indirect, bili_indirect_flag, bilirubin_direct, bilirubin_direct_flag, protein_total, protein_total_flag, albumin, albumin_flag, globulin, globulin_flag, comments, added_by) VALUES(:invoice_id, :patient_id, :sodium, :sodium_flag, :potassium, :potassium_flag, :chloride, :chloride_flag, :urea, :urea_flag, :creatinine, :creatinine_flag, :egfr, :got_ast, :got_ast_flag, :gpt_alt, :gpt_alt_flag, :alkaline_phos, :alkaline_phos_flag, :ggt, :ggt_flag, :bilirubin_total, :bilirubin_total_flag, :bili_indirect, :bili_indirect_flag, :bilirubin_direct, :bilirubin_direct_flag, :protein_total, :protein_total_flag, :albumin, :albumin_flag, :globulin, :globulin_flag, :comments, :added_by)');
                $query->execute([':invoice_id' => $invoice_id, ':patient_id' => $patient_id, ':sodium' => $sodium, ':sodium_flag' => $sodium_flag, ':potassium' => $potassium, ':potassium_flag' => $potassium_flag, ':chloride' => $chloride, ':chloride_flag' => $chloride_flag, ':urea' => $urea, ':urea_flag' => $urea_flag, ':creatinine' => $creatinine, ':creatinine_flag' => $creatinine_flag, ':egfr' => $egfr, ':got_ast' => $got_ast, ':got_ast_flag' => $got_ast_flag, ':gpt_alt' => $gpt_alt, ':gpt_alt_flag' => $gpt_alt_flag, ':alkaline_phos' => $alkaline_phos, ':alkaline_phos_flag' => $alkaline_phos_flag, ':ggt' => $ggt, ':ggt_flag' => $ggt_flag, ':bilirubin_total' => $bilirubin_total, ':bilirubin_total_flag' => $bilirubin_total_flag, ':bili_indirect' => $bili_indirect, ':bili_indirect_flag' => $bili_indirect_flag, ':bilirubin_direct' => $bilirubin_direct, ':bilirubin_direct_flag' => $bilirubin_direct_flag, ':protein_total' => $protein_total, ':protein_total_flag' => $protein_total_flag, ':albumin' => $albumin, ':albumin_flag' => $albumin_flag, ':globulin' => $globulin, ':globulin_flag' => $globulin_flag, ':comments' => $comments, ':added_by' => $added_by]);

                return true;
            }catch(PDOException $ex){
            	return false;
            }
        }

        // fetch all bue_creatinine_lft records
        public static function read_bue_creatinine_lfts($conn){
            try{
                $query = $conn->prepare('SELECT bcl.id, bcl.invoice_id, bcl.patient_id, bcl.sodium, bcl.sodium_flag, bcl.potassium, bcl.potassium_flag, bcl.chloride, bcl.chloride_flag, bcl.urea, bcl.urea_flag, bcl.creatinine, bcl.creatinine_flag, bcl.egfr, bcl.got_ast, bcl.got_ast_flag, bcl.gpt_alt, bcl.gpt_alt_flag, bcl.alkaline_phos, bcl.alkaline_phos_flag, bcl.ggt, bcl.ggt_flag, bcl.bilirubin_total, bcl.bilirubin_total_flag, bcl.bili_indirect, bcl.bili_indirect_flag, bcl.bilirubin_direct, bcl.bilirubin_direct_flag, bcl.protein_total, bcl.protein_total_flag, bcl.albumin, bcl.albumin_flag, bcl.globulin, bcl.globulin_flag, bcl.comments, bcl.added_by, bcl.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM bue_creatinine_lft bcl INNER JOIN patients p ON bcl.patient_id = p.patient_id INNER JOIN users u ON bcl.added_by = u.staff_id');
                $query->execute();

                return $query->fetchAll(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // fetch a bue_creatinine_lft record
        public static function read_bue_creatinine_lft($id, $conn){
            try{
                $query = $conn->prepare('SELECT bcl.id, bcl.invoice_id, bcl.patient_id, bcl.sodium, bcl.sodium_flag, bcl.potassium, bcl.potassium_flag, bcl.chloride, bcl.chloride_flag, bcl.urea, bcl.urea_flag, bcl.creatinine, bcl.creatinine_flag, bcl.egfr, bcl.got_ast, bcl.got_ast_flag, bcl.gpt_alt, bcl.gpt_alt_flag, bcl.alkaline_phos, bcl.alkaline_phos_flag, bcl.ggt, bcl.ggt_flag, bcl.bilirubin_total, bcl.bilirubin_total_flag, bcl.bili_indirect, bcl.bili_indirect_flag, bcl.bilirubin_direct, bcl.bilirubin_direct_flag, bcl.protein_total, bcl.protein_total_flag, bcl.albumin, bcl.albumin_flag, bcl.globulin, bcl.globulin_flag, bcl.comments, bcl.added_by, bcl.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM bue_creatinine_lft bcl INNER JOIN patients p ON bcl.patient_id = p.patient_id INNER JOIN users u ON bcl.added_by = u.staff_id WHERE bcl.id = :id');
                $query->execute([':id' => $id]);

                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // update a bue_creatinine_lft record
        public static function update_bue_creatinine_lft($id, $patient_id, $sodium, $sodium_flag, $potassium, $potassium_flag, $chloride, $chloride_flag, $urea, $urea_flag, $creatinine, $creatinine_flag, $egfr, $got_ast, $got_ast_flag, $gpt_alt, $gpt_alt_flag, $alkaline_phos, $alkaline_phos_flag, $ggt, $ggt_flag, $bilirubin_total, $bilirubin_total_flag, $bili_indirect, $bili_indirect_flag, $bilirubin_direct, $bilirubin_direct_flag, $protein_total, $protein_total_flag, $albumin, $albumin_flag, $globulin, $globulin_flag, $comments, $conn) {
            try{
                $query = $conn->prepare('UPDATE bue_creatinine_lft SET patient_id = :patient_id, sodium = :sodium, sodium_flag = :sodium_flag, potassium = :potassium, potassium_flag = :potassium_flag, chloride = :chloride, chloride_flag = :chloride_flag, urea = :urea, urea_flag = :urea_flag, creatinine = :creatinine, creatinine_flag = :creatinine_flag, egfr = :egfr, got_ast = :got_ast, got_ast_flag = :got_ast_flag, gpt_alt = :gpt_alt, gpt_alt_flag = :gpt_alt_flag, alkaline_phos = :alkaline_phos, alkaline_phos_flag = :alkaline_phos_flag, ggt = :ggt, ggt_flag = :ggt_flag, bilirubin_total = :bilirubin_total, bilirubin_total_flag = :bilirubin_total_flag, bili_indirect = :bili_indirect, bili_indirect_flag = :bili_indirect_flag, bilirubin_direct = :bilirubin_direct, bilirubin_direct_flag = :bilirubin_direct_flag, protein_total = :protein_total, protein_total_flag = :protein_total_flag, albumin = :albumin, albumin_flag = :albumin_flag, globulin = :globulin, globulin_flag = :globulin_flag, comments = :comments WHERE id = :id AND patient_id = :patient_id');
                $query->execute([':sodium' => $sodium, ':sodium_flag' => $sodium_flag, ':potassium' => $potassium, ':potassium_flag' => $potassium_flag, ':chloride' => $chloride, ':chloride_flag' => $chloride_flag, ':urea' => $urea, ':urea_flag' => $urea_flag, ':creatinine' => $creatinine, ':creatinine_flag' => $creatinine_flag, ':egfr' => $egfr, ':got_ast' => $got_ast, ':got_ast_flag' => $got_ast_flag, ':gpt_alt' => $gpt_alt, ':gpt_alt_flag' => $gpt_alt_flag, ':alkaline_phos' => $alkaline_phos, ':alkaline_phos_flag' => $alkaline_phos_flag, ':ggt' => $ggt, ':ggt_flag' => $ggt_flag, ':bilirubin_total' => $bilirubin_total, ':bilirubin_total_flag' => $bilirubin_total_flag, ':bili_indirect' => $bili_indirect, ':bili_indirect_flag' => $bili_indirect_flag, ':bilirubin_direct' => $bilirubin_direct, ':bilirubin_direct_flag' => $bilirubin_direct_flag, ':protein_total' => $protein_total, ':protein_total_flag' => $protein_total_flag, ':albumin' => $albumin, ':albumin_flag' => $albumin_flag, ':globulin' => $globulin, ':globulin_flag' => $globulin_flag, ':comments' => $comments, ':patient_id' => $patient_id, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

	}