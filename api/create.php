<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once '../config/database.php';
    include_once '../class/studentfile.php';

    $database = new Database();
    $db = $database->getConnection();
    $item = new Student($db);
    $data = json_decode(file_get_contents("php://input"));

    if(isset($_POST)){
    $last_name = ($_POST['last_name']);
	$first_name = ($_POST['first_name']);
	$username = ($_POST['username']);
	$password = ($_POST['password']);
	$school = ($_POST['school']);
	$class_from = ($_POST['class_from']);
	$character_load = ($_POST['character_load']);
	$pref_level = ($_POST['pref_level']);
	$status = ($_POST['status']);
	$student_code = ($_POST['coder']);
	$date_created =($_POST['date_created']);
    }

    //$data = array[ ];
    
   // var_dump($user);
    //echo $last_name;
$data1 = array(
	"last_name" => $last_name,
    "first_name" => $first_name,
    "username" => $username,
    "password" => $password,

    "school" => $school,
    "class_from" => $class_from,
    "character_load" => $character_load,
    "pref_level" => $pref_level,

    "status" => $status,
    "date_created" => $date_created,
    "student_code" => $student_code,


);


    $data->last_name = $last_name;
    $data->first_name = $first_name;
    $data->username = $username;
    $data->password = $password;

    $data->school = $school;
    $data->class_from = $class_from;
    $data->character_load = $character_load;
    $data->pref_level = $pref_level;

    $data->status = $status;
    $data->date_created = $date_created;
    $data->student_code = $student_code;

    var_dump($data1);
    
    echo json_encode($data);
    if($item->createStudent($data)){
        echo 'Student created successfully.';
    } else{
        echo 'Student could not be created.';
    }
?>