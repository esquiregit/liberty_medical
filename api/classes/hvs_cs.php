<?php
    require_once 'conn.php';
    require_once 'methods.php';
    require_once 'charge.php';

	class HVS_CS {

        // create a hvs_cs record
        public static function create_hvs_cs($patient_id, $pus_cells_per_hps, $rbcs_per_hpf, $epitheleal_cells_per_hpf, $t_vaginalis, $yeast_like_cells, $gram_stain, $culture, $bacteria_one, $bacteria_two, $antibiotics_one, $antibiotics_two, $antibiotics_three, $antibiotics_four, $antibiotics_five, $antibiotics_six, $antibiotics_seven, $antibiotics_eight, $antibiotics_nine, $antibiotics_ten, $antibiotics_eleven, $antibiotics_twelve, $antibiotics_thirteen, $antibiotics_fourteen, $antibiotics_fifteen, $antibiotics_sixteen, $sensitivity_one, $sensitivity_two, $sensitivity_three, $sensitivity_four, $sensitivity_five, $sensitivity_six, $sensitivity_seven, $sensitivity_eight, $sensitivity_nine, $sensitivity_ten, $sensitivity_eleven, $sensitivity_twelve, $sensitivity_thirteen, $sensitivity_fourteen, $sensitivity_fifteen, $sensitivity_sixteen, $comments, $added_by, $conn){
            $invoice_id           = Methods::get_invoice_id('HVS C/S', $conn);
            $amount               = Charge::read_charge('45', $conn);
            $bacteria_one         = is_array($bacteria_one) ? implode(', ', $bacteria_one) : $bacteria_one;
            $bacteria_two         = is_array($bacteria_two) ? implode(', ', $bacteria_two) : $bacteria_two;
            $t_vaginalis          = is_array($t_vaginalis) ? implode(', ', $t_vaginalis) : $t_vaginalis;
            $yeast_like_cells     = is_array($yeast_like_cells) ? implode(', ', $yeast_like_cells) : $yeast_like_cells;
            $gram_stain           = is_array($gram_stain) ? implode(', ', $gram_stain) : $gram_stain;
            $culture              = is_array($culture) ? implode(', ', $culture) : $culture;
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
                $query = $conn->prepare('INSERT INTO hvs_cs(invoice_id, patient_id, pus_cells_per_hps, rbcs_per_hpf, epitheleal_cells_per_hpf, t_vaginalis, yeast_like_cells, gram_stain, culture, bacteria_one, bacteria_two, antibiotics_one, antibiotics_two, antibiotics_three, antibiotics_four, antibiotics_five, antibiotics_six, antibiotics_seven, antibiotics_eight, antibiotics_nine, antibiotics_ten, antibiotics_eleven, antibiotics_twelve, antibiotics_thirteen, antibiotics_fourteen, antibiotics_fifteen, antibiotics_sixteen, sensitivity_one, sensitivity_two, sensitivity_three, sensitivity_four, sensitivity_five, sensitivity_six, sensitivity_seven, sensitivity_eight, sensitivity_nine, sensitivity_ten, sensitivity_eleven, sensitivity_twelve, sensitivity_thirteen, sensitivity_fourteen, sensitivity_fifteen, sensitivity_sixteen, comments, added_by)  VALUES(:invoice_id, :patient_id, :pus_cells_per_hps, :rbcs_per_hpf, :epitheleal_cells_per_hpf, :t_vaginalis, :yeast_like_cells, :gram_stain, :culture, :bacteria_one, :bacteria_two, :antibiotics_one, :antibiotics_two, :antibiotics_three, :antibiotics_four, :antibiotics_five, :antibiotics_six, :antibiotics_seven, :antibiotics_eight, :antibiotics_nine, :antibiotics_ten, :antibiotics_eleven, :antibiotics_twelve, :antibiotics_thirteen, :antibiotics_fourteen, :antibiotics_fifteen, :antibiotics_sixteen, :sensitivity_one, :sensitivity_two, :sensitivity_three, :sensitivity_four, :sensitivity_five, :sensitivity_six, :sensitivity_seven, :sensitivity_eight, :sensitivity_nine, :sensitivity_ten, :sensitivity_eleven, :sensitivity_twelve, :sensitivity_thirteen, :sensitivity_fourteen, :sensitivity_fifteen, :sensitivity_sixteen, :comments, :added_by)');
                $query->execute([':invoice_id' => $invoice_id, ':patient_id' => $patient_id, ':pus_cells_per_hps' => $pus_cells_per_hps, ':rbcs_per_hpf' => $rbcs_per_hpf, ':epitheleal_cells_per_hpf' => $epitheleal_cells_per_hpf, ':t_vaginalis' => $t_vaginalis, ':yeast_like_cells' => $yeast_like_cells, ':gram_stain' => $gram_stain, ':culture' => $culture, ':bacteria_one' => $bacteria_one, ':bacteria_two' => $bacteria_two, ':antibiotics_one' => $antibiotics_one, ':antibiotics_two' => $antibiotics_two, ':antibiotics_three' => $antibiotics_three, ':antibiotics_four' => $antibiotics_four, ':antibiotics_five' => $antibiotics_five, ':antibiotics_six' => $antibiotics_six, ':antibiotics_seven' => $antibiotics_seven, ':antibiotics_eight' => $antibiotics_eight, ':antibiotics_nine' => $antibiotics_nine, ':antibiotics_ten' => $antibiotics_ten, ':antibiotics_eleven' => $antibiotics_eleven, ':antibiotics_twelve' => $antibiotics_twelve, ':antibiotics_thirteen' => $antibiotics_thirteen, ':antibiotics_fourteen' => $antibiotics_fourteen, ':antibiotics_fifteen' => $antibiotics_fifteen, ':antibiotics_sixteen' => $antibiotics_sixteen, ':sensitivity_one' => $sensitivity_one, ':sensitivity_two' => $sensitivity_two, ':sensitivity_three' => $sensitivity_three, ':sensitivity_four' => $sensitivity_four, ':sensitivity_five' => $sensitivity_five, ':sensitivity_six' => $sensitivity_six, ':sensitivity_seven' => $sensitivity_seven, ':sensitivity_eight' => $sensitivity_eight, ':sensitivity_nine' => $sensitivity_nine, ':sensitivity_ten' => $sensitivity_ten, ':sensitivity_eleven' => $sensitivity_eleven, ':sensitivity_twelve' => $sensitivity_twelve, ':sensitivity_thirteen' => $sensitivity_thirteen, ':sensitivity_fourteen' => $sensitivity_fourteen, ':sensitivity_fifteen' => $sensitivity_fifteen, ':sensitivity_sixteen' => $sensitivity_sixteen, ':comments' => $comments, ':added_by' => $added_by]);

                return true;
            }catch(PDOException $ex){
            	return false;
            }
        }

        // fetch all hvs_cs records
        public static function read_hvs_cs($conn){
            try{
                $query = $conn->prepare('SELECT hc.id, hc.invoice_id, hc.patient_id, hc.pus_cells_per_hps, hc.rbcs_per_hpf, hc.epitheleal_cells_per_hpf, hc.t_vaginalis, hc.yeast_like_cells, hc.gram_stain, hc.culture, hc.bacteria_one, hc.bacteria_two, hc.antibiotics_one, hc.antibiotics_two, hc.antibiotics_three, hc.antibiotics_four, hc.antibiotics_five, hc.antibiotics_six, hc.antibiotics_seven, hc.antibiotics_eight, hc.antibiotics_nine, hc.antibiotics_ten, hc.antibiotics_eleven, hc.antibiotics_twelve, hc.antibiotics_thirteen, hc.antibiotics_fourteen, hc.antibiotics_fifteen, hc.antibiotics_sixteen, hc.sensitivity_one, hc.sensitivity_two, hc.sensitivity_three, hc.sensitivity_four, hc.sensitivity_five, hc.sensitivity_six, hc.sensitivity_seven, hc.sensitivity_eight, hc.sensitivity_nine, hc.sensitivity_ten, hc.sensitivity_eleven, hc.sensitivity_twelve, hc.sensitivity_thirteen, hc.sensitivity_fourteen, hc.sensitivity_fifteen, hc.sensitivity_sixteen, hc.comments, hc.added_by, hc.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM hvs_cs hc INNER JOIN patients p ON hc.patient_id = p.patient_id INNER JOIN users u ON hc.added_by = u.staff_id');
                $query->execute();

                return $query->fetchAll(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // fetch a hvs_cs record
        public static function read_a_hvs_cs($id, $conn){
            try{
                $query = $conn->prepare('SELECT hc.id, hc.invoice_id, hc.patient_id, hc.pus_cells_per_hps, hc.rbcs_per_hpf, hc.epitheleal_cells_per_hpf, hc.t_vaginalis, hc.yeast_like_cells, hc.gram_stain, hc.culture, hc.bacteria_one, hc.bacteria_two, hc.antibiotics_one, hc.antibiotics_two, hc.antibiotics_three, hc.antibiotics_four, hc.antibiotics_five, hc.antibiotics_six, hc.antibiotics_seven, hc.antibiotics_eight, hc.antibiotics_nine, hc.antibiotics_ten, hc.antibiotics_eleven, hc.antibiotics_twelve, hc.antibiotics_thirteen, hc.antibiotics_fourteen, hc.antibiotics_fifteen, hc.antibiotics_sixteen, hc.sensitivity_one, hc.sensitivity_two, hc.sensitivity_three, hc.sensitivity_four, hc.sensitivity_five, hc.sensitivity_six, hc.sensitivity_seven, hc.sensitivity_eight, hc.sensitivity_nine, hc.sensitivity_ten, hc.sensitivity_eleven, hc.sensitivity_twelve, hc.sensitivity_thirteen, hc.sensitivity_fourteen, hc.sensitivity_fifteen, hc.sensitivity_sixteen, hc.comments, hc.added_by, hc.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM hvs_cs hc INNER JOIN patients p ON hc.patient_id = p.patient_id INNER JOIN users u ON hc.added_by = u.staff_id WHERE hc.id = :id');
                $query->execute([':id' => $id]);

                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // update a hvs_cs record
        public static function update_hvs_cs($id, $patient_id, $pus_cells_per_hps, $rbcs_per_hpf, $epitheleal_cells_per_hpf, $t_vaginalis, $yeast_like_cells, $gram_stain, $culture, $bacteria_one, $bacteria_two, $antibiotics_one, $antibiotics_two, $antibiotics_three, $antibiotics_four, $antibiotics_five, $antibiotics_six, $antibiotics_seven, $antibiotics_eight, $antibiotics_nine, $antibiotics_ten, $antibiotics_eleven, $antibiotics_twelve, $antibiotics_thirteen, $antibiotics_fourteen, $antibiotics_fifteen, $antibiotics_sixteen, $sensitivity_one, $sensitivity_two, $sensitivity_three, $sensitivity_four, $sensitivity_five, $sensitivity_six, $sensitivity_seven, $sensitivity_eight, $sensitivity_nine, $sensitivity_ten, $sensitivity_eleven, $sensitivity_twelve, $sensitivity_thirteen, $sensitivity_fourteen, $sensitivity_fifteen, $sensitivity_sixteen, $comments, $conn) {
            $bacteria_one         = is_array($bacteria_one) ? implode(', ', $bacteria_one) : $bacteria_one;
            $bacteria_two         = is_array($bacteria_two) ? implode(', ', $bacteria_two) : $bacteria_two;
            $t_vaginalis          = is_array($t_vaginalis) ? implode(', ', $t_vaginalis) : $t_vaginalis;
            $yeast_like_cells     = is_array($yeast_like_cells) ? implode(', ', $yeast_like_cells) : $yeast_like_cells;
            $gram_stain           = is_array($gram_stain) ? implode(', ', $gram_stain) : $gram_stain;
            $culture              = is_array($culture) ? implode(', ', $culture) : $culture;
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
                $query = $conn->prepare('UPDATE hvs_cs SET patient_id = :patient_id, pus_cells_per_hps = :pus_cells_per_hps, rbcs_per_hpf = :rbcs_per_hpf, epitheleal_cells_per_hpf = :epitheleal_cells_per_hpf, t_vaginalis = :t_vaginalis, yeast_like_cells = :yeast_like_cells, gram_stain = :gram_stain, culture = :culture, bacteria_one = :bacteria_one, bacteria_two = :bacteria_two, antibiotics_one = :antibiotics_one, antibiotics_two = :antibiotics_two, antibiotics_three = :antibiotics_three, antibiotics_four = :antibiotics_four, antibiotics_five = :antibiotics_five, antibiotics_six = :antibiotics_six, antibiotics_seven = :antibiotics_seven, antibiotics_eight = :antibiotics_eight, antibiotics_nine = :antibiotics_nine, antibiotics_ten = :antibiotics_ten, antibiotics_eleven = :antibiotics_eleven, antibiotics_twelve = :antibiotics_twelve, antibiotics_thirteen = :antibiotics_thirteen, antibiotics_fourteen = :antibiotics_fourteen, antibiotics_fifteen = :antibiotics_fifteen, antibiotics_sixteen = :antibiotics_sixteen, sensitivity_one = :sensitivity_one, sensitivity_two = :sensitivity_two, sensitivity_three = :sensitivity_three, sensitivity_four = :sensitivity_four, sensitivity_five = :sensitivity_five, sensitivity_six = :sensitivity_six, sensitivity_seven = :sensitivity_seven, sensitivity_eight = :sensitivity_eight, sensitivity_nine = :sensitivity_nine, sensitivity_ten = :sensitivity_ten, sensitivity_eleven = :sensitivity_eleven, sensitivity_twelve = :sensitivity_twelve, sensitivity_thirteen = :sensitivity_thirteen, sensitivity_fourteen = :sensitivity_fourteen, sensitivity_fifteen = :sensitivity_fifteen, sensitivity_sixteen = :sensitivity_sixteen, comments = :comments WHERE id = :id AND patient_id = :patient_id');
                $query->execute([':pus_cells_per_hps' => $pus_cells_per_hps, ':rbcs_per_hpf' => $rbcs_per_hpf, ':epitheleal_cells_per_hpf' => $epitheleal_cells_per_hpf, ':t_vaginalis' => $t_vaginalis, ':yeast_like_cells' => $yeast_like_cells, ':gram_stain' => $gram_stain, ':culture' => $culture, ':bacteria_one' => $bacteria_one, ':bacteria_two' => $bacteria_two, ':antibiotics_one' => $antibiotics_one, ':antibiotics_two' => $antibiotics_two, ':antibiotics_three' => $antibiotics_three, ':antibiotics_four' => $antibiotics_four, ':antibiotics_five' => $antibiotics_five, ':antibiotics_six' => $antibiotics_six, ':antibiotics_seven' => $antibiotics_seven, ':antibiotics_eight' => $antibiotics_eight, ':antibiotics_nine' => $antibiotics_nine, ':antibiotics_ten' => $antibiotics_ten, ':antibiotics_eleven' => $antibiotics_eleven, ':antibiotics_twelve' => $antibiotics_twelve, ':antibiotics_thirteen' => $antibiotics_thirteen, ':antibiotics_fourteen' => $antibiotics_fourteen, ':antibiotics_fifteen' => $antibiotics_fifteen, ':antibiotics_sixteen' => $antibiotics_sixteen, ':sensitivity_one' => $sensitivity_one, ':sensitivity_two' => $sensitivity_two, ':sensitivity_three' => $sensitivity_three, ':sensitivity_four' => $sensitivity_four, ':sensitivity_five' => $sensitivity_five, ':sensitivity_six' => $sensitivity_six, ':sensitivity_seven' => $sensitivity_seven, ':sensitivity_eight' => $sensitivity_eight, ':sensitivity_nine' => $sensitivity_nine, ':sensitivity_ten' => $sensitivity_ten, ':sensitivity_eleven' => $sensitivity_eleven, ':sensitivity_twelve' => $sensitivity_twelve, ':sensitivity_thirteen' => $sensitivity_thirteen, ':sensitivity_fourteen' => $sensitivity_fourteen, ':sensitivity_fifteen' => $sensitivity_fifteen, ':sensitivity_sixteen' => $sensitivity_sixteen, ':comments' => $comments, ':patient_id' => $patient_id, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

	}