<?php
    require_once 'conn.php';
    require_once 'methods.php';
    require_once 'charge.php';

	class HVS_RE {

        // create a hvs_re record
        public static function create_hvs_re($patient_id, $pus_cells_per_hps, $epitheleal_cells_per_hpf, $red_blood_cells, $yeast_like_cells, $t_vaginalis, $gnid, $comments, $added_by, $conn){
            $invoice_id       = Methods::get_invoice_id('HVS R/E', $conn);
            $amount           = Charge::read_charge('46', $conn);
            $red_blood_cells  = implode(', ', $red_blood_cells);
            $yeast_like_cells = implode(', ', $yeast_like_cells);
            $t_vaginalis      = implode(', ', $t_vaginalis);
            $gnid             = implode(', ', $gnid);

            try{
                $query = $conn->prepare('INSERT INTO hvs_re(invoice_id, patient_id, pus_cells_per_hps, epitheleal_cells_per_hpf, red_blood_cells, yeast_like_cells, t_vaginalis, gnid, comments, added_by)  VALUES(:invoice_id, :patient_id, :pus_cells_per_hps, :epitheleal_cells_per_hpf, :red_blood_cells, :yeast_like_cells, :t_vaginalis, :gnid, :comments, :added_by)');
                $query->execute([':invoice_id' => $invoice_id, ':patient_id' => $patient_id, ':pus_cells_per_hps' => $pus_cells_per_hps, ':epitheleal_cells_per_hpf' => $epitheleal_cells_per_hpf, ':red_blood_cells' => $red_blood_cells, ':yeast_like_cells' => $yeast_like_cells, ':t_vaginalis' => $t_vaginalis, ':gnid' => $gnid, ':comments' => $comments, ':added_by' => $added_by]);

                return true;
            }catch(PDOException $ex){
            	return false;
            }
        }

        // fetch all hvs_re records
        public static function read_hvs_re($conn){
            try{
                $query = $conn->prepare('SELECT hc.id, hc.invoice_id, hc.patient_id, hc.pus_cells_per_hps, hc.epitheleal_cells_per_hpf, hc.red_blood_cells, hc.yeast_like_cells, hc.t_vaginalis, hc.gnid, hc.comments, hc.added_by, hc.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM hvs_re hc INNER JOIN patients p ON hc.patient_id = p.patient_id INNER JOIN users u ON hc.added_by = u.staff_id');
                $query->execute();

                return $query->fetchAll(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // fetch a hvs_re record
        public static function read_a_hvs_re($id, $conn){
            try{
                $query = $conn->prepare('SELECT hc.id, hc.invoice_id, hc.patient_id, hc.pus_cells_per_hps, hc.epitheleal_cells_per_hpf, hc.red_blood_cells, hc.yeast_like_cells, hc.t_vaginalis, hc.gnid, hc.comments, hc.added_by, hc.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM hvs_re hc INNER JOIN patients p ON hc.patient_id = p.patient_id INNER JOIN users u ON hc.added_by = u.staff_id WHERE hc.id = :id');
                $query->execute([':id' => $id]);

                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // update a hvs_re record
        public static function update_hvs_re($id, $patient_id, $pus_cells_per_hps, $epitheleal_cells_per_hpf, $red_blood_cells, $yeast_like_cells, $t_vaginalis, $gnid, $comments, $conn) {
            $red_blood_cells  = implode(', ', $red_blood_cells);
            $yeast_like_cells = implode(', ', $yeast_like_cells);
            $t_vaginalis      = implode(', ', $t_vaginalis);
            $gnid             = implode(', ', $gnid);
            
            try{
                $query = $conn->prepare('UPDATE hvs_re SET patient_id = :patient_id, pus_cells_per_hps = :pus_cells_per_hps, epitheleal_cells_per_hpf = :epitheleal_cells_per_hpf, red_blood_cells = :red_blood_cells, yeast_like_cells = :yeast_like_cells, t_vaginalis = :t_vaginalis, gnid = :gnid, comments = :comments WHERE id = :id AND patient_id = :patient_id');
                $query->execute([':pus_cells_per_hps' => $pus_cells_per_hps, ':epitheleal_cells_per_hpf' => $epitheleal_cells_per_hpf, ':red_blood_cells' => $red_blood_cells, ':yeast_like_cells' => $yeast_like_cells, ':t_vaginalis' => $t_vaginalis, ':gnid' => $gnid, ':comments' => $comments, ':patient_id' => $patient_id, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

	}