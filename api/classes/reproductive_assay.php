<?php
    require_once 'conn.php';
    require_once 'methods.php';
    require_once 'charge.php';

	class ReproductiveAssay {

        // create a reproductive_assay record
        public static function create_reproductive_assay($patient_id, $lh, $fsh, $prolactive, $progesterone, $oestrogen, $testosterone, $comments, $added_by, $conn){
            $invoice_id = Methods::get_invoice_id('Reproductive Assay', $conn);
            $amount     = Charge::read_charge('62', $conn);
            try{
                $query = $conn->prepare('INSERT INTO reproductive_assay(invoice_id, patient_id, lh, fsh, prolactive, progesterone, oestrogen, testosterone, comments, added_by)  VALUES(:invoice_id, :patient_id, :lh, :fsh, :prolactive, :progesterone, :oestrogen, :testosterone, :comments, :added_by)');
                $query->execute([':invoice_id' => $invoice_id, ':patient_id' => $patient_id, ':lh' => $lh, ':fsh' => $fsh, ':prolactive' => $prolactive, ':progesterone' => $progesterone, ':oestrogen' => $oestrogen, ':testosterone' => $testosterone, ':comments' => $comments, ':added_by' => $added_by]);

                return true;
            }catch(PDOException $ex){
            	return false;
            }
        }

        // fetch all reproductive_assay records
        public static function read_reproductive_assays($conn){
            try{
                $query = $conn->prepare('SELECT ra.id, ra.invoice_id, ra.patient_id, ra.lh, ra.fsh, ra.prolactive, ra.progesterone, ra.oestrogen, ra.testosterone, ra.comments, ra.added_by, ra.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM reproductive_assay ra INNER JOIN patients p ON ra.patient_id = p.patient_id INNER JOIN users u ON ra.added_by = u.staff_id');
                $query->execute();

                return $query->fetchAll(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // fetch a reproductive_assay record
        public static function read_reproductive_assay($id, $conn){
            try{
                $query = $conn->prepare('SELECT ra.id, ra.invoice_id, ra.patient_id, ra.lh, ra.fsh, ra.prolactive, ra.progesterone, ra.oestrogen, ra.testosterone, ra.comments, ra.added_by, ra.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM reproductive_assay ra INNER JOIN patients p ON ra.patient_id = p.patient_id INNER JOIN users u ON ra.added_by = u.staff_id WHERE ra.id = :id');
                $query->execute([':id' => $id]);

                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // update a reproductive_assay record
        public static function update_reproductive_assay($id, $patient_id, $lh, $fsh, $prolactive, $progesterone, $oestrogen, $testosterone, $comments, $added_by, $conn) {
            try{
                $query = $conn->prepare('UPDATE reproductive_assay SET patient_id = :patient_id, lh = :lh, fsh = :fsh, prolactive = :prolactive, progesterone = :progesterone, oestrogen = :oestrogen, testosterone = :testosterone, comments = :comments WHERE id = :id AND patient_id = :patient_id');
                $query->execute([':lh' => $lh, ':fsh' => $fsh, ':prolactive' => $prolactive, ':progesterone' => $progesterone, ':oestrogen' => $oestrogen, ':testosterone' => $testosterone, ':comments' => $comments, ':patient_id' => $patient_id, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

	}