<?php
//include_once '../config/database.php';
// include_once '../class/student.php';
   // Include CORS headers
   header('Access-Control-Allow-Origin: *');
   header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
   header('Access-Control-Allow-Headers: X-Requested-With');
   header('Content-Type: application/json');

   require_once '../config/db.class.php'; 
$db = new DB(); 
 
// Database table name 
$tblName = 'studentdbase'; 
 
$postData = $statusMsg = $valErr = ''; 
$status = 'danger'; 
$redirectURL = 'index.php'; 

 
 //include('api2.php');

    //$database = new Database();
   // $db = $database->getConnection();

   // $item = new Student($db);

$apiObject = new API();

if($_GET['action'] == 'addnew'){
	$data = $item->createStudent();
   


}

if($_GET['action'] == 'addToNew'){

   

	//$data1 = $apiObject->addToNew();
}





//echo json_encode($data);

//echo json_encode($data1);






?>