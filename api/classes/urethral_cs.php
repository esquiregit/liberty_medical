<?php
    require_once 'conn.php';
    require_once 'methods.php';
    require_once 'charge.php';

	class UrethralCS {

        // create a urethral_cs record
        public static function create_urethral_cs($patient_id, $gram_stain, $culture, $bacteria_one, $bacteria_two, $bacteria_three, $antibiotics_one, $antibiotics_two, $antibiotics_three, $antibiotics_four, $antibiotics_five, $antibiotics_six, $antibiotics_seven, $antibiotics_eight, $antibiotics_nine, $antibiotics_ten, $antibiotics_eleven, $antibiotics_twelve, $antibiotics_thirteen, $antibiotics_fourteen, $antibiotics_fifteen, $antibiotics_sixteen, $antibiotics_seventeen, $antibiotics_eighteen, $antibiotics_nineteen, $antibiotics_twenty, $antibiotics_twenty_one, $antibiotics_twenty_two, $antibiotics_twenty_three, $antibiotics_twenty_four, $sensitivity_one, $sensitivity_two, $sensitivity_three, $sensitivity_four, $sensitivity_five, $sensitivity_six, $sensitivity_seven, $sensitivity_eight, $sensitivity_nine, $sensitivity_ten, $sensitivity_eleven, $sensitivity_twelve, $sensitivity_thirteen, $sensitivity_fourteen, $sensitivity_fifteen, $sensitivity_sixteen, $sensitivity_seventeen, $sensitivity_eighteen, $sensitivity_nineteen, $sensitivity_twenty, $sensitivity_twenty_one, $sensitivity_twenty_two, $sensitivity_twenty_three, $sensitivity_twenty_four, $comments, $added_by, $conn){
            $invoice_id               = Methods::get_invoice_id('Urethral C/S', $conn);
            $amount                   = Charge::read_charge('78', $conn);
            $gram_stain               = implode(', ', $gram_stain);
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
                $query = $conn->prepare('INSERT INTO urethral_cs(invoice_id, patient_id, gram_stain, culture, bacteria_one, bacteria_two, bacteria_three, antibiotics_one, antibiotics_two, antibiotics_three, antibiotics_four, antibiotics_five, antibiotics_six, antibiotics_seven, antibiotics_eight, antibiotics_nine, antibiotics_ten, antibiotics_eleven, antibiotics_twelve, antibiotics_thirteen, antibiotics_fourteen, antibiotics_fifteen, antibiotics_sixteen, antibiotics_seventeen, antibiotics_eighteen, antibiotics_nineteen, antibiotics_twenty, antibiotics_twenty_one, antibiotics_twenty_two, antibiotics_twenty_three, antibiotics_twenty_four, sensitivity_one, sensitivity_two, sensitivity_three, sensitivity_four, sensitivity_five, sensitivity_six, sensitivity_seven, sensitivity_eight, sensitivity_nine, sensitivity_ten, sensitivity_eleven, sensitivity_twelve, sensitivity_thirteen, sensitivity_fourteen, sensitivity_fifteen, sensitivity_sixteen, sensitivity_seventeen, sensitivity_eighteen, sensitivity_nineteen, sensitivity_twenty, sensitivity_twenty_one, sensitivity_twenty_two, sensitivity_twenty_three, sensitivity_twenty_four, comments, added_by)  VALUES(:invoice_id, :patient_id, :gram_stain, :culture, :bacteria_one, :bacteria_two, :bacteria_three, :antibiotics_one, :antibiotics_two, :antibiotics_three, :antibiotics_four, :antibiotics_five, :antibiotics_six, :antibiotics_seven, :antibiotics_eight, :antibiotics_nine, :antibiotics_ten, :antibiotics_eleven, :antibiotics_twelve, :antibiotics_thirteen, :antibiotics_fourteen, :antibiotics_fifteen, :antibiotics_sixteen, :antibiotics_seventeen, :antibiotics_eighteen, :antibiotics_nineteen, :antibiotics_twenty, :antibiotics_twenty_one, :antibiotics_twenty_two, :antibiotics_twenty_three, :antibiotics_twenty_four, :sensitivity_one, :sensitivity_two, :sensitivity_three, :sensitivity_four, :sensitivity_five, :sensitivity_six, :sensitivity_seven, :sensitivity_eight, :sensitivity_nine, :sensitivity_ten, :sensitivity_eleven, :sensitivity_twelve, :sensitivity_thirteen, :sensitivity_fourteen, :sensitivity_fifteen, :sensitivity_sixteen, :sensitivity_seventeen, :sensitivity_eighteen, :sensitivity_nineteen, :sensitivity_twenty, :sensitivity_twenty_one, :sensitivity_twenty_two, :sensitivity_twenty_three, :sensitivity_twenty_four, :comments, :added_by)');
                $query->execute([':invoice_id' => $invoice_id, ':patient_id' => $patient_id, ':gram_stain' => $gram_stain, ':culture' => $culture, ':bacteria_one' => $bacteria_one, ':bacteria_two' => $bacteria_two, ':bacteria_three' => $bacteria_three, ':antibiotics_one' => $antibiotics_one, ':antibiotics_two' => $antibiotics_two, ':antibiotics_three' => $antibiotics_three, ':antibiotics_four' => $antibiotics_four, ':antibiotics_five' => $antibiotics_five, ':antibiotics_six' => $antibiotics_six, ':antibiotics_seven' => $antibiotics_seven, ':antibiotics_eight' => $antibiotics_eight, ':antibiotics_nine' => $antibiotics_nine, ':antibiotics_ten' => $antibiotics_ten, ':antibiotics_eleven' => $antibiotics_eleven, ':antibiotics_twelve' => $antibiotics_twelve, ':antibiotics_thirteen' => $antibiotics_thirteen, ':antibiotics_fourteen' => $antibiotics_fourteen, ':antibiotics_fifteen' => $antibiotics_fifteen, ':antibiotics_sixteen' => $antibiotics_sixteen, ':antibiotics_seventeen' => $antibiotics_seventeen, ':antibiotics_eighteen' => $antibiotics_eighteen, ':antibiotics_nineteen' => $antibiotics_nineteen, ':antibiotics_twenty' => $antibiotics_twenty, ':antibiotics_twenty_one' => $antibiotics_twenty_one, ':antibiotics_twenty_two' => $antibiotics_twenty_two, ':antibiotics_twenty_three' => $antibiotics_twenty_three, ':antibiotics_twenty_four' => $antibiotics_twenty_four, ':sensitivity_one' => $sensitivity_one, ':sensitivity_two' => $sensitivity_two, ':sensitivity_three' => $sensitivity_three, ':sensitivity_four' => $sensitivity_four, ':sensitivity_five' => $sensitivity_five, ':sensitivity_six' => $sensitivity_six, ':sensitivity_seven' => $sensitivity_seven, ':sensitivity_eight' => $sensitivity_eight, ':sensitivity_nine' => $sensitivity_nine, ':sensitivity_ten' => $sensitivity_ten, ':sensitivity_eleven' => $sensitivity_eleven, ':sensitivity_twelve' => $sensitivity_twelve, ':sensitivity_thirteen' => $sensitivity_thirteen, ':sensitivity_fourteen' => $sensitivity_fourteen, ':sensitivity_fifteen' => $sensitivity_fifteen, ':sensitivity_sixteen' => $sensitivity_sixteen, ':sensitivity_seventeen' => $sensitivity_seventeen, ':sensitivity_eighteen' => $sensitivity_eighteen, ':sensitivity_nineteen' => $sensitivity_nineteen, ':sensitivity_twenty' => $sensitivity_twenty, ':sensitivity_twenty_one' => $sensitivity_twenty_one, ':sensitivity_twenty_two' => $sensitivity_twenty_two, ':sensitivity_twenty_three' => $sensitivity_twenty_three, ':sensitivity_twenty_four' => $sensitivity_twenty_four, ':comments' => $comments, ':added_by' => $added_by]);

                return true;
            }catch(PDOException $ex){
            	return false;
            }
        }

        // fetch all urethral_cs records
        public static function read_urethral_cs($conn){
            try{
                $query = $conn->prepare('SELECT ut.id, ut.invoice_id, ut.patient_id, ut.gram_stain, ut.culture, ut.bacteria_one, ut.bacteria_two, ut.bacteria_three, ut.antibiotics_one, ut.antibiotics_two, ut.antibiotics_three, ut.antibiotics_four, ut.antibiotics_five, ut.antibiotics_six, ut.antibiotics_seven, ut.antibiotics_eight, ut.antibiotics_nine, ut.antibiotics_ten, ut.antibiotics_eleven, ut.antibiotics_twelve, ut.antibiotics_thirteen, ut.antibiotics_fourteen, ut.antibiotics_fifteen, ut.antibiotics_sixteen, ut.antibiotics_seventeen, ut.antibiotics_eighteen, ut.antibiotics_nineteen, ut.antibiotics_twenty, ut.antibiotics_twenty_one, ut.antibiotics_twenty_two, ut.antibiotics_twenty_three, ut.antibiotics_twenty_four, ut.sensitivity_one, ut.sensitivity_two, ut.sensitivity_three, ut.sensitivity_four, ut.sensitivity_five, ut.sensitivity_six, ut.sensitivity_seven, ut.sensitivity_eight, ut.sensitivity_nine, ut.sensitivity_ten, ut.sensitivity_eleven, ut.sensitivity_twelve, ut.sensitivity_thirteen, ut.sensitivity_fourteen, ut.sensitivity_fifteen, ut.sensitivity_sixteen, ut.sensitivity_seventeen, ut.sensitivity_eighteen, ut.sensitivity_nineteen, ut.sensitivity_twenty, ut.sensitivity_twenty_one, ut.sensitivity_twenty_two, ut.sensitivity_twenty_three, ut.sensitivity_twenty_four, ut.comments, ut.added_by, ut.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM urethral_cs ut INNER JOIN patients p ON ut.patient_id = p.patient_id INNER JOIN users u ON ut.added_by = u.staff_id');
                $query->execute();

                return $query->fetchAll(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // fetch a urethral_cs record
        public static function read_a_urethral_cs($id, $conn){
            try{
                $query = $conn->prepare('SELECT ut.id, ut.invoice_id, ut.patient_id, ut.gram_stain, ut.culture, ut.bacteria_one, ut.bacteria_two, ut.bacteria_three, ut.antibiotics_one, ut.antibiotics_two, ut.antibiotics_three, ut.antibiotics_four, ut.antibiotics_five, ut.antibiotics_six, ut.antibiotics_seven, ut.antibiotics_eight, ut.antibiotics_nine, ut.antibiotics_ten, ut.antibiotics_eleven, ut.antibiotics_twelve, ut.antibiotics_thirteen, ut.antibiotics_fourteen, ut.antibiotics_fifteen, ut.antibiotics_sixteen, ut.antibiotics_seventeen, ut.antibiotics_eighteen, ut.antibiotics_nineteen, ut.antibiotics_twenty, ut.antibiotics_twenty_one, ut.antibiotics_twenty_two, ut.antibiotics_twenty_three, ut.antibiotics_twenty_four, ut.sensitivity_one, ut.sensitivity_two, ut.sensitivity_three, ut.sensitivity_four, ut.sensitivity_five, ut.sensitivity_six, ut.sensitivity_seven, ut.sensitivity_eight, ut.sensitivity_nine, ut.sensitivity_ten, ut.sensitivity_eleven, ut.sensitivity_twelve, ut.sensitivity_thirteen, ut.sensitivity_fourteen, ut.sensitivity_fifteen, ut.sensitivity_sixteen, ut.sensitivity_seventeen, ut.sensitivity_eighteen, ut.sensitivity_nineteen, ut.sensitivity_twenty, ut.sensitivity_twenty_one, ut.sensitivity_twenty_two, ut.sensitivity_twenty_three, ut.sensitivity_twenty_four, ut.comments, ut.added_by, ut.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM urethral_cs ut INNER JOIN patients p ON ut.patient_id = p.patient_id INNER JOIN users u ON ut.added_by = u.staff_id WHERE ut.id = :id');
                $query->execute([':id' => $id]);

                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // update a urethral_cs record
        public static function update_urethral_cs($id, $patient_id, $gram_stain, $culture, $bacteria_one, $bacteria_two, $bacteria_three, $antibiotics_one, $antibiotics_two, $antibiotics_three, $antibiotics_four, $antibiotics_five, $antibiotics_six, $antibiotics_seven, $antibiotics_eight, $antibiotics_nine, $antibiotics_ten, $antibiotics_eleven, $antibiotics_twelve, $antibiotics_thirteen, $antibiotics_fourteen, $antibiotics_fifteen, $antibiotics_sixteen, $antibiotics_seventeen, $antibiotics_eighteen, $antibiotics_nineteen, $antibiotics_twenty, $antibiotics_twenty_one, $antibiotics_twenty_two, $antibiotics_twenty_three, $antibiotics_twenty_four, $sensitivity_one, $sensitivity_two, $sensitivity_three, $sensitivity_four, $sensitivity_five, $sensitivity_six, $sensitivity_seven, $sensitivity_eight, $sensitivity_nine, $sensitivity_ten, $sensitivity_eleven, $sensitivity_twelve, $sensitivity_thirteen, $sensitivity_fourteen, $sensitivity_fifteen, $sensitivity_sixteen, $sensitivity_seventeen, $sensitivity_eighteen, $sensitivity_nineteen, $sensitivity_twenty, $sensitivity_twenty_one, $sensitivity_twenty_two, $sensitivity_twenty_three, $sensitivity_twenty_four, $comments, $conn) {
            $gram_stain               = implode(', ', $gram_stain);
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
                $query = $conn->prepare('UPDATE urethral_cs SET patient_id = :patient_id, gram_stain = :gram_stain, culture = :culture, bacteria_one = :bacteria_one, bacteria_two = :bacteria_two, bacteria_three = :bacteria_three, antibiotics_one = :antibiotics_one, antibiotics_two = :antibiotics_two, antibiotics_three = :antibiotics_three, antibiotics_four = :antibiotics_four, antibiotics_five = :antibiotics_five, antibiotics_six = :antibiotics_six, antibiotics_seven = :antibiotics_seven, antibiotics_eight = :antibiotics_eight, antibiotics_nine = :antibiotics_nine, antibiotics_ten = :antibiotics_ten, antibiotics_eleven = :antibiotics_eleven, antibiotics_twelve = :antibiotics_twelve, antibiotics_thirteen = :antibiotics_thirteen, antibiotics_fourteen = :antibiotics_fourteen, antibiotics_fifteen = :antibiotics_fifteen, antibiotics_sixteen = :antibiotics_sixteen, antibiotics_seventeen = :antibiotics_seventeen, antibiotics_eighteen = :antibiotics_eighteen, antibiotics_nineteen = :antibiotics_nineteen, antibiotics_twenty = :antibiotics_twenty, antibiotics_twenty_one = :antibiotics_twenty_one, antibiotics_twenty_two = :antibiotics_twenty_two, antibiotics_twenty_three = :antibiotics_twenty_three, antibiotics_twenty_four = :antibiotics_twenty_four, sensitivity_one = :sensitivity_one, sensitivity_two = :sensitivity_two, sensitivity_three = :sensitivity_three, sensitivity_four = :sensitivity_four, sensitivity_five = :sensitivity_five, sensitivity_six = :sensitivity_six, sensitivity_seven = :sensitivity_seven, sensitivity_eight = :sensitivity_eight, sensitivity_nine = :sensitivity_nine, sensitivity_ten = :sensitivity_ten, sensitivity_eleven = :sensitivity_eleven, sensitivity_twelve = :sensitivity_twelve, sensitivity_thirteen = :sensitivity_thirteen, sensitivity_fourteen = :sensitivity_fourteen, sensitivity_fifteen = :sensitivity_fifteen, sensitivity_sixteen = :sensitivity_sixteen, sensitivity_seventeen = :sensitivity_seventeen, sensitivity_eighteen = :sensitivity_eighteen, sensitivity_nineteen = :sensitivity_nineteen, sensitivity_twenty = :sensitivity_twenty, sensitivity_twenty_one = :sensitivity_twenty_one, sensitivity_twenty_two = :sensitivity_twenty_two, sensitivity_twenty_three = :sensitivity_twenty_three, sensitivity_twenty_four = :sensitivity_twenty_four, comments = :comments WHERE id = :id AND patient_id = :patient_id');
                $query->execute([':gram_stain' => $gram_stain, ':culture' => $culture, ':bacteria_one' => $bacteria_one, ':bacteria_two' => $bacteria_two, ':bacteria_three' => $bacteria_three, ':antibiotics_one' => $antibiotics_one, ':antibiotics_two' => $antibiotics_two, ':antibiotics_three' => $antibiotics_three, ':antibiotics_four' => $antibiotics_four, ':antibiotics_five' => $antibiotics_five, ':antibiotics_six' => $antibiotics_six, ':antibiotics_seven' => $antibiotics_seven, ':antibiotics_eight' => $antibiotics_eight, ':antibiotics_nine' => $antibiotics_nine, ':antibiotics_ten' => $antibiotics_ten, ':antibiotics_eleven' => $antibiotics_eleven, ':antibiotics_twelve' => $antibiotics_twelve, ':antibiotics_thirteen' => $antibiotics_thirteen, ':antibiotics_fourteen' => $antibiotics_fourteen, ':antibiotics_fifteen' => $antibiotics_fifteen, ':antibiotics_sixteen' => $antibiotics_sixteen, ':antibiotics_seventeen' => $antibiotics_seventeen, ':antibiotics_eighteen' => $antibiotics_eighteen, ':antibiotics_nineteen' => $antibiotics_nineteen, ':antibiotics_twenty' => $antibiotics_twenty, ':antibiotics_twenty_one' => $antibiotics_twenty_one, ':antibiotics_twenty_two' => $antibiotics_twenty_two, ':antibiotics_twenty_three' => $antibiotics_twenty_three, ':antibiotics_twenty_four' => $antibiotics_twenty_four, ':sensitivity_one' => $sensitivity_one, ':sensitivity_two' => $sensitivity_two, ':sensitivity_three' => $sensitivity_three, ':sensitivity_four' => $sensitivity_four, ':sensitivity_five' => $sensitivity_five, ':sensitivity_six' => $sensitivity_six, ':sensitivity_seven' => $sensitivity_seven, ':sensitivity_eight' => $sensitivity_eight, ':sensitivity_nine' => $sensitivity_nine, ':sensitivity_ten' => $sensitivity_ten, ':sensitivity_eleven' => $sensitivity_eleven, ':sensitivity_twelve' => $sensitivity_twelve, ':sensitivity_thirteen' => $sensitivity_thirteen, ':sensitivity_fourteen' => $sensitivity_fourteen, ':sensitivity_fifteen' => $sensitivity_fifteen, ':sensitivity_sixteen' => $sensitivity_sixteen, ':sensitivity_seventeen' => $sensitivity_seventeen, ':sensitivity_eighteen' => $sensitivity_eighteen, ':sensitivity_nineteen' => $sensitivity_nineteen, ':sensitivity_twenty' => $sensitivity_twenty, ':sensitivity_twenty_one' => $sensitivity_twenty_one, ':sensitivity_twenty_two' => $sensitivity_twenty_two, ':sensitivity_twenty_three' => $sensitivity_twenty_three, ':sensitivity_twenty_four' => $sensitivity_twenty_four, ':comments' => $comments, ':patient_id' => $patient_id, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

	}