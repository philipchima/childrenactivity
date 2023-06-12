<?php 
include_once('configfile.php');

/**
 * 
 */
class Database extends Config
{
	
	public function fetch($id='0')
	{
		// code...
		if ($id != 0){
			$sql .= ' WHERE id = :id';

		}
		$stmt = $this->conn->prepare($sql);
		$stmt->execute(['id'=> $id]);
		$row = $stmt->fetchAll();
		return $rows;
	}

	

	public function insert($last_name, $first_name, $username, $password, $school, $class_from, $character_load,$pref_level, $status, $date_created, $student_code){

		//echo $last;

		$sql = 'INSERT INTO student_dbase (last_name, first_name, username, password, school, class_from, character_load, pref_level, status, date_created, student_code) VALUES(:last_name, :first_name, :username, :password, :school, :class_from, :character_load, :pref_level, :status, :date_created, :student_code)';
		$stmt = $this->conn->prepare($sql);
		$data = [
			':last_name' => $last_name, 
			':first_name' => $first_name, 
			':username' => $username, 
			':password' => $password, 
			':school' => $school, 
			':class_from' => $class_from, 
			':character_load' => $character_load, 
			':pref_level' => $pref_level, 
			':status' => $status, 
			':date_created' => $date_created,
			':student_code' => $student_code,

		];
		$query_run = $stmt->execute($data);
		if($query_run){
			echo "Yes Record";
			return true;
		}else{
			echo "Error Inserting Record";
			return false;
		}
		

	}

	public function update($last_name, $first_name, $username, $password, $school, $class_from, $character_load,$pref_level, $status, $date_created, $student_code,$id)
	{
		// code...
		$sql = 'UPDATE student_dbase SET last_name :last_name, first_name :first_name, username :username, password :password, school :school, class_from class_from, character_load :character_load, pref_level pref_level, status :status, date_created :date_created, student_code :student_code WHERE id=:id';

		$stmt = $this->conn-prepare($sql);
		$stmt->execute(['last_name' => $last_name, 'first_name' => $first_name, 'username' => $username, 'password' => $password, 'school' => $school, 'class_from' => $class_from, 'character_load' => $character_load, 'pref_level' => $pref_level, 'status' => $status, 'date_created' => $date_created, 
			'student_code' => $student_code, 'id' =>$id]);
		return true;
	}

	public function delete($id)
	{
		// code...
		$sql = "DELETE FROM  student_dbase WHERE id = :id";
		$stmt= $this->conn->prepare($sql);
		$stmt->execute(['id' => $id]);
		return true;
	}
}






?>