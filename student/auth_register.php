<?php
require_once('includes/config.php');


if(isset($_GET['referral_id'])){
    $ref_id = $_GET['referral_id'];
    
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Investors Login Form - <?php echo $COMPANY_NAME;?></title>
<meta charset="utf-8"><meta content="ie=edge" http-equiv="x-ua-compatible">
<meta content="template language" name="keywords">
<meta content="Credit Market Coin Investment" name="author">
<meta content="width=device-width, initial-scale=1" name="viewport">

<link href="favicon.png" rel="shortcut icon"><link href="apple-touch-icon.png" rel="apple-touch-icon">
<link href="<?php echo $mi6;?>/fast.fonts.net/cssapi/487b73f1-c2d1-43db-8526-db577e4c822b.css" rel="stylesheet" type="text/css">
<link href="<?php echo $mi6;?>bower_components/select2/dist/css/select2.min.css" rel="stylesheet">
<link href="<?php echo $mi6;?>bower_components/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
<link href="<?php echo $mi6;?>bower_components/dropzone/dist/dropzone.css" rel="stylesheet">
<link href="<?php echo $mi6;?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="<?php echo $mi6;?>bower_components/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
<link href="<?php echo $mi6;?>bower_components/perfect-scrollbar/css/perfect-scrollbar.min.css" rel="stylesheet">
<link href="<?php echo $mi6;?>bower_components/slick-carousel/slick/slick.css" rel="stylesheet">
<link href="<?php echo $mi6;?>css/maince5a.css?version=4.4.1" rel="stylesheet">

<script type="text/javascript" src="<?php echo $mi6;?>js/jquery-2.1.4.min.js"></script>
         <script type="text/javascript" src="<?php echo $mi6;?>js/validation.min.js"></script>
        <script type="text/javascript" src="<?php echo $mi6;?>js/bootstrap.min.js"></script>


        
         <center><div class="col-md-4">
                                 <!-- GTranslate: https://gtranslate.io/ -->
<a href="#" onclick="doGTranslate('en|en');return false;" title="English" class="gflag nturl" style="background-position:-0px -0px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="English" /></a><a href="#" onclick="doGTranslate('en|fr');return false;" title="French" class="gflag nturl" style="background-position:-200px -100px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="French" /></a><a href="#" onclick="doGTranslate('en|de');return false;" title="German" class="gflag nturl" style="background-position:-300px -100px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="German" /></a><a href="#" onclick="doGTranslate('en|it');return false;" title="Italian" class="gflag nturl" style="background-position:-600px -100px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="Italian" /></a><a href="#" onclick="doGTranslate('en|pt');return false;" title="Portuguese" class="gflag nturl" style="background-position:-300px -200px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="Portuguese" /></a><a href="#" onclick="doGTranslate('en|ru');return false;" title="Russian" class="gflag nturl" style="background-position:-500px -200px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="Russian" /></a><a href="#" onclick="doGTranslate('en|es');return false;" title="Spanish" class="gflag nturl" style="background-position:-600px -200px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="Spanish" /></a>

<style type="text/css">
<!--
a.gflag {vertical-align:middle;font-size:16px;padding:1px 0;background-repeat:no-repeat;background-image:url(//gtranslate.net/flags/16.png);}
a.gflag img {border:0;}
a.gflag:hover {background-image:url(//gtranslate.net/flags/16a.png);}
#goog-gt-tt {display:none !important;}
.goog-te-banner-frame {display:none !important;}
.goog-te-menu-value:hover {text-decoration:none !important;}
body {top:0 !important;}
#google_translate_element2 {display:none!important;}
-->
</style>

<br /><select onchange="doGTranslate(this);"><option value="">Select Language</option><option value="en|af">Afrikaans</option><option value="en|sq">Albanian</option><option value="en|ar">Arabic</option><option value="en|hy">Armenian</option><option value="en|az">Azerbaijani</option><option value="en|eu">Basque</option><option value="en|be">Belarusian</option><option value="en|bg">Bulgarian</option><option value="en|ca">Catalan</option><option value="en|zh-CN">Chinese (Simplified)</option><option value="en|zh-TW">Chinese (Traditional)</option><option value="en|hr">Croatian</option><option value="en|cs">Czech</option><option value="en|da">Danish</option><option value="en|nl">Dutch</option><option value="en|en">English</option><option value="en|et">Estonian</option><option value="en|tl">Filipino</option><option value="en|fi">Finnish</option><option value="en|fr">French</option><option value="en|gl">Galician</option><option value="en|ka">Georgian</option><option value="en|de">German</option><option value="en|el">Greek</option><option value="en|ht">Haitian Creole</option><option value="en|iw">Hebrew</option><option value="en|hi">Hindi</option><option value="en|hu">Hungarian</option><option value="en|is">Icelandic</option><option value="en|id">Indonesian</option><option value="en|ga">Irish</option><option value="en|it">Italian</option><option value="en|ja">Japanese</option><option value="en|ko">Korean</option><option value="en|lv">Latvian</option><option value="en|lt">Lithuanian</option><option value="en|mk">Macedonian</option><option value="en|ms">Malay</option><option value="en|mt">Maltese</option><option value="en|no">Norwegian</option><option value="en|fa">Persian</option><option value="en|pl">Polish</option><option value="en|pt">Portuguese</option><option value="en|ro">Romanian</option><option value="en|ru">Russian</option><option value="en|sr">Serbian</option><option value="en|sk">Slovak</option><option value="en|sl">Slovenian</option><option value="en|es">Spanish</option><option value="en|sw">Swahili</option><option value="en|sv">Swedish</option><option value="en|th">Thai</option><option value="en|tr">Turkish</option><option value="en|uk">Ukrainian</option><option value="en|ur">Urdu</option><option value="en|vi">Vietnamese</option><option value="en|cy">Welsh</option><option value="en|yi">Yiddish</option></select><div id="google_translate_element2"></div>
<script type="text/javascript">
function googleTranslateElementInit2() {new google.translate.TranslateElement({pageLanguage: 'en',autoDisplay: false}, 'google_translate_element2');}
</script><script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2"></script>


<script type="text/javascript">
/* <![CDATA[ */
eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('6 7(a,b){n{4(2.9){3 c=2.9("o");c.p(b,f,f);a.q(c)}g{3 c=2.r();a.s(\'t\'+b,c)}}u(e){}}6 h(a){4(a.8)a=a.8;4(a==\'\')v;3 b=a.w(\'|\')[1];3 c;3 d=2.x(\'y\');z(3 i=0;i<d.5;i++)4(d[i].A==\'B-C-D\')c=d[i];4(2.j(\'k\')==E||2.j(\'k\').l.5==0||c.5==0||c.l.5==0){F(6(){h(a)},G)}g{c.8=b;7(c,\'m\');7(c,\'m\')}}',43,43,'||document|var|if|length|function|GTranslateFireEvent|value|createEvent||||||true|else|doGTranslate||getElementById|google_translate_element2|innerHTML|change|try|HTMLEvents|initEvent|dispatchEvent|createEventObject|fireEvent|on|catch|return|split|getElementsByTagName|select|for|className|goog|te|combo|null|setTimeout|500'.split('|'),0,{}))
/* ]]> */
</script>
                            </div></center>

</head>
<body class="auth-wrapper">
<div class="all-wrapper menu-side with-pattern">
<div class="auth-box-w">
&nbsp;<div class="logo-w1">


</div>
<h4 class="auth-header">Registration Form</h4>

<form   method="post" action="auth_register_detail.php">
 <div id="error">

     <?php
                                $get_msg = trim($_GET['msg']);
                                if($get_msg == '1'){
                                    echo '<div class="alert alert-danger"><img src="img/shield-error-icon.png" width="30" height="30" />&nbsp; Sorry Email Address Already Been Used !</div>';
                                }
                                
                                 if($get_msg == '2'){
                                    echo '<div class="alert alert-danger"><img src="img/shield-error-icon.png" width="30" height="30" />&nbsp; Sorry Error In Database Operation, Retry Again  !</div>';
                                }
                                
                                
                                
                                ?>
                
                </div>

                <div class="form-group">
<label for="">Username</label>
<input class="form-control" placeholder="Enter your email or username" name="fullname" id="fullname" required type="text">
<div class="pre-icon os-icon os-icon-user-male-circle"></div>
<label id="username-error" style="display: none;"></label>
</div>



<div class="form-group">
<label for="">Password</label><input class="form-control" placeholder="Enter your password" name="pwd" required id="pwd" type="password">
<div class="pre-icon os-icon os-icon-fingerprint"></div>
<label id="password-error" style="display: none;"></label>
</div>










<div class="buttons-w form-group">
    <center><button class="mr-4 mb-4 btn-lg btn-outline-secondary btn-rounded" name="btn-save" id="btn-submit"><i class="fa fa-windows"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  Next &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
</center>

<hr>
</div>
</form>
</div>
</div>

</body>

</html>
