<?php
    require_once 'conn.php';
    require_once 'methods.php';
    require_once 'charge.php';

    class ISE {

        // create a ise record
        public static function create_ise($patient_id, $sodium, $sodium_flag, $potassium, $potassium_flag, $chloride, $chloride_flag, $carbon_dioxide, $added_by, $conn){
            $invoice_id = Methods::get_invoice_id('ISE', $conn);
            $amount     = Charge::read_charge('49', $conn);
            try{
                $query = $conn->prepare('INSERT INTO ise(invoice_id, patient_id, sodium, sodium_flag, potassium, potassium_flag, chloride, chloride_flag, carbon_dioxide, added_by)  VALUES(:invoice_id, :patient_id, :sodium, :sodium_flag, :potassium, :potassium_flag, :chloride, :chloride_flag, :carbon_dioxide, :added_by)');
                $query->execute([':invoice_id' => $invoice_id, ':patient_id' => $patient_id, ':sodium' => $sodium, ':sodium_flag' => $sodium_flag, ':potassium' => $potassium, ':potassium_flag' => $potassium_flag, ':chloride' => $chloride, ':chloride_flag' => $chloride_flag, ':carbon_dioxide' => $carbon_dioxide, ':added_by' => $added_by]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

        // fetch all ise records
        public static function read_ises($conn){
            try{
                $query = $conn->prepare('SELECT i.id, i.invoice_id, i.patient_id, i.sodium, i.sodium_flag, i.potassium, i.potassium_flag, i.chloride, i.chloride_flag, i.carbon_dioxide, i.added_by, i.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM ise i INNER JOIN patients p ON i.patient_id = p.patient_id INNER JOIN users u ON i.added_by = u.staff_id');
                $query->execute();

                return $query->fetchAll(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // fetch a ise record
        public static function read_ise($id, $conn){
            try{
                $query = $conn->prepare('SELECT i.id, i.invoice_id, i.patient_id, i.sodium, i.sodium_flag, i.potassium, i.potassium_flag, i.chloride, i.chloride_flag, i.carbon_dioxide, i.added_by, i.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM ise i INNER JOIN patients p ON i.patient_id = p.patient_id INNER JOIN users u ON i.added_by = u.staff_id WHERE i.id = :id');
                $query->execute([':id' => $id]);

                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // update a ise record
        public static function update_ise($id, $patient_id, $sodium, $sodium_flag, $potassium, $potassium_flag, $chloride, $chloride_flag, $carbon_dioxide, $added_by, $conn) {
            try{
                $query = $conn->prepare('UPDATE ise SET patient_id = :patient_id, sodium = :sodium, sodium_flag = :sodium_flag, potassium = :potassium, potassium_flag = :potassium_flag, chloride = :chloride, chloride_flag = :chloride_flag, carbon_dioxide = :carbon_dioxide WHERE id = :id AND patient_id = :patient_id');
                $query->execute([':sodium' => $sodium, ':sodium_flag' => $sodium_flag, ':potassium' => $potassium, ':potassium_flag' => $potassium_flag, ':chloride' => $chloride, ':chloride_flag' => $chloride_flag, ':carbon_dioxide' => $carbon_dioxide, ':patient_id' => $patient_id, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

    }