<?php
    require_once 'conn.php';
    require_once 'methods.php';
    require_once 'charge.php';

	class Urine_RE {

        // create a urine_re record
        public static function create_urine_re($patient_id, $appearance, $colour, $ph, $specific_gravity, $protein, $leucocytes, $glucose, $urobilinogen, $blood, $ketones, $bilirubin, $nitrites, $bile_pigment, $bile_salt, $urobilin, $pus_cells_per_hps, $yeast_like_cells, $epitheleal_cells_per_hpf, $s_haematobium, $rbcs_per_hpf, $bacteria, $spermatozoa, $crystals, $unknown_one, $cast, $unknown_two, $comments, $added_by, $conn){
            $invoice_id       = Methods::get_invoice_id('Urine R/E', $conn);
            $amount           = Charge::read_charge('82', $conn);
            $appearance       = is_array($appearance) ? implode(', ', $appearance) : $appearance;
            $ph               = is_array($ph) ? implode(', ', $ph) : $ph;
            $protein          = is_array($protein) ? implode(', ', $protein) : $protein;
            $glucose          = is_array($glucose) ? implode(', ', $glucose) : $glucose;
            $blood            = is_array($blood) ? implode(', ', $blood) : $blood;
            $bilirubin        = is_array($bilirubin) ? implode(', ', $bilirubin) : $bilirubin;
            $bile_pigment     = is_array($bile_pigment) ? implode(', ', $bile_pigment) : $bile_pigment;
            $urobilin         = is_array($urobilin) ? implode(', ', $urobilin) : $urobilin;
            $colour           = is_array($colour) ? implode(', ', $colour) : $colour;
            $specific_gravity = is_array($specific_gravity) ? implode(', ', $specific_gravity) : $specific_gravity;
            $leucocytes       = is_array($leucocytes) ? implode(', ', $leucocytes) : $leucocytes;
            $urobilinogen     = is_array($urobilinogen) ? implode(', ', $urobilinogen) : $urobilinogen;
            $ketones          = is_array($ketones) ? implode(', ', $ketones) : $ketones;
            $nitrites         = is_array($nitrites) ? implode(', ', $nitrites) : $nitrites;
            $bile_salt        = is_array($bile_salt) ? implode(', ', $bile_salt) : $bile_salt;
            $yeast_like_cells = is_array($yeast_like_cells) ? implode(', ', $yeast_like_cells) : $yeast_like_cells;
            $s_haematobium    = is_array($s_haematobium) ? implode(', ', $s_haematobium) : $s_haematobium;
            $bacteria         = is_array($bacteria) ? implode(', ', $bacteria) : $bacteria;
            $spermatozoa      = is_array($spermatozoa) ? implode(', ', $spermatozoa) : $spermatozoa;
            $crystals         = is_array($crystals) ? implode(', ', $crystals) : $crystals;
            $unknown_one      = is_array($unknown_one) ? implode(', ', $unknown_one) : $unknown_one;
            $cast             = is_array($cast) ? implode(', ', $cast) : $cast;
            $unknown_two      = is_array($unknown_two) ? implode(', ', $unknown_two) : $unknown_two;

            try{
                $query = $conn->prepare('INSERT INTO urine_re(invoice_id, patient_id, appearance, colour, ph, specific_gravity, protein, leucocytes, glucose, urobilinogen, blood, ketones, bilirubin, nitrites, bile_pigment, bile_salt, urobilin, pus_cells_per_hps, yeast_like_cells, epitheleal_cells_per_hpf, s_haematobium, rbcs_per_hpf, bacteria, spermatozoa, crystals, unknown_one, cast, unknown_two, comments, added_by)  VALUES(:invoice_id, :patient_id, :appearance, :colour, :ph, :specific_gravity, :protein, :leucocytes, :glucose, :urobilinogen, :blood, :ketones, :bilirubin, :nitrites, :bile_pigment, :bile_salt, :urobilin, :pus_cells_per_hps, :yeast_like_cells, :epitheleal_cells_per_hpf, :s_haematobium, :rbcs_per_hpf, :bacteria, :spermatozoa, :crystals, :unknown_one, :cast, :unknown_two, :comments, :added_by)');
                $query->execute([':invoice_id' => $invoice_id, ':patient_id' => $patient_id, ':appearance' => $appearance, ':colour' => $colour, ':ph' => $ph, ':specific_gravity' => $specific_gravity, ':protein' => $protein, ':leucocytes' => $leucocytes, ':glucose' => $glucose, ':urobilinogen' => $urobilinogen, ':blood' => $blood, ':ketones' => $ketones, ':bilirubin' => $bilirubin, ':nitrites' => $nitrites, ':bile_pigment' => $bile_pigment, ':bile_salt' => $bile_salt, ':urobilin' => $urobilin, ':pus_cells_per_hps' => $pus_cells_per_hps, ':yeast_like_cells' => $yeast_like_cells, ':epitheleal_cells_per_hpf' => $epitheleal_cells_per_hpf, ':s_haematobium' => $s_haematobium, ':rbcs_per_hpf' => $rbcs_per_hpf, ':bacteria' => $bacteria, ':spermatozoa' => $spermatozoa, ':crystals' => $crystals, ':unknown_one' => $unknown_one, ':cast' => $cast, ':unknown_two' => $unknown_two, ':comments' => $comments, ':added_by' => $added_by]);

                return true;
            }catch(PDOException $ex){
            	return false;
            }
        }

        // fetch all urine_re records
        public static function read_urine_re($conn){
            try{
                $query = $conn->prepare('SELECT ure.id, ure.invoice_id, ure.patient_id, ure.appearance, ure.colour, ure.ph, ure.specific_gravity, ure.protein, ure.leucocytes, ure.glucose, ure.urobilinogen, ure.blood, ure.ketones, ure.bilirubin, ure.nitrites, ure.bile_pigment, ure.bile_salt, ure.urobilin, ure.pus_cells_per_hps, ure.yeast_like_cells, ure.epitheleal_cells_per_hpf, ure.s_haematobium, ure.rbcs_per_hpf, ure.bacteria, ure.spermatozoa, ure.crystals, ure.unknown_one, ure.cast, ure.unknown_two, ure.comments, ure.added_by, ure.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM urine_re ure INNER JOIN patients p ON ure.patient_id = p.patient_id INNER JOIN users u ON ure.added_by = u.staff_id');
                $query->execute();

                return $query->fetchAll(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // fetch a urine_re record
        public static function read_a_urine_re($id, $conn){
            try{
                $query = $conn->prepare('SELECT ure.id, ure.invoice_id, ure.patient_id, ure.appearance, ure.colour, ure.ph, ure.specific_gravity, ure.protein, ure.leucocytes, ure.glucose, ure.urobilinogen, ure.blood, ure.ketones, ure.bilirubin, ure.nitrites, ure.bile_pigment, ure.bile_salt, ure.urobilin, ure.pus_cells_per_hps, ure.yeast_like_cells, ure.epitheleal_cells_per_hpf, ure.s_haematobium, ure.rbcs_per_hpf, ure.bacteria, ure.spermatozoa, ure.crystals, ure.unknown_one, ure.cast, ure.unknown_two, ure.comments, ure.added_by, ure.date_added, p.date_of_birth, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM urine_re ure INNER JOIN patients p ON ure.patient_id = p.patient_id INNER JOIN users u ON ure.added_by = u.staff_id WHERE ure.id = :id');
                $query->execute([':id' => $id]);

                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // update a urine_re record
        public static function update_urine_re($id, $patient_id, $appearance, $colour, $ph, $specific_gravity, $protein, $leucocytes, $glucose, $urobilinogen, $blood, $ketones, $bilirubin, $nitrites, $bile_pigment, $bile_salt, $urobilin, $pus_cells_per_hps, $yeast_like_cells, $epitheleal_cells_per_hpf, $s_haematobium, $rbcs_per_hpf, $bacteria, $spermatozoa, $crystals, $unknown_one, $cast, $unknown_two, $comments, $conn) {
            $appearance       = is_array($appearance) ? implode(', ', $appearance) : $appearance;
            $ph               = is_array($ph) ? implode(', ', $ph) : $ph;
            $protein          = is_array($protein) ? implode(', ', $protein) : $protein;
            $glucose          = is_array($glucose) ? implode(', ', $glucose) : $glucose;
            $blood            = is_array($blood) ? implode(', ', $blood) : $blood;
            $bilirubin        = is_array($bilirubin) ? implode(', ', $bilirubin) : $bilirubin;
            $bile_pigment     = is_array($bile_pigment) ? implode(', ', $bile_pigment) : $bile_pigment;
            $urobilin         = is_array($urobilin) ? implode(', ', $urobilin) : $urobilin;
            $colour           = is_array($colour) ? implode(', ', $colour) : $colour;
            $specific_gravity = is_array($specific_gravity) ? implode(', ', $specific_gravity) : $specific_gravity;
            $leucocytes       = is_array($leucocytes) ? implode(', ', $leucocytes) : $leucocytes;
            $urobilinogen     = is_array($urobilinogen) ? implode(', ', $urobilinogen) : $urobilinogen;
            $ketones          = is_array($ketones) ? implode(', ', $ketones) : $ketones;
            $nitrites         = is_array($nitrites) ? implode(', ', $nitrites) : $nitrites;
            $bile_salt        = is_array($bile_salt) ? implode(', ', $bile_salt) : $bile_salt;
            $yeast_like_cells = is_array($yeast_like_cells) ? implode(', ', $yeast_like_cells) : $yeast_like_cells;
            $s_haematobium    = is_array($s_haematobium) ? implode(', ', $s_haematobium) : $s_haematobium;
            $bacteria         = is_array($bacteria) ? implode(', ', $bacteria) : $bacteria;
            $spermatozoa      = is_array($spermatozoa) ? implode(', ', $spermatozoa) : $spermatozoa;
            $crystals         = is_array($crystals) ? implode(', ', $crystals) : $crystals;
            $unknown_one      = is_array($unknown_one) ? implode(', ', $unknown_one) : $unknown_one;
            $cast             = is_array($cast) ? implode(', ', $cast) : $cast;
            $unknown_two      = is_array($unknown_two) ? implode(', ', $unknown_two) : $unknown_two;

            try{
                $query = $conn->prepare('UPDATE urine_re SET patient_id = :patient_id, appearance = :appearance, colour = :colour, ph = :ph, specific_gravity = :specific_gravity, protein = :protein, leucocytes = :leucocytes, glucose = :glucose, urobilinogen = :urobilinogen, blood = :blood, ketones = :ketones, bilirubin = :bilirubin, nitrites = :nitrites, bile_pigment = :bile_pigment, bile_salt = :bile_salt, urobilin = :urobilin, pus_cells_per_hps = :pus_cells_per_hps, yeast_like_cells = :yeast_like_cells, epitheleal_cells_per_hpf = :epitheleal_cells_per_hpf, s_haematobium = :s_haematobium, rbcs_per_hpf = :rbcs_per_hpf, bacteria = :bacteria, spermatozoa = :spermatozoa, crystals = :crystals, unknown_one = :unknown_one, cast = :cast, unknown_two = :unknown_two, comments = :comments WHERE id = :id AND patient_id = :patient_id');
                $query->execute([':appearance' => $appearance, ':colour' => $colour, ':ph' => $ph, ':specific_gravity' => $specific_gravity, ':protein' => $protein, ':leucocytes' => $leucocytes, ':glucose' => $glucose, ':urobilinogen' => $urobilinogen, ':blood' => $blood, ':ketones' => $ketones, ':bilirubin' => $bilirubin, ':nitrites' => $nitrites, ':bile_pigment' => $bile_pigment, ':bile_salt' => $bile_salt, ':urobilin' => $urobilin, ':pus_cells_per_hps' => $pus_cells_per_hps, ':yeast_like_cells' => $yeast_like_cells, ':epitheleal_cells_per_hpf' => $epitheleal_cells_per_hpf, ':s_haematobium' => $s_haematobium, ':rbcs_per_hpf' => $rbcs_per_hpf, ':bacteria' => $bacteria, ':spermatozoa' => $spermatozoa, ':crystals' => $crystals, ':unknown_one' => $unknown_one, ':cast' => $cast, ':unknown_two' => $unknown_two, ':comments' => $comments, ':patient_id' => $patient_id, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }
        
        public static function pay_urine_re($id, $payment_type, $conn) {
            try{
                $query = $conn->prepare('UPDATE urine_re SET payment_type = :payment_type WHERE id = :id');
                $query->execute([':payment_type' => $payment_type, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

	}