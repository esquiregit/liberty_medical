<?php
    require_once 'conn.php';
    require_once 'methods.php';
    require_once 'charge.php';

	class BloodCS {

        // create a blood_cs record
        public static function create_blood_cs($patient_id, $culture, $bacteria_one, $bacteria_two, $bacteria_three, $antibiotics_one, $antibiotics_two, $antibiotics_three, $antibiotics_four, $antibiotics_five, $antibiotics_six, $antibiotics_seven, $antibiotics_eight, $antibiotics_nine, $antibiotics_ten, $antibiotics_eleven, $antibiotics_twelve, $antibiotics_thirteen, $antibiotics_fourteen, $antibiotics_fifteen, $antibiotics_sixteen, $antibiotics_seventeen, $antibiotics_eighteen, $antibiotics_nineteen, $antibiotics_twenty, $antibiotics_twenty_one, $antibiotics_twenty_two, $antibiotics_twenty_three, $antibiotics_twenty_four, $sensitivity_one, $sensitivity_two, $sensitivity_three, $sensitivity_four, $sensitivity_five, $sensitivity_six, $sensitivity_seven, $sensitivity_eight, $sensitivity_nine, $sensitivity_ten, $sensitivity_eleven, $sensitivity_twelve, $sensitivity_thirteen, $sensitivity_fourteen, $sensitivity_fifteen, $sensitivity_sixteen, $sensitivity_seventeen, $sensitivity_eighteen, $sensitivity_nineteen, $sensitivity_twenty, $sensitivity_twenty_one, $sensitivity_twenty_two, $sensitivity_twenty_three, $sensitivity_twenty_four, $comments, $added_by, $conn){
            $invoice_id               = Methods::get_invoice_id('Blood C/S', $conn);
            $amount                   = Charge::read_charge('10', $conn);
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
                $query = $conn->prepare('INSERT INTO blood_cs(invoice_id, patient_id, culture, bacteria_one, bacteria_two, bacteria_three, antibiotics_one, antibiotics_two, antibiotics_three, antibiotics_four, antibiotics_five, antibiotics_six, antibiotics_seven, antibiotics_eight, antibiotics_nine, antibiotics_ten, antibiotics_eleven, antibiotics_twelve, antibiotics_thirteen, antibiotics_fourteen, antibiotics_fifteen, antibiotics_sixteen, antibiotics_seventeen, antibiotics_eighteen, antibiotics_nineteen, antibiotics_twenty, antibiotics_twenty_one, antibiotics_twenty_two, antibiotics_twenty_three, antibiotics_twenty_four, sensitivity_one, sensitivity_two, sensitivity_three, sensitivity_four, sensitivity_five, sensitivity_six, sensitivity_seven, sensitivity_eight, sensitivity_nine, sensitivity_ten, sensitivity_eleven, sensitivity_twelve, sensitivity_thirteen, sensitivity_fourteen, sensitivity_fifteen, sensitivity_sixteen, sensitivity_seventeen, sensitivity_eighteen, sensitivity_nineteen, sensitivity_twenty, sensitivity_twenty_one, sensitivity_twenty_two, sensitivity_twenty_three, sensitivity_twenty_four, comments, added_by) VALUES(:invoice_id, :patient_id, :culture, :bacteria_one, :bacteria_two, :bacteria_three, :antibiotics_one, :antibiotics_two, :antibiotics_three, :antibiotics_four, :antibiotics_five, :antibiotics_six, :antibiotics_seven, :antibiotics_eight, :antibiotics_nine, :antibiotics_ten, :antibiotics_eleven, :antibiotics_twelve, :antibiotics_thirteen, :antibiotics_fourteen, :antibiotics_fifteen, :antibiotics_sixteen, :antibiotics_seventeen, :antibiotics_eighteen, :antibiotics_nineteen, :antibiotics_twenty, :antibiotics_twenty_one, :antibiotics_twenty_two, :antibiotics_twenty_three, :antibiotics_twenty_four, :sensitivity_one, :sensitivity_two, :sensitivity_three, :sensitivity_four, :sensitivity_five, :sensitivity_six, :sensitivity_seven, :sensitivity_eight, :sensitivity_nine, :sensitivity_ten, :sensitivity_eleven, :sensitivity_twelve, :sensitivity_thirteen, :sensitivity_fourteen, :sensitivity_fifteen, :sensitivity_sixteen, :sensitivity_seventeen, :sensitivity_eighteen, :sensitivity_nineteen, :sensitivity_twenty, :sensitivity_twenty_one, :sensitivity_twenty_two, :sensitivity_twenty_three, :sensitivity_twenty_four, :comments, :added_by)');
                $query->execute([':invoice_id' => $invoice_id, ':patient_id' => $patient_id, ':culture' => $culture, ':bacteria_one' => $bacteria_one, ':bacteria_two' => $bacteria_two, ':bacteria_three' => $bacteria_three, ':antibiotics_one' => $antibiotics_one, ':antibiotics_two' => $antibiotics_two, ':antibiotics_three' => $antibiotics_three, ':antibiotics_four' => $antibiotics_four, ':antibiotics_five' => $antibiotics_five, ':antibiotics_six' => $antibiotics_six, ':antibiotics_seven' => $antibiotics_seven, ':antibiotics_eight' => $antibiotics_eight, ':antibiotics_nine' => $antibiotics_nine, ':antibiotics_ten' => $antibiotics_ten, ':antibiotics_eleven' => $antibiotics_eleven, ':antibiotics_twelve' => $antibiotics_twelve, ':antibiotics_thirteen' => $antibiotics_thirteen, ':antibiotics_fourteen' => $antibiotics_fourteen, ':antibiotics_fifteen' => $antibiotics_fifteen, ':antibiotics_sixteen' => $antibiotics_sixteen, ':antibiotics_seventeen' => $antibiotics_seventeen, ':antibiotics_eighteen' => $antibiotics_eighteen, ':antibiotics_nineteen' => $antibiotics_nineteen, ':antibiotics_twenty' => $antibiotics_twenty, ':antibiotics_twenty_one' => $antibiotics_twenty_one, ':antibiotics_twenty_two' => $antibiotics_twenty_two, ':antibiotics_twenty_three' => $antibiotics_twenty_three, ':antibiotics_twenty_four' => $antibiotics_twenty_four, ':sensitivity_one' => $sensitivity_one, ':sensitivity_two' => $antibiotics_two, ':sensitivity_three' => $antibiotics_three, ':sensitivity_four' => $antibiotics_four, ':sensitivity_five' => $antibiotics_five, ':sensitivity_six' => $antibiotics_six, ':sensitivity_seven' => $antibiotics_seven, ':sensitivity_eight' => $antibiotics_eight, ':sensitivity_nine' => $antibiotics_nine, ':sensitivity_ten' => $antibiotics_ten, ':sensitivity_eleven' => $antibiotics_eleven, ':sensitivity_twelve' => $antibiotics_twelve, ':sensitivity_thirteen' => $antibiotics_thirteen, ':sensitivity_fourteen' => $antibiotics_fourteen, ':sensitivity_fifteen' => $antibiotics_fifteen, ':sensitivity_sixteen' => $antibiotics_sixteen, ':sensitivity_seventeen' => $sensitivity_seventeen, ':sensitivity_eighteen' => $sensitivity_eighteen, ':sensitivity_nineteen' => $sensitivity_nineteen, ':sensitivity_twenty' => $sensitivity_twenty, ':sensitivity_twenty_one' => $sensitivity_twenty_one, ':sensitivity_twenty_two' => $sensitivity_twenty_two, ':sensitivity_twenty_three' => $sensitivity_twenty_three, ':sensitivity_twenty_four' => $sensitivity_twenty_four, ':comments' => $comments, ':added_by' => $added_by]);

                return true;
            }catch(PDOException $ex){
            	return false;
            }
        }

        // fetch all blood_cs records
        public static function read_blood_cs($conn){
            try{
                $query = $conn->prepare('SELECT bcs.id, bcs.invoice_id, bcs.patient_id, bcs.culture, bcs.bacteria_one, bcs.bacteria_two, bcs.bacteria_three, bcs.antibiotics_one, bcs.antibiotics_two, bcs.antibiotics_three, bcs.antibiotics_four, bcs.antibiotics_five, bcs.antibiotics_six, bcs.antibiotics_seven, bcs.antibiotics_eight, bcs.antibiotics_nine, bcs.antibiotics_ten, bcs.antibiotics_eleven, bcs.antibiotics_twelve, bcs.antibiotics_thirteen, bcs.antibiotics_fourteen, bcs.antibiotics_fifteen, bcs.antibiotics_sixteen, bcs.antibiotics_seventeen, bcs.antibiotics_eighteen, bcs.antibiotics_nineteen, bcs.antibiotics_twenty, bcs.antibiotics_twenty_one, bcs.antibiotics_twenty_two, bcs.antibiotics_twenty_three, bcs.antibiotics_twenty_four, bcs.sensitivity_one, bcs.sensitivity_two, bcs.sensitivity_three, bcs.sensitivity_four, bcs.sensitivity_five, bcs.sensitivity_six, bcs.sensitivity_seven, bcs.sensitivity_eight, bcs.sensitivity_nine, bcs.sensitivity_ten, bcs.sensitivity_eleven, bcs.sensitivity_twelve, bcs.sensitivity_thirteen, bcs.sensitivity_fourteen, bcs.sensitivity_fifteen, bcs.sensitivity_sixteen, bcs.sensitivity_seventeen, bcs.sensitivity_eighteen, bcs.sensitivity_nineteen, bcs.sensitivity_twenty, bcs.sensitivity_twenty_one, bcs.sensitivity_twenty_two, bcs.sensitivity_twenty_three, bcs.sensitivity_twenty_four, bcs.comments, bcs.added_by, bcs.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM blood_cs bcs INNER JOIN patients p ON bcs.patient_id = p.patient_id INNER JOIN users u ON bcs.added_by = u.staff_id');
                $query->execute();

                return $query->fetchAll(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // fetch a blood_cs record
        public static function read_a_blood_cs($id, $conn){
            try{
                $query = $conn->prepare('SELECT bcs.id, bcs.invoice_id, bcs.patient_id, bcs.culture, bcs.bacteria_one, bcs.bacteria_two, bcs.bacteria_three, bcs.antibiotics_one, bcs.antibiotics_two, bcs.antibiotics_three, bcs.antibiotics_four, bcs.antibiotics_five, bcs.antibiotics_six, bcs.antibiotics_seven, bcs.antibiotics_eight, bcs.antibiotics_nine, bcs.antibiotics_ten, bcs.antibiotics_eleven, bcs.antibiotics_twelve, bcs.antibiotics_thirteen, bcs.antibiotics_fourteen, bcs.antibiotics_fifteen, bcs.antibiotics_sixteen, bcs.antibiotics_seventeen, bcs.antibiotics_eighteen, bcs.antibiotics_nineteen, bcs.antibiotics_twenty, bcs.antibiotics_twenty_one, bcs.antibiotics_twenty_two, bcs.antibiotics_twenty_three, bcs.antibiotics_twenty_four, bcs.sensitivity_one, bcs.sensitivity_two, bcs.sensitivity_three, bcs.sensitivity_four, bcs.sensitivity_five, bcs.sensitivity_six, bcs.sensitivity_seven, bcs.sensitivity_eight, bcs.sensitivity_nine, bcs.sensitivity_ten, bcs.sensitivity_eleven, bcs.sensitivity_twelve, bcs.sensitivity_thirteen, bcs.sensitivity_fourteen, bcs.sensitivity_fifteen, bcs.sensitivity_sixteen, bcs.sensitivity_seventeen, bcs.sensitivity_eighteen, bcs.sensitivity_nineteen, bcs.sensitivity_twenty, bcs.sensitivity_twenty_one, bcs.sensitivity_twenty_two, bcs.sensitivity_twenty_three, bcs.sensitivity_twenty_four, bcs.comments, bcs.added_by, bcs.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM blood_cs bcs INNER JOIN patients p ON bcs.patient_id = p.patient_id INNER JOIN users u ON bcs.added_by = u.staff_id WHERE bcs.id = :id');
                $query->execute([':id' => $id]);

                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // update a blood_cs record
        public static function update_blood_cs($id, $patient_id, $culture, $bacteria_one, $bacteria_two, $bacteria_three, $antibiotics_one, $antibiotics_two, $antibiotics_three, $antibiotics_four, $antibiotics_five, $antibiotics_six, $antibiotics_seven, $antibiotics_eight, $antibiotics_nine, $antibiotics_ten, $antibiotics_eleven, $antibiotics_twelve, $antibiotics_thirteen, $antibiotics_fourteen, $antibiotics_fifteen, $antibiotics_sixteen, $antibiotics_seventeen, $antibiotics_eighteen, $antibiotics_nineteen, $antibiotics_twenty, $antibiotics_twenty_one, $antibiotics_twenty_two, $antibiotics_twenty_three, $antibiotics_twenty_four, $sensitivity_one, $sensitivity_two, $sensitivity_three, $sensitivity_four, $sensitivity_five, $sensitivity_six, $sensitivity_seven, $sensitivity_eight, $sensitivity_nine, $sensitivity_ten, $sensitivity_eleven, $sensitivity_twelve, $sensitivity_thirteen, $sensitivity_fourteen, $sensitivity_fifteen, $sensitivity_sixteen, $sensitivity_seventeen, $sensitivity_eighteen, $sensitivity_nineteen, $sensitivity_twenty, $sensitivity_twenty_one, $sensitivity_twenty_two, $sensitivity_twenty_three, $sensitivity_twenty_four, $comments, $conn) {
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
                $query = $conn->prepare('UPDATE blood_cs SET patient_id = :patient_id, culture = :culture, bacteria_one = :bacteria_one, bacteria_two = :bacteria_two, bacteria_three = :bacteria_three, antibiotics_one = :antibiotics_one, antibiotics_two = :antibiotics_two, antibiotics_three = :antibiotics_three, antibiotics_four = :antibiotics_four, antibiotics_five = :antibiotics_five, antibiotics_six = :antibiotics_six, antibiotics_seven = :antibiotics_seven, antibiotics_eight = :antibiotics_eight, antibiotics_nine = :antibiotics_nine, antibiotics_ten = :antibiotics_ten, antibiotics_eleven = :antibiotics_eleven, antibiotics_twelve = :antibiotics_twelve, antibiotics_thirteen = :antibiotics_thirteen, antibiotics_fourteen = :antibiotics_fourteen, antibiotics_fifteen = :antibiotics_fifteen, antibiotics_sixteen = :antibiotics_sixteen, antibiotics_seventeen = :antibiotics_seventeen, antibiotics_eighteen = :antibiotics_eighteen, antibiotics_nineteen = :antibiotics_nineteen, antibiotics_twenty = :antibiotics_twenty, antibiotics_twenty_one = :antibiotics_twenty_one, antibiotics_twenty_two = :antibiotics_twenty_two, antibiotics_twenty_three = :antibiotics_twenty_three, antibiotics_twenty_four = :antibiotics_twenty_four, sensitivity_one = :sensitivity_one, sensitivity_two = :sensitivity_two, sensitivity_three = :sensitivity_three, sensitivity_four = :sensitivity_four, sensitivity_five = :sensitivity_five, sensitivity_six = :sensitivity_six, sensitivity_seven = :sensitivity_seven, sensitivity_eight = :sensitivity_eight, sensitivity_nine = :sensitivity_nine, sensitivity_ten = :sensitivity_ten, sensitivity_eleven = :sensitivity_eleven, sensitivity_twelve = :sensitivity_twelve, sensitivity_thirteen = :sensitivity_thirteen, sensitivity_fourteen = :sensitivity_fourteen, sensitivity_fifteen = :sensitivity_fifteen, sensitivity_sixteen = :sensitivity_sixteen, sensitivity_seventeen = :sensitivity_seventeen, sensitivity_eighteen = :sensitivity_eighteen, sensitivity_nineteen = :sensitivity_nineteen, sensitivity_twenty = :sensitivity_twenty, sensitivity_twenty_one = :sensitivity_twenty_one, sensitivity_twenty_two = :sensitivity_twenty_two, sensitivity_twenty_three = :sensitivity_twenty_three, sensitivity_twenty_four = :sensitivity_twenty_four, comments = :comments WHERE id = :id AND patient_id = :patient_id');
                $query->execute([':culture' => $culture, ':bacteria_one' => $bacteria_one, ':bacteria_two' => $bacteria_two, ':bacteria_three' => $bacteria_three, ':antibiotics_one' => $antibiotics_one, ':antibiotics_two' => $antibiotics_two, ':antibiotics_three' => $antibiotics_three, ':antibiotics_four' => $antibiotics_four, ':antibiotics_five' => $antibiotics_five, ':antibiotics_six' => $antibiotics_six, ':antibiotics_seven' => $antibiotics_seven, ':antibiotics_eight' => $antibiotics_eight, ':antibiotics_nine' => $antibiotics_nine, ':antibiotics_ten' => $antibiotics_ten, ':antibiotics_eleven' => $antibiotics_eleven, ':antibiotics_twelve' => $antibiotics_twelve, ':antibiotics_thirteen' => $antibiotics_thirteen, ':antibiotics_fourteen' => $antibiotics_fourteen, ':antibiotics_fifteen' => $antibiotics_fifteen, ':antibiotics_sixteen' => $antibiotics_sixteen, ':antibiotics_seventeen' => $antibiotics_seventeen, ':antibiotics_eighteen' => $antibiotics_eighteen, ':antibiotics_nineteen' => $antibiotics_nineteen, ':antibiotics_twenty' => $antibiotics_twenty, ':antibiotics_twenty_one' => $antibiotics_twenty_one, ':antibiotics_twenty_two' => $antibiotics_twenty_two, ':antibiotics_twenty_three' => $antibiotics_twenty_three, ':antibiotics_twenty_four' => $antibiotics_twenty_four, ':sensitivity_one' => $sensitivity_one, ':sensitivity_two' => $sensitivity_two, ':sensitivity_three' => $sensitivity_three, ':sensitivity_four' => $sensitivity_four, ':sensitivity_five' => $sensitivity_five, ':sensitivity_six' => $sensitivity_six, ':sensitivity_seven' => $sensitivity_seven, ':sensitivity_eight' => $sensitivity_eight, ':sensitivity_nine' => $sensitivity_nine, ':sensitivity_ten' => $sensitivity_ten, ':sensitivity_eleven' => $sensitivity_eleven, ':sensitivity_twelve' => $sensitivity_twelve, ':sensitivity_thirteen' => $sensitivity_thirteen, ':sensitivity_fourteen' => $sensitivity_fourteen, ':sensitivity_fifteen' => $sensitivity_fifteen, ':sensitivity_sixteen' => $sensitivity_sixteen, ':sensitivity_seventeen' => $sensitivity_seventeen, ':sensitivity_eighteen' => $sensitivity_eighteen, ':sensitivity_nineteen' => $sensitivity_nineteen, ':sensitivity_twenty' => $sensitivity_twenty, ':sensitivity_twenty_one' => $sensitivity_twenty_one, ':sensitivity_twenty_two' => $sensitivity_twenty_two, ':sensitivity_twenty_three' => $sensitivity_twenty_three, ':sensitivity_twenty_four' => $sensitivity_twenty_four, ':comments' => $comments, ':patient_id' => $patient_id, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

	}