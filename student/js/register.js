$('document').ready(function() {   
  /* handle form validation */  
  $("#register-form").validate({
      rules:
   {
  
 
   confirm_pwd: {
   required: true,
   equalTo: '#pwd'
   },
   email: {
            required: true,
            email: true
            },
    },
       messages:
    {
            user_name: "please enter user name",
            pwd:{
                      required: "please provide a password",
                      minlength: "password at least have 8 characters"
                     },
            email: "please enter a valid email address",
   confirm_pwd:{
      required: "please retype your password",
      equalTo: "password doesn't match !"
       }
       },
    submitHandler: submitForm 
       });  
    /* handle form submit */
    function submitForm() {  
    var data = $("#register-form").serialize();    
    $.ajax({    
    type : 'POST',
    url  : 'student/processor/auth_register_file.php',
    data : data,
    beforeSend: function() { 
     $("#error").fadeOut();
     $("#btn-submit").html('<img src="students/img/ajax-loader.gif" /> &nbsp; sending ...');
    },
    success :  function(response) {      
        if(response==1){         
			 $("#error").fadeIn(1000, function(){
			   $("#error").html('<div class="alert alert-danger"><img src="students/img/shield-error-icon1.png" width="30" height="30" />&nbsp; Sorry Email Address Already Been Used !</div>');           
			   $("#btn-submit").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Create Account');          
			 });                    
        } else if(response=="registered"){         
			 $("#btn-submit").html('<img src="students/img/ajax-loader.gif" /> &nbsp; Signing Up ...');
			 //setTimeout('$(".sky-form").fadeOut(500, function(){ $(".register_container").load("welcome.php"); }); ',3000);  
			 window.location ="profile_pix.php"; 			 
		}else if(response==2){         
			 $("#error").fadeIn(1000, function(){
			   $("#error").html('<div class="alert alert-danger"> <img src="students/img/shield-error-icon1.png" width="30" height="30" /> &nbsp; Sorry Matriculation Or Registration Number Registered Already !</div>');           
			   $("#btn-submit").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Create Account');          
			 });      
		}else if(response=="error"){         
			 $("#error").fadeIn(1000, function(){
			   $("#error").html('<div class="alert alert-danger"> <img src="students/img/shield-error-icon1.png" width="30" height="30" /> &nbsp; Sorry Error In Database Operation, Retry Again !</div>');           
			   $("#btn-submit").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Create Account');          
			 });         
        } else {          
         	$("#error").fadeIn(1000, function(){           
      			$("#error").html('<div class="alert alert-danger"><img src="students/img/shield-error-icon1.png" width="30" height="30" /> &nbsp; Sorry Referal ID Is Not Correct Retry Again !</div>');           
         		$("#btn-submit").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Create Account');         
         	});           
       	}
        }
    });
    return false;
  }
});