<?php
    require_once 'conn.php';
    require_once 'methods.php';
    require_once 'charge.php';

	class LFT {

        // create a lft record
        public static function create_lft($patient_id, $got_ast, $got_ast_flag, $gpt_alt, $gpt_alt_flag, $alkaline_phos, $alkaline_phos_flag, $ggt, $ggt_flag, $bilirubin_total, $bilirubin_total_flag, $bili_indirect, $bili_indirect_flag, $bilirubin_direct, $bilirubin_direct_flag, $protein_total, $protein_total_flag, $albumin, $albumin_flag, $globulin, $globulin_flag, $comments, $added_by, $conn){
            $invoice_id = Methods::get_invoice_id('LFT', $conn);
            $amount     = Charge::read_charge('51', $conn);
            try{
                $query = $conn->prepare('INSERT INTO lft(invoice_id, patient_id, got_ast, got_ast_flag, gpt_alt, gpt_alt_flag, alkaline_phos, alkaline_phos_flag, ggt, ggt_flag, bilirubin_total, bilirubin_total_flag, bili_indirect, bili_indirect_flag, bilirubin_direct, bilirubin_direct_flag, protein_total, protein_total_flag, albumin, albumin_flag, globulin, globulin_flag, comments, added_by)  VALUES(:invoice_id, :patient_id, :got_ast, :got_ast_flag, :gpt_alt, :gpt_alt_flag, :alkaline_phos, :alkaline_phos_flag, :ggt, :ggt_flag, :bilirubin_total, :bilirubin_total_flag, :bili_indirect, :bili_indirect_flag, :bilirubin_direct, :bilirubin_direct_flag, :protein_total, :protein_total_flag, :albumin, :albumin_flag, :globulin, :globulin_flag, :comments, :added_by)');
                $query->execute([':invoice_id' => $invoice_id, ':patient_id' => $patient_id, ':got_ast' => $got_ast, ':got_ast_flag' => $got_ast_flag, ':gpt_alt' => $gpt_alt, ':gpt_alt_flag' => $gpt_alt_flag, ':alkaline_phos' => $alkaline_phos, ':alkaline_phos_flag' => $alkaline_phos_flag, ':ggt' => $ggt, ':ggt_flag' => $ggt_flag, ':bilirubin_total' => $bilirubin_total, ':bilirubin_total_flag' => $bilirubin_total_flag, ':bili_indirect' => $bili_indirect, ':bili_indirect_flag' => $bili_indirect_flag, ':bilirubin_direct' => $bilirubin_direct, ':bilirubin_direct_flag' => $bilirubin_direct_flag, ':protein_total' => $protein_total, ':protein_total_flag' => $protein_total_flag, ':albumin' => $albumin, ':albumin_flag' => $albumin_flag, ':globulin' => $globulin, ':globulin_flag' => $globulin_flag, ':comments' => $comments, ':added_by' => $added_by]);

                return true;
            }catch(PDOException $ex){
            	return false;
            }
        }

        // fetch all lft records
        public static function read_lfts($conn){
            try{
                $query = $conn->prepare('SELECT l.id, l.invoice_id, l.patient_id, l.got_ast, l.got_ast_flag, l.gpt_alt, l.gpt_alt_flag, l.alkaline_phos, l.alkaline_phos_flag, l.ggt, l.ggt_flag, l.bilirubin_total, l.bilirubin_total_flag, l.bili_indirect, l.bili_indirect_flag, l.bilirubin_direct, l.bilirubin_direct_flag, l.protein_total, l.protein_total_flag, l.albumin, l.albumin_flag, l.globulin, l.globulin_flag, l.comments, l.added_by, l.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM lft l INNER JOIN patients p ON l.patient_id = p.patient_id INNER JOIN users u ON l.added_by = u.staff_id');
                $query->execute();

                return $query->fetchAll(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // fetch a lft record
        public static function read_lft($id, $conn){
            try{
                $query = $conn->prepare('SELECT l.id, l.invoice_id, l.patient_id, l.got_ast, l.got_ast_flag, l.gpt_alt, l.gpt_alt_flag, l.alkaline_phos, l.alkaline_phos_flag, l.ggt, l.ggt_flag, l.bilirubin_total, l.bilirubin_total_flag, l.bili_indirect, l.bili_indirect_flag, l.bilirubin_direct, l.bilirubin_direct_flag, l.protein_total, l.protein_total_flag, l.albumin, l.albumin_flag, l.globulin, l.globulin_flag, l.comments, l.added_by, l.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM lft l INNER JOIN patients p ON l.patient_id = p.patient_id INNER JOIN users u ON l.added_by = u.staff_id WHERE l.id = :id');
                $query->execute([':id' => $id]);

                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // update a lft record
        public static function update_lft($id, $patient_id, $got_ast, $got_ast_flag, $gpt_alt, $gpt_alt_flag, $alkaline_phos, $alkaline_phos_flag, $ggt, $ggt_flag, $bilirubin_total, $bilirubin_total_flag, $bili_indirect, $bili_indirect_flag, $bilirubin_direct, $bilirubin_direct_flag, $protein_total, $protein_total_flag, $albumin, $albumin_flag, $globulin, $globulin_flag, $comments, $added_by, $conn) {
            try{
                $query = $conn->prepare('UPDATE lft SET patient_id = :patient_id, got_ast = :got_ast, got_ast_flag = :got_ast_flag, gpt_alt = :gpt_alt, gpt_alt_flag = :gpt_alt_flag, alkaline_phos = :alkaline_phos, alkaline_phos_flag = :alkaline_phos_flag, ggt = :ggt, ggt_flag = :ggt_flag, bilirubin_total = :bilirubin_total, bilirubin_total_flag = :bilirubin_total_flag, bili_indirect = :bili_indirect, bili_indirect_flag = :bili_indirect_flag, bilirubin_direct = :bilirubin_direct, bilirubin_direct_flag = :bilirubin_direct_flag, protein_total = :protein_total, protein_total_flag = :protein_total_flag, albumin = :albumin, albumin_flag = :albumin_flag, globulin = :globulin, globulin_flag = :globulin_flag, comments = :comments WHERE id = :id AND patient_id = :patient_id');
                $query->execute([':got_ast' => $got_ast, ':got_ast_flag' => $got_ast_flag, ':gpt_alt' => $gpt_alt, ':gpt_alt_flag' => $gpt_alt_flag, ':alkaline_phos' => $alkaline_phos, ':alkaline_phos_flag' => $alkaline_phos_flag, ':ggt' => $ggt, ':ggt_flag' => $ggt_flag, ':bilirubin_total' => $bilirubin_total, ':bilirubin_total_flag' => $bilirubin_total_flag, ':bili_indirect' => $bili_indirect, ':bili_indirect_flag' => $bili_indirect_flag, ':bilirubin_direct' => $bilirubin_direct, ':bilirubin_direct_flag' => $bilirubin_direct_flag, ':protein_total' => $protein_total, ':protein_total_flag' => $protein_total_flag, ':albumin' => $albumin, ':albumin_flag' => $albumin_flag, ':globulin' => $globulin, ':globulin_flag' => $globulin_flag, ':comments' => $comments, ':patient_id' => $patient_id, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

	}