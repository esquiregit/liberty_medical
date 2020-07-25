<?php
    require_once 'conn.php';
    require_once 'methods.php';
    require_once 'charge.php';

	class Widal {

        // create a widal record
        public static function create_widal($patient_id, $typhi_to, $typhi_th, $paratyphi_a_to, $paratyphi_a_th, $paratyphi_b_to, $paratyphi_b_th, $paratyphi_c_to, $paratyphi_c_th, $comments, $added_by, $conn){
            $invoice_id     = Methods::get_invoice_id('Widal', $conn);
            $amount         = Charge::read_charge('83', $conn);
            $typhi_to       = is_array($typhi_to) ? implode(', ', $typhi_to) : $typhi_to;
            $typhi_th       = is_array($typhi_th) ? implode(', ', $typhi_th) : $typhi_th;
            $paratyphi_a_to = is_array($paratyphi_a_to) ? implode(', ', $paratyphi_a_to) : $paratyphi_a_to;
            $paratyphi_a_th = is_array($paratyphi_a_th) ? implode(', ', $paratyphi_a_th) : $paratyphi_a_th;
            $paratyphi_b_to = is_array($paratyphi_b_to) ? implode(', ', $paratyphi_b_to) : $paratyphi_b_to;
            $paratyphi_b_th = is_array($paratyphi_b_th) ? implode(', ', $paratyphi_b_th) : $paratyphi_b_th;
            $paratyphi_c_to = is_array($paratyphi_c_to) ? implode(', ', $paratyphi_c_to) : $paratyphi_c_to;
            $paratyphi_c_th = is_array($paratyphi_c_th) ? implode(', ', $paratyphi_c_th) : $paratyphi_c_th;

            try{
                $query = $conn->prepare('INSERT INTO widal(invoice_id, patient_id, typhi_to, typhi_th, paratyphi_a_to, paratyphi_a_th, paratyphi_b_to, paratyphi_b_th, paratyphi_c_to, paratyphi_c_th, comments, added_by)  VALUES(:invoice_id, :patient_id, :typhi_to, :typhi_th, :paratyphi_a_to, :paratyphi_a_th, :paratyphi_b_to, :paratyphi_b_th, :paratyphi_c_to, :paratyphi_c_th, :comments, :added_by)');
                $query->execute([':invoice_id' => $invoice_id, ':patient_id' => $patient_id, ':typhi_to' => $typhi_to, ':typhi_th' => $typhi_th, ':paratyphi_a_to' => $paratyphi_a_to, ':paratyphi_a_th' => $paratyphi_a_th, ':paratyphi_b_to' => $paratyphi_b_to, ':paratyphi_b_th' => $paratyphi_b_th, ':paratyphi_c_to' => $paratyphi_c_to, ':paratyphi_c_th' => $paratyphi_c_th, ':comments' => $comments, ':added_by' => $added_by]);

                return true;
            }catch(PDOException $ex){
            	return false;
            }
        }

        // fetch all widal records
        public static function read_widal($conn){
            try{
                $query = $conn->prepare('SELECT w.id, w.invoice_id, w.patient_id, w.typhi_to, w.typhi_th, w.paratyphi_a_to, w.paratyphi_a_th, w.paratyphi_b_to, w.paratyphi_b_th, w.paratyphi_c_to, w.paratyphi_c_th, w.comments, w.added_by, w.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM widal w INNER JOIN patients p ON w.patient_id = p.patient_id INNER JOIN users u ON w.added_by = u.staff_id');
                $query->execute();

                return $query->fetchAll(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // fetch a widal record
        public static function read_a_widal($id, $conn){
            try{
                $query = $conn->prepare('SELECT w.id, w.invoice_id, w.patient_id, w.typhi_to, w.typhi_th, w.paratyphi_a_to, w.paratyphi_a_th, w.paratyphi_b_to, w.paratyphi_b_th, w.paratyphi_c_to, w.paratyphi_c_th, w.comments, w.added_by, w.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM widal w INNER JOIN patients p ON w.patient_id = p.patient_id INNER JOIN users u ON w.added_by = u.staff_id WHERE w.id = :id');
                $query->execute([':id' => $id]);

                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // update a widal record
        public static function update_widal($id, $patient_id, $typhi_to, $typhi_th, $paratyphi_a_to, $paratyphi_a_th, $paratyphi_b_to, $paratyphi_b_th, $paratyphi_c_to, $paratyphi_c_th, $comments, $conn) {
            $typhi_to       = is_array($typhi_to) ? implode(', ', $typhi_to) : $typhi_to;
            $typhi_th       = is_array($typhi_th) ? implode(', ', $typhi_th) : $typhi_th;
            $paratyphi_a_to = is_array($paratyphi_a_to) ? implode(', ', $paratyphi_a_to) : $paratyphi_a_to;
            $paratyphi_a_th = is_array($paratyphi_a_th) ? implode(', ', $paratyphi_a_th) : $paratyphi_a_th;
            $paratyphi_b_to = is_array($paratyphi_b_to) ? implode(', ', $paratyphi_b_to) : $paratyphi_b_to;
            $paratyphi_b_th = is_array($paratyphi_b_th) ? implode(', ', $paratyphi_b_th) : $paratyphi_b_th;
            $paratyphi_c_to = is_array($paratyphi_c_to) ? implode(', ', $paratyphi_c_to) : $paratyphi_c_to;
            $paratyphi_c_th = is_array($paratyphi_c_th) ? implode(', ', $paratyphi_c_th) : $paratyphi_c_th;

            try{
                $query = $conn->prepare('UPDATE widal SET patient_id = :patient_id, typhi_to = :typhi_to, typhi_th = :typhi_th, paratyphi_a_to = :paratyphi_a_to, paratyphi_a_th = :paratyphi_a_th, paratyphi_b_to = :paratyphi_b_to, paratyphi_b_th = :paratyphi_b_th, paratyphi_c_to = :paratyphi_c_to, paratyphi_c_th = :paratyphi_c_th, comments = :comments WHERE id = :id AND patient_id = :patient_id');
                $query->execute([':typhi_to' => $typhi_to, ':typhi_th' => $typhi_th, ':paratyphi_a_to' => $paratyphi_a_to, ':paratyphi_a_th' => $paratyphi_a_th, ':paratyphi_b_to' => $paratyphi_b_to, ':paratyphi_b_th' => $paratyphi_b_th, ':paratyphi_c_to' => $paratyphi_c_to, ':paratyphi_c_th' => $paratyphi_c_th, ':comments' => $comments, ':patient_id' => $patient_id, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

	}

?>