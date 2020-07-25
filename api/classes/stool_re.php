<?php
    require_once 'conn.php';
    require_once 'methods.php';
    require_once 'charge.php';

	class StoolRE {

        // create a stool_re record
        public static function create_stool_re($patient_id, $row_one_one, $ova_one, $ova_two, $row_three_one, $row_three_two, $row_four_one, $row_four_two, $larvae_one, $larvae_two, $cyst_one, $cyst_two, $row_seven_one, $row_seven_two, $row_eight_one, $row_eight_two, $vegetative_form_one, $vegetative_form_two, $row_ten_one, $row_ten_two, $row_eleven_one, $row_eleven_two, $red_blood_cells, $white_blood_cells, $comments, $added_by, $conn){
            $invoice_id          = Methods::get_invoice_id('Stool R/E', $conn);
            $amount              = Charge::read_charge('74', $conn);
            $row_one_one         = is_array($row_one_one) ? implode(', ', $row_one_one) : $row_one_one;
            $ova_one             = is_array($ova_one) ? implode(', ', $ova_one) : $ova_one;
            $ova_two             = is_array($ova_two) ? implode(', ', $ova_two) : $ova_two;
            $row_three_one       = is_array($row_three_one) ? implode(', ', $row_three_one) : $row_three_one;
            $row_three_two       = is_array($row_three_two) ? implode(', ', $row_three_two) : $row_three_two;
            $row_four_one        = is_array($row_four_one) ? implode(', ', $row_four_one) : $row_four_one;
            $row_four_two        = is_array($row_four_two) ? implode(', ', $row_four_two) : $row_four_two;
            $larvae_one          = is_array($larvae_one) ? implode(', ', $larvae_one) : $larvae_one;
            $larvae_two          = is_array($larvae_two) ? implode(', ', $larvae_two) : $larvae_two;
            $cyst_one            = is_array($cyst_one) ? implode(', ', $cyst_one) : $cyst_one;
            $cyst_two            = is_array($cyst_two) ? implode(', ', $cyst_two) : $cyst_two;
            $row_seven_one       = is_array($row_seven_one) ? implode(', ', $row_seven_one) : $row_seven_one;
            $row_seven_two       = is_array($row_seven_two) ? implode(', ', $row_seven_two) : $row_seven_two;
            $row_eight_one       = is_array($row_eight_one) ? implode(', ', $row_eight_one) : $row_eight_one;
            $row_eight_two       = is_array($row_eight_two) ? implode(', ', $row_eight_two) : $row_eight_two;
            $vegetative_form_one = is_array($vegetative_form_one) ? implode(', ', $vegetative_form_one) : $vegetative_form_one;
            $vegetative_form_two = is_array($vegetative_form_two) ? implode(', ', $vegetative_form_two) : $vegetative_form_two;
            $row_ten_one         = is_array($row_ten_one) ? implode(', ', $row_ten_one) : $row_ten_one;
            $row_ten_two         = is_array($row_ten_two) ? implode(', ', $row_ten_two) : $row_ten_two;
            $row_eleven_one      = is_array($row_eleven_one) ? implode(', ', $row_eleven_one) : $row_eleven_one;
            $row_eleven_two      = is_array($row_eleven_two) ? implode(', ', $row_eleven_two) : $row_eleven_two;
            $red_blood_cells     = is_array($red_blood_cells) ? implode(', ', $red_blood_cells) : $red_blood_cells;
            $white_blood_cells   = is_array($white_blood_cells) ? implode(', ', $white_blood_cells) : $white_blood_cells;

            try{
                $query = $conn->prepare('INSERT INTO stool_re(invoice_id, patient_id, row_one_one, ova_one, ova_two, row_three_one, row_three_two, row_four_one, row_four_two, larvae_one, larvae_two, cyst_one, cyst_two, row_seven_one, row_seven_two, row_eight_one, row_eight_two, vegetative_form_one, vegetative_form_two, row_ten_one, row_ten_two, row_eleven_one, row_eleven_two, red_blood_cells, white_blood_cells, comments, added_by)  VALUES(:invoice_id, :patient_id, :row_one_one, :ova_one, :ova_two, :row_three_one, :row_three_two, :row_four_one, :row_four_two, :larvae_one, :larvae_two, :cyst_one, :cyst_two, :row_seven_one, :row_seven_two, :row_eight_one, :row_eight_two, :vegetative_form_one, :vegetative_form_two, :row_ten_one, :row_ten_two, :row_eleven_one, :row_eleven_two, :red_blood_cells, :white_blood_cells, :comments, :added_by)');
                $query->execute([':invoice_id' => $invoice_id, ':patient_id' => $patient_id, ':row_one_one' => $row_one_one, ':ova_one' => $ova_one, ':ova_two' => $ova_two, ':row_three_one' => $row_three_one, ':row_three_two' => $row_three_two, ':row_four_one' => $row_four_one, ':row_four_two' => $row_four_two, ':larvae_one' => $larvae_one, ':larvae_two' => $larvae_two, ':cyst_one' => $cyst_one, ':cyst_two' => $cyst_two, ':row_seven_one' => $row_seven_one, ':row_seven_two' => $row_seven_two, ':row_eight_one' => $row_eight_one, ':row_eight_two' => $row_eight_two, ':vegetative_form_one' => $vegetative_form_one, ':vegetative_form_two' => $vegetative_form_two, ':row_ten_one' => $row_ten_one, ':row_ten_two' => $row_ten_two, ':row_eleven_one' => $row_eleven_one, ':row_eleven_two' => $row_eleven_two, ':red_blood_cells' => $red_blood_cells, ':white_blood_cells' => $white_blood_cells, ':comments' => $comments, ':added_by' => $added_by]);

                return true;
            }catch(PDOException $ex){
            	return false;
            }
        }

        // fetch all stool_re records
        public static function read_stool_re($conn){
            try{
                $query = $conn->prepare('SELECT sre.id, sre.invoice_id, sre.patient_id, sre.row_one_one, sre.ova_one, sre.ova_two, sre.row_three_one, sre.row_three_two, sre.row_four_one, sre.row_four_two, sre.larvae_one, sre.larvae_two, sre.cyst_one, sre.cyst_two, sre.row_seven_one, sre.row_seven_two, sre.row_eight_one, sre.row_eight_two, sre.vegetative_form_one, sre.vegetative_form_two, sre.row_ten_one, sre.row_ten_two, sre.row_eleven_one, sre.row_eleven_two, sre.red_blood_cells, sre.white_blood_cells, sre.comments, sre.added_by, sre.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM stool_re sre INNER JOIN patients p ON sre.patient_id = p.patient_id INNER JOIN users u ON sre.added_by = u.staff_id');
                $query->execute();

                return $query->fetchAll(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // fetch a stool_re record
        public static function read_a_stool_re($id, $conn){
            try{
                $query = $conn->prepare('SELECT sre.id, sre.invoice_id, sre.patient_id, sre.row_one_one, sre.ova_one, sre.ova_two, sre.row_three_one, sre.row_three_two, sre.row_four_one, sre.row_four_two, sre.larvae_one, sre.larvae_two, sre.cyst_one, sre.cyst_two, sre.row_seven_one, sre.row_seven_two, sre.row_eight_one, sre.row_eight_two, sre.vegetative_form_one, sre.vegetative_form_two, sre.row_ten_one, sre.row_ten_two, sre.row_eleven_one, sre.row_eleven_two, sre.red_blood_cells, sre.white_blood_cells, sre.comments, sre.added_by, sre.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM stool_re sre INNER JOIN patients p ON sre.patient_id = p.patient_id INNER JOIN users u ON sre.added_by = u.staff_id WHERE sre.id = :id');
                $query->execute([':id' => $id]);

                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // update a stool_re record
        public static function update_stool_re($id, $patient_id, $row_one_one, $ova_one, $ova_two, $row_three_one, $row_three_two, $row_four_one, $row_four_two, $larvae_one, $larvae_two, $cyst_one, $cyst_two, $row_seven_one, $row_seven_two, $row_eight_one, $row_eight_two, $vegetative_form_one, $vegetative_form_two, $row_ten_one, $row_ten_two, $row_eleven_one, $row_eleven_two, $red_blood_cells, $white_blood_cells, $comments, $conn) {
            $row_one_one         = is_array($row_one_one) ? implode(', ', $row_one_one) : $row_one_one;
            $ova_one             = is_array($ova_one) ? implode(', ', $ova_one) : $ova_one;
            $ova_two             = is_array($ova_two) ? implode(', ', $ova_two) : $ova_two;
            $row_three_one       = is_array($row_three_one) ? implode(', ', $row_three_one) : $row_three_one;
            $row_three_two       = is_array($row_three_two) ? implode(', ', $row_three_two) : $row_three_two;
            $row_four_one        = is_array($row_four_one) ? implode(', ', $row_four_one) : $row_four_one;
            $row_four_two        = is_array($row_four_two) ? implode(', ', $row_four_two) : $row_four_two;
            $larvae_one          = is_array($larvae_one) ? implode(', ', $larvae_one) : $larvae_one;
            $larvae_two          = is_array($larvae_two) ? implode(', ', $larvae_two) : $larvae_two;
            $cyst_one            = is_array($cyst_one) ? implode(', ', $cyst_one) : $cyst_one;
            $cyst_two            = is_array($cyst_two) ? implode(', ', $cyst_two) : $cyst_two;
            $row_seven_one       = is_array($row_seven_one) ? implode(', ', $row_seven_one) : $row_seven_one;
            $row_seven_two       = is_array($row_seven_two) ? implode(', ', $row_seven_two) : $row_seven_two;
            $row_eight_one       = is_array($row_eight_one) ? implode(', ', $row_eight_one) : $row_eight_one;
            $row_eight_two       = is_array($row_eight_two) ? implode(', ', $row_eight_two) : $row_eight_two;
            $vegetative_form_one = is_array($vegetative_form_one) ? implode(', ', $vegetative_form_one) : $vegetative_form_one;
            $vegetative_form_two = is_array($vegetative_form_two) ? implode(', ', $vegetative_form_two) : $vegetative_form_two;
            $row_ten_one         = is_array($row_ten_one) ? implode(', ', $row_ten_one) : $row_ten_one;
            $row_ten_two         = is_array($row_ten_two) ? implode(', ', $row_ten_two) : $row_ten_two;
            $row_eleven_one      = is_array($row_eleven_one) ? implode(', ', $row_eleven_one) : $row_eleven_one;
            $row_eleven_two      = is_array($row_eleven_two) ? implode(', ', $row_eleven_two) : $row_eleven_two;
            $red_blood_cells     = is_array($red_blood_cells) ? implode(', ', $red_blood_cells) : $red_blood_cells;
            $white_blood_cells   = is_array($white_blood_cells) ? implode(', ', $white_blood_cells) : $white_blood_cells;

            try{
                $query = $conn->prepare('UPDATE stool_re SET patient_id = :patient_id, row_one_one = :row_one_one, ova_one = :ova_one, ova_two = :ova_two, row_three_one = :row_three_one, row_three_two = :row_three_two, row_four_one = :row_four_one, row_four_two = :row_four_two, larvae_one = :larvae_one, larvae_two = :larvae_two, cyst_one = :cyst_one, cyst_two = :cyst_two, row_seven_one = :row_seven_one, row_seven_two = :row_seven_two, row_eight_one = :row_eight_one, row_eight_two = :row_eight_two, vegetative_form_one = :vegetative_form_one, vegetative_form_two = :vegetative_form_two, row_ten_one = :row_ten_one, row_ten_two = :row_ten_two, row_eleven_one = :row_eleven_one, row_eleven_two = :row_eleven_two, red_blood_cells = :red_blood_cells, white_blood_cells = :white_blood_cells, comments = :comments WHERE id = :id AND patient_id = :patient_id');
                $query->execute([':row_one_one' => $row_one_one, ':ova_one' => $ova_one, ':ova_two' => $ova_two, ':row_three_one' => $row_three_one, ':row_three_two' => $row_three_two, ':row_four_one' => $row_four_one, ':row_four_two' => $row_four_two, ':larvae_one' => $larvae_one, ':larvae_two' => $larvae_two, ':cyst_one' => $cyst_one, ':cyst_two' => $cyst_two, ':row_seven_one' => $row_seven_one, ':row_seven_two' => $row_seven_two, ':row_eight_one' => $row_eight_one, ':row_eight_two' => $row_eight_two, ':vegetative_form_one' => $vegetative_form_one, ':vegetative_form_two' => $vegetative_form_two, ':row_ten_one' => $row_ten_one, ':row_ten_two' => $row_ten_two, ':row_eleven_one' => $row_eleven_one, ':row_eleven_two' => $row_eleven_two, ':red_blood_cells' => $red_blood_cells, ':white_blood_cells' => $white_blood_cells, ':comments' => $comments, ':patient_id' => $patient_id, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

	}