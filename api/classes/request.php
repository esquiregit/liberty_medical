<?php
    require 'conn.php';
    require 'methods.php';
    require 'charge.php';

    class Request {

        // create a request record
        public static function create_request($request_id, $patient_id, $requests, $total_cost, $added_by, $branch, $conn){
            try{
                $query = $conn->prepare('INSERT INTO requests(patient_id, request_id, requests, total_cost, discounted_cost, added_by, branch)  VALUES(:patient_id, :request_id, :requests, :total_cost, :discounted_cost, :added_by, :branch)');
                $query->execute([':patient_id' => $patient_id, ':request_id' => $request_id, ':requests' => $requests, ':total_cost' => $total_cost, ':discounted_cost' => $total_cost, ':added_by' => $added_by, ':branch' => $branch]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

        // fetch all request records
        public static function read_requests($role, $branch, $conn) {
            try{
                if(strtolower($role) === 'administrator') {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.request_id, r.requests, r.added_by, r.date_added, r.status, r.date_done, r.done_by, r.discount, r.total_cost, r.discounted_cost, r.amount_paid, r.payment_type, r.payment_status, p.branch, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name, u.first_name as dfirst_name, u.other_name as dother_name, u.last_name as dlast_name FROM requests r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id ORDER BY p.branch, p.first_name, r.id DESC');
                    $query->execute();
                } else {
                    $query = $conn->prepare('SELECT r.id, r.patient_id, r.request_id, r.requests, r.added_by, r.date_added, r.status, r.date_done, r.done_by, r.discount, r.total_cost, r.discounted_cost, r.amount_paid, r.payment_type, r.payment_status, p.branch, p.gender, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name, u.first_name as dfirst_name, u.other_name as dother_name, u.last_name as dlast_name FROM requests r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE p.branch = :branch ORDER BY p.branch, p.first_name, r.id DESC');
                    $query->execute([':branch' => $branch]);
                }

                return $query->fetchAll(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // fetch a request record
        public static function read_request($request_id, $conn){
            try{
                $query = $conn->prepare('SELECT r.id, r.patient_id, r.request_id, r.requests, r.added_by, r.date_added, r.discount, r.total_cost, r.discounted_cost, r.amount_paid, r.payment_type, r.branch, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, p.date_of_birth, p.gender, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM requests r INNER JOIN patients p ON r.patient_id = p.patient_id INNER JOIN users u ON r.added_by = u.staff_id WHERE r.request_id = :request_id');
                $query->execute([':request_id' => $request_id]);

                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // fetch a request record
        public static function read_payment_type($request_id, $conn){
            try{
                $query = $conn->prepare('SELECT payment_type FROM requests WHERE request_id = :request_id');
                $query->execute([':request_id' => $request_id]);

                return $query->fetch(PDO::FETCH_OBJ)->payment_type;
            }catch(PDOException $ex){}
        }

        // fetch a request record
        public static function read_request_patient_name($request_id, $conn){
            try{
                $query = $conn->prepare('SELECT r.patient_id, r.request_id, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name FROM requests r INNER JOIN patients p ON r.patient_id = p.patient_id WHERE r.request_id = :request_id');
                $query->execute([':request_id' => $request_id]);
                $result = $query->fetch(PDO::FETCH_OBJ);

                return $result->pfirst_name.' '.$result->pmiddle_name.' '.$result->plast_name;
            }catch(PDOException $ex){}
        }

        // check if patient has pending requests
        public static function check_pending_request($patient_id, $conn){
            try{
                $query = $conn->prepare('SELECT * FROM requests WHERE patient_id = :patient_id AND status = "Pending"');
                $query->execute([':patient_id' => $patient_id]);

                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // update a request record
        public static function update_request($id, $request_id, $requests, $old_cost, $new_cost, $conn) {
            $discount        = self::get_request_discount($request_id, $conn);
            $discounted_cost = self::get_discounted_cost($discount, $new_cost, $conn);
            $amount_paid     = self::get_amount_paid($request_id, $conn);
            
            try{
                if($discounted_cost > $old_cost) {
                    $query = $conn->prepare('UPDATE requests SET payment_status = :payment_status WHERE id = :id AND request_id = :request_id');
                    $query->execute([':payment_status' => 'Pending', ':request_id' => $request_id, ':id' => $id]);
                } else if($discounted_cost <= $old_cost) {
                    if($amount_paid != 0.00) {
                        $query = $conn->prepare('UPDATE requests SET payment_status = :payment_status WHERE id = :id AND request_id = :request_id');
                        $query->execute([':payment_status' => 'Paid', ':request_id' => $request_id, ':id' => $id]);
                    }
                }

                $query = $conn->prepare('UPDATE requests SET requests = :requests, discounted_cost = :discounted_cost, total_cost = :total_cost WHERE id = :id AND request_id = :request_id');
                $query->execute([':requests' => implode(', ', $requests), ':discounted_cost' => $discounted_cost, ':total_cost' => $new_cost, ':id' => $id, ':request_id' => $request_id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

        public static function pay_request($request_id, $payment_type, $discount, $discounted_cost, $amount_paid, $source, $conn) {
            $total_cost = self::get_request_cost($request_id, $conn);

            try{
                if($source === 'new-request') {
                    $query = $conn->prepare('UPDATE requests SET discount = :discount, discounted_cost = :discounted_cost, amount_paid = :amount_paid, payment_type = :payment_type WHERE request_id = :request_id');
                    $query->execute([':discount' => $discount, ':discounted_cost' => $discounted_cost, ':amount_paid' => $amount_paid, ':payment_type' => $payment_type, ':request_id' => $request_id]);

                    if($discounted_cost == $amount_paid) {
                        $query = $conn->prepare('UPDATE requests SET payment_status = :payment_status WHERE request_id = :request_id');
                        $query->execute([':payment_status' => 'Paid', ':request_id' => $request_id]);
                    }
                } else {
                    $query = $conn->prepare('UPDATE requests SET discount = :discount, discounted_cost = :discounted_cost, amount_paid = amount_paid + :amount_paid, payment_type = :payment_type WHERE request_id = :request_id');
                    $query->execute([':discount' => $discount, ':discounted_cost' => $discounted_cost, ':amount_paid' => $amount_paid, ':payment_type' => $payment_type, ':request_id' => $request_id]);
                    $total_paid = self::get_amount_paid($request_id, $conn);
                    
                    if($total_cost == $total_paid) {
                        $query = $conn->prepare('UPDATE requests SET payment_status = :payment_status WHERE request_id = :request_id');
                        $query->execute([':payment_status' => 'Paid', ':request_id' => $request_id]);
                    }
                }

                return true;
            }catch(PDOException $ex){die($ex);
                return false;
            }
        }
        
        public static function complete_request($id, $request_id, $done_by, $conn) {
            try{
                $query = $conn->prepare('UPDATE requests SET status = :status, date_done = NOW(), done_by = :done_by WHERE id = :id AND request_id = :request_id');
                $query->execute([':status' => 'Completed', ':done_by' => $done_by, ':id' => $id, ':request_id' => $request_id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

        // generate a unique patient id
        public static function get_request_id($branch, $conn) {
            $total        = 1;
            $rand         = rand(0, 999);
            $branch_short = Methods::get_branch_code($branch);//substr(strtoupper($branch), 0, 3);
            if($rand < 10)
                $rand = '0'.$rand;
            else if($rand < 100)
                $rand = '00'.$rand;

            try {
                $query  = $conn->prepare("SELECT COUNT(*) as total FROM requests");
                $query->execute();
                $result = $query->fetch(PDO::FETCH_OBJ);
                $total  = $total + $result->total;

                return 'REQ-'.$branch_short.'-'.$rand.$total;
            } catch(PDOException $ex){}
        }

        // fetch a charge
        public static function get_charge($type, $conn){

            try{
                $query = $conn->prepare('SELECT amount FROM charges WHERE type = :type');
                $query->execute([':type' => $type]);

                return $query->fetch(PDO::FETCH_OBJ)->amount;
            }catch(PDOException $ex){
                return 0;
            }
        }

        // fetch a charge
        public static function get_request_cost($request_id, $conn){
            try{
                $query = $conn->prepare('SELECT discounted_cost FROM requests WHERE request_id = :request_id');
                $query->execute([':request_id' => $request_id]);

                return $query->fetch(PDO::FETCH_OBJ)->discounted_cost;
            }catch(PDOException $ex){
                return 0;
            }
        }

        // fetch a charge
        public static function get_requests($request_id, $conn){
            try{
                $query = $conn->prepare('SELECT requests FROM requests WHERE request_id = :request_id');
                $query->execute([':request_id' => $request_id]);

                return explode(', ', $query->fetch(PDO::FETCH_OBJ)->requests);
            }catch(PDOException $ex){}
        }

        // fetch a charge
        public static function get_request_patient_id($request_id, $conn){
            try{
                $query = $conn->prepare('SELECT patient_id FROM requests WHERE request_id = :request_id');
                $query->execute([':request_id' => $request_id]);

                return $query->fetch(PDO::FETCH_OBJ)->patient_id;
            }catch(PDOException $ex){}
        }

        // fetch a charge
        public static function get_request_discount($request_id, $conn){
            try{
                $query = $conn->prepare('SELECT discount FROM requests WHERE request_id = :request_id');
                $query->execute([':request_id' => $request_id]);

                return $query->fetch(PDO::FETCH_OBJ)->discount;
            }catch(PDOException $ex){}
        }

        // total amount paid
        public static function get_amount_paid($request_id, $conn){
            try{
                $query = $conn->prepare('SELECT amount_paid FROM requests WHERE request_id = :request_id');
                $query->execute([':request_id' => $request_id]);

                return $query->fetch(PDO::FETCH_OBJ)->amount_paid;
            }catch(PDOException $ex){}
        }

        public static function get_total_charge($requests, $conn) {
            $total = 0;

            foreach($requests as $request) {
                $total += self::get_charge($request, $conn);
            }

            return $total;
        }

        public static function get_discounted_cost($discount, $total_cost, $conn) {
            return ($total_cost - (($discount / 100) * $total_cost));
        }

        public static function get_requests_string($requests){
            $string = '';

            foreach($requests as $key => $value) {
                if($value)
                    $string .= $key.', ';
            }

            $ret_string = trim($string);
            $length     = strlen($ret_string);

            return substr($ret_string, 0, ($length - 1));
        }

    }