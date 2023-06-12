$('document').ready(function() {   
  /* handle form validation */  
  $("#login-form").validate({
      rules:
   {
   username: {
      required: true,
   minlength: 3
   },
   pwd: {
   required: true,
   minlength: 8,
   maxlength: 15
   },
   
    },
       messages:
    {
            username: "please enter user name",
            pwd:{
                      required: "please provide a password",
                      minlength: "password at least have 8 characters"
                     },
          
       },
    submitHandler: submitForm 
       });  
    /* handle form submit */
    function submitForm() {  
    var data = $("#login-form").serialize();    
    $.ajax({    
    type : 'POST',
    url  : 'processor/auth_login_file.php',
    data : data,
    beforeSend: function() { 
     $("#error").fadeOut();
     $("#btn-submit").html('<img src="img/ajax-loader.gif" /> &nbsp; sending ...');
    },
    success :  function(response) {      
        if(response==1){         
			 $("#error").fadeIn(1000, function(){
			   $("#error").html('<div class="alert alert-danger">  <img src="img/shield-error-icon1.png" width="30" height="30" /> &nbsp; Sorry Username Or Password Is <br>  Invalid Retry Again !</div>');           
			   $("#btn-submit").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Login');          
			 });                    
        } else if(response=="registered"){         
			 $("#btn-submit").html('<img src="img/ajax-loader.gif" /> &nbsp; Loading Dashboard ...');
			 //setTimeout('$(".sky-form").fadeOut(500, function(){ $(".register_container").load(""); }); ',3000);  
			 window.location ="index.php"; 			 
		}else if(response==2){         
			  $("#btn-submit").html('<img src="img/ajax-loader.gif" /> &nbsp; Preparing ...');
			 //setTimeout('$(".sky-form").fadeOut(500, function(){ $(".register_container").load("welcome.php"); }); ',3000);  
			 window.location ="profile_pix.php"; 			 
			 
		}else if(response==3){         
			 $("#error").fadeIn(1000, function(){
			   $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Sorry Data Not Save Retry Again !</div>');           
			   $("#btn-submit").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Login');          
			 });         
        } else {          
         	$("#error").fadeIn(1000, function(){           
      			$("#error").html('<div class="alert alert-danger"><span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+data+' !</div>');           
         		$("#btn-submit").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Login1');         
         	});           
       	}
        }
    });
    return false;
  }
});