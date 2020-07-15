<?php

	class Audit_Trail {

		public static function create_log($staff_id, $activity, $conn) {
			try{
				$query = $conn->prepare('INSERT INTO audit_trail(staff_id, activity, date) VALUES(:staff_id, :activity, NOW())');
				$query->execute([':staff_id' => $staff_id, ':activity' => $activity]);

				return true;
			}catch(PDOException $ex){
				return false;
			}
		}

		public static function read_all_logs($conn) {
			try{
				$query = $conn->prepare('SELECT a.activity, a.date, u.staff_id, u.first_name, u.other_name, u.last_name, r.name as role_name FROM audit_trail a INNER JOIN users u ON a.staff_id = u.staff_id INNER JOIN roles r ON u.role = r.id WHERE a.staff_id != :staff_id AND a.staff_id != :staff_id_two ORDER BY date DESC');
				$query->execute([':staff_id' => 'LMLS-0000', ':staff_id_two' => 'PHAR-0000']);

				return $query->fetchAll(PDO::FETCH_OBJ);
			}catch(PDOException $ex){}
		}

	}

?>