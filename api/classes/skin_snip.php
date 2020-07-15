<?php
    require_once 'conn.php';
    require_once 'methods.php';
    require_once 'charge.php';

	class SkinSnip {

        // create a skin_snip record
        public static function create_skin_snip($patient_id, $onchocerca_volvulus, $m_streptocerca, $culture, $bacteria_one, $bacteria_two, $bacteria_three, $antibiotics_one, $antibiotics_two, $antibiotics_three, $antibiotics_four, $antibiotics_five, $antibiotics_six, $antibiotics_seven, $antibiotics_eight, $antibiotics_nine, $antibiotics_ten, $antibiotics_eleven, $antibiotics_twelve, $antibiotics_thirteen, $antibiotics_fourteen, $antibiotics_fifteen, $antibiotics_sixteen, $antibiotics_seventeen, $antibiotics_eighteen, $antibiotics_nineteen, $antibiotics_twenty, $antibiotics_twenty_one, $antibiotics_twenty_two, $antibiotics_twenty_three, $antibiotics_twenty_four, $sensitivity_one, $sensitivity_two, $sensitivity_three, $sensitivity_four, $sensitivity_five, $sensitivity_six, $sensitivity_seven, $sensitivity_eight, $sensitivity_nine, $sensitivity_ten, $sensitivity_eleven, $sensitivity_twelve, $sensitivity_thirteen, $sensitivity_fourteen, $sensitivity_fifteen, $sensitivity_sixteen, $sensitivity_seventeen, $sensitivity_eighteen, $sensitivity_nineteen, $sensitivity_twenty, $sensitivity_twenty_one, $sensitivity_twenty_two, $sensitivity_twenty_three, $sensitivity_twenty_four, $comments, $added_by, $conn){
            $invoice_id               = Methods::get_invoice_id('Skin Snip', $conn);
            $amount                   = Charge::read_charge('69', $conn);
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
                $query = $conn->prepare('INSERT INTO skin_snip(invoice_id, patient_id, onchocerca_volvulus, m_streptocerca, culture, bacteria_one, bacteria_two, bacteria_three, antibiotics_one, antibiotics_two, antibiotics_three, antibiotics_four, antibiotics_five, antibiotics_six, antibiotics_seven, antibiotics_eight, antibiotics_nine, antibiotics_ten, antibiotics_eleven, antibiotics_twelve, antibiotics_thirteen, antibiotics_fourteen, antibiotics_fifteen, antibiotics_sixteen, antibiotics_seventeen, antibiotics_eighteen, antibiotics_nineteen, antibiotics_twenty, antibiotics_twenty_one, antibiotics_twenty_two, antibiotics_twenty_three, antibiotics_twenty_four, sensitivity_one, sensitivity_two, sensitivity_three, sensitivity_four, sensitivity_five, sensitivity_six, sensitivity_seven, sensitivity_eight, sensitivity_nine, sensitivity_ten, sensitivity_eleven, sensitivity_twelve, sensitivity_thirteen, sensitivity_fourteen, sensitivity_fifteen, sensitivity_sixteen, sensitivity_seventeen, sensitivity_eighteen, sensitivity_nineteen, sensitivity_twenty, sensitivity_twenty_one, sensitivity_twenty_two, sensitivity_twenty_three, sensitivity_twenty_four, comments, added_by)  VALUES(:invoice_id, :patient_id, :onchocerca_volvulus, :m_streptocerca, :culture, :bacteria_one, :bacteria_two, :bacteria_three, :antibiotics_one, :antibiotics_two, :antibiotics_three, :antibiotics_four, :antibiotics_five, :antibiotics_six, :antibiotics_seven, :antibiotics_eight, :antibiotics_nine, :antibiotics_ten, :antibiotics_eleven, :antibiotics_twelve, :antibiotics_thirteen, :antibiotics_fourteen, :antibiotics_fifteen, :antibiotics_sixteen, :antibiotics_seventeen, :antibiotics_eighteen, :antibiotics_nineteen, :antibiotics_twenty, :antibiotics_twenty_one, :antibiotics_twenty_two, :antibiotics_twenty_three, :antibiotics_twenty_four, :sensitivity_one, :sensitivity_two, :sensitivity_three, :sensitivity_four, :sensitivity_five, :sensitivity_six, :sensitivity_seven, :sensitivity_eight, :sensitivity_nine, :sensitivity_ten, :sensitivity_eleven, :sensitivity_twelve, :sensitivity_thirteen, :sensitivity_fourteen, :sensitivity_fifteen, :sensitivity_sixteen, :sensitivity_seventeen, :sensitivity_eighteen, :sensitivity_nineteen, :sensitivity_twenty, :sensitivity_twenty_one, :sensitivity_twenty_two, :sensitivity_twenty_three, :sensitivity_twenty_four, :comments, :added_by)');
                $query->execute([':invoice_id' => $invoice_id, ':patient_id' => $patient_id, ':onchocerca_volvulus' => $onchocerca_volvulus, ':m_streptocerca' => $m_streptocerca, ':culture' => $culture, ':bacteria_one' => $bacteria_one, ':bacteria_two' => $bacteria_two, ':bacteria_three' => $bacteria_three, ':antibiotics_one' => $antibiotics_one, ':antibiotics_two' => $antibiotics_two, ':antibiotics_three' => $antibiotics_three, ':antibiotics_four' => $antibiotics_four, ':antibiotics_five' => $antibiotics_five, ':antibiotics_six' => $antibiotics_six, ':antibiotics_seven' => $antibiotics_seven, ':antibiotics_eight' => $antibiotics_eight, ':antibiotics_nine' => $antibiotics_nine, ':antibiotics_ten' => $antibiotics_ten, ':antibiotics_eleven' => $antibiotics_eleven, ':antibiotics_twelve' => $antibiotics_twelve, ':antibiotics_thirteen' => $antibiotics_thirteen, ':antibiotics_fourteen' => $antibiotics_fourteen, ':antibiotics_fifteen' => $antibiotics_fifteen, ':antibiotics_sixteen' => $antibiotics_sixteen, ':antibiotics_seventeen' => $antibiotics_seventeen, ':antibiotics_eighteen' => $antibiotics_eighteen, ':antibiotics_nineteen' => $antibiotics_nineteen, ':antibiotics_twenty' => $antibiotics_twenty, ':antibiotics_twenty_one' => $antibiotics_twenty_one, ':antibiotics_twenty_two' => $antibiotics_twenty_two, ':antibiotics_twenty_three' => $antibiotics_twenty_three, ':antibiotics_twenty_four' => $antibiotics_twenty_four, ':sensitivity_one' => $sensitivity_one, ':sensitivity_two' => $sensitivity_two, ':sensitivity_three' => $sensitivity_three, ':sensitivity_four' => $sensitivity_four, ':sensitivity_five' => $sensitivity_five, ':sensitivity_six' => $sensitivity_six, ':sensitivity_seven' => $sensitivity_seven, ':sensitivity_eight' => $sensitivity_eight, ':sensitivity_nine' => $sensitivity_nine, ':sensitivity_ten' => $sensitivity_ten, ':sensitivity_eleven' => $sensitivity_eleven, ':sensitivity_twelve' => $sensitivity_twelve, ':sensitivity_thirteen' => $sensitivity_thirteen, ':sensitivity_fourteen' => $sensitivity_fourteen, ':sensitivity_fifteen' => $sensitivity_fifteen, ':sensitivity_sixteen' => $sensitivity_sixteen, ':sensitivity_seventeen' => $sensitivity_seventeen, ':sensitivity_eighteen' => $sensitivity_eighteen, ':sensitivity_nineteen' => $sensitivity_nineteen, ':sensitivity_twenty' => $sensitivity_twenty, ':sensitivity_twenty_one' => $sensitivity_twenty_one, ':sensitivity_twenty_two' => $sensitivity_twenty_two, ':sensitivity_twenty_three' => $sensitivity_twenty_three, ':sensitivity_twenty_four' => $sensitivity_twenty_four, ':comments' => $comments, ':added_by' => $added_by]);

                return true;
            }catch(PDOException $ex){
            	return false;
            }
        }

        // fetch all skin_snip records
        public static function read_skin_snip($conn){
            try{
                $query = $conn->prepare('SELECT ss.id, ss.invoice_id, ss.patient_id, ss.onchocerca_volvulus, ss.m_streptocerca, ss.culture, ss.bacteria_one, ss.bacteria_two, ss.bacteria_three, ss.antibiotics_one, ss.antibiotics_two, ss.antibiotics_three, ss.antibiotics_four, ss.antibiotics_five, ss.antibiotics_six, ss.antibiotics_seven, ss.antibiotics_eight, ss.antibiotics_nine, ss.antibiotics_ten, ss.antibiotics_eleven, ss.antibiotics_twelve, ss.antibiotics_thirteen, ss.antibiotics_fourteen, ss.antibiotics_fifteen, ss.antibiotics_sixteen, ss.antibiotics_seventeen, ss.antibiotics_eighteen, ss.antibiotics_nineteen, ss.antibiotics_twenty, ss.antibiotics_twenty_one, ss.antibiotics_twenty_two, ss.antibiotics_twenty_three, ss.antibiotics_twenty_four, ss.sensitivity_one, ss.sensitivity_two, ss.sensitivity_three, ss.sensitivity_four, ss.sensitivity_five, ss.sensitivity_six, ss.sensitivity_seven, ss.sensitivity_eight, ss.sensitivity_nine, ss.sensitivity_ten, ss.sensitivity_eleven, ss.sensitivity_twelve, ss.sensitivity_thirteen, ss.sensitivity_fourteen, ss.sensitivity_fifteen, ss.sensitivity_sixteen, ss.sensitivity_seventeen, ss.sensitivity_eighteen, ss.sensitivity_nineteen, ss.sensitivity_twenty, ss.sensitivity_twenty_one, ss.sensitivity_twenty_two, ss.sensitivity_twenty_three, ss.sensitivity_twenty_four, ss.comments, ss.added_by, ss.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM skin_snip ss INNER JOIN patients p ON ss.patient_id = p.patient_id INNER JOIN users u ON ss.added_by = u.staff_id');
                $query->execute();

                return $query->fetchAll(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // fetch a skin_snip record
        public static function read_a_skin_snip($id, $conn){
            try{
                $query = $conn->prepare('SELECT ss.id, ss.invoice_id, ss.patient_id, ss.onchocerca_volvulus, ss.m_streptocerca, ss.culture, ss.bacteria_one, ss.bacteria_two, ss.bacteria_three, ss.antibiotics_one, ss.antibiotics_two, ss.antibiotics_three, ss.antibiotics_four, ss.antibiotics_five, ss.antibiotics_six, ss.antibiotics_seven, ss.antibiotics_eight, ss.antibiotics_nine, ss.antibiotics_ten, ss.antibiotics_eleven, ss.antibiotics_twelve, ss.antibiotics_thirteen, ss.antibiotics_fourteen, ss.antibiotics_fifteen, ss.antibiotics_sixteen, ss.antibiotics_seventeen, ss.antibiotics_eighteen, ss.antibiotics_nineteen, ss.antibiotics_twenty, ss.antibiotics_twenty_one, ss.antibiotics_twenty_two, ss.antibiotics_twenty_three, ss.antibiotics_twenty_four, ss.sensitivity_one, ss.sensitivity_two, ss.sensitivity_three, ss.sensitivity_four, ss.sensitivity_five, ss.sensitivity_six, ss.sensitivity_seven, ss.sensitivity_eight, ss.sensitivity_nine, ss.sensitivity_ten, ss.sensitivity_eleven, ss.sensitivity_twelve, ss.sensitivity_thirteen, ss.sensitivity_fourteen, ss.sensitivity_fifteen, ss.sensitivity_sixteen, ss.sensitivity_seventeen, ss.sensitivity_eighteen, ss.sensitivity_nineteen, ss.sensitivity_twenty, ss.sensitivity_twenty_one, ss.sensitivity_twenty_two, ss.sensitivity_twenty_three, ss.sensitivity_twenty_four, ss.comments, ss.added_by, ss.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM skin_snip ss INNER JOIN patients p ON ss.patient_id = p.patient_id INNER JOIN users u ON ss.added_by = u.staff_id WHERE ss.id = :id');
                $query->execute([':id' => $id]);

                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // update a skin_snip record
        public static function update_skin_snip($id, $patient_id, $onchocerca_volvulus, $m_streptocerca, $culture, $bacteria_one, $bacteria_two, $bacteria_three, $antibiotics_one, $antibiotics_two, $antibiotics_three, $antibiotics_four, $antibiotics_five, $antibiotics_six, $antibiotics_seven, $antibiotics_eight, $antibiotics_nine, $antibiotics_ten, $antibiotics_eleven, $antibiotics_twelve, $antibiotics_thirteen, $antibiotics_fourteen, $antibiotics_fifteen, $antibiotics_sixteen, $antibiotics_seventeen, $antibiotics_eighteen, $antibiotics_nineteen, $antibiotics_twenty, $antibiotics_twenty_one, $antibiotics_twenty_two, $antibiotics_twenty_three, $antibiotics_twenty_four, $sensitivity_one, $sensitivity_two, $sensitivity_three, $sensitivity_four, $sensitivity_five, $sensitivity_six, $sensitivity_seven, $sensitivity_eight, $sensitivity_nine, $sensitivity_ten, $sensitivity_eleven, $sensitivity_twelve, $sensitivity_thirteen, $sensitivity_fourteen, $sensitivity_fifteen, $sensitivity_sixteen, $sensitivity_seventeen, $sensitivity_eighteen, $sensitivity_nineteen, $sensitivity_twenty, $sensitivity_twenty_one, $sensitivity_twenty_two, $sensitivity_twenty_three, $sensitivity_twenty_four, $comments, $conn) {
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
                $query = $conn->prepare('UPDATE skin_snip SET patient_id = :patient_id, onchocerca_volvulus = :onchocerca_volvulus, m_streptocerca = :m_streptocerca, culture = :culture, bacteria_one = :bacteria_one, bacteria_two = :bacteria_two, bacteria_three = :bacteria_three, antibiotics_one = :antibiotics_one, antibiotics_two = :antibiotics_two, antibiotics_three = :antibiotics_three, antibiotics_four = :antibiotics_four, antibiotics_five = :antibiotics_five, antibiotics_six = :antibiotics_six, antibiotics_seven = :antibiotics_seven, antibiotics_eight = :antibiotics_eight, antibiotics_nine = :antibiotics_nine, antibiotics_ten = :antibiotics_ten, antibiotics_eleven = :antibiotics_eleven, antibiotics_twelve = :antibiotics_twelve, antibiotics_thirteen = :antibiotics_thirteen, antibiotics_fourteen = :antibiotics_fourteen, antibiotics_fifteen = :antibiotics_fifteen, antibiotics_sixteen = :antibiotics_sixteen, antibiotics_seventeen = :antibiotics_seventeen, antibiotics_eighteen = :antibiotics_eighteen, antibiotics_nineteen = :antibiotics_nineteen, antibiotics_twenty = :antibiotics_twenty, antibiotics_twenty_one = :antibiotics_twenty_one, antibiotics_twenty_two = :antibiotics_twenty_two, antibiotics_twenty_three = :antibiotics_twenty_three, antibiotics_twenty_four = :antibiotics_twenty_four, sensitivity_one = :sensitivity_one, sensitivity_two = :sensitivity_two, sensitivity_three = :sensitivity_three, sensitivity_four = :sensitivity_four, sensitivity_five = :sensitivity_five, sensitivity_six = :sensitivity_six, sensitivity_seven = :sensitivity_seven, sensitivity_eight = :sensitivity_eight, sensitivity_nine = :sensitivity_nine, sensitivity_ten = :sensitivity_ten, sensitivity_eleven = :sensitivity_eleven, sensitivity_twelve = :sensitivity_twelve, sensitivity_thirteen = :sensitivity_thirteen, sensitivity_fourteen = :sensitivity_fourteen, sensitivity_fifteen = :sensitivity_fifteen, sensitivity_sixteen = :sensitivity_sixteen, sensitivity_seventeen = :sensitivity_seventeen, sensitivity_eighteen = :sensitivity_eighteen, sensitivity_nineteen = :sensitivity_nineteen, sensitivity_twenty = :sensitivity_twenty, sensitivity_twenty_one = :sensitivity_twenty_one, sensitivity_twenty_two = :sensitivity_twenty_two, sensitivity_twenty_three = :sensitivity_twenty_three, sensitivity_twenty_four = :sensitivity_twenty_four, comments = :comments WHERE id = :id AND patient_id = :patient_id');
                $query->execute([':onchocerca_volvulus' => $onchocerca_volvulus, ':m_streptocerca' => $m_streptocerca, ':culture' => $culture, ':bacteria_one' => $bacteria_one, ':bacteria_two' => $bacteria_two, ':bacteria_three' => $bacteria_three, ':antibiotics_one' => $antibiotics_one, ':antibiotics_one' => $antibiotics_one, ':antibiotics_two' => $antibiotics_two, ':antibiotics_three' => $antibiotics_three, ':antibiotics_four' => $antibiotics_four, ':antibiotics_five' => $antibiotics_five, ':antibiotics_six' => $antibiotics_six, ':antibiotics_seven' => $antibiotics_seven, ':antibiotics_eight' => $antibiotics_eight, ':antibiotics_nine' => $antibiotics_nine, ':antibiotics_ten' => $antibiotics_ten, ':antibiotics_eleven' => $antibiotics_eleven, ':antibiotics_twelve' => $antibiotics_twelve, ':antibiotics_thirteen' => $antibiotics_thirteen, ':antibiotics_fourteen' => $antibiotics_fourteen, ':antibiotics_fifteen' => $antibiotics_fifteen, ':antibiotics_sixteen' => $antibiotics_sixteen, ':antibiotics_seventeen' => $antibiotics_seventeen, ':antibiotics_eighteen' => $antibiotics_eighteen, ':antibiotics_nineteen' => $antibiotics_nineteen, ':antibiotics_twenty' => $antibiotics_twenty, ':antibiotics_twenty_one' => $antibiotics_twenty_one, ':antibiotics_twenty_two' => $antibiotics_twenty_two, ':antibiotics_twenty_three' => $antibiotics_twenty_three, ':antibiotics_twenty_four' => $antibiotics_twenty_four, ':sensitivity_one' => $sensitivity_one, ':sensitivity_two' => $sensitivity_two, ':sensitivity_three' => $sensitivity_three, ':sensitivity_four' => $sensitivity_four, ':sensitivity_five' => $sensitivity_five, ':sensitivity_six' => $sensitivity_six, ':sensitivity_seven' => $sensitivity_seven, ':sensitivity_eight' => $sensitivity_eight, ':sensitivity_nine' => $sensitivity_nine, ':sensitivity_ten' => $sensitivity_ten, ':sensitivity_eleven' => $sensitivity_eleven, ':sensitivity_twelve' => $sensitivity_twelve, ':sensitivity_thirteen' => $sensitivity_thirteen, ':sensitivity_fourteen' => $sensitivity_fourteen, ':sensitivity_fifteen' => $sensitivity_fifteen, ':sensitivity_sixteen' => $sensitivity_sixteen, ':sensitivity_seventeen' => $sensitivity_seventeen, ':sensitivity_eighteen' => $sensitivity_eighteen, ':sensitivity_nineteen' => $sensitivity_nineteen, ':sensitivity_twenty' => $sensitivity_twenty, ':sensitivity_twenty_one' => $sensitivity_twenty_one, ':sensitivity_twenty_two' => $sensitivity_twenty_two, ':sensitivity_twenty_three' => $sensitivity_twenty_three, ':sensitivity_twenty_four' => $sensitivity_twenty_four, ':comments' => $comments, ':patient_id' => $patient_id, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

	}