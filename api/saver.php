<?php 
// Start session 
session_start(); 
 
// Include and initialize DB class 
require_once '../config/db.class.php'; 
$db = new DB(); 
 
// Database table name 
$tblName = 'studentdbase'; 
 
$postData = $statusMsg = $valErr = ''; 
$status = 'danger'; 
$redirectURL = 'index.php'; 
 
// If Add request is submitted 
if(!empty($_REQUEST['action']) && $_REQUEST['action'] == 'addnew'){ 
    $redirectURL = 'add.php'; 

    
     
    // Get user's input 
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

     $student_code = !empty($_POST['student_code'])?trim($_POST['student_code']):''; 
    $date_created = !empty($_POST['date_created'])?trim($_POST['date_created']):''; 
    

     
    // Validate form fields 
    if(empty($username)){ 
        $valErr .= 'Please enter your name.<br/>'; 
    } 
   // if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){ 
    //    $valErr .= 'Please enter a valid email.<br/>'; 
    //} 
    if(empty($password)){ 
        $valErr .= 'Please enter your password no.<br/>'; 
    } 
     
    // Check whether user inputs are empty 
    if(empty($valErr)){ 
        // Insert data into the database 
        $userData = array( 
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
        $insert = $db->insert($tblName, $userData); 
         
        if($insert){ 
            $status = 'success'; 
            $statusMsg = 'User data has been added successfully!'; 
            $postData = ''; 
             
            $redirectURL = 'index.php'; 
        }else{ 
            $statusMsg = 'Something went wrong, please try again after some time.'; 
        } 
    }else{ 
        $statusMsg = '<p>Please fill all the mandatory fields:</p>'.trim($valErr, '<br/>'); 
    } 
     
    // Store status into the SESSION 
    $sessData['postData'] = $postData; 
    $sessData['status']['type'] = $status; 
    $sessData['status']['msg'] = $statusMsg; 
    $_SESSION['sessData'] = $sessData; 
}elseif(!empty($_REQUEST['action_type']) && $_REQUEST['action_type'] == 'edit' && !empty($_POST['id'])){ // If Edit request is submitted 
    $redirectURL = 'edit.php?id='.$_POST['id']; 
     
    // Get user's input 
    $postData = $_POST; 
    $name = !empty($_POST['name'])?trim($_POST['name']):''; 
    $email = !empty($_POST['email'])?trim($_POST['email']):''; 
    $phone = !empty($_POST['phone'])?trim($_POST['phone']):''; 
     
    // Validate form fields 
    if(empty($name)){ 
        $valErr .= 'Please enter your name.<br/>'; 
    } 
    if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){ 
        $valErr .= 'Please enter a valid email.<br/>'; 
    } 
    if(empty($phone)){ 
        $valErr .= 'Please enter your phone no.<br/>'; 
    } 
     
    // Check whether user inputs are empty 
    if(empty($valErr)){ 
        // Update data in the database 
        $userData = array( 
            'name' => $name, 
            'email' => $email, 
            'phone' => $phone 
        ); 
        $conditions = array('id' => $_POST['id']); 
        $update = $db->update($tblName, $userData, $conditions); 
         
        if($update){ 
            $status = 'success'; 
            $statusMsg = 'User data has been updated successfully!'; 
            $postData = ''; 
             
            $redirectURL = 'index.php'; 
        }else{ 
            $statusMsg = 'Something went wrong, please try again after some time.'; 
        } 
    }else{ 
        $statusMsg = '<p>Please fill all the mandatory fields:</p>'.trim($valErr, '<br/>'); 
    } 
     
    // Store status into the SESSION 
    $sessData['postData'] = $postData; 
    $sessData['status']['type'] = $status; 
    $sessData['status']['msg'] = $statusMsg; 
    $_SESSION['sessData'] = $sessData; 
}elseif(!empty($_REQUEST['action_type']) && $_REQUEST['action_type'] == 'delete' && !empty($_GET['id'])){ // If Delete request is submitted 
    // Delete data from the database 
    $conditions = array('id' => $_GET['id']); 
    $delete = $db->delete($tblName, $conditions); 
     
    if($delete){ 
        $status = 'success'; 
        $statusMsg = 'User data has been deleted successfully!'; 
    }else{ 
        $statusMsg = 'Something went wrong, please try again after some time.'; 
    } 
     
    // Store status into the SESSION 
    $sessData['status']['type'] = $status; 
    $sessData['status']['msg'] = $statusMsg; 
    $_SESSION['sessData'] = $sessData; 
} 
 
// Redirect to the home/add/edit page 
header("Location: $redirectURL"); 
exit;

?>