<?php
    require_once 'conn.php';
    require_once 'audit_trail.php';
	require_once 'methods.php';

	class Login {

        public function login_user($username, $conn) {
            try{
                $query    = $conn->prepare('SELECT * FROM users WHERE username = :username || email_address = :email_address');
                $query->execute([':username' => $username, ':email_address' => $username]);
                
                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        public function fetch_user($staff_id, $conn){
            try{
                $query    = $conn->prepare('SELECT u.id, u.staff_id, u.first_name, u.last_name, u.other_name, u.email_address, u.phone_number, u.phone_number_two, u.username, u.role, u.logged_in_before, u.log_in_token, u.branch, r.id as role_id, r.name as role_name, r.permissions FROM users u INNER JOIN roles r ON u.role = r.id WHERE u.staff_id = :staff_id');
                $query->execute([':staff_id' => $staff_id]);
                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        public function update_log_in_token($id, $conn){
            try{
                $log_in_token = self::password_hash(self::get_log_in_token());
                $query = $conn->prepare('UPDATE users SET log_in_token = :log_in_token WHERE id = :id');
                $query->execute([':log_in_token' => $log_in_token, ':id' => $id]);
                
                return $log_in_token;
            }catch(PDOException $ex){}
        }
        
        // method to encrypt password
        static function password_hash($password){
            $options = [ 'cost' => 11 ];

            return password_hash($password, PASSWORD_BCRYPT, $options);
        }
        
        // method to verify password
        static function password_verify($password, $password_hash){
            return password_verify($password, $password_hash);
        }

        static function get_log_in_token() {
            $alphabets = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz01234567890';
            $token     = substr(str_shuffle($alphabets), 0, 32);
            
            return $token;
        }

    }