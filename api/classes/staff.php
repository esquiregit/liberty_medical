<?php
    // require_once 'login.php';
    // require_once 'audit_trail.php';
    require_once 'conn.php';
    require_once 'methods.php';

	class Staff {

        // create a user record
        public static function create_staff($first_name, $other_name, $last_name, $gender, $email_address, $phone_number, $phone_number_two, $role, $branch, $conn){
            $staff_id   = self::get_staff_id($branch, $conn);
            $password   = Methods::password_hash(md5('12345678'));
            $reset_code = self::get_reset_code();
            $username   = self::get_username($first_name, $other_name, $last_name, $conn);

            try {
                $query = $conn->prepare('INSERT INTO users(staff_id, first_name, other_name, last_name, gender, email_address, phone_number, phone_number_two, username, password, role, branch, reset_code) VALUES(:staff_id, :first_name, :other_name, :last_name, :gender, :email_address, :phone_number, :phone_number_two, :username, :password, :role, :branch, :reset_code)');
                $query->execute([':staff_id' => $staff_id, ':first_name' => $first_name, ':other_name' => $other_name, ':last_name' => $last_name, ':gender' => $gender, ':email_address' => $email_address, ':phone_number' => $phone_number, ':phone_number_two' => $phone_number_two, ':username' => $username, ':password' => $password, ':role' => $role, ':branch' => $branch, ':reset_code' => $reset_code]);

                return true;
            } catch(PDOException $ex){
                return false;
            }
        }

        // fetch all user records
        public static function read_staff($conn){
            try{
                $query = $conn->prepare('SELECT u.id, u.staff_id, u.first_name, u.last_name, u.username, u.other_name, u.gender, u.email_address, u.phone_number, u.phone_number_two, u.role, u.status, u.logged_in_before, u.created_at, u.branch, r.id as role_id, r.name as role, r.permissions FROM users u INNER JOIN roles r ON u.role = r.id WHERE u.staff_id != :staff_id ORDER BY u.status, u.role, u.branch, u.first_name, u.staff_id');
                $query->execute([':staff_id' => 'LMLS-0000']);

                return $query->fetchAll(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // fetch a user record
        public static function read_a_staff($staff_id, $conn){
            try{
                $query = $conn->prepare('SELECT * FROM users WHERE staff_id = :staff_id');
                $query->execute([':staff_id' => $staff_id]);

                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // fetch a user record
        public static function get_staff_by_email($email_address, $conn){
            try{
                $query = $conn->prepare('SELECT * FROM users WHERE email_address = :email_address');
                $query->execute([':email_address' => $email_address]);

                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        static function verify_password_change($staff_id, $reset_code, $conn) {
            try {
                $query = $conn->prepare('SELECT * FROM users WHERE staff_id = :staff_id AND reset_code = :reset_code');
                $query->execute([':staff_id' => $staff_id, ':reset_code' => $reset_code]);

                return $query->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $ex) {
                return false;
            }
        }

        // fetch a user record
        public static function read_staff_roles($staff_id, $conn){
            $new_array  = array();
            try{
                $query  = $conn->prepare('SELECT role FROM roles WHERE staff_id = :staff_id');
                $query->execute([':staff_id' => $staff_id]);
                
                return $query->fetchAll(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // fetch staff name
        public static function read_staff_name($staff_id, $conn){
            try{
                $query  = $conn->prepare('SELECT first_name, other_name, last_name FROM users WHERE staff_id = :staff_id');
                $query->execute([':staff_id' => $staff_id]);
                $result = $query->fetch(PDO::FETCH_OBJ);

                return $result->other_name ? $result->first_name.' '.$result->other_name.' '.$result->last_name : $result->first_name.' '.$result->last_name;
            }catch(PDOException $ex){}
        }

        // block a user account
        public static function block_staff($staff_id, $conn){
            try{
                $query = $conn->prepare('UPDATE users SET status = :status WHERE staff_id = :staff_id');
                $query->execute([':status' => 'Inactive', 'staff_id' => $staff_id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

        // block a user account
        public static function unblock_staff($staff_id, $conn){
            try{
                $query = $conn->prepare('UPDATE users SET status = :status WHERE staff_id = :staff_id');
                $query->execute([':status' => 'Active', 'staff_id' => $staff_id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

        public static function is_staff_email_taken($email_address, $conn){
            try{
                $query = $conn->prepare('SELECT * FROM users WHERE email_address = :email_address');
                $query->execute([':email_address' => $email_address]);

                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        public static function is_staff_username_taken($username, $conn){
            try{
                $query = $conn->prepare('SELECT * FROM users WHERE username = :username');
                $query->execute([':username' => $username]);

                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        public static function is_this_staff_email_taken($staff_id, $email_address, $conn){
            try{
                $query = $conn->prepare('SELECT * FROM users WHERE email_address = :email_address AND staff_id != :staff_id');
                $query->execute([':email_address' => $email_address, ':staff_id' => $staff_id]);

                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }
        
        public static function is_this_staff_username_taken($staff_id, $username, $conn){
            try{
                $query = $conn->prepare('SELECT * FROM users WHERE username = :username AND staff_id != :staff_id');
                $query->execute([':username' => $username, ':staff_id' => $staff_id]);

                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // update a user record
        public static function update_staff($id, $staff_id, $first_name, $other_name, $last_name, $gender, $email_address, $phone_number, $phone_number_two, $role, $conn) {

            try{
                $query = $conn->prepare('UPDATE users SET first_name = :first_name, other_name = :other_name, last_name = :last_name, gender = :gender, email_address = :email_address, phone_number = :phone_number, phone_number_two = :phone_number_two, role = :role WHERE id = :id AND staff_id = :staff_id');
                $query->execute([':first_name' => $first_name, ':other_name' => $other_name, ':last_name' => $last_name, ':gender' => $gender, ':email_address' => $email_address, ':phone_number' => $phone_number, ':phone_number_two' => $phone_number_two, ':role' => $role, ':id' => $id, ':staff_id' => $staff_id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

        public static function change_password($staff_id, $password, $reset_code, $conn){
            $password = Methods::password_hash($password);
            
            try{
                $query  = $conn->prepare('UPDATE users SET password = :password WHERE staff_id = :staff_id AND reset_code = :reset_code');
                $query->execute([':password' => $password, ':staff_id' => $staff_id, ':reset_code' => $reset_code]);
                
                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

        // update a user record
        public static function update_profile_with_password($id, $staff_id, $first_name, $other_name, $last_name, $email_address, $phone_number, $phone_number_two, $username, $password, $conn) {
            $password = Methods::password_hash($password);

            try{
                $query = $conn->prepare('UPDATE users SET first_name = :first_name, other_name = :other_name, last_name = :last_name, email_address = :email_address, phone_number = :phone_number, phone_number_two = :phone_number_two, username = :username, password = :password WHERE id = :id AND staff_id = :staff_id');
                $query->execute([':first_name' => $first_name, ':other_name' => $other_name, ':last_name' => $last_name, ':email_address' => $email_address, ':phone_number' => $phone_number, ':phone_number_two' => $phone_number_two, ':username' => $username, ':password' => $password, ':id' => $id, ':staff_id' => $staff_id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

        // update a user record
        public static function update_profile_without_password($id, $staff_id, $first_name, $other_name, $last_name, $email_address, $phone_number, $phone_number_two, $username, $conn) {
            try{
                $query = $conn->prepare('UPDATE users SET first_name = :first_name, other_name = :other_name, last_name = :last_name, email_address = :email_address, phone_number = :phone_number, phone_number_two = :phone_number_two, username = :username WHERE id = :id AND staff_id = :staff_id');
                $query->execute([':first_name' => $first_name, ':other_name' => $other_name, ':last_name' => $last_name, ':email_address' => $email_address, ':phone_number' => $phone_number, ':phone_number_two' => $phone_number_two, ':username' => $username, ':id' => $id, ':staff_id' => $staff_id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

        // update a user record
        public static function update_password($id, $staff_id, $password, $conn) {
            $password = Methods::password_hash($password);

            try{
                $query = $conn->prepare('UPDATE users SET password = :password, logged_in_before = :logged_in_before WHERE id = :id AND staff_id = :staff_id');
                $query->execute([':password' => $password, ':logged_in_before' => '1', ':id' => $id, ':staff_id' => $staff_id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

        public function get_admin_roles() {
            return "Can Create Lab,Can Edit Lab,Can View Lab,Can Pay Lab,Can View Lab List,
                Can Create Charge,Can Edit Charge,Can View Charges List,Can Create Patient,Can Edit Patient,Can View Patient,Can View Patients ,List,Can Create Reports,Can Create Staff,Can Edit Staff,Can View Staff,Can View Staff List,Can Block Staff,Can Unblock Staff";
            // return 'Can Create Charge,Can Edit Charge,Can View Charges List,Can Create Category,Can Edit Category,Can View Category,Can View Categories List,Can Create Consultation,Can Edit Consultation,Can View Consultation,Can View Consultations List,Can Create General,Can Edit General,Can View General,Can View Generals List,Can Create Paediatric,Can Edit Paediatric,Can View Paediatric,Can View Paediatrics List,Can Create Patient,Can Edit Patient,Can View Patient,Can View Patients List,Can Create Reports,Can Create Sale,Can Edit Sale,Can View Sale,Can View Sales List,Can Block Staff,Can Create Staff,Can Edit Staff,Can View Staff,Can View Staff List,Can Unblock Staff,Can Create Stock,Can Edit Stock,Can View Stock,Can View Stock List';
        }

        // generate a unique user id
        public static function get_staff_id($branch, $conn) {
            $total        = 0;
            $branch_short = Methods::get_branch_code($branch);

            try {
                $query  = $conn->prepare("SELECT COUNT(*) as total FROM users WHERE branch = :branch");
                $query->execute([':branch' => $branch]);
                $result = $query->fetch(PDO::FETCH_OBJ);
                $total  = $total + $result->total;

                if($total < 10)
                    return 'LMLS-'.$branch_short.'-000'. $total;
                else if($total < 100)
                    return 'LMLS-'.$branch_short.'-00'. $total;
                else if($total < 1000)
                    return 'LMLS-'.$branch_short.'-0'. $total;
                else
                    return 'LMLS-'.$branch_short.'-'.$total;
            } catch(PDOException $ex){}
        }

        // fetch a user record
        public static function get_staff_branch($staff_id, $conn){
            try{
                $query = $conn->prepare('SELECT branch FROM users WHERE staff_id = :staff_id');
                $query->execute([':staff_id' => $staff_id]);

                return $query->fetch(PDO::FETCH_OBJ)->branch;
            }catch(PDOException $ex){}
        }

        // generate a reset code
        public static function get_reset_code() {
            $alphabets  = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz01234567890';
            return substr(str_shuffle($alphabets), 0, 4).substr(str_shuffle($alphabets), 0, 4).substr(str_shuffle($alphabets), 0, 4);

            /*$total      = 1;
            try {
                $query  = $conn->prepare("SELECT COUNT(*) as total FROM users");
                $query->execute();
                $result = $query->fetch(PDO::FETCH_OBJ);
                $total  = $total + $result->total;

                return substr(str_shuffle($alphabets), 0, 4) . $total . rand(10, 99999999) . substr(str_shuffle($alphabets), 0, 4);
            } catch(PDOException $ex){}*/
        }

        // generate a username
        public static function get_username($first_name, $other_name, $last_name, $conn) {
            $username  = strtolower($other_name ? substr($first_name, 0, 1).substr($other_name, 0, 1).$last_name : substr($first_name, 0, 1).$last_name);
            try {
                $query = $conn->prepare("SELECT COUNT(*) as total FROM users WHERE username LIKE :username");
                $query->execute([':username' => '%'.$username.'%']);
                $total = $query->fetch(PDO::FETCH_OBJ)->total;

                if($total) {
                    return $username.$total;
                    // return $username.($total + 1);
                }

                return $username;
            } catch(PDOException $ex){}
        }

	}