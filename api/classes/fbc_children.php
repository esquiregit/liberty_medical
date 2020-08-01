<?php
    require_once 'conn.php';
    require_once 'methods.php';
    require_once 'charge.php';

	class FBC_Children {

        // create a fbc_children record
        public static function create_fbc_children($patient_id, $wbc, $wbc_flag, $lym, $lym_flag, $mid, $mid_flag, $gran, $gran_flag, $lym_one, $lym_one_flag, $mid_two, $mid_two_flag, $gran_three, $gran_three_flag, $rbc, $rbc_flag, $hgb, $hgb_flag, $hct, $hct_flag, $mcv, $mcv_flag, $mch, $mch_flag, $mchc, $mchc_flag, $rdw_cv, $rdw_cv_flag, $rdw_sd, $rdw_sd_flag, $plt, $plt_flag, $mpv, $mpv_flag, $pdw, $pdw_flag, $pct, $pct_flag, $sickling_test, $bf_mps, $esr, $blood_film_comment, $added_by, $conn){
            $invoice_id = Methods::get_invoice_id('FBC Children', $conn);
            $amount     = Charge::read_charge('34', $conn);
            try{
                $query = $conn->prepare('INSERT INTO fbc_children(invoice_id, patient_id, wbc, wbc_flag, lym, lym_flag, mid, mid_flag, gran, gran_flag, lym_one, lym_one_flag, mid_two, mid_two_flag, gran_three, gran_three_flag, rbc, rbc_flag, hgb, hgb_flag, hct, hct_flag, mcv, mcv_flag, mch, mch_flag, mchc, mchc_flag, rdw_cv, rdw_cv_flag, rdw_sd, rdw_sd_flag, plt, plt_flag, mpv, mpv_flag, pdw, pdw_flag, pct, pct_flag, sickling_test, bf_mps, esr, blood_film_comment, added_by)  VALUES(:invoice_id, :patient_id, :wbc, :wbc_flag, :lym, :lym_flag, :mid, :mid_flag, :gran, :gran_flag, :lym_one, :lym_one_flag, :mid_two, :mid_two_flag, :gran_three, :gran_three_flag, :rbc, :rbc_flag, :hgb, :hgb_flag, :hct, :hct_flag, :mcv, :mcv_flag, :mch, :mch_flag, :mchc, :mchc_flag, :rdw_cv, :rdw_cv_flag, :rdw_sd, :rdw_sd_flag, :plt, :plt_flag, :mpv, :mpv_flag, :pdw, :pdw_flag, :pct, :pct_flag, :sickling_test, :bf_mps, :esr, :blood_film_comment, :added_by)');
                $query->execute([':invoice_id' => $invoice_id, ':patient_id' => $patient_id, ':wbc' => $wbc, ':wbc_flag' => $wbc_flag, ':lym' => $lym, ':lym_flag' => $lym_flag, ':mid' => $mid, ':mid_flag' => $mid_flag, ':gran' => $gran, ':gran_flag' => $gran_flag, ':lym_one' => $lym_one, ':lym_one_flag' => $lym_one_flag, ':mid_two' => $mid_two, ':mid_two_flag' => $mid_two_flag, ':gran_three' => $gran_three, ':gran_three_flag' => $gran_three_flag, ':rbc' => $rbc, ':rbc_flag' => $rbc_flag, ':hgb' => $hgb, ':hgb_flag' => $hgb_flag, ':hct' => $hct, ':hct_flag' => $hct_flag, ':mcv' => $mcv, ':mcv_flag' => $mcv_flag, ':mch' => $mch, ':mch_flag' => $mch_flag, ':mchc' => $mchc, ':mchc_flag' => $mchc_flag, ':rdw_cv' => $rdw_cv, ':rdw_cv_flag' => $rdw_cv_flag, ':rdw_sd' => $rdw_sd, ':rdw_sd_flag' => $rdw_sd_flag, ':plt' => $plt, ':plt_flag' => $plt_flag, ':mpv' => $mpv, ':mpv_flag' => $mpv_flag, ':pdw' => $pdw, ':pdw_flag' => $pdw_flag, ':pct' => $pct, ':pct_flag' => $pct_flag, ':sickling_test' => $sickling_test, ':bf_mps' => $bf_mps, ':esr' => $esr, ':blood_film_comment' => $blood_film_comment, ':added_by' => $added_by]);

                return true;
            }catch(PDOException $ex){
            	return false;
            }
        }

        // fetch all fbc_children records
        public static function read_fbc_childrens($conn){
            try{
                $query = $conn->prepare('SELECT fbc.id, fbc.invoice_id, fbc.patient_id, fbc.wbc, fbc.wbc_flag, fbc.lym, fbc.lym_flag, fbc.mid, fbc.mid_flag, fbc.gran, fbc.gran_flag, fbc.lym_one, fbc.lym_one_flag, fbc.rbc, fbc.mid_two, fbc.mid_two_flag, fbc.gran_three, fbc.gran_three_flag, fbc.rbc, fbc.rbc_flag, fbc.hgb, fbc.hgb_flag, fbc.hct, fbc.hct_flag, fbc.mcv, fbc.mcv_flag, fbc.mch, fbc.mch_flag, fbc.mchc, fbc.mchc_flag, fbc.rdw_cv, fbc.rdw_cv_flag, fbc.rdw_sd, fbc.rdw_sd_flag, fbc.plt, fbc.plt_flag, fbc.mpv, fbc.mpv_flag, fbc.pdw, fbc.pdw_flag, fbc.pct, fbc.pct_flag, fbc.sickling_test, fbc.bf_mps, fbc.esr, fbc.blood_film_comment, fbc.added_by, fbc.date_added, p.gender, p.date_of_birth, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM fbc_children fbc INNER JOIN patients p ON fbc.patient_id = p.patient_id INNER JOIN users u ON fbc.added_by = u.staff_id');
                $query->execute();

                return $query->fetchAll(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // fetch a fbc_children record
        public static function read_fbc_children($id, $conn){
            try{
                $query = $conn->prepare('SELECT fbc.id, fbc.invoice_id, fbc.patient_id, fbc.wbc, fbc.wbc_flag, fbc.lym, fbc.lym_flag, fbc.mid, fbc.mid_flag, fbc.gran, fbc.gran_flag, fbc.lym_one, fbc.lym_one_flag, fbc.rbc, fbc.mid_two, fbc.mid_two_flag, fbc.gran_three, fbc.gran_three_flag, fbc.rbc, fbc.rbc_flag, fbc.hgb, fbc.hgb_flag, fbc.hct, fbc.hct_flag, fbc.mcv, fbc.mcv_flag, fbc.mch, fbc.mch_flag, fbc.mchc, fbc.mchc_flag, fbc.rdw_cv, fbc.rdw_cv_flag, fbc.rdw_sd, fbc.rdw_sd_flag, fbc.plt, fbc.plt_flag, fbc.mpv, fbc.mpv_flag, fbc.pdw, fbc.pdw_flag, fbc.pct, fbc.pct_flag, fbc.sickling_test, fbc.bf_mps, fbc.esr, fbc.blood_film_comment, fbc.added_by, fbc.date_added, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM fbc_children fbc INNER JOIN patients p ON fbc.patient_id = p.patient_id INNER JOIN users u ON fbc.added_by = u.staff_id WHERE fbc.id = :id');
                $query->execute([':id' => $id]);

                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // update a fbc_children record
        public static function update_fbc_children($id, $patient_id, $wbc, $wbc_flag, $lym, $lym_flag, $mid, $mid_flag, $gran, $gran_flag, $lym_one, $lym_one_flag, $mid_two, $mid_two_flag, $gran_three, $gran_three_flag, $rbc, $rbc_flag, $hgb, $hgb_flag, $hct, $hct_flag, $mcv, $mcv_flag, $mch, $mch_flag, $mchc, $mchc_flag, $rdw_cv, $rdw_cv_flag, $rdw_sd, $rdw_sd_flag, $plt, $plt_flag, $mpv, $mpv_flag, $pdw, $pdw_flag, $pct, $pct_flag, $sickling_test, $bf_mps, $esr, $blood_film_comment, $conn) {
            try{
                $query = $conn->prepare('UPDATE fbc_children SET patient_id = :patient_id, wbc = :wbc, wbc_flag = :wbc_flag, lym = :lym, lym_flag = :lym_flag, mid = :mid, mid_flag = :mid_flag, gran = :gran, gran_flag = :gran_flag, lym_one = :lym_one, lym_one_flag = :lym_one_flag, rbc = :rbc, mid_two = :mid_two, mid_two_flag = :mid_two_flag, gran_three = :gran_three, gran_three_flag = :gran_three_flag, rbc = :rbc, rbc_flag = :rbc_flag, hgb = :hgb, hgb_flag = :hgb_flag, hct = :hct, hct_flag = :hct_flag, mcv = :mcv, mcv_flag = :mcv_flag, mch = :mch, mch_flag = :mch_flag, mchc = :mchc, mchc_flag = :mchc_flag, rdw_cv = :rdw_cv, rdw_cv_flag = :rdw_cv_flag, rdw_sd = :rdw_sd, rdw_sd_flag = :rdw_sd_flag, plt = :plt, plt_flag = :plt_flag, mpv = :mpv, mpv_flag = :mpv_flag, pdw = :pdw, pdw_flag = :pdw_flag, pct = :pct, pct_flag = :pct_flag, sickling_test = :sickling_test, bf_mps = :bf_mps, esr = :esr, blood_film_comment = :blood_film_comment WHERE id = :id AND patient_id = :patient_id');
                $query->execute([':wbc' => $wbc, ':wbc_flag' => $wbc_flag, ':lym' => $lym, ':lym_flag' => $lym_flag, ':mid' => $mid, ':mid_flag' => $mid_flag, ':gran' => $gran, ':gran_flag' => $gran_flag, ':lym_one' => $lym_one, ':lym_one_flag' => $lym_one_flag, ':mid_two' => $mid_two, ':mid_two_flag' => $mid_two_flag, ':gran_three' => $gran_three, ':gran_three_flag' => $gran_three_flag, ':rbc' => $rbc, ':rbc_flag' => $rbc_flag, ':hgb' => $hgb, ':hgb_flag' => $hgb_flag, ':hct' => $hct, ':hct_flag' => $hct_flag, ':mcv' => $mcv, ':mcv_flag' => $mcv_flag, ':mch' => $mch, ':mch_flag' => $mch_flag, ':mchc' => $mchc, ':mchc_flag' => $mchc_flag, ':rdw_cv' => $rdw_cv, ':rdw_cv_flag' => $rdw_cv_flag, ':rdw_sd' => $rdw_sd, ':rdw_sd_flag' => $rdw_sd_flag, ':plt' => $plt, ':plt_flag' => $plt_flag, ':mpv' => $mpv, ':mpv_flag' => $mpv_flag, ':pdw' => $pdw, ':pdw_flag' => $pdw_flag, ':pct' => $pct, ':pct_flag' => $pct_flag, ':sickling_test' => $sickling_test, ':bf_mps' => $bf_mps, ':esr' => $esr, ':blood_film_comment' => $blood_film_comment, ':patient_id' => $patient_id, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

	}