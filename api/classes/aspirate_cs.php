<?php
    require_once 'conn.php';
    require_once 'methods.php';
    require_once 'charge.php';

	class AspirateCS {

        // create a aspirate_cs record
        public static function create_aspirate_cs($patient_id, $gram_stain, $zn_stain, $fungal_element, $culture, $bacteria_one, $bacteria_two, $antibiotics_one, $antibiotics_two, $antibiotics_three, $antibiotics_four, $antibiotics_five, $antibiotics_six, $antibiotics_seven, $antibiotics_eight, $antibiotics_nine, $antibiotics_ten, $antibiotics_eleven, $antibiotics_twelve, $antibiotics_thirteen, $antibiotics_fourteen, $antibiotics_fifteen, $antibiotics_sixteen, $sensitivity_one, $sensitivity_two, $sensitivity_three, $sensitivity_four, $sensitivity_five, $sensitivity_six, $sensitivity_seven, $sensitivity_eight, $sensitivity_nine, $sensitivity_ten, $sensitivity_eleven, $sensitivity_twelve, $sensitivity_thirteen, $sensitivity_fourteen, $sensitivity_fifteen, $sensitivity_sixteen, $comments, $added_by, $conn){
            $invoice_id           = Methods::get_invoice_id('Aspirate C/S', $conn);
            $amount               = Charge::read_charge('4', $conn);
            $gram_stain           = is_array($gram_stain) ? implode(', ', $gram_stain) : $gram_stain;
            $zn_stain             = is_array($zn_stain) ? implode(', ', $zn_stain) : $zn_stain;
            $fungal_element       = is_array($fungal_element) ? implode(', ', $fungal_element) : $fungal_element;
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
                $query = $conn->prepare('INSERT INTO aspirate_cs(invoice_id, patient_id, gram_stain, zn_stain, fungal_element, culture, bacteria_one, bacteria_two, antibiotics_one, antibiotics_two, antibiotics_three, antibiotics_four, antibiotics_five, antibiotics_six, antibiotics_seven, antibiotics_eight, antibiotics_nine, antibiotics_ten, antibiotics_eleven, antibiotics_twelve, antibiotics_thirteen, antibiotics_fourteen, antibiotics_fifteen, antibiotics_sixteen, sensitivity_one, sensitivity_two, sensitivity_three, sensitivity_four, sensitivity_five, sensitivity_six, sensitivity_seven, sensitivity_eight, sensitivity_nine, sensitivity_ten, sensitivity_eleven, sensitivity_twelve, sensitivity_thirteen, sensitivity_fourteen, sensitivity_fifteen, sensitivity_sixteen, comments, added_by) VALUES(:invoice_id, :patient_id, :gram_stain, :zn_stain, :fungal_element, :culture, :bacteria_one, :bacteria_two, :antibiotics_one, :antibiotics_two, :antibiotics_three, :antibiotics_four, :antibiotics_five, :antibiotics_six, :antibiotics_seven, :antibiotics_eight, :antibiotics_nine, :antibiotics_ten, :antibiotics_eleven, :antibiotics_twelve, :antibiotics_thirteen, :antibiotics_fourteen, :antibiotics_fifteen, :antibiotics_sixteen, :sensitivity_one, :sensitivity_two, :sensitivity_three, :sensitivity_four, :sensitivity_five, :sensitivity_six, :sensitivity_seven, :sensitivity_eight, :sensitivity_nine, :sensitivity_ten, :sensitivity_eleven, :sensitivity_twelve, :sensitivity_thirteen, :sensitivity_fourteen, :sensitivity_fifteen, :sensitivity_sixteen, :comments, :added_by)');
                $query->execute([':invoice_id' => $invoice_id, ':patient_id' => $patient_id, ':gram_stain' => $gram_stain, ':zn_stain' => $zn_stain, ':fungal_element' => $fungal_element, ':culture' => $culture, ':bacteria_one' => $bacteria_one, ':bacteria_two' => $bacteria_two, ':antibiotics_one' => $antibiotics_one, ':antibiotics_two' => $antibiotics_two, ':antibiotics_three' => $antibiotics_three, ':antibiotics_four' => $antibiotics_four, ':antibiotics_five' => $antibiotics_five, ':antibiotics_six' => $antibiotics_six, ':antibiotics_seven' => $antibiotics_seven, ':antibiotics_eight' => $antibiotics_eight, ':antibiotics_nine' => $antibiotics_nine, ':antibiotics_ten' => $antibiotics_ten, ':antibiotics_eleven' => $antibiotics_eleven, ':antibiotics_twelve' => $antibiotics_twelve, ':antibiotics_thirteen' => $antibiotics_thirteen, ':antibiotics_fourteen' => $antibiotics_fourteen, ':antibiotics_fifteen' => $antibiotics_fifteen, ':antibiotics_sixteen' => $antibiotics_sixteen, ':sensitivity_one' => $sensitivity_one, ':sensitivity_two' => $sensitivity_two, ':sensitivity_three' => $sensitivity_three, ':sensitivity_four' => $sensitivity_four, ':sensitivity_five' => $sensitivity_five, ':sensitivity_six' => $sensitivity_six, ':sensitivity_seven' => $sensitivity_seven, ':sensitivity_eight' => $sensitivity_eight, ':sensitivity_nine' => $sensitivity_nine, ':sensitivity_ten' => $sensitivity_ten, ':sensitivity_eleven' => $sensitivity_eleven, ':sensitivity_twelve' => $sensitivity_twelve, ':sensitivity_thirteen' => $sensitivity_thirteen, ':sensitivity_fourteen' => $sensitivity_fourteen, ':sensitivity_fifteen' => $sensitivity_fifteen, ':sensitivity_sixteen' => $sensitivity_sixteen, ':comments' => $comments, ':added_by' => $added_by]);

                return true;
            }catch(PDOException $ex){
            	return false;
            }
        }

        // fetch all aspirate_cs records
        public static function read_aspirate_cs($conn){
            try{
                $query = $conn->prepare('SELECT af.id, af.invoice_id, af.patient_id, af.gram_stain, af.zn_stain, af.fungal_element, af.culture, af.bacteria_one, af.bacteria_two, af.antibiotics_one, af.antibiotics_two, af.antibiotics_three, af.antibiotics_four, af.antibiotics_five, af.antibiotics_six, af.antibiotics_seven, af.antibiotics_eight, af.antibiotics_nine, af.antibiotics_ten, af.antibiotics_eleven, af.antibiotics_twelve, af.antibiotics_thirteen, af.antibiotics_fourteen, af.antibiotics_fifteen, af.antibiotics_sixteen, af.sensitivity_one, af.sensitivity_two, af.sensitivity_three, af.sensitivity_four, af.sensitivity_five, af.sensitivity_six, af.sensitivity_seven, af.sensitivity_eight, af.sensitivity_nine, af.sensitivity_ten, af.sensitivity_eleven, af.sensitivity_twelve, af.sensitivity_thirteen, af.sensitivity_fourteen, af.sensitivity_fifteen, af.sensitivity_sixteen, af.comments, af.added_by, af.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM aspirate_cs af INNER JOIN patients p ON af.patient_id = p.patient_id INNER JOIN users u ON af.added_by = u.staff_id');
                $query->execute();

                return $query->fetchAll(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // fetch a aspirate_cs record
        public static function read_a_aspirate_cs($id, $conn){
            try{
                $query = $conn->prepare('SELECT af.id, af.invoice_id, af.patient_id, af.gram_stain, af.zn_stain, af.fungal_element, af.culture, af.bacteria_one, af.bacteria_two, af.antibiotics_one, af.antibiotics_two, af.antibiotics_three, af.antibiotics_four, af.antibiotics_five, af.antibiotics_six, af.antibiotics_seven, af.antibiotics_eight, af.antibiotics_nine, af.antibiotics_ten, af.antibiotics_eleven, af.antibiotics_twelve, af.antibiotics_thirteen, af.antibiotics_fourteen, af.antibiotics_fifteen, af.antibiotics_sixteen, af.sensitivity_one, af.sensitivity_two, af.sensitivity_three, af.sensitivity_four, af.sensitivity_five, af.sensitivity_six, af.sensitivity_seven, af.sensitivity_eight, af.sensitivity_nine, af.sensitivity_ten, af.sensitivity_eleven, af.sensitivity_twelve, af.sensitivity_thirteen, af.sensitivity_fourteen, af.sensitivity_fifteen, af.sensitivity_sixteen, af.comments, af.added_by, af.date_added, af.amount, af.payment_type, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM aspirate_cs af INNER JOIN patients p ON af.patient_id = p.patient_id INNER JOIN users u ON af.added_by = u.staff_id WHERE af.id = :id');
                $query->execute([':id' => $id]);

                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // update a aspirate_cs record
        public static function update_aspirate_cs($id, $patient_id, $gram_stain, $zn_stain, $fungal_element, $culture, $bacteria_one, $bacteria_two, $antibiotics_one, $antibiotics_two, $antibiotics_three, $antibiotics_four, $antibiotics_five, $antibiotics_six, $antibiotics_seven, $antibiotics_eight, $antibiotics_nine, $antibiotics_ten, $antibiotics_eleven, $antibiotics_twelve, $antibiotics_thirteen, $antibiotics_fourteen, $antibiotics_fifteen, $antibiotics_sixteen, $sensitivity_one, $sensitivity_two, $sensitivity_three, $sensitivity_four, $sensitivity_five, $sensitivity_six, $sensitivity_seven, $sensitivity_eight, $sensitivity_nine, $sensitivity_ten, $sensitivity_eleven, $sensitivity_twelve, $sensitivity_thirteen, $sensitivity_fourteen, $sensitivity_fifteen, $sensitivity_sixteen, $comments, $conn) {
            $gram_stain           = is_array($gram_stain) ? implode(', ', $gram_stain) : $gram_stain;
            $zn_stain             = is_array($zn_stain) ? implode(', ', $zn_stain) : $zn_stain;
            $fungal_element       = is_array($fungal_element) ? implode(', ', $fungal_element) : $fungal_element;
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
                $query = $conn->prepare('UPDATE aspirate_cs SET patient_id = :patient_id, gram_stain = :gram_stain, zn_stain = :zn_stain, fungal_element = :fungal_element, culture = :culture, bacteria_one = :bacteria_one, bacteria_two = :bacteria_two, antibiotics_one = :antibiotics_one, antibiotics_two = :antibiotics_two, antibiotics_three = :antibiotics_three, antibiotics_four = :antibiotics_four, antibiotics_five = :antibiotics_five, antibiotics_six = :antibiotics_six, antibiotics_seven = :antibiotics_seven, antibiotics_eight = :antibiotics_eight, antibiotics_nine = :antibiotics_nine, antibiotics_ten = :antibiotics_ten, antibiotics_eleven = :antibiotics_eleven, antibiotics_twelve = :antibiotics_twelve, antibiotics_thirteen = :antibiotics_thirteen, antibiotics_fourteen = :antibiotics_fourteen, antibiotics_fifteen = :antibiotics_fifteen, antibiotics_sixteen = :antibiotics_sixteen, sensitivity_one = :sensitivity_one, sensitivity_two = :sensitivity_two, sensitivity_three = :sensitivity_three, sensitivity_four = :sensitivity_four, sensitivity_five = :sensitivity_five, sensitivity_six = :sensitivity_six, sensitivity_seven = :sensitivity_seven, sensitivity_eight = :sensitivity_eight, sensitivity_nine = :sensitivity_nine, sensitivity_ten = :sensitivity_ten, sensitivity_eleven = :sensitivity_eleven, sensitivity_twelve = :sensitivity_twelve, sensitivity_thirteen = :sensitivity_thirteen, sensitivity_fourteen = :sensitivity_fourteen, sensitivity_fifteen = :sensitivity_fifteen, sensitivity_sixteen = :sensitivity_sixteen, comments = :comments WHERE id = :id AND patient_id = :patient_id');
                $query->execute([':gram_stain' => $gram_stain, ':zn_stain' => $zn_stain, ':fungal_element' => $fungal_element, ':culture' => $culture, ':bacteria_one' => $bacteria_one, ':bacteria_two' => $bacteria_two, ':antibiotics_one' => $antibiotics_one, ':antibiotics_two' => $antibiotics_two, ':antibiotics_three' => $antibiotics_three, ':antibiotics_four' => $antibiotics_four, ':antibiotics_five' => $antibiotics_five, ':antibiotics_six' => $antibiotics_six, ':antibiotics_seven' => $antibiotics_seven, ':antibiotics_eight' => $antibiotics_eight, ':antibiotics_nine' => $antibiotics_nine, ':antibiotics_ten' => $antibiotics_ten, ':antibiotics_eleven' => $antibiotics_eleven, ':antibiotics_twelve' => $antibiotics_twelve, ':antibiotics_thirteen' => $antibiotics_thirteen, ':antibiotics_fourteen' => $antibiotics_fourteen, ':antibiotics_fifteen' => $antibiotics_fifteen, ':antibiotics_sixteen' => $antibiotics_sixteen, ':sensitivity_one' => $sensitivity_one, ':sensitivity_two' => $sensitivity_two, ':sensitivity_three' => $sensitivity_three, ':sensitivity_four' => $sensitivity_four, ':sensitivity_five' => $sensitivity_five, ':sensitivity_six' => $sensitivity_six, ':sensitivity_seven' => $sensitivity_seven, ':sensitivity_eight' => $sensitivity_eight, ':sensitivity_nine' => $sensitivity_nine, ':sensitivity_ten' => $sensitivity_ten, ':sensitivity_eleven' => $sensitivity_eleven, ':sensitivity_twelve' => $sensitivity_twelve, ':sensitivity_thirteen' => $sensitivity_thirteen, ':sensitivity_fourteen' => $sensitivity_fourteen, ':sensitivity_fifteen' => $sensitivity_fifteen, ':sensitivity_sixteen' => $sensitivity_sixteen, ':comments' => $comments, ':patient_id' => $patient_id, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

	}