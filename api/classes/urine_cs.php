<?php
    require_once 'conn.php';
    require_once 'methods.php';
    require_once 'charge.php';

	class Urine_CS {

        // create a urine_cs record
        public static function create_urine_cs($patient_id, $pus_cells_per_hps, $rbcs_per_hpf, $epitheleal_cells_per_hpf, $crystals, $cast, $gram_reaction, $yeast_like_cells, $culture, $viable_count, $bacteria_one, $bacteria_two, $antibiotics_one, $antibiotics_two, $antibiotics_three, $antibiotics_four, $antibiotics_five, $antibiotics_six, $antibiotics_seven, $antibiotics_eight, $antibiotics_nine, $antibiotics_ten, $antibiotics_eleven, $antibiotics_twelve, $antibiotics_thirteen, $antibiotics_fourteen, $antibiotics_fifteen, $antibiotics_sixteen, $sensitivity_one, $sensitivity_two, $sensitivity_three, $sensitivity_four, $sensitivity_five, $sensitivity_six, $sensitivity_seven, $sensitivity_eight, $sensitivity_nine, $sensitivity_ten, $sensitivity_eleven, $sensitivity_twelve, $sensitivity_thirteen, $sensitivity_fourteen, $sensitivity_fifteen, $sensitivity_sixteen, $comments, $added_by, $conn){
            $invoice_id               = Methods::get_invoice_id('Urine C/S', $conn);
            $amount                   = Charge::read_charge('81', $conn);
            $yeast_like_cells     = is_array($yeast_like_cells) ? implode(', ', $yeast_like_cells) : $yeast_like_cells;
            $gram_reaction        = is_array($gram_reaction) ? implode(', ', $gram_reaction) : $gram_reaction;
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
                $query = $conn->prepare('INSERT INTO urine_cs(invoice_id, patient_id, pus_cells_per_hps, rbcs_per_hpf, epitheleal_cells_per_hpf, crystals, cast, gram_reaction, yeast_like_cells, culture, viable_count, bacteria_one, bacteria_two, antibiotics_one, antibiotics_two, antibiotics_three, antibiotics_four, antibiotics_five, antibiotics_six, antibiotics_seven, antibiotics_eight, antibiotics_nine, antibiotics_ten, antibiotics_eleven, antibiotics_twelve, antibiotics_thirteen, antibiotics_fourteen, antibiotics_fifteen, antibiotics_sixteen, sensitivity_one, sensitivity_two, sensitivity_three, sensitivity_four, sensitivity_five, sensitivity_six, sensitivity_seven, sensitivity_eight, sensitivity_nine, sensitivity_ten, sensitivity_eleven, sensitivity_twelve, sensitivity_thirteen, sensitivity_fourteen, sensitivity_fifteen, sensitivity_sixteen, comments, added_by)  VALUES(:invoice_id, :patient_id, :pus_cells_per_hps, :rbcs_per_hpf, :epitheleal_cells_per_hpf, :crystals, :cast, :gram_reaction, :yeast_like_cells, :culture, :viable_count, :bacteria_one, :bacteria_two, :antibiotics_one, :antibiotics_two, :antibiotics_three, :antibiotics_four, :antibiotics_five, :antibiotics_six, :antibiotics_seven, :antibiotics_eight, :antibiotics_nine, :antibiotics_ten, :antibiotics_eleven, :antibiotics_twelve, :antibiotics_thirteen, :antibiotics_fourteen, :antibiotics_fifteen, :antibiotics_sixteen, :sensitivity_one, :sensitivity_two, :sensitivity_three, :sensitivity_four, :sensitivity_five, :sensitivity_six, :sensitivity_seven, :sensitivity_eight, :sensitivity_nine, :sensitivity_ten, :sensitivity_eleven, :sensitivity_twelve, :sensitivity_thirteen, :sensitivity_fourteen, :sensitivity_fifteen, :sensitivity_sixteen, :comments, :added_by)');
                $query->execute([':invoice_id' => $invoice_id, ':patient_id' => $patient_id, ':pus_cells_per_hps' => $pus_cells_per_hps, ':rbcs_per_hpf' => $rbcs_per_hpf, ':epitheleal_cells_per_hpf' => $epitheleal_cells_per_hpf, ':crystals' => $crystals, ':cast' => $cast, ':gram_reaction' => $gram_reaction, ':yeast_like_cells' => $yeast_like_cells, ':culture' => $culture, ':viable_count' => $viable_count, ':bacteria_one' => $bacteria_one, ':bacteria_two' => $bacteria_two, ':antibiotics_one' => $antibiotics_one, ':antibiotics_two' => $antibiotics_two, ':antibiotics_three' => $antibiotics_three, ':antibiotics_four' => $antibiotics_four, ':antibiotics_five' => $antibiotics_five, ':antibiotics_six' => $antibiotics_six, ':antibiotics_seven' => $antibiotics_seven, ':antibiotics_eight' => $antibiotics_eight, ':antibiotics_nine' => $antibiotics_nine, ':antibiotics_ten' => $antibiotics_ten, ':antibiotics_eleven' => $antibiotics_eleven, ':antibiotics_twelve' => $antibiotics_twelve, ':antibiotics_thirteen' => $antibiotics_thirteen, ':antibiotics_fourteen' => $antibiotics_fourteen, ':antibiotics_fifteen' => $antibiotics_fifteen, ':antibiotics_sixteen' => $antibiotics_sixteen, ':sensitivity_one' => $sensitivity_one, ':sensitivity_two' => $sensitivity_two, ':sensitivity_three' => $sensitivity_three, ':sensitivity_four' => $sensitivity_four, ':sensitivity_five' => $sensitivity_five, ':sensitivity_six' => $sensitivity_six, ':sensitivity_seven' => $sensitivity_seven, ':sensitivity_eight' => $sensitivity_eight, ':sensitivity_nine' => $sensitivity_nine, ':sensitivity_ten' => $sensitivity_ten, ':sensitivity_eleven' => $sensitivity_eleven, ':sensitivity_twelve' => $sensitivity_twelve, ':sensitivity_thirteen' => $sensitivity_thirteen, ':sensitivity_fourteen' => $sensitivity_fourteen, ':sensitivity_fifteen' => $sensitivity_fifteen, ':sensitivity_sixteen' => $sensitivity_sixteen, ':comments' => $comments, ':added_by' => $added_by]);

                return true;
            }catch(PDOException $ex){
            	return false;
            }
        }

        // fetch all urine_cs records
        public static function read_urine_cs($conn){
            try{
                $query = $conn->prepare('SELECT ur.id, ur.invoice_id, ur.patient_id, ur.pus_cells_per_hps, ur.rbcs_per_hpf, ur.epitheleal_cells_per_hpf, ur.crystals, ur.cast, ur.gram_reaction, ur.yeast_like_cells, ur.culture, ur.viable_count, ur.bacteria_one, ur.bacteria_two, ur.antibiotics_one, ur.antibiotics_two, ur.antibiotics_three, ur.antibiotics_four, ur.antibiotics_five, ur.antibiotics_six, ur.antibiotics_seven, ur.antibiotics_eight, ur.antibiotics_nine, ur.antibiotics_ten, ur.antibiotics_eleven, ur.antibiotics_twelve, ur.antibiotics_thirteen, ur.antibiotics_fourteen, ur.antibiotics_fifteen, ur.antibiotics_sixteen, ur.sensitivity_one, ur.sensitivity_two, ur.sensitivity_three, ur.sensitivity_four, ur.sensitivity_five, ur.sensitivity_six, ur.sensitivity_seven, ur.sensitivity_eight, ur.sensitivity_nine, ur.sensitivity_ten, ur.sensitivity_eleven, ur.sensitivity_twelve, ur.sensitivity_thirteen, ur.sensitivity_fourteen, ur.sensitivity_fifteen, ur.sensitivity_sixteen, ur.comments, ur.added_by, ur.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM urine_cs ur INNER JOIN patients p ON ur.patient_id = p.patient_id INNER JOIN users u ON ur.added_by = u.staff_id');
                $query->execute();

                return $query->fetchAll(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // fetch a urine_cs record
        public static function read_a_urine_cs($id, $conn){
            try{
                $query = $conn->prepare('SELECT ur.id, ur.invoice_id, ur.patient_id, ur.pus_cells_per_hps, ur.rbcs_per_hpf, ur.epitheleal_cells_per_hpf, ur.crystals, ur.cast, ur.gram_reaction, ur.yeast_like_cells, ur.culture, ur.viable_count, ur.bacteria_one, ur.bacteria_two, ur.antibiotics_one, ur.antibiotics_two, ur.antibiotics_three, ur.antibiotics_four, ur.antibiotics_five, ur.antibiotics_six, ur.antibiotics_seven, ur.antibiotics_eight, ur.antibiotics_nine, ur.antibiotics_ten, ur.antibiotics_eleven, ur.antibiotics_twelve, ur.antibiotics_thirteen, ur.antibiotics_fourteen, ur.antibiotics_fifteen, ur.antibiotics_sixteen, ur.sensitivity_one, ur.sensitivity_two, ur.sensitivity_three, ur.sensitivity_four, ur.sensitivity_five, ur.sensitivity_six, ur.sensitivity_seven, ur.sensitivity_eight, ur.sensitivity_nine, ur.sensitivity_ten, ur.sensitivity_eleven, ur.sensitivity_twelve, ur.sensitivity_thirteen, ur.sensitivity_fourteen, ur.sensitivity_fifteen, ur.sensitivity_sixteen, ur.comments, ur.added_by, ur.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM urine_cs ur INNER JOIN patients p ON ur.patient_id = p.patient_id INNER JOIN users u ON ur.added_by = u.staff_id WHERE ur.id = :id');
                $query->execute([':id' => $id]);

                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // update a urine_cs record
        public static function update_urine_cs($id, $patient_id, $pus_cells_per_hps, $rbcs_per_hpf, $epitheleal_cells_per_hpf, $crystals, $cast, $gram_reaction, $yeast_like_cells, $culture, $viable_count, $bacteria_one, $bacteria_two, $antibiotics_one, $antibiotics_two, $antibiotics_three, $antibiotics_four, $antibiotics_five, $antibiotics_six, $antibiotics_seven, $antibiotics_eight, $antibiotics_nine, $antibiotics_ten, $antibiotics_eleven, $antibiotics_twelve, $antibiotics_thirteen, $antibiotics_fourteen, $antibiotics_fifteen, $antibiotics_sixteen, $sensitivity_one, $sensitivity_two, $sensitivity_three, $sensitivity_four, $sensitivity_five, $sensitivity_six, $sensitivity_seven, $sensitivity_eight, $sensitivity_nine, $sensitivity_ten, $sensitivity_eleven, $sensitivity_twelve, $sensitivity_thirteen, $sensitivity_fourteen, $sensitivity_fifteen, $sensitivity_sixteen, $comments, $conn) {
            $yeast_like_cells     = is_array($yeast_like_cells) ? implode(', ', $yeast_like_cells) : $yeast_like_cells;
            $gram_reaction        = is_array($gram_reaction) ? implode(', ', $gram_reaction) : $gram_reaction;
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
                $query = $conn->prepare('UPDATE urine_cs SET patient_id = :patient_id, pus_cells_per_hps = :pus_cells_per_hps, rbcs_per_hpf = :rbcs_per_hpf, epitheleal_cells_per_hpf = :epitheleal_cells_per_hpf, crystals = :crystals, cast = :cast, gram_reaction = :gram_reaction, yeast_like_cells = :yeast_like_cells, culture = :culture, viable_count = :viable_count, bacteria_one = :bacteria_one, bacteria_two = :bacteria_two, antibiotics_one = :antibiotics_one, antibiotics_two = :antibiotics_two, antibiotics_three = :antibiotics_three, antibiotics_four = :antibiotics_four, antibiotics_five = :antibiotics_five, antibiotics_six = :antibiotics_six, antibiotics_seven = :antibiotics_seven, antibiotics_eight = :antibiotics_eight, antibiotics_nine = :antibiotics_nine, antibiotics_ten = :antibiotics_ten, antibiotics_eleven = :antibiotics_eleven, antibiotics_twelve = :antibiotics_twelve, antibiotics_thirteen = :antibiotics_thirteen, antibiotics_fourteen = :antibiotics_fourteen, antibiotics_fifteen = :antibiotics_fifteen, antibiotics_sixteen = :antibiotics_sixteen, sensitivity_one = :sensitivity_one, sensitivity_two = :sensitivity_two, sensitivity_three = :sensitivity_three, sensitivity_four = :sensitivity_four, sensitivity_five = :sensitivity_five, sensitivity_six = :sensitivity_six, sensitivity_seven = :sensitivity_seven, sensitivity_eight = :sensitivity_eight, sensitivity_nine = :sensitivity_nine, sensitivity_ten = :sensitivity_ten, sensitivity_eleven = :sensitivity_eleven, sensitivity_twelve = :sensitivity_twelve, sensitivity_thirteen = :sensitivity_thirteen, sensitivity_fourteen = :sensitivity_fourteen, sensitivity_fifteen = :sensitivity_fifteen, sensitivity_sixteen = :sensitivity_sixteen, comments = :comments WHERE id = :id AND patient_id = :patient_id');
                $query->execute([':pus_cells_per_hps' => $pus_cells_per_hps, ':rbcs_per_hpf' => $rbcs_per_hpf, ':epitheleal_cells_per_hpf' => $epitheleal_cells_per_hpf, ':crystals' => $crystals, ':cast' => $cast, ':gram_reaction' => $gram_reaction, ':yeast_like_cells' => $yeast_like_cells, ':culture' => $culture, ':viable_count' => $viable_count, ':bacteria_one' => $bacteria_one, ':bacteria_two' => $bacteria_two, ':antibiotics_one' => $antibiotics_one, ':antibiotics_two' => $antibiotics_two, ':antibiotics_three' => $antibiotics_three, ':antibiotics_four' => $antibiotics_four, ':antibiotics_five' => $antibiotics_five, ':antibiotics_six' => $antibiotics_six, ':antibiotics_seven' => $antibiotics_seven, ':antibiotics_eight' => $antibiotics_eight, ':antibiotics_nine' => $antibiotics_nine, ':antibiotics_ten' => $antibiotics_ten, ':antibiotics_eleven' => $antibiotics_eleven, ':antibiotics_twelve' => $antibiotics_twelve, ':antibiotics_thirteen' => $antibiotics_thirteen, ':antibiotics_fourteen' => $antibiotics_fourteen, ':antibiotics_fifteen' => $antibiotics_fifteen, ':antibiotics_sixteen' => $antibiotics_sixteen, ':sensitivity_one' => $sensitivity_one, ':sensitivity_two' => $sensitivity_two, ':sensitivity_three' => $sensitivity_three, ':sensitivity_four' => $sensitivity_four, ':sensitivity_five' => $sensitivity_five, ':sensitivity_six' => $sensitivity_six, ':sensitivity_seven' => $sensitivity_seven, ':sensitivity_eight' => $sensitivity_eight, ':sensitivity_nine' => $sensitivity_nine, ':sensitivity_ten' => $sensitivity_ten, ':sensitivity_eleven' => $sensitivity_eleven, ':sensitivity_twelve' => $sensitivity_twelve, ':sensitivity_thirteen' => $sensitivity_thirteen, ':sensitivity_fourteen' => $sensitivity_fourteen, ':sensitivity_fifteen' => $sensitivity_fifteen, ':sensitivity_sixteen' => $sensitivity_sixteen, ':comments' => $comments, ':patient_id' => $patient_id, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

	}