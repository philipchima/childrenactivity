<?php
/**
 * 
 */
class API{
	private $connect = '';
	
	function __construct()
	{
		// code...
		$this ->dbConnection();
	}

	function dbConnection(){
		$this->connect = new PDO("mysql:host=localhost;dbname=project_school","root","explore");
	}

	

	function addToNew(){
		if(isset($_POST['username'])){
			

			$data = array(
			':username' => $_POST['username'],
			':password' => $_POST['password'],
			':first_name' => $_POST['first_name'],
			':last_name' => $_POST['last_name'],
			':school' => $_POST['school'],
			':class_from' => $_POST['class_from'],
			':character_load' => $_POST['character_load'],
			':student_code'=> $_POST['student_code'],
			':date_created' => $_POST['date_created'],
			':status'=> $_POST['status'],
			':pref_level'=> $_POST['pref_level']
			);

			$insert = $this->connect->prepare("INSERT INTO student_dbase(last_name,first_name,username,password,school,class,character_load,pref_level,status,date_created,student_code) VALUES(:last_name, :first_name, :username, :password, :school, :class_from, :character_load, :status,:pref_level, :date_created, :student_code)");
			$insert->execute($data);

			//echo :date_created; 

		}

	}
}





?>