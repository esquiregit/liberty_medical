<?php
    require_once 'conn.php';
    require_once 'methods.php';
    require_once 'charge.php';

    class PusFluid {

        // create a pus_fluid record
        public static function create_pus_fluid($patient_id, $colour, $appearance, $gram_stain, $acid_fast_bacilli, $culture, $bacteria_one, $bacteria_two, $bacteria_three, $antibiotics_one, $antibiotics_two, $antibiotics_three, $antibiotics_four, $antibiotics_five, $antibiotics_six, $antibiotics_seven, $antibiotics_eight, $antibiotics_nine, $antibiotics_ten, $antibiotics_eleven, $antibiotics_twelve, $antibiotics_thirteen, $antibiotics_fourteen, $antibiotics_fifteen, $antibiotics_sixteen, $antibiotics_seventeen, $antibiotics_eighteen, $antibiotics_nineteen, $antibiotics_twenty, $antibiotics_twenty_one, $antibiotics_twenty_two, $antibiotics_twenty_three, $antibiotics_twenty_four, $sensitivity_one, $sensitivity_two, $sensitivity_three, $sensitivity_four, $sensitivity_five, $sensitivity_six, $sensitivity_seven, $sensitivity_eight, $sensitivity_nine, $sensitivity_ten, $sensitivity_eleven, $sensitivity_twelve, $sensitivity_thirteen, $sensitivity_fourteen, $sensitivity_fifteen, $sensitivity_sixteen, $sensitivity_seventeen, $sensitivity_eighteen, $sensitivity_nineteen, $sensitivity_twenty, $sensitivity_twenty_one, $sensitivity_twenty_two, $sensitivity_twenty_three, $sensitivity_twenty_four, $comments, $added_by, $conn){
            $invoice_id               = Methods::get_invoice_id('Pus Fluid', $conn);
            $amount                   = Charge::read_charge('61', $conn);
            $colour                   = implode(', ', $colour);
            $bacteria_one             = implode(', ', $bacteria_one);
            $bacteria_two             = implode(', ', $bacteria_two);
            $bacteria_three           = implode(', ', $bacteria_three);
            $appearance               = implode(', ', $appearance);
            $gram_stain               = implode(', ', $gram_stain);
            $culture                  = implode(', ', $culture);
            $antibiotics_one          = implode(', ', $antibiotics_one);
            $antibiotics_two          = implode(', ', $antibiotics_two);
            $antibiotics_three        = implode(', ', $antibiotics_three);
            $antibiotics_four         = implode(', ', $antibiotics_four);
            $antibiotics_five         = implode(', ', $antibiotics_five);
            $antibiotics_six          = implode(', ', $antibiotics_six);
            $antibiotics_seven        = implode(', ', $antibiotics_seven);
            $antibiotics_eight        = implode(', ', $antibiotics_eight);
            $antibiotics_nine         = implode(', ', $antibiotics_nine);
            $antibiotics_ten          = implode(', ', $antibiotics_ten);
            $antibiotics_eleven       = implode(', ', $antibiotics_eleven);
            $antibiotics_twelve       = implode(', ', $antibiotics_twelve);
            $antibiotics_thirteen     = implode(', ', $antibiotics_thirteen);
            $antibiotics_fourteen     = implode(', ', $antibiotics_fourteen);
            $antibiotics_fifteen      = implode(', ', $antibiotics_fifteen);
            $antibiotics_sixteen      = implode(', ', $antibiotics_sixteen);
            $antibiotics_seventeen    = implode(', ', $antibiotics_seventeen);
            $antibiotics_eighteen     = implode(', ', $antibiotics_eighteen);
            $antibiotics_nineteen     = implode(', ', $antibiotics_nineteen);
            $antibiotics_twenty       = implode(', ', $antibiotics_twenty);
            $antibiotics_twenty_one   = implode(', ', $antibiotics_twenty_one);
            $antibiotics_twenty_two   = implode(', ', $antibiotics_twenty_two);
            $antibiotics_twenty_three = implode(', ', $antibiotics_twenty_three);
            $antibiotics_twenty_four  = implode(', ', $antibiotics_twenty_four);

            try{
                $query = $conn->prepare('INSERT INTO pus_fluid(invoice_id, patient_id, colour, appearance, gram_stain, acid_fast_bacilli, culture, bacteria_one, bacteria_two, bacteria_three, antibiotics_one, antibiotics_two, antibiotics_three, antibiotics_four, antibiotics_five, antibiotics_six, antibiotics_seven, antibiotics_eight, antibiotics_nine, antibiotics_ten, antibiotics_eleven, antibiotics_twelve, antibiotics_thirteen, antibiotics_fourteen, antibiotics_fifteen, antibiotics_sixteen, antibiotics_seventeen, antibiotics_eighteen, antibiotics_nineteen, antibiotics_twenty, antibiotics_twenty_one, antibiotics_twenty_two, antibiotics_twenty_three, antibiotics_twenty_four, sensitivity_one, sensitivity_two, sensitivity_three, sensitivity_four, sensitivity_five, sensitivity_six, sensitivity_seven, sensitivity_eight, sensitivity_nine, sensitivity_ten, sensitivity_eleven, sensitivity_twelve, sensitivity_thirteen, sensitivity_fourteen, sensitivity_fifteen, sensitivity_sixteen, sensitivity_seventeen, sensitivity_eighteen, sensitivity_nineteen, sensitivity_twenty, sensitivity_twenty_one, sensitivity_twenty_two, sensitivity_twenty_three, sensitivity_twenty_four, comments, added_by)  VALUES(:invoice_id, :patient_id, :colour, :appearance, :gram_stain, :acid_fast_bacilli, :culture, :bacteria_one, :bacteria_two, :bacteria_three, :antibiotics_one, :antibiotics_two, :antibiotics_three, :antibiotics_four, :antibiotics_five, :antibiotics_six, :antibiotics_seven, :antibiotics_eight, :antibiotics_nine, :antibiotics_ten, :antibiotics_eleven, :antibiotics_twelve, :antibiotics_thirteen, :antibiotics_fourteen, :antibiotics_fifteen, :antibiotics_sixteen, :antibiotics_seventeen, :antibiotics_eighteen, :antibiotics_nineteen, :antibiotics_twenty, :antibiotics_twenty_one, :antibiotics_twenty_two, :antibiotics_twenty_three, :antibiotics_twenty_four, :sensitivity_one, :sensitivity_two, :sensitivity_three, :sensitivity_four, :sensitivity_five, :sensitivity_six, :sensitivity_seven, :sensitivity_eight, :sensitivity_nine, :sensitivity_ten, :sensitivity_eleven, :sensitivity_twelve, :sensitivity_thirteen, :sensitivity_fourteen, :sensitivity_fifteen, :sensitivity_sixteen, :sensitivity_seventeen, :sensitivity_eighteen, :sensitivity_nineteen, :sensitivity_twenty, :sensitivity_twenty_one, :sensitivity_twenty_two, :sensitivity_twenty_three, :sensitivity_twenty_four, :comments, :added_by)');
                $query->execute([':invoice_id' => $invoice_id, ':patient_id' => $patient_id, ':colour' => $colour, ':appearance' => $appearance, ':gram_stain' => $gram_stain, ':acid_fast_bacilli' => $acid_fast_bacilli, ':culture' => $culture, ':bacteria_one' => $bacteria_one, ':bacteria_two' => $bacteria_two, ':bacteria_three' => $bacteria_three, ':antibiotics_one' => $antibiotics_one, ':antibiotics_two' => $antibiotics_two, ':antibiotics_three' => $antibiotics_three, ':antibiotics_four' => $antibiotics_four, ':antibiotics_five' => $antibiotics_five, ':antibiotics_six' => $antibiotics_six, ':antibiotics_seven' => $antibiotics_seven, ':antibiotics_eight' => $antibiotics_eight, ':antibiotics_nine' => $antibiotics_nine, ':antibiotics_ten' => $antibiotics_ten, ':antibiotics_eleven' => $antibiotics_eleven, ':antibiotics_twelve' => $antibiotics_twelve, ':antibiotics_thirteen' => $antibiotics_thirteen, ':antibiotics_fourteen' => $antibiotics_fourteen, ':antibiotics_fifteen' => $antibiotics_fifteen, ':antibiotics_sixteen' => $antibiotics_sixteen, ':antibiotics_seventeen' => $antibiotics_seventeen, ':antibiotics_eighteen' => $antibiotics_eighteen, ':antibiotics_nineteen' => $antibiotics_nineteen, ':antibiotics_twenty' => $antibiotics_twenty, ':antibiotics_twenty_one' => $antibiotics_twenty_one, ':antibiotics_twenty_two' => $antibiotics_twenty_two, ':antibiotics_twenty_three' => $antibiotics_twenty_three, ':antibiotics_twenty_four' => $antibiotics_twenty_four, ':sensitivity_one' => $sensitivity_one, ':sensitivity_two' => $sensitivity_two, ':sensitivity_three' => $sensitivity_three, ':sensitivity_four' => $sensitivity_four, ':sensitivity_five' => $sensitivity_five, ':sensitivity_six' => $sensitivity_six, ':sensitivity_seven' => $sensitivity_seven, ':sensitivity_eight' => $sensitivity_eight, ':sensitivity_nine' => $sensitivity_nine, ':sensitivity_ten' => $sensitivity_ten, ':sensitivity_eleven' => $sensitivity_eleven, ':sensitivity_twelve' => $sensitivity_twelve, ':sensitivity_thirteen' => $sensitivity_thirteen, ':sensitivity_fourteen' => $sensitivity_fourteen, ':sensitivity_fifteen' => $sensitivity_fifteen, ':sensitivity_sixteen' => $sensitivity_sixteen, ':sensitivity_seventeen' => $sensitivity_seventeen, ':sensitivity_eighteen' => $sensitivity_eighteen, ':sensitivity_nineteen' => $sensitivity_nineteen, ':sensitivity_twenty' => $sensitivity_twenty, ':sensitivity_twenty_one' => $sensitivity_twenty_one, ':sensitivity_twenty_two' => $sensitivity_twenty_two, ':sensitivity_twenty_three' => $sensitivity_twenty_three, ':sensitivity_twenty_four' => $sensitivity_twenty_four, ':comments' => $comments, ':added_by' => $added_by]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

        // fetch all pus_fluid records
        public static function read_pus_fluid($conn){
            try{
                $query = $conn->prepare('SELECT pf.id, pf.invoice_id, pf.patient_id, pf.colour, pf.appearance, pf.gram_stain, pf.acid_fast_bacilli, pf.culture, pf.bacteria_one, pf.bacteria_two, pf.bacteria_three, pf.antibiotics_one, pf.antibiotics_two, pf.antibiotics_three, pf.antibiotics_four, pf.antibiotics_five, pf.antibiotics_six, pf.antibiotics_seven, pf.antibiotics_eight, pf.antibiotics_nine, pf.antibiotics_ten, pf.antibiotics_eleven, pf.antibiotics_twelve, pf.antibiotics_thirteen, pf.antibiotics_fourteen, pf.antibiotics_fifteen, pf.antibiotics_sixteen, pf.antibiotics_seventeen, pf.antibiotics_eighteen, pf.antibiotics_nineteen, pf.antibiotics_twenty, pf.antibiotics_twenty_one, pf.antibiotics_twenty_two, pf.antibiotics_twenty_three, pf.antibiotics_twenty_four, pf.sensitivity_one, pf.sensitivity_two, pf.sensitivity_three, pf.sensitivity_four, pf.sensitivity_five, pf.sensitivity_six, pf.sensitivity_seven, pf.sensitivity_eight, pf.sensitivity_nine, pf.sensitivity_ten, pf.sensitivity_eleven, pf.sensitivity_twelve, pf.sensitivity_thirteen, pf.sensitivity_fourteen, pf.sensitivity_fifteen, pf.sensitivity_sixteen, pf.sensitivity_seventeen, pf.sensitivity_eighteen, pf.sensitivity_nineteen, pf.sensitivity_twenty, pf.sensitivity_twenty_one, pf.sensitivity_twenty_two, pf.sensitivity_twenty_three, pf.sensitivity_twenty_four, pf.comments, pf.added_by, pf.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM pus_fluid pf INNER JOIN patients p ON pf.patient_id = p.patient_id INNER JOIN users u ON pf.added_by = u.staff_id');
                $query->execute();

                return $query->fetchAll(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // fetch a pus_fluid record
        public static function read_a_pus_fluid($id, $conn){
            try{
                $query = $conn->prepare('SELECT pf.id, pf.invoice_id, pf.patient_id, pf.colour, pf.appearance, pf.gram_stain, pf.acid_fast_bacilli, pf.culture, pf.bacteria_one, pf.bacteria_two, pf.bacteria_three, pf.antibiotics_one, pf.antibiotics_two, pf.antibiotics_three, pf.antibiotics_four, pf.antibiotics_five, pf.antibiotics_six, pf.antibiotics_seven, pf.antibiotics_eight, pf.antibiotics_nine, pf.antibiotics_ten, pf.antibiotics_eleven, pf.antibiotics_twelve, pf.antibiotics_thirteen, pf.antibiotics_fourteen, pf.antibiotics_fifteen, pf.antibiotics_sixteen, pf.antibiotics_seventeen, pf.antibiotics_eighteen, pf.antibiotics_nineteen, pf.antibiotics_twenty, pf.antibiotics_twenty_one, pf.antibiotics_twenty_two, pf.antibiotics_twenty_three, pf.antibiotics_twenty_four, pf.sensitivity_one, pf.sensitivity_two, pf.sensitivity_three, pf.sensitivity_four, pf.sensitivity_five, pf.sensitivity_six, pf.sensitivity_seven, pf.sensitivity_eight, pf.sensitivity_nine, pf.sensitivity_ten, pf.sensitivity_eleven, pf.sensitivity_twelve, pf.sensitivity_thirteen, pf.sensitivity_fourteen, pf.sensitivity_fifteen, pf.sensitivity_sixteen, pf.sensitivity_seventeen, pf.sensitivity_eighteen, pf.sensitivity_nineteen, pf.sensitivity_twenty, pf.sensitivity_twenty_one, pf.sensitivity_twenty_two, pf.sensitivity_twenty_three, pf.sensitivity_twenty_four, pf.comments, pf.added_by, pf.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM pus_fluid pf INNER JOIN patients p ON pf.patient_id = p.patient_id INNER JOIN users u ON pf.added_by = u.staff_id WHERE pf.id = :id');
                $query->execute([':id' => $id]);

                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // update a pus_fluid record
        public static function update_pus_fluid($id, $patient_id, $colour, $appearance, $gram_stain, $acid_fast_bacilli, $culture, $bacteria_one, $bacteria_two, $bacteria_three, $antibiotics_one, $antibiotics_two, $antibiotics_three, $antibiotics_four, $antibiotics_five, $antibiotics_six, $antibiotics_seven, $antibiotics_eight, $antibiotics_nine, $antibiotics_ten, $antibiotics_eleven, $antibiotics_twelve, $antibiotics_thirteen, $antibiotics_fourteen, $antibiotics_fifteen, $antibiotics_sixteen, $antibiotics_seventeen, $antibiotics_eighteen, $antibiotics_nineteen, $antibiotics_twenty, $antibiotics_twenty_one, $antibiotics_twenty_two, $antibiotics_twenty_three, $antibiotics_twenty_four, $sensitivity_one, $sensitivity_two, $sensitivity_three, $sensitivity_four, $sensitivity_five, $sensitivity_six, $sensitivity_seven, $sensitivity_eight, $sensitivity_nine, $sensitivity_ten, $sensitivity_eleven, $sensitivity_twelve, $sensitivity_thirteen, $sensitivity_fourteen, $sensitivity_fifteen, $sensitivity_sixteen, $sensitivity_seventeen, $sensitivity_eighteen, $sensitivity_nineteen, $sensitivity_twenty, $sensitivity_twenty_one, $sensitivity_twenty_two, $sensitivity_twenty_three, $sensitivity_twenty_four, $comments, $conn) {
            $colour                   = implode(', ', $colour);
            $bacteria_one             = implode(', ', $bacteria_one);
            $bacteria_two             = implode(', ', $bacteria_two);
            $bacteria_three           = implode(', ', $bacteria_three);
            $appearance               = implode(', ', $appearance);
            $gram_stain               = implode(', ', $gram_stain);
            $culture                  = implode(', ', $culture);
            $antibiotics_one          = implode(', ', $antibiotics_one);
            $antibiotics_two          = implode(', ', $antibiotics_two);
            $antibiotics_three        = implode(', ', $antibiotics_three);
            $antibiotics_four         = implode(', ', $antibiotics_four);
            $antibiotics_five         = implode(', ', $antibiotics_five);
            $antibiotics_six          = implode(', ', $antibiotics_six);
            $antibiotics_seven        = implode(', ', $antibiotics_seven);
            $antibiotics_eight        = implode(', ', $antibiotics_eight);
            $antibiotics_nine         = implode(', ', $antibiotics_nine);
            $antibiotics_ten          = implode(', ', $antibiotics_ten);
            $antibiotics_eleven       = implode(', ', $antibiotics_eleven);
            $antibiotics_twelve       = implode(', ', $antibiotics_twelve);
            $antibiotics_thirteen     = implode(', ', $antibiotics_thirteen);
            $antibiotics_fourteen     = implode(', ', $antibiotics_fourteen);
            $antibiotics_fifteen      = implode(', ', $antibiotics_fifteen);
            $antibiotics_sixteen      = implode(', ', $antibiotics_sixteen);
            $antibiotics_seventeen    = implode(', ', $antibiotics_seventeen);
            $antibiotics_eighteen     = implode(', ', $antibiotics_eighteen);
            $antibiotics_nineteen     = implode(', ', $antibiotics_nineteen);
            $antibiotics_twenty       = implode(', ', $antibiotics_twenty);
            $antibiotics_twenty_one   = implode(', ', $antibiotics_twenty_one);
            $antibiotics_twenty_two   = implode(', ', $antibiotics_twenty_two);
            $antibiotics_twenty_three = implode(', ', $antibiotics_twenty_three);
            $antibiotics_twenty_four  = implode(', ', $antibiotics_twenty_four);
            
            try{
                $query = $conn->prepare('UPDATE pus_fluid SET patient_id = :patient_id, colour = :colour, appearance = :appearance, gram_stain = :gram_stain, acid_fast_bacilli = :acid_fast_bacilli, culture = :culture, bacteria_one = :bacteria_one, bacteria_two = :bacteria_two, bacteria_three = :bacteria_three, antibiotics_one = :antibiotics_one, antibiotics_two = :antibiotics_two, antibiotics_three = :antibiotics_three, antibiotics_four = :antibiotics_four, antibiotics_five = :antibiotics_five, antibiotics_six = :antibiotics_six, antibiotics_seven = :antibiotics_seven, antibiotics_eight = :antibiotics_eight, antibiotics_nine = :antibiotics_nine, antibiotics_ten = :antibiotics_ten, antibiotics_eleven = :antibiotics_eleven, antibiotics_twelve = :antibiotics_twelve, antibiotics_thirteen = :antibiotics_thirteen, antibiotics_fourteen = :antibiotics_fourteen, antibiotics_fifteen = :antibiotics_fifteen, antibiotics_sixteen = :antibiotics_sixteen, antibiotics_seventeen = :antibiotics_seventeen, antibiotics_eighteen = :antibiotics_eighteen, antibiotics_nineteen = :antibiotics_nineteen, antibiotics_twenty = :antibiotics_twenty, antibiotics_twenty_one = :antibiotics_twenty_one, antibiotics_twenty_two = :antibiotics_twenty_two, antibiotics_twenty_three = :antibiotics_twenty_three, antibiotics_twenty_four = :antibiotics_twenty_four, sensitivity_one = :sensitivity_one, sensitivity_two = :sensitivity_two, sensitivity_three = :sensitivity_three, sensitivity_four = :sensitivity_four, sensitivity_five = :sensitivity_five, sensitivity_six = :sensitivity_six, sensitivity_seven = :sensitivity_seven, sensitivity_eight = :sensitivity_eight, sensitivity_nine = :sensitivity_nine, sensitivity_ten = :sensitivity_ten, sensitivity_eleven = :sensitivity_eleven, sensitivity_twelve = :sensitivity_twelve, sensitivity_thirteen = :sensitivity_thirteen, sensitivity_fourteen = :sensitivity_fourteen, sensitivity_fifteen = :sensitivity_fifteen, sensitivity_sixteen = :sensitivity_sixteen, sensitivity_seventeen = :sensitivity_seventeen, sensitivity_eighteen = :sensitivity_eighteen, sensitivity_nineteen = :sensitivity_nineteen, sensitivity_twenty = :sensitivity_twenty, sensitivity_twenty_one = :sensitivity_twenty_one, sensitivity_twenty_two = :sensitivity_twenty_two, sensitivity_twenty_three = :sensitivity_twenty_three, sensitivity_twenty_four = :sensitivity_twenty_four, comments = :comments WHERE id = :id AND patient_id = :patient_id');
                $query->execute([':colour' => $colour, ':appearance' => $appearance, ':gram_stain' => $gram_stain, ':acid_fast_bacilli' => $acid_fast_bacilli, ':culture' => $culture, ':bacteria_one' => $bacteria_one, ':bacteria_two' => $bacteria_two, ':bacteria_three' => $bacteria_three, ':antibiotics_one' => $antibiotics_one, ':antibiotics_two' => $antibiotics_two, ':antibiotics_three' => $antibiotics_three, ':antibiotics_four' => $antibiotics_four, ':antibiotics_five' => $antibiotics_five, ':antibiotics_six' => $antibiotics_six, ':antibiotics_seven' => $antibiotics_seven, ':antibiotics_eight' => $antibiotics_eight, ':antibiotics_nine' => $antibiotics_nine, ':antibiotics_ten' => $antibiotics_ten, ':antibiotics_eleven' => $antibiotics_eleven, ':antibiotics_twelve' => $antibiotics_twelve, ':antibiotics_thirteen' => $antibiotics_thirteen, ':antibiotics_fourteen' => $antibiotics_fourteen, ':antibiotics_fifteen' => $antibiotics_fifteen, ':antibiotics_sixteen' => $antibiotics_sixteen, ':antibiotics_seventeen' => $antibiotics_seventeen, ':antibiotics_eighteen' => $antibiotics_eighteen, ':antibiotics_nineteen' => $antibiotics_nineteen, ':antibiotics_twenty' => $antibiotics_twenty, ':antibiotics_twenty_one' => $antibiotics_twenty_one, ':antibiotics_twenty_two' => $antibiotics_twenty_two, ':antibiotics_twenty_three' => $antibiotics_twenty_three, ':antibiotics_twenty_four' => $antibiotics_twenty_four, ':sensitivity_one' => $sensitivity_one, ':sensitivity_two' => $sensitivity_two, ':sensitivity_three' => $sensitivity_three, ':sensitivity_four' => $sensitivity_four, ':sensitivity_five' => $sensitivity_five, ':sensitivity_six' => $sensitivity_six, ':sensitivity_seven' => $sensitivity_seven, ':sensitivity_eight' => $sensitivity_eight, ':sensitivity_nine' => $sensitivity_nine, ':sensitivity_ten' => $sensitivity_ten, ':sensitivity_eleven' => $sensitivity_eleven, ':sensitivity_twelve' => $sensitivity_twelve, ':sensitivity_thirteen' => $sensitivity_thirteen, ':sensitivity_fourteen' => $sensitivity_fourteen, ':sensitivity_fifteen' => $sensitivity_fifteen, ':sensitivity_sixteen' => $sensitivity_sixteen, ':sensitivity_seventeen' => $sensitivity_seventeen, ':sensitivity_eighteen' => $sensitivity_eighteen, ':sensitivity_nineteen' => $sensitivity_nineteen, ':sensitivity_twenty' => $sensitivity_twenty, ':sensitivity_twenty_one' => $sensitivity_twenty_one, ':sensitivity_twenty_two' => $sensitivity_twenty_two, ':sensitivity_twenty_three' => $sensitivity_twenty_three, ':sensitivity_twenty_four' => $sensitivity_twenty_four, ':comments' => $comments, ':patient_id' => $patient_id, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

    }