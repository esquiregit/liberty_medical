<?php
    require_once 'conn.php';
    require_once 'methods.php';
    require_once 'charge.php';

	class Estrogen {

        // create a estrogen record
        public static function create_estrogen($patient_id, $follicular, $mid_cycle, $luteal, $pm, $amenorrhoea, $mem, $comments, $added_by, $conn){
            $invoice_id = Methods::get_invoice_id('Estrogen', $conn);
            $amount     = Charge::read_charge('30', $conn);
            try{
                $query = $conn->prepare('INSERT INTO estrogen(invoice_id, patient_id, follicular, mid_cycle, luteal, pm, amenorrhoea, mem, comments, added_by)  VALUES(:invoice_id, :patient_id, :follicular, :mid_cycle, :luteal, :pm, :amenorrhoea, :mem, :comments, :added_by)');
                $query->execute([':invoice_id' => $invoice_id, ':patient_id' => $patient_id, ':follicular' => $follicular, ':mid_cycle' => $mid_cycle, ':luteal' => $luteal, ':pm' => $pm, ':amenorrhoea' => $amenorrhoea, ':mem' => $mem, ':comments' => $comments, ':added_by' => $added_by]);

                return true;
            }catch(PDOException $ex){
            	return false;
            }
        }

        // fetch all estrogen records
        public static function read_estrogens($conn){
            try{
                $query = $conn->prepare('SELECT e.id, e.invoice_id, e.patient_id, e.follicular, e.mid_cycle, e.luteal, e.pm, e.amenorrhoea, e.mem, e.comments, e.added_by, e.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM estrogen e INNER JOIN patients p ON e.patient_id = p.patient_id INNER JOIN users u ON e.added_by = u.staff_id');
                $query->execute();

                return $query->fetchAll(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // fetch a estrogen record
        public static function read_estrogen($id, $conn){
            try{
                $query = $conn->prepare('SELECT e.id, e.invoice_id, e.patient_id, e.follicular, e.mid_cycle, e.luteal, e.pm, e.amenorrhoea, e.mem, e.comments, e.added_by, e.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM estrogen e INNER JOIN patients p ON e.patient_id = p.patient_id INNER JOIN users u ON e.added_by = u.staff_id WHERE e.id = :id');
                $query->execute([':id' => $id]);

                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // update a estrogen record
        public static function update_estrogen($id, $patient_id, $follicular, $mid_cycle, $luteal, $pm, $amenorrhoea, $mem, $comments, $added_by, $conn) {
            try{
                $query = $conn->prepare('UPDATE estrogen SET patient_id = :patient_id, follicular = :follicular, mid_cycle = :mid_cycle, luteal = :luteal, pm = :pm, amenorrhoea = :amenorrhoea, mem = :mem, comments = :comments WHERE id = :id AND patient_id = :patient_id');
                $query->execute([':follicular' => $follicular, ':mid_cycle' => $mid_cycle, ':luteal' => $luteal, ':pm' => $pm, ':amenorrhoea' => $amenorrhoea, ':mem' => $mem, ':comments' => $comments, ':patient_id' => $patient_id, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

	}