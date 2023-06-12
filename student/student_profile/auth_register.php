<?php
require_once('../includes/config.php');
?>

<head>
<title>Academia Portal - Registration Form</title>
<meta charset="utf-8"><meta content="ie=edge" http-equiv="x-ua-compatible">
<meta content="template language" name="keywords">
<meta content="Tamerlan Soziev" name="author">
<meta content="Admin dashboard html template" name="description">

<meta content="width=device-width, initial-scale=1" name="viewport">
<link href="../favicon.png" rel="shortcut icon">
<link href="../apple-touch-icon.png" rel="apple-touch-icon">

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
         <script  src="<?php echo $mi6;?>js/register.js"></script>

</head>

<body>
<div class="all-wrapper menu-side with-pattern">
<div class="auth-box-w wider">
<div class="logo-w"><a href="../index.php"><img alt="" src="../img/logo-big.png"></a>
<center><h2>Academia Portal</h2></center>
</div>
<h4 class="auth-header">Create new account</h4>
<form method="post" id="register-form">
   <div id="error">
                
                </div>
<div class="form-group">
<label for=""> Email address *</label>
<input class="form-control" placeholder="Enter email" name="email" id="email" type="email" required>
<div class="pre-icon os-icon os-icon-email-2-at2">
</div>
</div>

<div class="form-group">
<label for=""> Fullname *</label>
<input class="form-control" placeholder="Enter your surname, other name" name="fullname" id="fullname" type="text" required>
<div class="pre-icon os-icon os-icon-user-male-circle">
</div>
</div>

<div class="form-group">
<label for=""> Matric Number *</label>
<input class="form-control" placeholder="Enter your matric number" name="matric" id="matric" type="text" required>
<div class="pre-icon os-icon os-icon-user-male-circle">
</div>
</div>

<div class="row">
<div class="col-sm-6">
<div class="form-group">
<label for=""> Department *</label>
<select class="form-control" name="dept" id="dept" required>
<option value="" selected="selected">Select Department</option>
<option>Computer Science</option>
<option>Business Adminstration</option>
<option>Other</option>
</select>
<div class="pre-icon os-icon os-icon-fingerprint">
</div>
</div>
</div>
<div class="col-sm-6">
<div class="form-group">
<label for="">Level *</label>
<select class="form-control" name="level" id="level" required>
<option value="" selected="selected">Select Level</option>
<option>ND-1</option>
<option>ND-2</option>
<option>HND-1</option>
<option>HND-2</option>

</select>
</div>
</div>
</div>


<div class="row">
<div class="col-sm-6">
<div class="form-group">
<label for=""> Password *</label>
<input class="form-control" placeholder="Password" name="pwd" id="pwd" type="password" required>
<div class="pre-icon os-icon os-icon-fingerprint">
</div>
</div>
</div>
<div class="col-sm-6">
<div class="form-group">
<label for="">Confirm Password *</label>
<input class="form-control" placeholder="Password" name="confirm_pwd" id="confirm_pwd" type="password" required>
</div>
</div>
</div>

<div class="form-group">
<label for=""> Secret Question *</label>
<select class="form-control" name="question" id="question" required>
<option value="" selected="selected">Select Secret Question</option>
<option>What is the name of your primary school</option>
<option>What is the name of your pet name</option>
<option>What is your mother madien name</option>
<option>What is the name of your favourite uncle</option>
<option>What is the name of your favourite place </option>

</select>
<div class="pre-icon os-icon os-icon-user-male-circle">
</div>
</div>

<div class="form-group">
<label for=""> Secret Answer *</label>
<input class="form-control" placeholder="Enter your secret question answer" name="answer" id="answer" type="text" required>
<div class="pre-icon os-icon os-icon-user-male-circle">
 
</div>
</div>

<div class="buttons-w">
<button class="btn btn-primary" name="btn-save" id="btn-submit">Register Now</button>
</div>
</form>
</div>
</div>


<script type="text/javascript">
 /*
 $(function() {
    $(".btn").click(function() {
    var fullname=$("#fullname").val();
    var email=$("#email").val();
    var matric=$("#matric").val();
	var dept = $("#dept").val();
	var level = $("#level").val();
	var password = $("#password").val();
	var confirm_pass = $("#confirm-pass").val();
	var question =$("#question").val();
	var answer =$("#answer").val();
	
	  var data = $("#register-form").serialize(); 
//	var dataString = 'fullname='+ fullname + '&email='+ email + '&password='+ password + '&matric='+ matric + '&dept' + dept + '&level' + level + '&question' + question + '&answer' + answer;
 alert(data); 
	
	if(confirm_pass != password){
	 alert("Please confirm password should match the password entered");
	  $("#confirm-pass").focus();
        return false;	
	}
	$.ajax({
		type:"POST",
		url:"processor/auth_register_file.php",
		
	    data: data,
       cache: false,
        success :  function(response) {      
        if(response==1){         
			 $("#error").fadeIn(1000, function(){
			   $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Sorry Error Observed !</div>');  
			   alert(data);         
			   $("#btn-submit").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Create Account');          
			 });                    
        }
		 else if(response=="registered"){         
			 $("#btn-submit").html('<img src="ajax-loader.gif" /> &nbsp; Signing Up ...');
			 //setTimeout('$(".sky-form").fadeOut(500, function(){ $(".register_container").load("welcome.php"); }); ',3000);  
			 window.location ="payment.php"; 			 
		}
        }
	
	
		
		
	});
		
		 return false;
      // validate and process form here
    });
  });

*/
</script>


</body>
</html>
