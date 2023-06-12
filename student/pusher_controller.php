<?php

if(isset($_POST['action'])){
	if($_POST['action']  == 'addnew'){
		//echo "yes";
		//exit();
		$data = array(
			'username' => $_POST['username'],
			'password' => $_POST['password'],
			'first_name' => $_POST['first_name'],
			'last_name' => $_POST['last_name'],
			'school' => $_POST['school'],
			'class_from' => $_POST['class_from'],
			'character_load' => $_POST['character_load'],
			'student_code' => $_POST['coder'],
			'date_created' => $_POST['date_created'],
			'status' => $_POST['status'],
			'pref_level' => $_POST['pref_level']

		);
		$data_string = json_encode($data);
		var_dump($data_string);

		//echo $data();
		//exit();

		$client = curl_init('http://localhost/finlandapp/api/apiHandler.php?action=addnew');
		curl_setopt($client, CURLOPT_POST, true);
		curl_setopt($client, CURLOPT_POSTFIELDS, $data);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($client);
		print_r($response);
		curl_close($client);

		//echo $response; 
		//http://localhost/finland/api/apiHandler.php?action=addnew
	}
}





?>