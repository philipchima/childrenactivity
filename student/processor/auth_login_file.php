<?php
require_once('../includes/config.php');

if(!isset($_POST['btn-save'])){
exit;	
}

if(isset($_POST['btn-save'])){

$username = strip_tags($_POST['username']);
$pwd = strip_tags($_POST['pwd']);

if(!get_magic_quotes_gpc()){
$username = addslashes($username);
$pwd = addslashes($pwd);	
}

$username = mysqli_real_escape_string($conn,$username);
$pwd = mysqli_real_escape_string($conn,$pwd);
//$pwd = encrypt_decrypt('encrypt',$pwd);

$sqli_check_login_details = mysqli_query($conn,"SELECT * FROM invest_reg WHERE email = '$username' AND login_status = 'Active' ");
if(mysqli_num_rows($sqli_check_login_details) == 1){
while($row = mysqli_fetch_assoc($sqli_check_login_details)){

	if (password_verify($pwd, $row['password']))
  {

  $referral_id = $row['referral_id'];
		$referral_code = $row['referral_code'];
		$fullname = $row['fullname'];
	
	
$_SESSION['investorcoinuser'] = $username;
$_SESSION['investorcoinpassword'] = $pwd;
$_SESSION['investorcoinmember_id'] = $referral_id ;
$_SESSION['investorcoinmember_name'] = $fullname ;


  echo "registered";
  exit;	
	
	 }else{

	 	echo "1";
        exit;	

	 }


}



}



if(mysqli_num_rows($sqli_check_login_details) == 0){
echo "1";
exit;	
}
	
}





?>