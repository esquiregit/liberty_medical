<?php
    require_once 'conn.php';
    require_once 'methods.php';

	class Charge {

        // create a charge
        public static function create_charge($type, $amount, $added_by, $conn){

            try {
                $query = $conn->prepare('INSERT INTO charges(type, amount, added_by) VALUES(:type, :amount, :added_by)');
                $query->execute([':type' => $type, ':amount' => $amount, ':added_by' => $added_by]);

                return true;
            } catch(PDOException $ex){
                return false;
            }
        }

        // fetch all charges
        public static function read_charges($conn){
            try{
                $query = $conn->prepare('SELECT c.id, c.type, c.amount, c.date_added, c.added_by, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name FROM charges c INNER JOIN users u ON c.added_by = u.staff_id ORDER BY c.type, c.id');
                $query->execute();

                return $query->fetchAll(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // fetch a charge name
        public static function get_charge_type($id, $conn){
            try{
                $query = $conn->prepare('SELECT type FROM charges WHERE id = :id');
                $query->execute([':id' => $id]);

                return $query->fetch(PDO::FETCH_OBJ)->type;
            }catch(PDOException $ex){}
        }

        // fetch a charge amount
        public static function read_charge($id, $conn){
            try{
                $query = $conn->prepare('SELECT amount FROM charges WHERE id = :id');
                $query->execute([':id' => $id]);

                return $query->fetch(PDO::FETCH_OBJ)->amount;
            }catch(PDOException $ex){}
        }

        public static function is_charge_entered($type, $conn){
            try{
                $query = $conn->prepare('SELECT * FROM charges WHERE type = :type');
                $query->execute([':type' => $type]);

                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        public static function is_this_charge_entered($id, $type, $conn){
            try{
                $query = $conn->prepare('SELECT * FROM charges WHERE type = :type AND id != :id');
                $query->execute([':type' => $type, ':id' => $id]);

                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        public static function update_charge($id, $type, $amount, $conn) {

            try{
                $query = $conn->prepare('UPDATE charges SET type = :type, amount = :amount WHERE id = :id');
                $query->execute([':type' => $type, ':amount' => $amount, ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

	}