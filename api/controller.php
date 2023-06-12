<?php


if(isset($_POST['action'])){
	if($_POST['action']  == 'addnew'){
		$postData = $_POST; 
    $username = !empty($_POST['username'])?trim($_POST['username']):''; 
    $password = !empty($_POST['password'])?trim($_POST['password']):''; 
    $first_name = !empty($_POST['first_name'])?trim($_POST['first_name']):''; 

     $last_name = !empty($_POST['last_name'])?trim($_POST['last_name']):''; 
    $school = !empty($_POST['school'])?trim($_POST['school']):''; 
    $class_from = !empty($_POST['class_from'])?trim($_POST['class_from']):''; 

     $character_load = !empty($_POST['character_load'])?trim($_POST['character_load']):''; 
    $pref_level = !empty($_POST['pref_level'])?trim($_POST['pref_level']):''; 
    $status = !empty($_POST['status'])?trim($_POST['status']):''; 

     $student_code = !empty($_POST['coder'])?trim($_POST['coder']):''; 
    $date_created = !empty($_POST['date_created'])?trim($_POST['date_created']):'';

		$data = array(
			

		'username' => $username, 
            'password' => $password, 
            'first_name' => $first_name, 

            'last_name' => $last_name, 
            'school' => $school, 
            'class_from' => $class_from, 

            'character_load' => $character_load, 
            'pref_level' => $pref_level, 
            'first_name' => $first_name, 

            'status' => $status, 
            'student_code' => $student_code, 
            'date_created' => $date_created 

         );

		//$jsonData = json_encode($data);

		//echo "yes";

		//var_dump($jsonData);

    // Set headers for the API request
     $headers = [
    'Content-Type: application/json',
      // add more headers if required
    ];

   		$client = curl_init('http://localhost/finlandapp/api/apiHandler.php?action=addnew');
		curl_setopt($client, CURLOPT_POST, true);
		curl_setopt($client, CURLOPT_POSTFIELDS, $data);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($client, CURLOPT_HTTPHEADER, $headers);
		$response = curl_exec($client);
		curl_close($client);

		//echo $response;
	}



?>