<?php
require_once('../includes/config.php');

if(!isset($_POST)){
exit;	
}

if(isset($_POST)){

$username_get = strip_tags($_POST['username']);
$pwd_get = strip_tags($_POST['password']);

if(!get_magic_quotes_gpc()){
$username_get = addslashes($username_get);
$pwd_get = addslashes($pwd_get);	
}

$username_get = mysqli_real_escape_string($conn,$username_get);
$pwd_get = mysqli_real_escape_string($conn,$pwd_get);
//$pi = "olives1983";

$pwd_get = encrypt_decrypt('encrypt', $pwd_get);
//$px = encrypt_decrypt('encrypt','olives1983');
//echo $px;
//exit;


$sqli_check_login_details = mysqli_query($conn,"SELECT admin_username,admin_pwd FROM admin_login_table WHERE admin_username = '$username_get' AND admin_pwd = '$pwd_get'");
if(mysqli_num_rows($sqli_check_login_details) == 1){

   
	 $_SESSION['one2one_admin_user'] = $username_get;
      $_SESSION['one2one_admin_pwd'] = $pwd_get;


//$getter = $_SESSION['learn_earn_m_code'] ;
$sqli_update_user = mysqli_query($conn,"UPDATE admin_login_table SET status = 'Online', last_seen = '$SERVERDATE' WHERE admin_username = '$username_get' AND admin_pwd = '$pwd_get'");

header("location:../admin/dashboard.php");
exit;
//echo "registered";	



}



if(mysqli_num_rows($sqli_check_login_details) == 0){
$msg= "Invaild Username Or Password Retry Again Please";
header("location:../admin/index.php?msg=$msg");
exit;
//echo "1";	
}
	
}





?>