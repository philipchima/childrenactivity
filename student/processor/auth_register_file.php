<?php
require_once('../includes/config.php');
include("../includes/qrlib.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);




if(isset($_POST['btn-save1'])){
$email = strip_tags($_POST['email']);
$fullname = strip_tags($_POST['fullname']);
$referral = strip_tags($_POST['referral']);
$password = strip_tags($_POST['pwd']);



$email = mysqli_real_escape_string($conn,$email);
$fullname = mysqli_real_escape_string($conn,$fullname);
$referral = mysqli_real_escape_string($conn,$referral);
$password = mysqli_real_escape_string($conn,$password);

//$pass = encrypt_decrypt('encrypt',$password);

$options = ['cost' => 12];

/* Create the hash. */
$pass1 = password_hash($password, PASSWORD_DEFAULT, $options);


$matric = Gencode(4) . GenVoucher(5);


//echo $matric;
//exit();




$sqli_check_email = mysqli_query($conn,"SELECT email FROM invest_reg WHERE email ='$email' LIMIT 1");
if(mysqli_num_rows($sqli_check_email) == 1){

//echo 1;	
header("location:../auth_register.php?msg=1");
exit;
}

$sqli_check_ref = mysqli_query($conn,"SELECT * FROM invest_reg WHERE referral_id = '$referral'");

while($fam = mysqli_fetch_array($sqli_check_ref)){
   // $referral_id_get = $fam['referral_id'];
    $referral_fullname = $fam['fullname'];
    $referral_email = $fam['email'];
}

/*
echo $referral_fullname; echo '<br>';
echo $referral_email; echo '<br>';
exit();
*/



$sqli_insert_db = mysqli_query($conn,"INSERT INTO invest_reg(email,fullname,referral_code,referral_id,date_join,password,email_status,p_cleans,login_status) VALUES('$email','$fullname','$referral','$matric','$SERVERDATE1','$pass1','Pending','$password','Active')");


//$sqli_insert = mysqli_query($conn,"INSERT INTO invest_reg(email,fullname,referral_code,date_join,password,email_status,refferal_id) VALUES('$email','$fullname','$referral','$SERVERDATE1','$password','Pending','$matric')");

if($sqli_insert_db){
$_SESSION['investorcoinuser'] = $email;
$_SESSION['investorcoinpassword'] = $password;
$_SESSION['academiauserstatus'] = $user_status;
$_SESSION['investorcoinmember_id'] = $matric ;
$_SESSION['investorcoinmember_name'] = $fullname ;



$pat_code = 'https://www.goldencoinbase.com/investor/auth_register.php?referral_id='.$matric;
$codeContents = $pat_code;
$tempDir = "../temp/";
$fileName1 = $matric . '.png';
$pngAbsoluteFilePath = $tempDir . $fileName1 ;
$urlRelativeFilePath = EXAMPLE_TMP_URLRELPATH.$fileName1;

$matta = QRcode::png($codeContents,$pngAbsoluteFilePath);

echo $matta;

// handles when a client register on the platform


if(!empty($email)){

	/* remove when hosted
	*/

 $email_send_to= $email;
$email_from = "support@goldencoinbase.com";
$subject = "Welcome Message";


$message = '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" style="font-family: Helvetica Neue, Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">

<
<head>
  <meta name="viewport" content="width=device-width" />
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>Golden Coin Base Investment - Reciept Confirmation</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,800" rel="stylesheet">
</head>
<body style="font-family: Helvetica Neue ,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; -webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none; width: 100% !important; height: 100%; line-height: 1.6em; background-color: #f8f8f8; margin: 0;">

  <table border="0" cellpadding="0" cellspacing="0" style="width: 100%; background-color: #f4f8fb; font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 15px;" bgcolor="#f8f8f8">

    <tr>
      <td>
        <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="width:600; background-color: #ffffff; color: #514d6a; padding: 40px; margin-top: 40px; line-height: 28px;" bgcolor="#ffffff">
          <tr>
            <td style="text-align: center; vertical-align: top; padding-top: 20px;">
              <img src="https://www.goldencoinbase.com/images/logo.png" alt="Golden Coin Base Investment" style="border:none; display:inline-block;" height="36" width="138">
            </td>
          </tr>

          <tr>
            <td style="text-align: center; padding-top: 50px; font-weight: 300; line-height: 48px; font-size: 42px; font-family: Open Sans,Helvetica,Arial,sans-serif; color: #111; letter-spacing: -1px;">
              Thanks for the Joining On Our Platform.
            </td>
          </tr>

          <tr>
            <td style="text-align: center; padding-top: 10px; font-weight: 300; line-height: 36px; font-size: 24px; font-family: Open Sans,Helvetica,Arial,sans-serif; color: #999; letter-spacing: -1px;">
              Your have successfully registered. Below are their details of registration.
            </td>
            
          </tr>

         

        <tr>
            <td style="text-align: center; padding-top: 30px; vertical-align: top;">
              <img src="https://www.goldencoinbase.com/images/6.png" alt="Golden Coin Base Investment" style="border:none; display:inline-block;" height="100" width="100">
            </td>
          </tr>

          <tr>
            <td>
              <table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
                <tbody>
                 
                  <tr>
                    <td style="text-align: left; padding: 10px 10px 10px 0px; border-top: 3px solid #eee;">
                      username / Email
                    </td>
                    <td style="width: 10%; text-align: center; padding: 10px 10px; border-top: 3px solid #eee;">
                     
                    </td>
                    <td style="width: 20%; text-align: right; padding: 10px 0px 10px 10px; white-space: nowrap; border-top: 3px solid #eee;">
                      '.$email.'
                    </td>
                  </tr>
                  <tr>
                    <td style="padding: 10px 10px 10px 0px; border-top: 1px solid #eee;">
                      Password
                    </td>
                    <td style="text-align: center; padding: 10px 10px; border-top: 1px solid #eee;">
                      
                    </td>
                    <td style="text-align: right; padding: 10px 0px 10px 10px; white-space: nowrap; border-top: 1px solid #eee;">
                      '.$password.'
                    </td>
                  </tr>
                 
                  
                 
                 
                 
                </tbody>
              </table>
            </td>
          </tr>

          

         

         
        </table>
      </td>
    </tr>

    <tr>
      <td>
        <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border:none; width:600; margin-top: 20px; margin-bottom: 40px; text-align: center; color: #85868a;">
          <tr>
            <td style="padding-top: 20px;">
              Copyright &copy; 2023 Golden Coin Base Investment. All Rights Reserved. We appreciate you!
            </td>
          </tr>

          <tr>
            <td style="padding-top: 10px; font-weight: 800; font-size: 12px; text-transform: uppercase; font-family: Open Sans,Helvetica,Arial,sans-serif;">
              <a href="javascript: void(0);" target="_blank" style="color: #222; text-decoration: none;">Help Center</a> <span style="color: #222; font-size: 24px; margin-left: 20px; margin-right: 20px;">&#8901;</span>
             
              <a href="javascript: void(0);" target="_blank" style="color: #222; text-decoration: none;">Unsubscribe</a>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>

</body>



</html>










';
//mail($email_send_to,$subject,$message,$headers);

$email_from ="support@goldencoinbase.com";

try {
    //Server settings
    $mail->SMTPDebug = 0;
    //SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'goldencoinbase.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'support@goldencoinbase.com';                     //SMTP username
    $mail->Password   = '08139090112$';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom($email_from, 'Golden Coin Base Investment');
    $mail->addAddress($email_send_to, 'Dear Investor');     //Add a recipient
   // $mail->addAddress('ellen@example.com');               //Name is optional
   // $mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
   // $mail->addBCC('bcc@example.com');

    //Attachments
   // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
   // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $message;
   // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
   // $mail->SMTPDebug = 0;
   // echo 'Message has been sent';
   //header("location:../light/dashboard.php");
   // exit();
    
} 
catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}





       
      
}


//






if(!empty($referral)){

	/* remove when hosted
	*/


     $sqli_insert_ref = mysqli_query($conn,"INSERT INTO referral_tbl(referral_id,ref_fullname,referral_code,ref_name_code,pay_status,ref_bonus,status,date_payee) VALUES('$referral','$referral_fullname','$matric','$fullname','Pending','0.00','Pending','$SERVERDATE1')");
    
    $email_send_to= $referral_email;
$email_from = "support@goldencoinbase.com";
$subject = "Referral Notice";



$message = '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" style="font-family: Helvetica Neue, Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">

<
<head>
  <meta name="viewport" content="width=device-width" />
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>Golden Coin Base Investment - Reciept Confirmation</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,800" rel="stylesheet">
</head>
<body style="font-family: Helvetica Neue ,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; -webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none; width: 100% !important; height: 100%; line-height: 1.6em; background-color: #f8f8f8; margin: 0;">

  <table border="0" cellpadding="0" cellspacing="0" style="width: 100%; background-color: #f4f8fb; font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 15px;" bgcolor="#f8f8f8">

    <tr>
      <td>
        <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="width:600; background-color: #ffffff; color: #514d6a; padding: 40px; margin-top: 40px; line-height: 28px;" bgcolor="#ffffff">
          <tr>
            <td style="text-align: center; vertical-align: top; padding-top: 20px;">
              <img src="https://www.goldencoinbase.com/images/logo.png" alt="Credit Market Coins" style="border:none; display:inline-block;" height="36" width="138">
            </td>
          </tr>

          <tr>
            <td style="text-align: center; padding-top: 50px; font-weight: 300; line-height: 48px; font-size: 42px; font-family: Open Sans,Helvetica,Arial,sans-serif; color: #111; letter-spacing: -1px;">
              Thanks for the Inviting People On Our Platform.
            </td>
          </tr>

          <tr>
            <td style="text-align: center; padding-top: 10px; font-weight: 300; line-height: 36px; font-size: 24px; font-family: Open Sans,Helvetica,Arial,sans-serif; color: #999; letter-spacing: -1px;">
              Your referral have successfully registered. Below are their details of registration.
            </td>
            
          </tr>

         

        <tr>
            <td style="text-align: center; padding-top: 30px; vertical-align: top;">
              <img src="https://www.goldencoinbase.com/images/services/big/1.png" alt="Credit Market Coins" style="border:none; display:inline-block;" height="100" width="100">
            </td>
          </tr>

          <tr>
            <td>
              <table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
                <tbody>
                 
                  <tr>
                    <td style="text-align: left; padding: 10px 10px 10px 0px; border-top: 3px solid #eee;">
                      Referral Email
                    </td>
                    <td style="width: 10%; text-align: center; padding: 10px 10px; border-top: 3px solid #eee;">
                     
                    </td>
                    <td style="width: 20%; text-align: right; padding: 10px 0px 10px 10px; white-space: nowrap; border-top: 3px solid #eee;">
                      '.$email.'
                    </td>
                  </tr>
                  <tr>
                    <td style="padding: 10px 10px 10px 0px; border-top: 1px solid #eee;">
                      Referral Fullname
                    </td>
                    <td style="text-align: center; padding: 10px 10px; border-top: 1px solid #eee;">
                      
                    </td>
                    <td style="text-align: right; padding: 10px 0px 10px 10px; white-space: nowrap; border-top: 1px solid #eee;">
                      '.$fullname.'
                    </td>
                  </tr>
                 
                  
                 
                 
                 
                </tbody>
              </table>
            </td>
          </tr>

          

         

         
        </table>
      </td>
    </tr>

    <tr>
      <td>
        <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border:none; width:600; margin-top: 20px; margin-bottom: 40px; text-align: center; color: #85868a;">
          <tr>
            <td style="padding-top: 20px;">
              Copyright &copy; 2023 Golden Coin Base Investment. All Rights Reserved. We appreciate you!
            </td>
          </tr>

          <tr>
            <td style="padding-top: 10px; font-weight: 800; font-size: 12px; text-transform: uppercase; font-family: Open Sans,Helvetica,Arial,sans-serif;">
              <a href="javascript: void(0);" target="_blank" style="color: #222; text-decoration: none;">Help Center</a> <span style="color: #222; font-size: 24px; margin-left: 20px; margin-right: 20px;">&#8901;</span>
             
              <a href="javascript: void(0);" target="_blank" style="color: #222; text-decoration: none;">Unsubscribe</a>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>

</body>



</html>










';
//mail($email_send_to,$subject,$message,$headers);

$email_from ="support@goldencoinbase.com";

try {
    //Server settings
    $mail->SMTPDebug = 0;
    //SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'goldencoinbase.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'support@goldencoinbase.com';                     //SMTP username
    $mail->Password   = '08139090112$';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom($email_from, 'Investors Market Coin');
    $mail->addAddress($email_send_to, 'Dear Referral');     //Add a recipient
   // $mail->addAddress('ellen@example.com');               //Name is optional
   // $mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
   // $mail->addBCC('bcc@example.com');

    //Attachments
   // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
   // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $message;
   // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
   // $mail->SMTPDebug = 0;
   // echo 'Message has been sent';
   header("location:../index.php");
		exit();
		
} 
catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

    
   

    
}



//echo "registered";
header("location:../index.php");
exit;	
}

if(!$sqli_insert_db){
 echo "error";
 header("location:../auth_register.php?msg=2");
 exit;	
}


}






?>