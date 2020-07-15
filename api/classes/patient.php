<?php
    require 'conn.php';
    require 'methods.php';

	class Patient {

        // create a patient record
        public static function create_patient($title, $first_name, $middle_name, $last_name, $date_of_birth, $gender, $email_address, $home_phone, $mobile_phone, $work_phone, $next_of_kin_name, $next_of_kin_number, $branch, $entered_by, $conn){
            $patient_id = self::get_patient_id($branch, $conn);

            try{
                $query = $conn->prepare('INSERT INTO patients(patient_id, title, first_name, middle_name, last_name, date_of_birth, gender, email_address, home_phone, mobile_phone, work_phone, next_of_kin_name, next_of_kin_number, branch, entered_by)  VALUES(:patient_id, :title, :first_name, :middle_name, :last_name, :date_of_birth, :gender, :email_address, :home_phone, :mobile_phone, :work_phone, :next_of_kin_name, :next_of_kin_number, :branch, :entered_by)');
                $query->execute([':patient_id' => $patient_id, ':title' => $title, ':first_name' => $first_name, ':middle_name' => $middle_name, ':last_name' => $last_name, ':date_of_birth' => $date_of_birth, ':gender' => $gender, ':email_address' => $email_address, ':home_phone' => $home_phone, ':mobile_phone' => $mobile_phone, ':work_phone' => $work_phone, ':next_of_kin_name' => $next_of_kin_name, ':next_of_kin_number' => $next_of_kin_number, ':branch' => $branch, ':entered_by' => $entered_by]);

                return true;
            }catch(PDOException $ex){
            	return false;
            }
        }

        // fetch all patient records
        public static function read_patients($branch, $conn){
            try{
                $query = $conn->prepare('SELECT p.id, p.patient_id, p.title, p.first_name, p.middle_name, p.last_name, p.date_of_birth, p.gender, p.email_address, p.home_phone, p.mobile_phone, p.work_phone, p.next_of_kin_name, p.next_of_kin_number, p.branch, p.entered_by, p.date_added, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM patients p INNER JOIN users u ON p.entered_by = u.staff_id AND p.branch = :branch ORDER BY first_name, id');
                $query->execute([':branch' => $branch]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // fetch all category records
        public static function read_dropdown_patients($branch, $conn){
            try{
                $query = $conn->prepare('SELECT patient_id, first_name, middle_name, last_name FROM patients WHERE branch = :branch ORDER BY first_name');
                $query->execute([':branch' => $branch]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // fetch a patient record
        public static function read_patient($patient_id, $conn){
            try{
                $query = $conn->prepare('SELECT * FROM patients WHERE patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // fetch a patient record
        public static function read_patient_name($patient_id, $conn){
            try{
                $query  = $conn->prepare('SELECT first_name, middle_name, last_name FROM patients WHERE patient_id = :patient_id');
                $query->execute([':patient_id' => $patient_id]);
                $result = $query->fetch(PDO::FETCH_OBJ);

                return $result->middle_name ? $result->first_name.' '.$result->middle_name.' '.$result->last_name : $result->first_name.' '.$result->last_name;
            }catch(PDOException $ex){}
        }

        // update a patient record
        public static function update_patient($id, $patient_id, $title, $first_name, $middle_name, $last_name, $date_of_birth, $gender, $email_address, $home_phone, $mobile_phone, $work_phone, $next_of_kin_name, $next_of_kin_number, $conn) {
            try{
                $query = $conn->prepare('UPDATE patients SET title = :title, first_name = :first_name, middle_name = :middle_name, last_name = :last_name, date_of_birth = :date_of_birth, gender = :gender, email_address = :email_address, home_phone = :home_phone, mobile_phone = :mobile_phone, work_phone = :work_phone, next_of_kin_name = :next_of_kin_name, next_of_kin_number = :next_of_kin_number WHERE id = :id AND patient_id = :patient_id');
                $query->execute([':title' => $title, ':first_name' => $first_name, ':middle_name' => $middle_name, ':last_name' => $last_name, ':date_of_birth' => $date_of_birth, ':gender' => $gender, ':email_address' => $email_address, ':home_phone' => $home_phone, ':mobile_phone' => $mobile_phone, ':work_phone' => $work_phone, ':next_of_kin_name' => $next_of_kin_name, ':next_of_kin_number' => $next_of_kin_number, ':id' => $id, ':patient_id' => $patient_id]);

                return true;
            }catch(PDOException $ex){
            	return false;
            }
        }

        // generate a unique patient id
        public static function get_patient_id($branch, $conn) {
            $total        = 1;
            $branch_short = Methods::get_branch_code($branch);

            try {
                $query  = $conn->prepare("SELECT COUNT(*) as total FROM patients WHERE branch = :branch");
                $query->execute([':branch' => $branch]);
                $result = $query->fetch(PDO::FETCH_OBJ);
                $total  = $total + $result->total;

                if($total < 10)
                    return 'LMLS-PAT-'.$branch_short.'-000'.$total;
                else if($total < 100)
                    return 'LMLS-PAT-'.$branch_short.'-00'.$total;
                else if($total < 1000)
                    return 'LMLS-PAT-'.$branch_short.'-0'.$total;
                else
                    return 'LMLS-PAT-'.$branch_short.'-'.$total;
            } catch(PDOException $ex){}
        }
        
        public static function is_patient_email_taken($email_address, $conn){
            try{
                $query = $conn->prepare('SELECT * FROM patients WHERE email_address = :email_address');
                $query->execute([':email_address' => $email_address]);

                return $query->rowCount();
            }catch(PDOException $ex){}
        }

        public static function is_this_patient_email_taken($patient_id, $email_address, $conn){
            try{
                $query = $conn->prepare('SELECT * FROM patients WHERE email_address = :email_address AND patient_id != :patient_id');
                $query->execute([':email_address' => $email_address, ':patient_id' => $patient_id]);

                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

	}