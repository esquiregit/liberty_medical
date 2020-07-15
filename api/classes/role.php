<?php
    require_once 'conn.php';
    require_once 'methods.php';

	class Role {

        // create a record
        public static function create_role($name, $permissions, $added_by, $conn) {
            $permissions = implode(', ', $permissions);

            try{
                $query = $conn->prepare('INSERT INTO roles(name, permissions, added_by) VALUES(:name, :permissions, :added_by)');
                $query->execute([':name' => $name, ':permissions' => $permissions, ':added_by' => $added_by]);

                return true;
            }catch(PDOException $ex){
            	return false;
            }
        }

        // fetch all roles
        public static function read_roles($conn){
            try{
                $query = $conn->prepare('SELECT * FROM roles WHERE status != :status ORDER BY name, id DESC');
                $query->execute([':status' => 'Inactive']);

                return $query->fetchAll(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // fetch all roles
        public static function read_role($id, $conn){
            try{
                $query = $conn->prepare('SELECT * FROM roles WHERE id = :id');
                $query->execute([':id' => $id]);

                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        public static function is_role_available($name, $conn) {
            try{
                $query = $conn->prepare('SELECT * FROM roles WHERE name = :name');
                $query->execute([':name' => $name]);

                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        public static function is_this_role_available($name, $id, $conn) {
            try{
                $query = $conn->prepare('SELECT * FROM roles WHERE name = :name AND id != :id');
                $query->execute([':name' => $name, ':id' => $id]);

                return !$query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // update a record
        public static function delete_role($id, $conn) {
            try{
                $query = $conn->prepare('UPDATE roles SET status = :status WHERE id = :id');
                $query->execute([':status' => 'Inactive', ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

        // update a record
        public static function update_role($id, $name, $permissions, $conn) {
            $permissions = implode(', ', $permissions);

            try{
                $query = $conn->prepare('UPDATE roles SET name = :name, permissions = :permissions WHERE id = :id');
                $query->execute([':permissions' => $permissions, ':id' => $id, ':name' => $name]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

        // fetch all category records
        public static function read_dropdown_roles($conn){
            try{
                $query = $conn->prepare('SELECT id, name FROM roles ORDER BY name');
                $query->execute();

                return $query->fetchAll(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

	}