<?php
    require_once 'conn.php';
    require_once 'methods.php';
    require_once 'charge.php';

    class Sputum {

        // create a sputum record
        public static function create_sputum($patient_id, $appearance, $gram_stain, $pus_cells, $zn_stain, $culture, $bacteria_one, $bacteria_two, $antibiotics_one, $antibiotics_two, $antibiotics_three, $antibiotics_four, $antibiotics_five, $antibiotics_six, $antibiotics_seven, $antibiotics_eight, $antibiotics_nine, $antibiotics_ten, $antibiotics_eleven, $antibiotics_twelve, $antibiotics_thirteen, $antibiotics_fourteen, $antibiotics_fifteen, $antibiotics_sixteen, $sensitivity_one, $sensitivity_two, $sensitivity_three, $sensitivity_four, $sensitivity_five, $sensitivity_six, $sensitivity_seven, $sensitivity_eight, $sensitivity_nine, $sensitivity_ten, $sensitivity_eleven, $sensitivity_twelve, $sensitivity_thirteen, $sensitivity_fourteen, $sensitivity_fifteen, $sensitivity_sixteen, $comments, $added_by, $conn){
            $invoice_id           = Methods::get_invoice_id('Sputum C/S', $conn);
            $amount               = Charge::read_charge('72', $conn);
            $appearance               = is_array($appearance) ? implode(', ', $appearance) : $appearance;
            $gram_stain               = is_array($gram_stain) ? implode(', ', $gram_stain) : $gram_stain;
            $pus_cells                = is_array($pus_cells) ? implode(', ', $pus_cells) : $pus_cells;
            $zn_stain                 = is_array($zn_stain) ? implode(', ', $zn_stain) : $zn_stain;
            $culture                  = is_array($culture) ? implode(', ', $culture) : $culture;
            $bacteria_one             = is_array($bacteria_one) ? implode(', ', $bacteria_one) : $bacteria_one;
            $bacteria_two             = is_array($bacteria_two) ? implode(', ', $bacteria_two) : $bacteria_two;
            $antibiotics_one          = is_array($antibiotics_one) ? implode(', ', $antibiotics_one) : $antibiotics_one;
            $antibiotics_two          = is_array($antibiotics_two) ? implode(', ', $antibiotics_two) : $antibiotics_two;
            $antibiotics_three        = is_array($antibiotics_three) ? implode(', ', $antibiotics_three) : $antibiotics_three;
            $antibiotics_four         = is_array($antibiotics_four) ? implode(', ', $antibiotics_four) : $antibiotics_four;
            $antibiotics_five         = is_array($antibiotics_five) ? implode(', ', $antibiotics_five) : $antibiotics_five;
            $antibiotics_six          = is_array($antibiotics_six) ? implode(', ', $antibiotics_six) : $antibiotics_six;
            $antibiotics_seven        = is_array($antibiotics_seven) ? implode(', ', $antibiotics_seven) : $antibiotics_seven;
            $antibiotics_eight        = is_array($antibiotics_eight) ? implode(', ', $antibiotics_eight) : $antibiotics_eight;
            $antibiotics_nine         = is_array($antibiotics_nine) ? implode(', ', $antibiotics_nine) : $antibiotics_nine;
            $antibiotics_ten          = is_array($antibiotics_ten) ? implode(', ', $antibiotics_ten) : $antibiotics_ten;
            $antibiotics_eleven       = is_array($antibiotics_eleven) ? implode(', ', $antibiotics_eleven) : $antibiotics_eleven;
            $antibiotics_twelve       = is_array($antibiotics_twelve) ? implode(', ', $antibiotics_twelve) : $antibiotics_twelve;
            $antibiotics_thirteen     = is_array($antibiotics_thirteen) ? implode(', ', $antibiotics_thirteen) : $antibiotics_thirteen;
            $antibiotics_fourteen     = is_array($antibiotics_fourteen) ? implode(', ', $antibiotics_fourteen) : $antibiotics_fourteen;
            $antibiotics_fifteen      = is_array($antibiotics_fifteen) ? implode(', ', $antibiotics_fifteen) : $antibiotics_fifteen;
            $antibiotics_sixteen      = is_array($antibiotics_sixteen) ? implode(', ', $antibiotics_sixteen) : $antibiotics_sixteen;

            try{
                $query = $conn->prepare('INSERT INTO sputum(invoice_id, patient_id, appearance, gram_stain, pus_cells, zn_stain, culture, bacteria_one, bacteria_two, antibiotics_one, antibiotics_two, antibiotics_three, antibiotics_four, antibiotics_five, antibiotics_six, antibiotics_seven, antibiotics_eight, antibiotics_nine, antibiotics_ten, antibiotics_eleven, antibiotics_twelve, antibiotics_thirteen, antibiotics_fourteen, antibiotics_fifteen, antibiotics_sixteen, sensitivity_one, sensitivity_two, sensitivity_three, sensitivity_four, sensitivity_five, sensitivity_six, sensitivity_seven, sensitivity_eight, sensitivity_nine, sensitivity_ten, sensitivity_eleven, sensitivity_twelve, sensitivity_thirteen, sensitivity_fourteen, sensitivity_fifteen, sensitivity_sixteen, comments, added_by)  VALUES(:invoice_id, :patient_id, :appearance, :gram_stain, :pus_cells, :zn_stain, :culture, :bacteria_one, :bacteria_two, :antibiotics_one, :antibiotics_two, :antibiotics_three, :antibiotics_four, :antibiotics_five, :antibiotics_six, :antibiotics_seven, :antibiotics_eight, :antibiotics_nine, :antibiotics_ten, :antibiotics_eleven, :antibiotics_twelve, :antibiotics_thirteen, :antibiotics_fourteen, :antibiotics_fifteen, :antibiotics_sixteen, :sensitivity_one, :sensitivity_two, :sensitivity_three, :sensitivity_four, :sensitivity_five, :sensitivity_six, :sensitivity_seven, :sensitivity_eight, :sensitivity_nine, :sensitivity_ten, :sensitivity_eleven, :sensitivity_twelve, :sensitivity_thirteen, :sensitivity_fourteen, :sensitivity_fifteen, :sensitivity_sixteen, :comments, :added_by)');
                $query->execute([':invoice_id' => $invoice_id, ':patient_id' => $patient_id, ':appearance' => $appearance, ':gram_stain' => $gram_stain, ':pus_cells' => $pus_cells, ':zn_stain' => $zn_stain, ':culture' => $culture, ':bacteria_one' => $bacteria_one, ':bacteria_two' => $bacteria_two, ':antibiotics_one' => $antibiotics_one, ':antibiotics_two' => $antibiotics_two, ':antibiotics_three' => $antibiotics_three, ':antibiotics_four' => $antibiotics_four, ':antibiotics_five' => $antibiotics_five, ':antibiotics_six' => $antibiotics_six, ':antibiotics_seven' => $antibiotics_seven, ':antibiotics_eight' => $antibiotics_eight, ':antibiotics_nine' => $antibiotics_nine, ':antibiotics_ten' => $antibiotics_ten, ':antibiotics_eleven' => $antibiotics_eleven, ':antibiotics_twelve' => $antibiotics_twelve, ':antibiotics_thirteen' => $antibiotics_thirteen, ':antibiotics_fourteen' => $antibiotics_fourteen, ':antibiotics_fifteen' => $antibiotics_fifteen, ':antibiotics_sixteen' => $antibiotics_sixteen, ':sensitivity_one' => $sensitivity_one, ':sensitivity_two' => $sensitivity_two, ':sensitivity_three' => $sensitivity_three, ':sensitivity_four' => $sensitivity_four, ':sensitivity_five' => $sensitivity_five, ':sensitivity_six' => $sensitivity_six, ':sensitivity_seven' => $sensitivity_seven, ':sensitivity_eight' => $sensitivity_eight, ':sensitivity_nine' => $sensitivity_nine, ':sensitivity_ten' => $sensitivity_ten, ':sensitivity_eleven' => $sensitivity_eleven, ':sensitivity_twelve' => $sensitivity_twelve, ':sensitivity_thirteen' => $sensitivity_thirteen, ':sensitivity_fourteen' => $sensitivity_fourteen, ':sensitivity_fifteen' => $sensitivity_fifteen, ':sensitivity_sixteen' => $sensitivity_sixteen, ':comments' => $comments, ':added_by' => $added_by]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

        // fetch all sputum records
        public static function read_sputum($conn){
            try{
                $query = $conn->prepare('SELECT s.id, s.invoice_id, s.patient_id, s.appearance, s.gram_stain, s.pus_cells, s.zn_stain, s.culture, s.bacteria_one, s.bacteria_two, s.antibiotics_one, s.antibiotics_two, s.antibiotics_three, s.antibiotics_four, s.antibiotics_five, s.antibiotics_six, s.antibiotics_seven, s.antibiotics_eight, s.antibiotics_nine, s.antibiotics_ten, s.antibiotics_eleven, s.antibiotics_twelve, s.antibiotics_thirteen, s.antibiotics_fourteen, s.antibiotics_fifteen, s.antibiotics_sixteen, s.sensitivity_one, s.sensitivity_two, s.sensitivity_three, s.sensitivity_four, s.sensitivity_five, s.sensitivity_six, s.sensitivity_seven, s.sensitivity_eight, s.sensitivity_nine, s.sensitivity_ten, s.sensitivity_eleven, s.sensitivity_twelve, s.sensitivity_thirteen, s.sensitivity_fourteen, s.sensitivity_fifteen, s.sensitivity_sixteen, s.comments, s.added_by, s.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM sputum s INNER JOIN patients p ON s.patient_id = p.patient_id INNER JOIN users u ON s.added_by = u.staff_id');
                $query->execute();

                return $query->fetchAll(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // fetch a sputum record
        public static function read_a_sputum($id, $conn){
            try{
                $query = $conn->prepare('SELECT s.id, s.invoice_id, s.patient_id, s.appearance, s.gram_stain, s.pus_cells, s.zn_stain, s.culture, s.bacteria_one, s.bacteria_two, s.antibiotics_one, s.antibiotics_two, s.antibiotics_three, s.antibiotics_four, s.antibiotics_five, s.antibiotics_six, s.antibiotics_seven, s.antibiotics_eight, s.antibiotics_nine, s.antibiotics_ten, s.antibiotics_eleven, s.antibiotics_twelve, s.antibiotics_thirteen, s.antibiotics_fourteen, s.antibiotics_fifteen, s.antibiotics_sixteen, s.sensitivity_one, s.sensitivity_two, s.sensitivity_three, s.sensitivity_four, s.sensitivity_five, s.sensitivity_six, s.sensitivity_seven, s.sensitivity_eight, s.sensitivity_nine, s.sensitivity_ten, s.sensitivity_eleven, s.sensitivity_twelve, s.sensitivity_thirteen, s.sensitivity_fourteen, s.sensitivity_fifteen, s.sensitivity_sixteen, s.comments, s.added_by, s.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM sputum s INNER JOIN patients p ON s.patient_id = p.patient_id INNER JOIN users u ON s.added_by = u.staff_id WHERE s.id = :id');
                $query->execute([':id' => $id]);

                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // update a sputum record
        public static function update_sputum($id, $patient_id, $appearance, $gram_stain, $pus_cells, $zn_stain, $culture, $bacteria_one, $bacteria_two, $antibiotics_one, $antibiotics_two, $antibiotics_three, $antibiotics_four, $antibiotics_five, $antibiotics_six, $antibiotics_seven, $antibiotics_eight, $antibiotics_nine, $antibiotics_ten, $antibiotics_eleven, $antibiotics_twelve, $antibiotics_thirteen, $antibiotics_fourteen, $antibiotics_fifteen, $antibiotics_sixteen, $sensitivity_one, $sensitivity_two, $sensitivity_three, $sensitivity_four, $sensitivity_five, $sensitivity_six, $sensitivity_seven, $sensitivity_eight, $sensitivity_nine, $sensitivity_ten, $sensitivity_eleven, $sensitivity_twelve, $sensitivity_thirteen, $sensitivity_fourteen, $sensitivity_fifteen, $sensitivity_sixteen, $comments, $conn) {
            $appearance           = is_array($appearance) ? implode(', ', $appearance) : $appearance;
            $gram_stain           = is_array($gram_stain) ? implode(', ', $gram_stain) : $gram_stain;
            $pus_cells            = is_array($pus_cells) ? implode(', ', $pus_cells) : $pus_cells;
            $zn_stain             = is_array($zn_stain) ? implode(', ', $zn_stain) : $zn_stain;
            $culture              = is_array($culture) ? implode(', ', $culture) : $culture;
            $bacteria_one         = is_array($bacteria_one) ? implode(', ', $bacteria_one) : $bacteria_one;
            $bacteria_two         = is_array($bacteria_two) ? implode(', ', $bacteria_two) : $bacteria_two;
            $antibiotics_one      = is_array($antibiotics_one) ? implode(', ', $antibiotics_one) : $antibiotics_one;
            $antibiotics_two      = is_array($antibiotics_two) ? implode(', ', $antibiotics_two) : $antibiotics_two;
            $antibiotics_three    = is_array($antibiotics_three) ? implode(', ', $antibiotics_three) : $antibiotics_three;
            $antibiotics_four     = is_array($antibiotics_four) ? implode(', ', $antibiotics_four) : $antibiotics_four;
            $antibiotics_five     = is_array($antibiotics_five) ? implode(', ', $antibiotics_five) : $antibiotics_five;
            $antibiotics_six      = is_array($antibiotics_six) ? implode(', ', $antibiotics_six) : $antibiotics_six;
            $antibiotics_seven    = is_array($antibiotics_seven) ? implode(', ', $antibiotics_seven) : $antibiotics_seven;
            $antibiotics_eight    = is_array($antibiotics_eight) ? implode(', ', $antibiotics_eight) : $antibiotics_eight;
            $antibiotics_nine     = is_array($antibiotics_nine) ? implode(', ', $antibiotics_nine) : $antibiotics_nine;
            $antibiotics_ten      = is_array($antibiotics_ten) ? implode(', ', $antibiotics_ten) : $antibiotics_ten;
            $antibiotics_eleven   = is_array($antibiotics_eleven) ? implode(', ', $antibiotics_eleven) : $antibiotics_eleven;
            $antibiotics_twelve   = is_array($antibiotics_twelve) ? implode(', ', $antibiotics_twelve) : $antibiotics_twelve;
            $antibiotics_thirteen = is_array($antibiotics_thirteen) ? implode(', ', $antibiotics_thirteen) : $antibiotics_thirteen;
            $antibiotics_fourteen = is_array($antibiotics_fourteen) ? implode(', ', $antibiotics_fourteen) : $antibiotics_fourteen;
            $antibiotics_fifteen  = is_array($antibiotics_fifteen) ? implode(', ', $antibiotics_fifteen) : $antibiotics_fifteen;
            $antibiotics_sixteen  = is_array($antibiotics_sixteen) ? implode(', ', $antibiotics_sixteen) : $antibiotics_sixteen;

            try{
                $query = $conn->prepare('UPDATE sputum SET patient_id = :patient_id, appearance = :appearance, gram_stain = :gram_stain, pus_cells = :pus_cells, zn_stain = :zn_stain, culture = :culture, bacteria_one = :bacteria_one, bacteria_two = :bacteria_two, antibiotics_one = :antibiotics_one, antibiotics_two = :antibiotics_two, antibiotics_three = :antibiotics_three, antibiotics_four = :antibiotics_four, antibiotics_five = :antibiotics_five, antibiotics_six = :antibiotics_six, antibiotics_seven = :antibiotics_seven, antibiotics_eight = :antibiotics_eight, antibiotics_nine = :antibiotics_nine, antibiotics_ten = :antibiotics_ten, antibiotics_eleven = :antibiotics_eleven, antibiotics_twelve = :antibiotics_twelve, antibiotics_thirteen = :antibiotics_thirteen, antibiotics_fourteen = :antibiotics_fourteen, antibiotics_fifteen = :antibiotics_fifteen, antibiotics_sixteen = :antibiotics_sixteen, sensitivity_one = :sensitivity_one, sensitivity_two = :sensitivity_two, sensitivity_three = :sensitivity_three, sensitivity_four = :sensitivity_four, sensitivity_five = :sensitivity_five, sensitivity_six = :sensitivity_six, sensitivity_seven = :sensitivity_seven, sensitivity_eight = :sensitivity_eight, sensitivity_nine = :sensitivity_nine, sensitivity_ten = :sensitivity_ten, sensitivity_eleven = :sensitivity_eleven, sensitivity_twelve = :sensitivity_twelve, sensitivity_thirteen = :sensitivity_thirteen, sensitivity_fourteen = :sensitivity_fourteen, sensitivity_fifteen = :sensitivity_fifteen, sensitivity_sixteen = :sensitivity_sixteen, comments = :comments WHERE id = :id AND patient_id = :patient_id');
                $query->execute([':appearance' => $appearance, ':gram_stain' => $gram_stain, ':pus_cells' => $pus_cells, ':zn_stain' => $zn_stain, ':culture' => $culture, ':bacteria_one' => $bacteria_one, ':bacteria_two' => $bacteria_two, ':antibiotics_one' => $antibiotics_one, ':antibiotics_two' => $antibiotics_two, ':antibiotics_three' => $antibiotics_three, ':antibiotics_four' => $antibiotics_four, ':antibiotics_five' => $antibiotics_five, ':antibiotics_six' => $antibiotics_six, ':antibiotics_seven' => $antibiotics_seven, ':antibiotics_eight' => $antibiotics_eight, ':antibiotics_nine' => $antibiotics_nine, ':antibiotics_ten' => $antibiotics_ten, ':antibiotics_eleven' => $antibiotics_eleven, ':antibiotics_twelve' => $antibiotics_twelve, ':antibiotics_thirteen' => $antibiotics_thirteen, ':antibiotics_fourteen' => $antibiotics_fourteen, ':antibiotics_fifteen' => $antibiotics_fifteen, ':antibiotics_sixteen' => $antibiotics_sixteen, ':sensitivity_one' => $sensitivity_one, ':sensitivity_two' => $sensitivity_two, ':sensitivity_three' => $sensitivity_three, ':sensitivity_four' => $sensitivity_four, ':sensitivity_five' => $sensitivity_five, ':sensitivity_six' => $sensitivity_six, ':sensitivity_seven' => $sensitivity_seven, ':sensitivity_eight' => $sensitivity_eight, ':sensitivity_nine' => $sensitivity_nine, ':sensitivity_ten' => $sensitivity_ten, ':sensitivity_eleven' => $sensitivity_eleven, ':sensitivity_twelve' => $sensitivity_twelve, ':sensitivity_thirteen' => $sensitivity_thirteen, ':sensitivity_fourteen' => $sensitivity_fourteen, ':sensitivity_fifteen' => $sensitivity_fifteen, ':sensitivity_sixteen' => $sensitivity_sixteen, ':comments' => $comments, ':patient_id' => $patient_id, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

    }