<?php
    require_once 'conn.php';
    require_once 'methods.php';
    require_once 'charge.php';

	class EndocervicalSwabCS {

        // create a endocervical_swab_cs record
        public static function create_endocervical_swab_cs($patient_id, $pus_cells_per_hps, $rbcs_per_hpf, $epitheleal_cells_per_hpf, $t_vaginalis, $yeast_like_cells, $gram_stain, $culture, $bacteria_one, $bacteria_two, $antibiotics_one, $antibiotics_two, $antibiotics_three, $antibiotics_four, $antibiotics_five, $antibiotics_six, $antibiotics_seven, $antibiotics_eight, $antibiotics_nine, $antibiotics_ten, $antibiotics_eleven, $antibiotics_twelve, $antibiotics_thirteen, $antibiotics_fourteen, $antibiotics_fifteen, $antibiotics_sixteen, $sensitivity_one, $sensitivity_two, $sensitivity_three, $sensitivity_four, $sensitivity_five, $sensitivity_six, $sensitivity_seven, $sensitivity_eight, $sensitivity_nine, $sensitivity_ten, $sensitivity_eleven, $sensitivity_twelve, $sensitivity_thirteen, $sensitivity_fourteen, $sensitivity_fifteen, $sensitivity_sixteen, $comments, $added_by, $conn){
            $invoice_id               = Methods::get_invoice_id('Endocervical Swab C/S', $conn);
            $amount                   = Charge::read_charge('29', $conn);
            $bacteria_one             = implode(', ', $bacteria_one);
            $bacteria_two             = implode(', ', $bacteria_two);
            $t_vaginalis              = implode(', ', $t_vaginalis);
            $yeast_like_cells         = implode(', ', $yeast_like_cells);
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

            try{
                $query = $conn->prepare('INSERT INTO endocervical_swab_cs(invoice_id, patient_id, pus_cells_per_hps, rbcs_per_hpf, epitheleal_cells_per_hpf, t_vaginalis, yeast_like_cells, gram_stain, culture, bacteria_one, bacteria_two, antibiotics_one, antibiotics_two, antibiotics_three, antibiotics_four, antibiotics_five, antibiotics_six, antibiotics_seven, antibiotics_eight, antibiotics_nine, antibiotics_ten, antibiotics_eleven, antibiotics_twelve, antibiotics_thirteen, antibiotics_fourteen, antibiotics_fifteen, antibiotics_sixteen, sensitivity_one, sensitivity_two, sensitivity_three, sensitivity_four, sensitivity_five, sensitivity_six, sensitivity_seven, sensitivity_eight, sensitivity_nine, sensitivity_ten, sensitivity_eleven, sensitivity_twelve, sensitivity_thirteen, sensitivity_fourteen, sensitivity_fifteen, sensitivity_sixteen, comments, added_by)  VALUES(:invoice_id, :patient_id, :pus_cells_per_hps, :rbcs_per_hpf, :epitheleal_cells_per_hpf, :t_vaginalis, :yeast_like_cells, :gram_stain, :culture, :bacteria_one, :bacteria_two, :antibiotics_one, :antibiotics_two, :antibiotics_three, :antibiotics_four, :antibiotics_five, :antibiotics_six, :antibiotics_seven, :antibiotics_eight, :antibiotics_nine, :antibiotics_ten, :antibiotics_eleven, :antibiotics_twelve, :antibiotics_thirteen, :antibiotics_fourteen, :antibiotics_fifteen, :antibiotics_sixteen, :sensitivity_one, :sensitivity_two, :sensitivity_three, :sensitivity_four, :sensitivity_five, :sensitivity_six, :sensitivity_seven, :sensitivity_eight, :sensitivity_nine, :sensitivity_ten, :sensitivity_eleven, :sensitivity_twelve, :sensitivity_thirteen, :sensitivity_fourteen, :sensitivity_fifteen, :sensitivity_sixteen, :comments, :added_by)');
                $query->execute([':invoice_id' => $invoice_id, ':patient_id' => $patient_id, ':pus_cells_per_hps' => $pus_cells_per_hps, ':rbcs_per_hpf' => $rbcs_per_hpf, ':epitheleal_cells_per_hpf' => $epitheleal_cells_per_hpf, ':t_vaginalis' => $t_vaginalis, ':yeast_like_cells' => $yeast_like_cells, ':gram_stain' => $gram_stain, ':culture' => $culture, ':bacteria_one' => $bacteria_one, ':bacteria_two' => $bacteria_two, ':antibiotics_one' => $antibiotics_one, ':antibiotics_two' => $antibiotics_two, ':antibiotics_three' => $antibiotics_three, ':antibiotics_four' => $antibiotics_four, ':antibiotics_five' => $antibiotics_five, ':antibiotics_six' => $antibiotics_six, ':antibiotics_seven' => $antibiotics_seven, ':antibiotics_eight' => $antibiotics_eight, ':antibiotics_nine' => $antibiotics_nine, ':antibiotics_ten' => $antibiotics_ten, ':antibiotics_eleven' => $antibiotics_eleven, ':antibiotics_twelve' => $antibiotics_twelve, ':antibiotics_thirteen' => $antibiotics_thirteen, ':antibiotics_fourteen' => $antibiotics_fourteen, ':antibiotics_fifteen' => $antibiotics_fifteen, ':antibiotics_sixteen' => $antibiotics_sixteen, ':sensitivity_one' => $sensitivity_one, ':sensitivity_two' => $sensitivity_two, ':sensitivity_three' => $sensitivity_three, ':sensitivity_four' => $sensitivity_four, ':sensitivity_five' => $sensitivity_five, ':sensitivity_six' => $sensitivity_six, ':sensitivity_seven' => $sensitivity_seven, ':sensitivity_eight' => $sensitivity_eight, ':sensitivity_nine' => $sensitivity_nine, ':sensitivity_ten' => $sensitivity_ten, ':sensitivity_eleven' => $sensitivity_eleven, ':sensitivity_twelve' => $sensitivity_twelve, ':sensitivity_thirteen' => $sensitivity_thirteen, ':sensitivity_fourteen' => $sensitivity_fourteen, ':sensitivity_fifteen' => $sensitivity_fifteen, ':sensitivity_sixteen' => $sensitivity_sixteen, ':comments' => $comments, ':added_by' => $added_by]);

                return true;
            }catch(PDOException $ex){
            	return false;
            }
        }

        // fetch all endocervical_swab_cs records
        public static function read_endocervical_swab_cs($conn){
            try{
                $query = $conn->prepare('SELECT es.id, es.invoice_id, es.patient_id, es.pus_cells_per_hps, es.rbcs_per_hpf, es.epitheleal_cells_per_hpf, es.t_vaginalis, es.yeast_like_cells, es.gram_stain, es.culture, es.bacteria_one, es.bacteria_two, es.antibiotics_one, es.antibiotics_two, es.antibiotics_three, es.antibiotics_four, es.antibiotics_five, es.antibiotics_six, es.antibiotics_seven, es.antibiotics_eight, es.antibiotics_nine, es.antibiotics_ten, es.antibiotics_eleven, es.antibiotics_twelve, es.antibiotics_thirteen, es.antibiotics_fourteen, es.antibiotics_fifteen, es.antibiotics_sixteen, es.sensitivity_one, es.sensitivity_two, es.sensitivity_three, es.sensitivity_four, es.sensitivity_five, es.sensitivity_six, es.sensitivity_seven, es.sensitivity_eight, es.sensitivity_nine, es.sensitivity_ten, es.sensitivity_eleven, es.sensitivity_twelve, es.sensitivity_thirteen, es.sensitivity_fourteen, es.sensitivity_fifteen, es.sensitivity_sixteen, es.comments, es.added_by, es.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM endocervical_swab_cs es INNER JOIN patients p ON es.patient_id = p.patient_id INNER JOIN users u ON es.added_by = u.staff_id');
                $query->execute();

                return $query->fetchAll(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // fetch a endocervical_swab_cs record
        public static function read_a_endocervical_swab_cs($id, $conn){
            try{
                $query = $conn->prepare('SELECT es.id, es.invoice_id, es.patient_id, es.pus_cells_per_hps, es.rbcs_per_hpf, es.epitheleal_cells_per_hpf, es.t_vaginalis, es.yeast_like_cells, es.gram_stain, es.culture, es.bacteria_one, es.bacteria_two, es.antibiotics_one, es.antibiotics_two, es.antibiotics_three, es.antibiotics_four, es.antibiotics_five, es.antibiotics_six, es.antibiotics_seven, es.antibiotics_eight, es.antibiotics_nine, es.antibiotics_ten, es.antibiotics_eleven, es.antibiotics_twelve, es.antibiotics_thirteen, es.antibiotics_fourteen, es.antibiotics_fifteen, es.antibiotics_sixteen, es.sensitivity_one, es.sensitivity_two, es.sensitivity_three, es.sensitivity_four, es.sensitivity_five, es.sensitivity_six, es.sensitivity_seven, es.sensitivity_eight, es.sensitivity_nine, es.sensitivity_ten, es.sensitivity_eleven, es.sensitivity_twelve, es.sensitivity_thirteen, es.sensitivity_fourteen, es.sensitivity_fifteen, es.sensitivity_sixteen, es.comments, es.added_by, es.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM endocervical_swab_cs es INNER JOIN patients p ON es.patient_id = p.patient_id INNER JOIN users u ON es.added_by = u.staff_id WHERE es.id = :id');
                $query->execute([':id' => $id]);

                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // update a endocervical_swab_cs record
        public static function update_endocervical_swab_cs($id, $patient_id, $pus_cells_per_hps, $rbcs_per_hpf, $epitheleal_cells_per_hpf, $t_vaginalis, $yeast_like_cells, $gram_stain, $culture, $bacteria_one, $bacteria_two, $antibiotics_one, $antibiotics_two, $antibiotics_three, $antibiotics_four, $antibiotics_five, $antibiotics_six, $antibiotics_seven, $antibiotics_eight, $antibiotics_nine, $antibiotics_ten, $antibiotics_eleven, $antibiotics_twelve, $antibiotics_thirteen, $antibiotics_fourteen, $antibiotics_fifteen, $antibiotics_sixteen, $sensitivity_one, $sensitivity_two, $sensitivity_three, $sensitivity_four, $sensitivity_five, $sensitivity_six, $sensitivity_seven, $sensitivity_eight, $sensitivity_nine, $sensitivity_ten, $sensitivity_eleven, $sensitivity_twelve, $sensitivity_thirteen, $sensitivity_fourteen, $sensitivity_fifteen, $sensitivity_sixteen, $comments, $conn) {
            $bacteria_one             = implode(', ', $bacteria_one);
            $bacteria_two             = implode(', ', $bacteria_two);
            $t_vaginalis              = implode(', ', $t_vaginalis);
            $yeast_like_cells         = implode(', ', $yeast_like_cells);
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

            try{
                $query = $conn->prepare('UPDATE endocervical_swab_cs SET patient_id = :patient_id, pus_cells_per_hps = :pus_cells_per_hps, rbcs_per_hpf = :rbcs_per_hpf, epitheleal_cells_per_hpf = :epitheleal_cells_per_hpf, t_vaginalis = :t_vaginalis, yeast_like_cells = :yeast_like_cells, gram_stain = :gram_stain, culture = :culture, bacteria_one = :bacteria_one, bacteria_two = :bacteria_two, antibiotics_one = :antibiotics_one, antibiotics_two = :antibiotics_two, antibiotics_three = :antibiotics_three, antibiotics_four = :antibiotics_four, antibiotics_five = :antibiotics_five, antibiotics_six = :antibiotics_six, antibiotics_seven = :antibiotics_seven, antibiotics_eight = :antibiotics_eight, antibiotics_nine = :antibiotics_nine, antibiotics_ten = :antibiotics_ten, antibiotics_eleven = :antibiotics_eleven, antibiotics_twelve = :antibiotics_twelve, antibiotics_thirteen = :antibiotics_thirteen, antibiotics_fourteen = :antibiotics_fourteen, antibiotics_fifteen = :antibiotics_fifteen, antibiotics_sixteen = :antibiotics_sixteen, sensitivity_one = :sensitivity_one, sensitivity_two = :sensitivity_two, sensitivity_three = :sensitivity_three, sensitivity_four = :sensitivity_four, sensitivity_five = :sensitivity_five, sensitivity_six = :sensitivity_six, sensitivity_seven = :sensitivity_seven, sensitivity_eight = :sensitivity_eight, sensitivity_nine = :sensitivity_nine, sensitivity_ten = :sensitivity_ten, sensitivity_eleven = :sensitivity_eleven, sensitivity_twelve = :sensitivity_twelve, sensitivity_thirteen = :sensitivity_thirteen, sensitivity_fourteen = :sensitivity_fourteen, sensitivity_fifteen = :sensitivity_fifteen, sensitivity_sixteen = :sensitivity_sixteen, comments = :comments WHERE id = :id AND patient_id = :patient_id');
                $query->execute([':pus_cells_per_hps' => $pus_cells_per_hps, ':rbcs_per_hpf' => $rbcs_per_hpf, ':epitheleal_cells_per_hpf' => $epitheleal_cells_per_hpf, ':t_vaginalis' => $t_vaginalis, ':yeast_like_cells' => $yeast_like_cells, ':gram_stain' => $gram_stain, ':culture' => $culture, ':bacteria_one' => $bacteria_one, ':bacteria_two' => $bacteria_two, ':antibiotics_one' => $antibiotics_one, ':antibiotics_two' => $antibiotics_two, ':antibiotics_three' => $antibiotics_three, ':antibiotics_four' => $antibiotics_four, ':antibiotics_five' => $antibiotics_five, ':antibiotics_six' => $antibiotics_six, ':antibiotics_seven' => $antibiotics_seven, ':antibiotics_eight' => $antibiotics_eight, ':antibiotics_nine' => $antibiotics_nine, ':antibiotics_ten' => $antibiotics_ten, ':antibiotics_eleven' => $antibiotics_eleven, ':antibiotics_twelve' => $antibiotics_twelve, ':antibiotics_thirteen' => $antibiotics_thirteen, ':antibiotics_fourteen' => $antibiotics_fourteen, ':antibiotics_fifteen' => $antibiotics_fifteen, ':antibiotics_sixteen' => $antibiotics_sixteen, ':sensitivity_one' => $sensitivity_one, ':sensitivity_two' => $sensitivity_two, ':sensitivity_three' => $sensitivity_three, ':sensitivity_four' => $sensitivity_four, ':sensitivity_five' => $sensitivity_five, ':sensitivity_six' => $sensitivity_six, ':sensitivity_seven' => $sensitivity_seven, ':sensitivity_eight' => $sensitivity_eight, ':sensitivity_nine' => $sensitivity_nine, ':sensitivity_ten' => $sensitivity_ten, ':sensitivity_eleven' => $sensitivity_eleven, ':sensitivity_twelve' => $sensitivity_twelve, ':sensitivity_thirteen' => $sensitivity_thirteen, ':sensitivity_fourteen' => $sensitivity_fourteen, ':sensitivity_fifteen' => $sensitivity_fifteen, ':sensitivity_sixteen' => $sensitivity_sixteen, ':comments' => $comments, ':patient_id' => $patient_id, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

	}