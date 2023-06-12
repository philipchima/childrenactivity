<?php
session_start();


$Lifetime = 3600 * 24;
$separator = (strstr(strtoupper(substr(PHP_OS, 0, 3)), "WIN")) ? "\\\\" : "/";

$DirectoryPath = dirname(__FILE__) . "{$separator}SessionData";
//in Wamp for Windows the result for $DirectoryPath
//would be C:\\wamp\\www\\your_site\\SessionData

is_dir($DirectoryPath) or mkdir($DirectoryPath, 0777);

if (ini_get("session.use_trans_sid") == true) {
    ini_set("url_rewriter.tags", "");
    ini_set("session.use_trans_sid", false);

}

ini_set("session.gc_maxlifetime", $Lifetime);
ini_set("session.gc_divisor", "1");
ini_set("session.gc_probability", "1");
ini_set("session.cookie_lifetime", "0");
ini_set("session.save_path", $DirectoryPath);



/********************************************/





header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Cache-control: public, no-cache, no-store, no-transform, must-revalidate");
header("Expires: Mon, 31 Jan 1995 12:00:00 GMT");
header("x-content-type-options: nosniff");

$HTTP_PROTOCOL = "http://";
$SERVER_HOST = $_SERVER['HTTP_HOST'];
$userip = $_SERVER['REMOTE_ADDR'];
$userport = $_SERVER['REMOTE_PORT'];
$useragent = $_SERVER['HTTP_USER_AGENT'];
$SITE_MASTER_FOLDER = "finlandapp/student/";
date_default_timezone_set('Africa/Lagos');
$SERVERTIME = time();
$SERVERDATE3 = date("g:i A");

$SERVERDATE = date("jS-M-Y g:i A");
$SERVERDATE1 = date("Y-m-d");
$SERVERDATE2 = date("Y_m_d");
$SERVERDATE5 = date("m/d/Y");

$YYMMDD = date("Ymd");
$MMDD = date("md");
$YYYY = date("Y");
$NEXT_YYYY = $YYYY + 1;
$nextyymmdd = "$NEXT_YYYY".$MMDD;
$mi6 = $HTTP_PROTOCOL . $SERVER_HOST . "/" . $SITE_MASTER_FOLDER . "/";

$arkwidth = 170;//profile pic dimension
$arkheight = 170;//profile pic dimension

global $sum ;

$COMPANY_NAME = "GoldenCoinBase Investment";
$C2 ="Foundation";
$C3 = "";
$Version = "1.1";
error_reporting(1);
//db 
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "explore";
//lovatech_credit_user
//GKkXqY@7j9M^
$dbname = "activity_learning";


//dbpass = dv9KW7m_1H3s
//dbuser = eugotech_sonabsu


$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (!$conn) {
$errmsg = mysqli_error($conn);
echo "Error, Connecting to Database $errmsg";
exit;
}
mysqli_set_charset($conn, 'utf8');
function encrypt_decrypt($action, $string) {
   $output = false;

$key = 'mdrive';
// initialization vector 
$iv = md5(md5($key));

if( $action == 'encrypt' ) 
{
    $output = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $string, MCRYPT_MODE_CBC, $iv);
    $output = base64_encode($output);
}
else if( $action == 'decrypt' )
{
    $output = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($string), MCRYPT_MODE_CBC, $iv);
    $output = rtrim($output, "");
}
   return $output;
}
//$xi = "9819b130b2fcd0ab36a29ca0ca1c7389826a027e";
//$px = encrypt_decrypt('decrypt', $xi);
//echo trim($px);
//exit;
/*
$xi = "gOHKdsfiBPkksr8Rbu4CrAJ8UhsYcHZyTgc6zvoGLZc=";
$px = encrypt_decrypt('decrypt', $xi);
echo trim($px);
exit;
*/
function getExtension($str) {

$i = strrpos($str,".");
if (!$i) { return ""; } 

$l = strlen($str) - $i;
$ext = substr($str,$i+1,$l);
return $ext;
}

function filterupload($filename) {
$from = array(";", "!", "@", "¥", "#", "$", "%", "^", "&", "*", "(",
")", "{", "}", "=", "_", "»", "¤",  "î", "™",
"¢", "|", "'", "~", "`", "ï", "‰", "´", "©", "ì", "´", "â", "-", "¿", "½", "�");

$to = array("", "", "", "", "", "", "", "", "", "",
"", "", "", "", "", "", "", "", "", "",
"", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "");
return str_replace($from, $to, $filename);
}


function genReference($qtd){
//Under the string $Caracteres you write all the characters you want to be used to randomly generate the code.
    $Caracteres = 'ABCDEFGHIJKLMOPQRSTUVXWYZ0123456789';
    $QuantidadeCaracteres = strlen($Caracteres);
    $QuantidadeCaracteres--;

    $Hash=NULL;

    for($x=1;$x<=$qtd;$x++){
        $Posicao = rand(0,$QuantidadeCaracteres);
        $Hash .= substr($Caracteres,$Posicao,1);
    }

    return $Hash;
}



function GenPass() {
$genA = "ABCDEFGHIJKLMNOPQRSTUVWXYZ$*";
$genC = strtolower("ABCDEFGHIJKLMNOPQRSTUVWXYZ$*");
$genB = rand(0,9);
$genD = rand(10,999);
$genA_shuffle = str_shuffle($genA);
$genC_shuffle = str_shuffle($genC);
$genA_shuffle = substr($genA_shuffle, 0, 2);
$genC_shuffle = substr($genC_shuffle, 4, 2);
$password = "$genA_shuffle"."$genB"."$genC_shuffle"."$genD";
return $password;
}

function Gencode() {
$genA = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
$genC = strtolower("ABCDEFGHIJKLMNOPQRSTUVWXYZ");
$genB = rand(0,9);
$genD = rand(10,999);
$genA_shuffle = str_shuffle($genA);
$genC_shuffle = str_shuffle($genC);
$genA_shuffle = substr($genA_shuffle, 0, 2);
$genC_shuffle = substr($genC_shuffle, 4, 2);
$password = "$genA_shuffle"."$genB"."$genC_shuffle"."$genD";
return $password;
}

function GenVoucher(){
//$genRat = "0123456789";	
$genA = "0123456789";
$genC = strtolower("123456789");
$genB = rand(0,9);
$genD = rand(10,999);
$genA_shuffle = str_shuffle($genA);
$genC_shuffle = str_shuffle($genC);
$genA_shuffle = substr($genA_shuffle, 0, 2);
$genC_shuffle = substr($genC_shuffle, 4, 2);
$voucher = "$genA_shuffle"."$genB"."$genC_shuffle"."$genD" ;
//$voucher = "$genRat"."$genCat"."/"."LN";
return $voucher;	

}







function filler($fiddle,$txt) {
//$fiddle = filename - $txt = $string
$op = fopen("$fiddle", 'w');
fwrite($op, $txt);
}
/*
function AccessLog() {
global $conn;
global $SERVERDATE;
global $YYMMDD;
global $loginstatus;
global $useragent;
global $user;
global $plainpass;
global $staffid;
global $userip;
global $userport;
global $staffdept;
$userip = "$userip".":"."$userport";
$staffdept = strtolower($staffdept);
$logger = mysqli_query($conn, "INSERT INTO syslog (ip,useragent,usrname,pasword,usrtype,uid,status,tdate,sdate) VALUES ('$userip', '$useragent', '$user', '$plainpass', '$staffdept', '$staffid', '$loginstatus', '$SERVERDATE', '$YYMMDD')");
}
*/
require_once "main.php";
?>