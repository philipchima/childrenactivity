<?php

function dateauthcheck() {
global $conn;
global $SERVERDATE;
global $ServerIP;
global $pass1;
$user = $_SESSION['one2oneuser'];
$pass = $_SESSION['one2onepassword'];
$member_id =  $_SESSION['one2onemember_id'];


$pass1 = $pass;

$sql = "SELECT * FROM date_reg WHERE email = '$user' AND password = '$pass' and member_id = '$member_id' ";
$sqlexe = mysqli_query($conn, $sql);

if (mysqli_num_rows($sqlexe) == 1) {
$_SESSION['one2oneuser'] = $user;
$_SESSION['one2onepassword'] = $pass;
$_SESSION['one2onemember_id'] = $pass;

mysqli_query($conn, "UPDATE date_reg SET lastseen = '$SERVERDATE' LIMIT 1");
}
if (mysqli_num_rows($sqlexe) == 0) {
header("location:login_port.php");
exit;
}
}

function HotelauthSetting(){
global $conn;
global $SERVERDATE;
global $ServerIP;

$user = $_SESSION['sconfiguser'];
$password = $_SESSION['sconfigpassword'];

$sql_setting_pin = mysqli_query($conn,"SELECT * FROM login WHERE username = '$user' AND password ='$password' AND userrole ='Admin' AND status = 'Active' ");
if(mysqli_num_rows($sql_setting_pin) == 1){
$_SESSION['sconfiguser'] = $user;
$_SESSION['sconfigpassword'] = $password;
mysqli_query($conn, "UPDATE login SET lastseen = '$SERVERDATE' LIMIT 1");
}
if (mysqli_num_rows($sql_setting_pin) == 0) {
header("location:index.php");
exit;
}
}

function NtonauthSetting(){
global $conn;
global $SERVERDATE;
global $SERVERIP;	

$email = $_SESSION['ntonusername'];
$pass_code = $_SESSION['ntonpassword'];

$sqli_get_pin = mysqli_query($conn,"SELECT * FROM register WHERE email = '$email' AND password = '$pass_code' AND status = 'Active'");
if(mysqli_num_rows($sqli_get_pin) == 1){
$_SESSION['ntonusername'] = $email;
$_SESSION['ntonpassword'] = $pass_code;
mysqli_query($conn,"UPDATE register SET last_seen = '$SERVERDATE' LIMIT 1"	);
}

if(mysqli_num_rows($sqli_get_pin) == 0){
header("location:../login.php"	);
exit;
}
	
	
	
}



function adminauthSetting(){
global $conn;
global $SERVERDATE;
global $SERVERIP;	

//$user = $_SESSION['royaladminuser'];
//$admin_status = $_SESSION['royaladminstatus'];

$username = $_SESSION['royaladminuser'];
$password = $_SESSION['royaladminpassword'];

$sqli_get_pin = mysqli_query($conn,"SELECT * FROM admin_post_login WHERE username = '$username' AND password = '$password' ");
if(mysqli_num_rows($sqli_get_pin) == 1){
$_SESSION['abashopadminuser'] = $username;
$_SESSION['abashopadminpassword'] = $password;
mysqli_query($conn,"UPDATE admin_post_login SET last_seen = '$SERVERDATE' WHERE username = '$username' AND password = '$password' LIMIT 1"	);
}

if(mysqli_num_rows($sqli_get_pin) == 0){
header("location:../admin/login.php");
exit;
}
	
	
	
}



function Hotelauthbackoffice(){
	
global $conn;
global $SERVERDATE;
global $ServerIP;	
$user = $_SESSION['backuser'];
$password = $_SESSION['backpassword'];

$sql_setting_pin = mysqli_query($conn,"SELECT * FROM login WHERE username = '$user' AND password ='$password' AND backoffice ='True' AND status = 'Active' ");
if(mysqli_num_rows($sql_setting_pin) == 1){
$_SESSION['backuser'] = $user;
$_SESSION['backpassword'] = $password;
mysqli_query($conn, "UPDATE login SET lastseen = '$SERVERDATE' LIMIT 1");
}
if (mysqli_num_rows($sql_setting_pin) == 0) {
header("location:index.php");
exit;
}
	

	
}


function Hotelauthpos(){
	
global $conn;
global $SERVERDATE;
global $ServerIP;	
$user = $_SESSION['posuser'];
$password = $_SESSION['pospassword'];

$sql_setting_pin = mysqli_query($conn,"SELECT * FROM login WHERE username = '$user' AND password ='$password' AND pos ='True' AND status = 'Active' ");
if(mysqli_num_rows($sql_setting_pin) == 1){
$_SESSION['posuser'] = $user;
$_SESSION['pospassword'] = $password;
mysqli_query($conn, "UPDATE login SET lastseen = '$SERVERDATE' LIMIT 1");
}
if (mysqli_num_rows($sql_setting_pin) == 0) {
header("location:index.php");
exit;
}
	

	
}
	



function Hotelauthhumanresources(){
	
global $conn;
global $SERVERDATE;
global $ServerIP;	
$user = $_SESSION['hsuser'];
$password = $_SESSION['hspassword'];

$sql_setting_pin = mysqli_query($conn,"SELECT * FROM login WHERE username = '$user' AND password ='$password' AND backoffice ='True' AND status = 'Active' ");
if(mysqli_num_rows($sql_setting_pin) == 1){
$_SESSION['hsuser'] = $user;
$_SESSION['hspassword'] = $password;
mysqli_query($conn, "UPDATE login SET lastseen = '$SERVERDATE' LIMIT 1");
}
if (mysqli_num_rows($sql_setting_pin) == 0) {
header("location:index.php");
exit;
}
	

	
}
	

function MDriveAuthRecord() {
global $conn;
global $SERVERDATE;
global $ServerIP;
$staffid = $_SESSION['mdriverecordkeeperid'];
$user = $_SESSION['mdriverecordkeeperuser'];
$pass = $_SESSION['mdriverecordkeeperpass'];
$sql = "SELECT * FROM staff WHERE staffemail = '$user' OR staffphone = '$user' AND staffpassword = '$pass' LIMIT 1";

//echo $_SESSION['mdriverecordkeeperuser'];exit;
$sqlexe = mysqli_query($conn, $sql);
if (mysqli_num_rows($sqlexe) == 0) {
header("location:logout.php");
exit;
}
if (mysqli_num_rows($sqlexe) == 1) {
while ($row = mysqli_fetch_assoc($sqlexe)) {
$staffid = $row['id'];
$staffname = $row['staffname'];
$staffusername = $row['staffusername'];
$staffpassword = $row['staffpassword'];
$staffdept = ucwords($row['staffrole']);
$staffdate = $row['staffdate'];
$stafflastseen = $row['stafflastseen'];
$staffemail = $row['staffemail'];
$staffphone = $row['staffphone'];
$squest = $row['squest'];
$sanswer = $row['sanswer'];
$status = strtoupper($row['status']);
$pic = $row['pic'];
}

define ("RECORDKEEPERID", "$staffid");
define ("RECORDKEEPERNAME", "$staffname");
define ("RECORDKEEPEREMAIL", "$staffemail");
define ("RECORDKEEPERPHONE", "$staffphone");
define ("RECORDKEEPERQUEST", "$squest");
define ("RECORDKEEPERANSWER", "$sanswer");
define ("RECORDKEEPERPIC", "$pic");

mysqli_query($conn, "UPDATE staff SET stafflastseen = '$SERVERDATE' WHERE id = '$staffid' LIMIT 1");
}
}
?>