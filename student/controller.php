<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once '../config/database.php';
    include_once '../class/student.php';

    $database = new Database();
    $db = $database->getConnection();

    $item = new Student($db);

    $data = json_decode(file_get_contents("http://localhost/finland/student/controller.php"));


    //echo $item;

    //exit();

      
    $item->last_name = $data->last_name;
    $item->first_name = $data->first_name;
    $item->username = $data->username;
    $item->password = $data->password;

    $item->school = $data->school;
    $item->class_from = $data->class_from;
    $item->character_load = $data->character_load;
    $item->pref_level = $data->pref_level;

    $item->status = $data->status;
    $item->student_code = $data->student_code;
    $item->date_created = $data->date_created;
    
    if($item->createStudent()){
        echo 'Student created successfully.';
     } else{
        echo 'Student could not be created.';
    }






?>