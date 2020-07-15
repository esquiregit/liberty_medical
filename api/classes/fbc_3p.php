<?php
    require_once 'conn.php';
    require_once 'methods.php';
    require_once 'charge.php';

	class FBC_3P {

        // create a fbc_3p record
        public static function create_fbc_3p($patient_id, $wbc, $wbc_info, $lym, $lym_info, $mid, $mid_info, $gran, $gran_info, $lym_one, $lym_one_info, $mid_two, $mid_two_info, $gran_three, $gran_three_info, $rbc, $rbc_info, $hgb, $hgb_info, $hct, $hct_info, $mcv, $mcv_info, $mch, $mch_info, $mchc, $mchc_info, $rdw_cv, $rdw_cv_info, $rdw_sd, $rdw_sd_info, $plt, $plt_info, $mpv, $mpv_info, $pdw, $pdw_info, $pct, $pct_info, $sickling_test, $bf_mps, $esr, $blood_film_comment, $added_by, $conn){
            $invoice_id = Methods::get_invoice_id('FBC 3P', $conn);
            $amount     = Charge::read_charge('32', $conn);
            try{
                $query = $conn->prepare('INSERT INTO fbc_3p(invoice_id, patient_id, wbc, wbc_info, lym, lym_info, mid, mid_info, gran, gran_info, lym_one, lym_one_info, mid_two, mid_two_info, gran_three, gran_three_info, rbc, rbc_info, hgb, hgb_info, hct, hct_info, mcv, mcv_info, mch, mch_info, mchc, mchc_info, rdw_cv, rdw_cv_info, rdw_sd, rdw_sd_info, plt, plt_info, mpv, mpv_info, pdw, pdw_info, pct, pct_info, sickling_test, bf_mps, esr, blood_film_comment, added_by)  VALUES(:invoice_id, :patient_id, :wbc, :wbc_info, :lym, :lym_info, :mid, :mid_info, :gran, :gran_info, :lym_one, :lym_one_info, :mid_two, :mid_two_info, :gran_three, :gran_three_info, :rbc, :rbc_info, :hgb, :hgb_info, :hct, :hct_info, :mcv, :mcv_info, :mch, :mch_info, :mchc, :mchc_info, :rdw_cv, :rdw_cv_info, :rdw_sd, :rdw_sd_info, :plt, :plt_info, :mpv, :mpv_info, :pdw, :pdw_info, :pct, :pct_info, :sickling_test, :bf_mps, :esr, :blood_film_comment, :added_by)');
                $query->execute([':invoice_id' => $invoice_id, ':patient_id' => $patient_id, ':wbc' => $wbc, ':wbc_info' => $wbc_info, ':lym' => $lym, ':lym_info' => $lym_info, ':mid' => $mid, ':mid_info' => $mid_info, ':gran' => $gran, ':gran_info' => $gran_info, ':lym_one' => $lym_one, ':lym_one_info' => $lym_one_info, ':mid_two' => $mid_two, ':mid_two_info' => $mid_two_info, ':gran_three' => $gran_three, ':gran_three_info' => $gran_three_info, ':rbc' => $rbc, ':rbc_info' => $rbc_info, ':hgb' => $hgb, ':hgb_info' => $hgb_info, ':hct' => $hct, ':hct_info' => $hct_info, ':mcv' => $mcv, ':mcv_info' => $mcv_info, ':mch' => $mch, ':mch_info' => $mch_info, ':mchc' => $mchc, ':mchc_info' => $mchc_info, ':rdw_cv' => $rdw_cv, ':rdw_cv_info' => $rdw_cv_info, ':rdw_sd' => $rdw_sd, ':rdw_sd_info' => $rdw_sd_info, ':plt' => $plt, ':plt_info' => $plt_info, ':mpv' => $mpv, ':mpv_info' => $mpv_info, ':pdw' => $pdw, ':pdw_info' => $pdw_info, ':pct' => $pct, ':pct_info' => $pct_info, ':sickling_test' => $sickling_test, ':bf_mps' => $bf_mps, ':esr' => $esr, ':blood_film_comment' => $blood_film_comment, ':added_by' => $added_by]);

                return true;
            }catch(PDOException $ex){
            	return false;
            }
        }

        // fetch all fbc_3p records
        public static function read_fbc_3ps($conn){
            try{
                $query = $conn->prepare('SELECT fbc.id, fbc.invoice_id, fbc.patient_id, fbc.wbc, fbc.wbc_info, fbc.lym, fbc.lym_info, fbc.mid, fbc.mid_info, fbc.gran, fbc.gran_info, fbc.lym_one, fbc.lym_one_info, fbc.rbc, fbc.mid_two, fbc.mid_two_info, fbc.gran_three, fbc.gran_three_info, fbc.rbc, fbc.rbc_info, fbc.hgb, fbc.hgb_info, fbc.hct, fbc.hct_info, fbc.mcv, fbc.mcv_info, fbc.mch, fbc.mch_info, fbc.mchc, fbc.mchc_info, fbc.rdw_cv, fbc.rdw_cv_info, fbc.rdw_sd, fbc.rdw_sd_info, fbc.plt, fbc.plt_info, fbc.mpv, fbc.mpv_info, fbc.pdw, fbc.pdw_info, fbc.pct, fbc.pct_info, fbc.sickling_test, fbc.bf_mps, fbc.esr, fbc.blood_film_comment, fbc.added_by, fbc.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM fbc_3p fbc INNER JOIN patients p ON fbc.patient_id = p.patient_id INNER JOIN users u ON fbc.added_by = u.staff_id');
                $query->execute();

                return $query->fetchAll(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // fetch a fbc_3p record
        public static function read_fbc_3p($id, $conn){
            try{
                $query = $conn->prepare('SELECT fbc.id, fbc.invoice_id, fbc.patient_id, fbc.wbc, fbc.wbc_info, fbc.lym, fbc.lym_info, fbc.mid, fbc.mid_info, fbc.gran, fbc.gran_info, fbc.lym_one, fbc.lym_one_info, fbc.rbc, fbc.mid_two, fbc.mid_two_info, fbc.gran_three, fbc.gran_three_info, fbc.rbc, fbc.rbc_info, fbc.hgb, fbc.hgb_info, fbc.hct, fbc.hct_info, fbc.mcv, fbc.mcv_info, fbc.mch, fbc.mch_info, fbc.mchc, fbc.mchc_info, fbc.rdw_cv, fbc.rdw_cv_info, fbc.rdw_sd, fbc.rdw_sd_info, fbc.plt, fbc.plt_info, fbc.mpv, fbc.mpv_info, fbc.pdw, fbc.pdw_info, fbc.pct, fbc.pct_info, fbc.sickling_test, fbc.bf_mps, fbc.esr, fbc.blood_film_comment, fbc.added_by, fbc.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM fbc_3p fbc INNER JOIN patients p ON fbc.patient_id = p.patient_id INNER JOIN users u ON fbc.added_by = u.staff_id WHERE fbc.id = :id');
                $query->execute([':id' => $id]);

                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // update a fbc_3p record
        public static function update_fbc_3p($id, $patient_id, $wbc, $wbc_info, $lym, $lym_info, $mid, $mid_info, $gran, $gran_info, $lym_one, $lym_one_info, $mid_two, $mid_two_info, $gran_three, $gran_three_info, $rbc, $rbc_info, $hgb, $hgb_info, $hct, $hct_info, $mcv, $mcv_info, $mch, $mch_info, $mchc, $mchc_info, $rdw_cv, $rdw_cv_info, $rdw_sd, $rdw_sd_info, $plt, $plt_info, $mpv, $mpv_info, $pdw, $pdw_info, $pct, $pct_info, $sickling_test, $bf_mps, $esr, $blood_film_comment, $conn) {
            try{
                $query = $conn->prepare('UPDATE fbc_3p SET patient_id = :patient_id, wbc = :wbc, wbc_info = :wbc_info, lym = :lym, lym_info = :lym_info, mid = :mid, mid_info = :mid_info, gran = :gran, gran_info = :gran_info, lym_one = :lym_one, lym_one_info = :lym_one_info, rbc = :rbc, mid_two = :mid_two, mid_two_info = :mid_two_info, gran_three = :gran_three, gran_three_info = :gran_three_info, rbc = :rbc, rbc_info = :rbc_info, hgb = :hgb, hgb_info = :hgb_info, hct = :hct, hct_info = :hct_info, mcv = :mcv, mcv_info = :mcv_info, mch = :mch, mch_info = :mch_info, mchc = :mchc, mchc_info = :mchc_info, rdw_cv = :rdw_cv, rdw_cv_info = :rdw_cv_info, rdw_sd = :rdw_sd, rdw_sd_info = :rdw_sd_info, plt = :plt, plt_info = :plt_info, mpv = :mpv, mpv_info = :mpv_info, pdw = :pdw, pdw_info = :pdw_info, pct = :pct, pct_info = :pct_info, sickling_test = :sickling_test, bf_mps = :bf_mps, esr = :esr, blood_film_comment = :blood_film_comment WHERE id = :id AND patient_id = :patient_id');
                $query->execute([':wbc' => $wbc, ':wbc_info' => $wbc_info, ':lym' => $lym, ':lym_info' => $lym_info, ':mid' => $mid, ':mid_info' => $mid_info, ':gran' => $gran, ':gran_info' => $gran_info, ':lym_one' => $lym_one, ':lym_one_info' => $lym_one_info, ':mid_two' => $mid_two, ':mid_two_info' => $mid_two_info, ':gran_three' => $gran_three, ':gran_three_info' => $gran_three_info, ':rbc' => $rbc, ':rbc_info' => $rbc_info, ':hgb' => $hgb, ':hgb_info' => $hgb_info, ':hct' => $hct, ':hct_info' => $hct_info, ':mcv' => $mcv, ':mcv_info' => $mcv_info, ':mch' => $mch, ':mch_info' => $mch_info, ':mchc' => $mchc, ':mchc_info' => $mchc_info, ':rdw_cv' => $rdw_cv, ':rdw_cv_info' => $rdw_cv_info, ':rdw_sd' => $rdw_sd, ':rdw_sd_info' => $rdw_sd_info, ':plt' => $plt, ':plt_info' => $plt_info, ':mpv' => $mpv, ':mpv_info' => $mpv_info, ':pdw' => $pdw, ':pdw_info' => $pdw_info, ':pct' => $pct, ':pct_info' => $pct_info, ':sickling_test' => $sickling_test, ':bf_mps' => $bf_mps, ':esr' => $esr, ':blood_film_comment' => $blood_film_comment, ':patient_id' => $patient_id, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

	}