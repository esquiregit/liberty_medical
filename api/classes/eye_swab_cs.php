<?php
    require_once 'conn.php';
    require_once 'methods.php';
    require_once 'charge.php';

	class EyeSwabCS {

        // create a eye_swab_cs record
        public static function create_eye_swab_cs($patient_id, $culture, $bacteria_one, $bacteria_two, $bacteria_three, $antibiotics_one, $antibiotics_two, $antibiotics_three, $antibiotics_four, $antibiotics_five, $antibiotics_six, $antibiotics_seven, $antibiotics_eight, $antibiotics_nine, $antibiotics_ten, $antibiotics_eleven, $antibiotics_twelve, $antibiotics_thirteen, $antibiotics_fourteen, $antibiotics_fifteen, $antibiotics_sixteen, $antibiotics_seventeen, $antibiotics_eighteen, $antibiotics_nineteen, $antibiotics_twenty, $antibiotics_twenty_one, $antibiotics_twenty_two, $antibiotics_twenty_three, $antibiotics_twenty_four, $sensitivity_one, $sensitivity_two, $sensitivity_three, $sensitivity_four, $sensitivity_five, $sensitivity_six, $sensitivity_seven, $sensitivity_eight, $sensitivity_nine, $sensitivity_ten, $sensitivity_eleven, $sensitivity_twelve, $sensitivity_thirteen, $sensitivity_fourteen, $sensitivity_fifteen, $sensitivity_sixteen, $sensitivity_seventeen, $sensitivity_eighteen, $sensitivity_nineteen, $sensitivity_twenty, $sensitivity_twenty_one, $sensitivity_twenty_two, $sensitivity_twenty_three, $sensitivity_twenty_four, $comments, $added_by, $conn){
            $invoice_id               = Methods::get_invoice_id('Eye Swab C/S', $conn);
            $amount                   = Charge::read_charge('31', $conn);
            $culture                  = implode(', ', $culture);
            $bacteria_one             = implode(', ', $bacteria_one);
            $bacteria_two             = implode(', ', $bacteria_two);
            $bacteria_three           = implode(', ', $bacteria_three);
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
                $query = $conn->prepare('INSERT INTO eye_swab_cs(invoice_id, patient_id, culture, bacteria_one, bacteria_two, bacteria_three, antibiotics_one, antibiotics_two, antibiotics_three, antibiotics_four, antibiotics_five, antibiotics_six, antibiotics_seven, antibiotics_eight, antibiotics_nine, antibiotics_ten, antibiotics_eleven, antibiotics_twelve, antibiotics_thirteen, antibiotics_fourteen, antibiotics_fifteen, antibiotics_sixteen, antibiotics_seventeen, antibiotics_eighteen, antibiotics_nineteen, antibiotics_twenty, antibiotics_twenty_one, antibiotics_twenty_two, antibiotics_twenty_three, antibiotics_twenty_four, sensitivity_one, sensitivity_two, sensitivity_three, sensitivity_four, sensitivity_five, sensitivity_six, sensitivity_seven, sensitivity_eight, sensitivity_nine, sensitivity_ten, sensitivity_eleven, sensitivity_twelve, sensitivity_thirteen, sensitivity_fourteen, sensitivity_fifteen, sensitivity_sixteen, sensitivity_seventeen, sensitivity_eighteen, sensitivity_nineteen, sensitivity_twenty, sensitivity_twenty_one, sensitivity_twenty_two, sensitivity_twenty_three, sensitivity_twenty_four, comments, added_by)  VALUES(:invoice_id, :patient_id, :culture, :bacteria_one, :bacteria_two, :bacteria_three, :antibiotics_one, :antibiotics_two, :antibiotics_three, :antibiotics_four, :antibiotics_five, :antibiotics_six, :antibiotics_seven, :antibiotics_eight, :antibiotics_nine, :antibiotics_ten, :antibiotics_eleven, :antibiotics_twelve, :antibiotics_thirteen, :antibiotics_fourteen, :antibiotics_fifteen, :antibiotics_sixteen, :antibiotics_seventeen, :antibiotics_eighteen, :antibiotics_nineteen, :antibiotics_twenty, :antibiotics_twenty_one, :antibiotics_twenty_two, :antibiotics_twenty_three, :antibiotics_twenty_four, :sensitivity_one, :sensitivity_two, :sensitivity_three, :sensitivity_four, :sensitivity_five, :sensitivity_six, :sensitivity_seven, :sensitivity_eight, :sensitivity_nine, :sensitivity_ten, :sensitivity_eleven, :sensitivity_twelve, :sensitivity_thirteen, :sensitivity_fourteen, :sensitivity_fifteen, :sensitivity_sixteen, :sensitivity_seventeen, :sensitivity_eighteen, :sensitivity_nineteen, :sensitivity_twenty, :sensitivity_twenty_one, :sensitivity_twenty_two, :sensitivity_twenty_three, :sensitivity_twenty_four, :comments, :added_by)');
                $query->execute([':invoice_id' => $invoice_id, ':patient_id' => $patient_id, ':culture' => $culture, ':bacteria_one' => $bacteria_one, ':bacteria_two' => $bacteria_two, ':bacteria_three' => $bacteria_three, ':antibiotics_one' => $antibiotics_one, ':antibiotics_two' => $antibiotics_two, ':antibiotics_three' => $antibiotics_three, ':antibiotics_four' => $antibiotics_four, ':antibiotics_five' => $antibiotics_five, ':antibiotics_six' => $antibiotics_six, ':antibiotics_seven' => $antibiotics_seven, ':antibiotics_eight' => $antibiotics_eight, ':antibiotics_nine' => $antibiotics_nine, ':antibiotics_ten' => $antibiotics_ten, ':antibiotics_eleven' => $antibiotics_eleven, ':antibiotics_twelve' => $antibiotics_twelve, ':antibiotics_thirteen' => $antibiotics_thirteen, ':antibiotics_fourteen' => $antibiotics_fourteen, ':antibiotics_fifteen' => $antibiotics_fifteen, ':antibiotics_sixteen' => $antibiotics_sixteen, ':antibiotics_seventeen' => $antibiotics_seventeen, ':antibiotics_eighteen' => $antibiotics_eighteen, ':antibiotics_nineteen' => $antibiotics_nineteen, ':antibiotics_twenty' => $antibiotics_twenty, ':antibiotics_twenty_one' => $antibiotics_twenty_one, ':antibiotics_twenty_two' => $antibiotics_twenty_two, ':antibiotics_twenty_three' => $antibiotics_twenty_three, ':antibiotics_twenty_four' => $antibiotics_twenty_four, ':sensitivity_one' => $sensitivity_one, ':sensitivity_two' => $sensitivity_two, ':sensitivity_three' => $sensitivity_three, ':sensitivity_four' => $sensitivity_four, ':sensitivity_five' => $sensitivity_five, ':sensitivity_six' => $sensitivity_six, ':sensitivity_seven' => $sensitivity_seven, ':sensitivity_eight' => $sensitivity_eight, ':sensitivity_nine' => $sensitivity_nine, ':sensitivity_ten' => $sensitivity_ten, ':sensitivity_eleven' => $sensitivity_eleven, ':sensitivity_twelve' => $sensitivity_twelve, ':sensitivity_thirteen' => $sensitivity_thirteen, ':sensitivity_fourteen' => $sensitivity_fourteen, ':sensitivity_fifteen' => $sensitivity_fifteen, ':sensitivity_sixteen' => $sensitivity_sixteen, ':sensitivity_seventeen' => $sensitivity_seventeen, ':sensitivity_eighteen' => $sensitivity_eighteen, ':sensitivity_nineteen' => $sensitivity_nineteen, ':sensitivity_twenty' => $sensitivity_twenty, ':sensitivity_twenty_one' => $sensitivity_twenty_one, ':sensitivity_twenty_two' => $sensitivity_twenty_two, ':sensitivity_twenty_three' => $sensitivity_twenty_three, ':sensitivity_twenty_four' => $sensitivity_twenty_four, ':comments' => $comments, ':added_by' => $added_by]);

                return true;
            }catch(PDOException $ex){
            	return false;
            }
        }

        // fetch all eye_swab_cs records
        public static function read_eye_swab_cs($conn){
            try{
                $query = $conn->prepare('SELECT es.id, es.invoice_id, es.patient_id, es.culture, es.bacteria_one, es.bacteria_two, es.bacteria_three, es.antibiotics_one, es.antibiotics_two, es.antibiotics_three, es.antibiotics_four, es.antibiotics_five, es.antibiotics_six, es.antibiotics_seven, es.antibiotics_eight, es.antibiotics_nine, es.antibiotics_ten, es.antibiotics_eleven, es.antibiotics_twelve, es.antibiotics_thirteen, es.antibiotics_fourteen, es.antibiotics_fifteen, es.antibiotics_sixteen, es.antibiotics_seventeen, es.antibiotics_eighteen, es.antibiotics_nineteen, es.antibiotics_twenty, es.antibiotics_twenty_one, es.antibiotics_twenty_two, es.antibiotics_twenty_three, es.antibiotics_twenty_four, es.sensitivity_one, es.sensitivity_two, es.sensitivity_three, es.sensitivity_four, es.sensitivity_five, es.sensitivity_six, es.sensitivity_seven, es.sensitivity_eight, es.sensitivity_nine, es.sensitivity_ten, es.sensitivity_eleven, es.sensitivity_twelve, es.sensitivity_thirteen, es.sensitivity_fourteen, es.sensitivity_fifteen, es.sensitivity_sixteen, es.sensitivity_seventeen, es.sensitivity_eighteen, es.sensitivity_nineteen, es.sensitivity_twenty, es.sensitivity_twenty_one, es.sensitivity_twenty_two, es.sensitivity_twenty_three, es.sensitivity_twenty_four, es.comments, es.added_by, es.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM eye_swab_cs es INNER JOIN patients p ON es.patient_id = p.patient_id INNER JOIN users u ON es.added_by = u.staff_id');
                $query->execute();

                return $query->fetchAll(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // fetch a eye_swab_cs record
        public static function read_a_eye_swab_cs($id, $conn){
            try{
                $query = $conn->prepare('SELECT es.id, es.invoice_id, es.patient_id, es.culture, es.bacteria_one, es.bacteria_two, es.bacteria_three, es.antibiotics_one, es.antibiotics_two, es.antibiotics_three, es.antibiotics_four, es.antibiotics_five, es.antibiotics_six, es.antibiotics_seven, es.antibiotics_eight, es.antibiotics_nine, es.antibiotics_ten, es.antibiotics_eleven, es.antibiotics_twelve, es.antibiotics_thirteen, es.antibiotics_fourteen, es.antibiotics_fifteen, es.antibiotics_sixteen, es.antibiotics_seventeen, es.antibiotics_eighteen, es.antibiotics_nineteen, es.antibiotics_twenty, es.antibiotics_twenty_one, es.antibiotics_twenty_two, es.antibiotics_twenty_three, es.antibiotics_twenty_four, es.sensitivity_one, es.sensitivity_two, es.sensitivity_three, es.sensitivity_four, es.sensitivity_five, es.sensitivity_six, es.sensitivity_seven, es.sensitivity_eight, es.sensitivity_nine, es.sensitivity_ten, es.sensitivity_eleven, es.sensitivity_twelve, es.sensitivity_thirteen, es.sensitivity_fourteen, es.sensitivity_fifteen, es.sensitivity_sixteen, es.sensitivity_seventeen, es.sensitivity_eighteen, es.sensitivity_nineteen, es.sensitivity_twenty, es.sensitivity_twenty_one, es.sensitivity_twenty_two, es.sensitivity_twenty_three, es.sensitivity_twenty_four, es.comments, es.added_by, es.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM eye_swab_cs es INNER JOIN patients p ON es.patient_id = p.patient_id INNER JOIN users u ON es.added_by = u.staff_id WHERE es.id = :id');
                $query->execute([':id' => $id]);

                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // update a eye_swab_cs record
        public static function update_eye_swab_cs($id, $patient_id, $culture, $bacteria_one, $bacteria_two, $bacteria_three, $antibiotics_one, $antibiotics_two, $antibiotics_three, $antibiotics_four, $antibiotics_five, $antibiotics_six, $antibiotics_seven, $antibiotics_eight, $antibiotics_nine, $antibiotics_ten, $antibiotics_eleven, $antibiotics_twelve, $antibiotics_thirteen, $antibiotics_fourteen, $antibiotics_fifteen, $antibiotics_sixteen, $antibiotics_seventeen, $antibiotics_eighteen, $antibiotics_nineteen, $antibiotics_twenty, $antibiotics_twenty_one, $antibiotics_twenty_two, $antibiotics_twenty_three, $antibiotics_twenty_four, $sensitivity_one, $sensitivity_two, $sensitivity_three, $sensitivity_four, $sensitivity_five, $sensitivity_six, $sensitivity_seven, $sensitivity_eight, $sensitivity_nine, $sensitivity_ten, $sensitivity_eleven, $sensitivity_twelve, $sensitivity_thirteen, $sensitivity_fourteen, $sensitivity_fifteen, $sensitivity_sixteen, $sensitivity_seventeen, $sensitivity_eighteen, $sensitivity_nineteen, $sensitivity_twenty, $sensitivity_twenty_one, $sensitivity_twenty_two, $sensitivity_twenty_three, $sensitivity_twenty_four, $comments, $conn) {
            $culture                  = implode(', ', $culture);
            $bacteria_one             = implode(', ', $bacteria_one);
            $bacteria_two             = implode(', ', $bacteria_two);
            $bacteria_three           = implode(', ', $bacteria_three);
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
                $query = $conn->prepare('UPDATE eye_swab_cs SET patient_id = :patient_id, culture = :culture, bacteria_one = :bacteria_one, bacteria_two = :bacteria_two, bacteria_three = :bacteria_three, antibiotics_one = :antibiotics_one, antibiotics_two = :antibiotics_two, antibiotics_three = :antibiotics_three, antibiotics_four = :antibiotics_four, antibiotics_five = :antibiotics_five, antibiotics_six = :antibiotics_six, antibiotics_seven = :antibiotics_seven, antibiotics_eight = :antibiotics_eight, antibiotics_nine = :antibiotics_nine, antibiotics_ten = :antibiotics_ten, antibiotics_eleven = :antibiotics_eleven, antibiotics_twelve = :antibiotics_twelve, antibiotics_thirteen = :antibiotics_thirteen, antibiotics_fourteen = :antibiotics_fourteen, antibiotics_fifteen = :antibiotics_fifteen, antibiotics_sixteen = :antibiotics_sixteen, antibiotics_seventeen = :antibiotics_seventeen, antibiotics_eighteen = :antibiotics_eighteen, antibiotics_nineteen = :antibiotics_nineteen, antibiotics_twenty = :antibiotics_twenty, antibiotics_twenty_one = :antibiotics_twenty_one, antibiotics_twenty_two = :antibiotics_twenty_two, antibiotics_twenty_three = :antibiotics_twenty_three, antibiotics_twenty_four = :antibiotics_twenty_four, sensitivity_one = :sensitivity_one, sensitivity_two = :sensitivity_two, sensitivity_three = :sensitivity_three, sensitivity_four = :sensitivity_four, sensitivity_five = :sensitivity_five, sensitivity_six = :sensitivity_six, sensitivity_seven = :sensitivity_seven, sensitivity_eight = :sensitivity_eight, sensitivity_nine = :sensitivity_nine, sensitivity_ten = :sensitivity_ten, sensitivity_eleven = :sensitivity_eleven, sensitivity_twelve = :sensitivity_twelve, sensitivity_thirteen = :sensitivity_thirteen, sensitivity_fourteen = :sensitivity_fourteen, sensitivity_fifteen = :sensitivity_fifteen, sensitivity_sixteen = :sensitivity_sixteen, sensitivity_seventeen = :sensitivity_seventeen, sensitivity_eighteen = :sensitivity_eighteen, sensitivity_nineteen = :sensitivity_nineteen, sensitivity_twenty = :sensitivity_twenty, sensitivity_twenty_one = :sensitivity_twenty_one, sensitivity_twenty_two = :sensitivity_twenty_two, sensitivity_twenty_three = :sensitivity_twenty_three, sensitivity_twenty_four = :sensitivity_twenty_four, comments = :comments WHERE id = :id AND patient_id = :patient_id');
                $query->execute([':culture' => $culture, ':bacteria_one' => $bacteria_one, ':bacteria_two' => $bacteria_two, ':bacteria_three' => $bacteria_three, ':antibiotics_one' => $antibiotics_one, ':antibiotics_two' => $antibiotics_two, ':antibiotics_three' => $antibiotics_three, ':antibiotics_four' => $antibiotics_four, ':antibiotics_five' => $antibiotics_five, ':antibiotics_six' => $antibiotics_six, ':antibiotics_seven' => $antibiotics_seven, ':antibiotics_eight' => $antibiotics_eight, ':antibiotics_nine' => $antibiotics_nine, ':antibiotics_ten' => $antibiotics_ten, ':antibiotics_eleven' => $antibiotics_eleven, ':antibiotics_twelve' => $antibiotics_twelve, ':antibiotics_thirteen' => $antibiotics_thirteen, ':antibiotics_fourteen' => $antibiotics_fourteen, ':antibiotics_fifteen' => $antibiotics_fifteen, ':antibiotics_sixteen' => $antibiotics_sixteen, ':antibiotics_seventeen' => $antibiotics_seventeen, ':antibiotics_eighteen' => $antibiotics_eighteen, ':antibiotics_nineteen' => $antibiotics_nineteen, ':antibiotics_twenty' => $antibiotics_twenty, ':antibiotics_twenty_one' => $antibiotics_twenty_one, ':antibiotics_twenty_two' => $antibiotics_twenty_two, ':antibiotics_twenty_three' => $antibiotics_twenty_three, ':antibiotics_twenty_four' => $antibiotics_twenty_four, ':sensitivity_one' => $sensitivity_one, ':sensitivity_two' => $sensitivity_two, ':sensitivity_three' => $sensitivity_three, ':sensitivity_four' => $sensitivity_four, ':sensitivity_five' => $sensitivity_five, ':sensitivity_six' => $sensitivity_six, ':sensitivity_seven' => $sensitivity_seven, ':sensitivity_eight' => $sensitivity_eight, ':sensitivity_nine' => $sensitivity_nine, ':sensitivity_ten' => $sensitivity_ten, ':sensitivity_eleven' => $sensitivity_eleven, ':sensitivity_twelve' => $sensitivity_twelve, ':sensitivity_thirteen' => $sensitivity_thirteen, ':sensitivity_fourteen' => $sensitivity_fourteen, ':sensitivity_fifteen' => $sensitivity_fifteen, ':sensitivity_sixteen' => $sensitivity_sixteen, ':sensitivity_seventeen' => $sensitivity_seventeen, ':sensitivity_eighteen' => $sensitivity_eighteen, ':sensitivity_nineteen' => $sensitivity_nineteen, ':sensitivity_twenty' => $sensitivity_twenty, ':sensitivity_twenty_one' => $sensitivity_twenty_one, ':sensitivity_twenty_two' => $sensitivity_twenty_two, ':sensitivity_twenty_three' => $sensitivity_twenty_three, ':sensitivity_twenty_four' => $sensitivity_twenty_four, ':comments' => $comments, ':patient_id' => $patient_id, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

	}