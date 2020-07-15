<?php
    require_once 'conn.php';
    require_once 'methods.php';
    require_once 'charge.php';

	class WoundCS {

        // create a wound_cs record
        public static function create_wound_cs($patient_id, $gram_stain, $zn_stain, $pus_cells, $fungal_element, $culture, $bacteria_one, $bacteria_two, $antibiotics_one, $antibiotics_two, $antibiotics_three, $antibiotics_four, $antibiotics_five, $antibiotics_six, $antibiotics_seven, $antibiotics_eight, $antibiotics_nine, $antibiotics_ten, $antibiotics_eleven, $antibiotics_twelve, $antibiotics_thirteen, $antibiotics_fourteen, $antibiotics_fifteen, $antibiotics_sixteen, $sensitivity_one, $sensitivity_two, $sensitivity_three, $sensitivity_four, $sensitivity_five, $sensitivity_six, $sensitivity_seven, $sensitivity_eight, $sensitivity_nine, $sensitivity_ten, $sensitivity_eleven, $sensitivity_twelve, $sensitivity_thirteen, $sensitivity_fourteen, $sensitivity_fifteen, $sensitivity_sixteen, $comments, $added_by, $conn){
            $invoice_id           = Methods::get_invoice_id('Wound C/S', $conn);
            $amount               = Charge::read_charge('84', $conn);
            $gram_stain           = implode(', ', $gram_stain);
            $pus_cells            = implode(', ', $pus_cells);
            $zn_stain             = implode(', ', $zn_stain);
            $fungal_element       = implode(', ', $fungal_element);
            $culture              = implode(', ', $culture);
            $bacteria_one         = implode(', ', $bacteria_one);
            $bacteria_two         = implode(', ', $bacteria_two);
            $antibiotics_one      = implode(', ', $antibiotics_one);
            $antibiotics_two      = implode(', ', $antibiotics_two);
            $antibiotics_three    = implode(', ', $antibiotics_three);
            $antibiotics_four     = implode(', ', $antibiotics_four);
            $antibiotics_five     = implode(', ', $antibiotics_five);
            $antibiotics_six      = implode(', ', $antibiotics_six);
            $antibiotics_seven    = implode(', ', $antibiotics_seven);
            $antibiotics_eight    = implode(', ', $antibiotics_eight);
            $antibiotics_nine     = implode(', ', $antibiotics_nine);
            $antibiotics_ten      = implode(', ', $antibiotics_ten);
            $antibiotics_eleven   = implode(', ', $antibiotics_eleven);
            $antibiotics_twelve   = implode(', ', $antibiotics_twelve);
            $antibiotics_thirteen = implode(', ', $antibiotics_thirteen);
            $antibiotics_fourteen = implode(', ', $antibiotics_fourteen);
            $antibiotics_fifteen  = implode(', ', $antibiotics_fifteen);
            $antibiotics_sixteen  = implode(', ', $antibiotics_sixteen);

            try{
                $query = $conn->prepare('INSERT INTO wound_cs(invoice_id, patient_id, gram_stain, zn_stain, pus_cells, fungal_element, culture, bacteria_one, bacteria_two, antibiotics_one, antibiotics_two, antibiotics_three, antibiotics_four, antibiotics_five, antibiotics_six, antibiotics_seven, antibiotics_eight, antibiotics_nine, antibiotics_ten, antibiotics_eleven, antibiotics_twelve, antibiotics_thirteen, antibiotics_fourteen, antibiotics_fifteen, antibiotics_sixteen, sensitivity_one, sensitivity_two, sensitivity_three, sensitivity_four, sensitivity_five, sensitivity_six, sensitivity_seven, sensitivity_eight, sensitivity_nine, sensitivity_ten, sensitivity_eleven, sensitivity_twelve, sensitivity_thirteen, sensitivity_fourteen, sensitivity_fifteen, sensitivity_sixteen, comments, added_by)  VALUES(:invoice_id, :patient_id, :gram_stain, :zn_stain, :pus_cells, :fungal_element, :culture, :bacteria_one, :bacteria_two, :antibiotics_one, :antibiotics_two, :antibiotics_three, :antibiotics_four, :antibiotics_five, :antibiotics_six, :antibiotics_seven, :antibiotics_eight, :antibiotics_nine, :antibiotics_ten, :antibiotics_eleven, :antibiotics_twelve, :antibiotics_thirteen, :antibiotics_fourteen, :antibiotics_fifteen, :antibiotics_sixteen, :sensitivity_one, :sensitivity_two, :sensitivity_three, :sensitivity_four, :sensitivity_five, :sensitivity_six, :sensitivity_seven, :sensitivity_eight, :sensitivity_nine, :sensitivity_ten, :sensitivity_eleven, :sensitivity_twelve, :sensitivity_thirteen, :sensitivity_fourteen, :sensitivity_fifteen, :sensitivity_sixteen, :comments, :added_by)');
                $query->execute([':invoice_id' => $invoice_id, ':patient_id' => $patient_id, ':gram_stain' => $gram_stain, ':zn_stain' => $zn_stain, ':pus_cells' => $pus_cells, ':fungal_element' => $fungal_element, ':culture' => $culture, ':bacteria_one' => $bacteria_one, ':bacteria_two' => $bacteria_two, ':antibiotics_one' => $antibiotics_one, ':antibiotics_two' => $antibiotics_two, ':antibiotics_three' => $antibiotics_three, ':antibiotics_four' => $antibiotics_four, ':antibiotics_five' => $antibiotics_five, ':antibiotics_six' => $antibiotics_six, ':antibiotics_seven' => $antibiotics_seven, ':antibiotics_eight' => $antibiotics_eight, ':antibiotics_nine' => $antibiotics_nine, ':antibiotics_ten' => $antibiotics_ten, ':antibiotics_eleven' => $antibiotics_eleven, ':antibiotics_twelve' => $antibiotics_twelve, ':antibiotics_thirteen' => $antibiotics_thirteen, ':antibiotics_fourteen' => $antibiotics_fourteen, ':antibiotics_fifteen' => $antibiotics_fifteen, ':antibiotics_sixteen' => $antibiotics_sixteen, ':sensitivity_one' => $sensitivity_one, ':sensitivity_two' => $sensitivity_two, ':sensitivity_three' => $sensitivity_three, ':sensitivity_four' => $sensitivity_four, ':sensitivity_five' => $sensitivity_five, ':sensitivity_six' => $sensitivity_six, ':sensitivity_seven' => $sensitivity_seven, ':sensitivity_eight' => $sensitivity_eight, ':sensitivity_nine' => $sensitivity_nine, ':sensitivity_ten' => $sensitivity_ten, ':sensitivity_eleven' => $sensitivity_eleven, ':sensitivity_twelve' => $sensitivity_twelve, ':sensitivity_thirteen' => $sensitivity_thirteen, ':sensitivity_fourteen' => $sensitivity_fourteen, ':sensitivity_fifteen' => $sensitivity_fifteen, ':sensitivity_sixteen' => $sensitivity_sixteen, ':comments' => $comments, ':added_by' => $added_by]);

                return true;
            }catch(PDOException $ex){
            	return false;
            }
        }

        // fetch all wound_cs records
        public static function read_wound_cs($conn){
            try{
                $query = $conn->prepare('SELECT wcs.id, wcs.invoice_id, wcs.invoice_id, wcs.patient_id, wcs.gram_stain, wcs.zn_stain, wcs.pus_cells, wcs.fungal_element, wcs.culture, wcs.bacteria_one, wcs.bacteria_two, wcs.antibiotics_one, wcs.antibiotics_two, wcs.antibiotics_three, wcs.antibiotics_four, wcs.antibiotics_five, wcs.antibiotics_six, wcs.antibiotics_seven, wcs.antibiotics_eight, wcs.antibiotics_nine, wcs.antibiotics_ten, wcs.antibiotics_eleven, wcs.antibiotics_twelve, wcs.antibiotics_thirteen, wcs.antibiotics_fourteen, wcs.antibiotics_fifteen, wcs.antibiotics_sixteen, wcs.sensitivity_one, wcs.sensitivity_two, wcs.sensitivity_three, wcs.sensitivity_four, wcs.sensitivity_five, wcs.sensitivity_six, wcs.sensitivity_seven, wcs.sensitivity_eight, wcs.sensitivity_nine, wcs.sensitivity_ten, wcs.sensitivity_eleven, wcs.sensitivity_twelve, wcs.sensitivity_thirteen, wcs.sensitivity_fourteen, wcs.sensitivity_fifteen, wcs.sensitivity_sixteen, wcs.comments, wcs.added_by, wcs.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM wound_cs wcs INNER JOIN patients p ON wcs.patient_id = p.patient_id INNER JOIN users u ON wcs.added_by = u.staff_id');
                $query->execute();

                return $query->fetchAll(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // fetch a wound_cs record
        public static function read_a_wound_cs($id, $conn){
            try{
                $query = $conn->prepare('SELECT wcs.id, wcs.invoice_id, wcs.patient_id, wcs.gram_stain, wcs.zn_stain, wcs.pus_cells, wcs.fungal_element, wcs.culture, wcs.bacteria_one, wcs.bacteria_two, wcs.antibiotics_one, wcs.antibiotics_two, wcs.antibiotics_three, wcs.antibiotics_four, wcs.antibiotics_five, wcs.antibiotics_six, wcs.antibiotics_seven, wcs.antibiotics_eight, wcs.antibiotics_nine, wcs.antibiotics_ten, wcs.antibiotics_eleven, wcs.antibiotics_twelve, wcs.antibiotics_thirteen, wcs.antibiotics_fourteen, wcs.antibiotics_fifteen, wcs.antibiotics_sixteen, wcs.sensitivity_one, wcs.sensitivity_two, wcs.sensitivity_three, wcs.sensitivity_four, wcs.sensitivity_five, wcs.sensitivity_six, wcs.sensitivity_seven, wcs.sensitivity_eight, wcs.sensitivity_nine, wcs.sensitivity_ten, wcs.sensitivity_eleven, wcs.sensitivity_twelve, wcs.sensitivity_thirteen, wcs.sensitivity_fourteen, wcs.sensitivity_fifteen, wcs.sensitivity_sixteen, wcs.comments, wcs.added_by, wcs.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM wound_cs wcs INNER JOIN patients p ON wcs.patient_id = p.patient_id INNER JOIN users u ON wcs.added_by = u.staff_id WHERE wcs.id = :id');
                $query->execute([':id' => $id]);

                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // update a wound_cs record
        public static function update_wound_cs($id, $patient_id, $gram_stain, $zn_stain, $pus_cells, $fungal_element, $culture, $bacteria_one, $bacteria_two, $antibiotics_one, $antibiotics_two, $antibiotics_three, $antibiotics_four, $antibiotics_five, $antibiotics_six, $antibiotics_seven, $antibiotics_eight, $antibiotics_nine, $antibiotics_ten, $antibiotics_eleven, $antibiotics_twelve, $antibiotics_thirteen, $antibiotics_fourteen, $antibiotics_fifteen, $antibiotics_sixteen, $sensitivity_one, $sensitivity_two, $sensitivity_three, $sensitivity_four, $sensitivity_five, $sensitivity_six, $sensitivity_seven, $sensitivity_eight, $sensitivity_nine, $sensitivity_ten, $sensitivity_eleven, $sensitivity_twelve, $sensitivity_thirteen, $sensitivity_fourteen, $sensitivity_fifteen, $sensitivity_sixteen, $comments, $conn) {
            $gram_stain           = implode(', ', $gram_stain);
            $pus_cells            = implode(', ', $pus_cells);
            $zn_stain             = implode(', ', $zn_stain);
            $fungal_element       = implode(', ', $fungal_element);
            $culture              = implode(', ', $culture);
            $bacteria_one         = implode(', ', $bacteria_one);
            $bacteria_two         = implode(', ', $bacteria_two);
            $antibiotics_one      = implode(', ', $antibiotics_one);
            $antibiotics_two      = implode(', ', $antibiotics_two);
            $antibiotics_three    = implode(', ', $antibiotics_three);
            $antibiotics_four     = implode(', ', $antibiotics_four);
            $antibiotics_five     = implode(', ', $antibiotics_five);
            $antibiotics_six      = implode(', ', $antibiotics_six);
            $antibiotics_seven    = implode(', ', $antibiotics_seven);
            $antibiotics_eight    = implode(', ', $antibiotics_eight);
            $antibiotics_nine     = implode(', ', $antibiotics_nine);
            $antibiotics_ten      = implode(', ', $antibiotics_ten);
            $antibiotics_eleven   = implode(', ', $antibiotics_eleven);
            $antibiotics_twelve   = implode(', ', $antibiotics_twelve);
            $antibiotics_thirteen = implode(', ', $antibiotics_thirteen);
            $antibiotics_fourteen = implode(', ', $antibiotics_fourteen);
            $antibiotics_fifteen  = implode(', ', $antibiotics_fifteen);
            $antibiotics_sixteen  = implode(', ', $antibiotics_sixteen);

            try{
                $query = $conn->prepare('UPDATE wound_cs SET patient_id = :patient_id, gram_stain = :gram_stain, zn_stain = :zn_stain, pus_cells = :pus_cells, fungal_element = :fungal_element, culture = :culture, bacteria_one = :bacteria_one, bacteria_two = :bacteria_two, antibiotics_one = :antibiotics_one, antibiotics_two = :antibiotics_two, antibiotics_three = :antibiotics_three, antibiotics_four = :antibiotics_four, antibiotics_five = :antibiotics_five, antibiotics_six = :antibiotics_six, antibiotics_seven = :antibiotics_seven, antibiotics_eight = :antibiotics_eight, antibiotics_nine = :antibiotics_nine, antibiotics_ten = :antibiotics_ten, antibiotics_eleven = :antibiotics_eleven, antibiotics_twelve = :antibiotics_twelve, antibiotics_thirteen = :antibiotics_thirteen, antibiotics_fourteen = :antibiotics_fourteen, antibiotics_fifteen = :antibiotics_fifteen, antibiotics_sixteen = :antibiotics_sixteen, sensitivity_one = :sensitivity_one, sensitivity_two = :sensitivity_two, sensitivity_three = :sensitivity_three, sensitivity_four = :sensitivity_four, sensitivity_five = :sensitivity_five, sensitivity_six = :sensitivity_six, sensitivity_seven = :sensitivity_seven, sensitivity_eight = :sensitivity_eight, sensitivity_nine = :sensitivity_nine, sensitivity_ten = :sensitivity_ten, sensitivity_eleven = :sensitivity_eleven, sensitivity_twelve = :sensitivity_twelve, sensitivity_thirteen = :sensitivity_thirteen, sensitivity_fourteen = :sensitivity_fourteen, sensitivity_fifteen = :sensitivity_fifteen, sensitivity_sixteen = :sensitivity_sixteen, comments = :comments WHERE id = :id AND patient_id = :patient_id');
                $query->execute([':gram_stain' => $gram_stain, ':zn_stain' => $zn_stain, ':pus_cells' => $pus_cells, ':fungal_element' => $fungal_element, ':culture' => $culture, ':bacteria_one' => $bacteria_one, ':bacteria_two' => $bacteria_two, ':antibiotics_one' => $antibiotics_one, ':antibiotics_two' => $antibiotics_two, ':antibiotics_three' => $antibiotics_three, ':antibiotics_four' => $antibiotics_four, ':antibiotics_five' => $antibiotics_five, ':antibiotics_six' => $antibiotics_six, ':antibiotics_seven' => $antibiotics_seven, ':antibiotics_eight' => $antibiotics_eight, ':antibiotics_nine' => $antibiotics_nine, ':antibiotics_ten' => $antibiotics_ten, ':antibiotics_eleven' => $antibiotics_eleven, ':antibiotics_twelve' => $antibiotics_twelve, ':antibiotics_thirteen' => $antibiotics_thirteen, ':antibiotics_fourteen' => $antibiotics_fourteen, ':antibiotics_fifteen' => $antibiotics_fifteen, ':antibiotics_sixteen' => $antibiotics_sixteen, ':sensitivity_one' => $sensitivity_one, ':sensitivity_two' => $sensitivity_two, ':sensitivity_three' => $sensitivity_three, ':sensitivity_four' => $sensitivity_four, ':sensitivity_five' => $sensitivity_five, ':sensitivity_six' => $sensitivity_six, ':sensitivity_seven' => $sensitivity_seven, ':sensitivity_eight' => $sensitivity_eight, ':sensitivity_nine' => $sensitivity_nine, ':sensitivity_ten' => $sensitivity_ten, ':sensitivity_eleven' => $sensitivity_eleven, ':sensitivity_twelve' => $sensitivity_twelve, ':sensitivity_thirteen' => $sensitivity_thirteen, ':sensitivity_fourteen' => $sensitivity_fourteen, ':sensitivity_fifteen' => $sensitivity_fifteen, ':sensitivity_sixteen' => $sensitivity_sixteen, ':comments' => $comments, ':patient_id' => $patient_id, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

	}