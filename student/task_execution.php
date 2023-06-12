<?php
require_once('includes/config.php');
//require_once('includes/load_details.php');
//echo $SERVERDATE3;

//exit();

 $get_first_name =$_SESSION['first_name']; 
   $get_character = $_SESSION['character_load'] ;
   $get_pref_level = $_SESSION['pref_level'];
    $get_student_code =$_SESSION['student_code'] ;
   $get_statusMsg = $_SESSION['message'] ;
    //$_SESSION['message'] = $statusMsg;

   if($get_pref_level == 'Bronze'){
    $get_pref_level_img1 = "Kultataso";
   }

   if($get_pref_level == 'Silver'){
    $get_pref_level_img1 = "Pronssitaso";
   }

   if($get_pref_level == 'Gold'){
    $get_pref_level_img1 = "Hopeataso";
   }


   $get_pref_level_img = "img/" . $get_pref_level_img1 . ".png";
    $get_character_img = "img/" . $get_character . ".png";

   // echo $get_first_name;
   // exit();

     $nextdate= date('Y-m-d', strtotime($Date. ' + 10 days'));


?>
<!DOCTYPE html><html>

<head>
	<title>Student Task - Panel </title>
	<meta charset="utf-8">
	<meta content="ie=edge" http-equiv="x-ua-compatible">
	<meta content="template language" name="keywords">
	<meta content="Tamerlan Soziev" name="author">
	<meta content="Admin dashboard html template" name="description">
	<meta content="width=device-width, initial-scale=1" name="viewport">

	<link href="favicon.png" rel="shortcut icon">
	<link href="apple-touch-icon.png" rel="apple-touch-icon">
	<link href="../fast.fonts.net/cssapi/487b73f1-c2d1-43db-8526-db577e4c822b.css" rel="stylesheet" type="text/css">
	<link href="<?php echo $mi6;?>bower_components/select2/dist/css/select2.min.css" rel="stylesheet">
	<link href="<?php echo $mi6;?>bower_components/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
	<link href="<?php echo $mi6;?>bower_components/dropzone/dist/dropzone.css" rel="stylesheet">
	<link href="<?php echo $mi6;?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo $mi6;?>bower_components/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
	<link href="<?php echo $mi6;?>bower_components/perfect-scrollbar/css/perfect-scrollbar.min.css" rel="stylesheet">
	<link href="<?php echo $mi6;?>bower_components/slick-carousel/slick/slick.css" rel="stylesheet">
	<link href="<?php echo $mi6;?>css/maince5a.css?version=4.4.1" rel="stylesheet">
	<link href="<?php echo $mi6;?>css/custom.css" rel="stylesheet">
	<link href="<?php echo $mi6;?>icon_fonts_assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link href="<?php echo $mi6;?>bower_components/slick-carousel/slick/slick.css" rel="stylesheet">
	<link href="<?php echo $mi6;?>bower_components/perfect-scrollbar/css/perfect-scrollbar.min.css" rel="stylesheet">
	<link href="<?php echo $mi6;?>bower_components/dropzone/dist/dropzone.css" rel="stylesheet">



	

	

</head>

<body class="menu-position-side menu-side-left full-screen with-content-panel">
	<div class="all-wrapper with-side-panel solid-bg-all">
		<div class="search-with-suggestions-w">
						<div class="search-with-suggestions-modal">
							<div class="element-search">
								<input class="search-suggest-input" placeholder="Start typing to search1..." type="text">
								<div class="close-search-suggestions">
									<i class="os-icon os-icon-x"></i>
								</div>
							</input>
						</div>


						
						
					</div>
				</div>
				<div class="layout-w">
		<!--------------------
		START - Mobile Menu
		-------------------->
		<div class="menu-mobile menu-activated-on-click color-scheme-dark">
		<div class="mm-logo-buttons-w">
		<a class="mm-logo" href="dashboard.php">
			<img src="img/logo.png">
			<span>Student Physical Education Diploma</span>
		</a>
		<div class="mm-buttons">
		
			<div class="mobile-menu-trigger">
				<div class="os-icon os-icon-hamburger-menu-1"></div>
			</div>
		</div>
	</div>
	<div class="menu-and-user">
		<div class="logged-user-w">
			<div class="avatar-w">
				<img alt="" src="<?php echo $path;?>">
			</div>
			<div class="logged-user-info-w">
				<div class="logged-user-name"><?php echo $fullname_load;?></div>
				<div class="logged-user-role">Front Desk</div>
			</div>
		</div>

		<!--------------------
		START - Mobile Menu List
		-------------------->
		 <?php
		  require_once('mobile_menu.php');

		 ?>


		<!--------------------
		END - Mobile Menu
		-------------------->
		<!--------------------
		START - Main Menu
		-------------------->
		<div class="menu-w color-scheme-light color-style-transparent menu-position-side menu-side-left menu-layout-compact sub-menu-style-over sub-menu-color-bright selected-menu-color-light menu-activated-on-hover menu-has-selected-link">
		<div class="logo-w">
		<a class="logo" href="dashboard.php">
		<div class="logo-element"></div>
		<div class="logo-label">Medical Application Software</div>
		</a>
		</div>
		<div class="logged-user-w avatar-inline">
		<div class="logged-user-i">
		<div class="avatar-w">
		<img alt="" src="<?php echo $path;?>">
		</div><div class="logged-user-info-w">
		<div class="logged-user-name"><?php echo $fullname_load;?></div>
		<div class="logged-user-role">Front Desk</div>
		</div>
		<div class="logged-user-toggler-arrow">
		<div class="os-icon os-icon-chevron-down"></div>
		</div>
		<div class="logged-user-menu color-style-bright">
		<div class="logged-user-avatar-info">
		<div class="avatar-w"><img alt="" src="<?php echo $path;?>"></div>
		<div class="logged-user-info-w"><div class="logged-user-name"><?php echo $fullname_load;?></div>
		<div class="logged-user-role">Front Desk</div>
		</div>
		</div>
		<div class="bg-icon"><i class="os-icon os-icon-wallet-loaded"></i></div>
		<ul>
		<li><a href="office_mail.php"><i class="os-icon os-icon-mail-01"></i><span>Incoming Mail</span></a></li><li><a href="profile.php"><i class="os-icon os-icon-user-male-circle2"></i><span>Profile Details</span></a></li>
		
		<li><a href="logout.php"><i class="os-icon os-icon-signs-11"></i><span>Logout</span></a></li>
		</ul>
		</div>
		</div>
		</div>

		<!--------------------
		START - Main Menu
		-------------------->

       <?php  

       	require_once('main_menu.php');

       ?>

		<!--------------------
		END - Main Menu
		-------------------->

		<div class="content-w">
		<!--------------------
		START - Top Bar
		-------------------->
		<div class="top-bar color-scheme-transparent">
		<!--------------------
		START - Top Menu Controls
		-------------------->
		<div class="top-menu-controls">
		<div class="element-search autosuggest-search-activator">
		<input placeholder="Start typing to search..." type="text">
		</div>
		<!--------------------
		START - Messages Link in secondary top menu
		-------------------->
		<div class="messages-notifications os-dropdown-trigger os-dropdown-position-left"><i class="os-icon os-icon-mail-14"></i><div class="new-messages-count"><?php echo $total_pages_inbox;?></div>
		
        </div>
		<!--------------------
		END - Messages Link in secondary top menu
		-------------------->
		<!--------------------
		START - Settings Link in secondary top menu
		-------------------->
		

		<!--------------------
		END - Settings Link in secondary top menu
		-------------------->
		<!--------------------
		START - User avatar and menu in secondary top menu
		-------------------->
		<div class="logged-user-w">
		<div class="logged-user-i">
		<div class="avatar-w">
		<img alt="" src="<?php echo $path;?>">
		</div>
		<div class="logged-user-menu color-style-bright">
		<div class="logged-user-avatar-info">
		<div class="avatar-w"><img alt="" src="<?php echo $path;?>"></div>
		<div class="logged-user-info-w">
		<div class="logged-user-name"><?php echo $fullname_load;?></div>
		<div class="logged-user-role">Front Desk</div>
		</div>
		</div>
		<div class="bg-icon"><i class="os-icon os-icon-wallet-loaded"></i></div>
		<ul>
		<li><a href="office_mail.php"><i class="os-icon os-icon-mail-01"></i><span>Incoming Mail</span></a></li><li><a href="profile.php"><i class="os-icon os-icon-user-male-circle2"></i><span>Profile Details</span></a></li>
		<li><a href="logout.php"><i class="os-icon os-icon-signs-11"></i><span>Logout</span></a></li>
		</ul>
		</div>
		</div>
		</div>
		<!--------------------
		END - User avatar and menu in secondary top menu
		-------------------->
		</div>
		<!--------------------
		END - Top Menu Controls
		-------------------->
		</div>
		<!--------------------
		END - Top Bar
		-------------------->
		<!--------------------
		START - Breadcrumbs
		-------------------->
		<ul class="breadcrumb">
		<li class="breadcrumb-item">
		<a href="index-2.html">Home</a></li>
		<li class="breadcrumb-item"><a href="dashboard.php">Front Desk Dashboard</a></li>
		<li class="breadcrumb-item"><span><?php echo $COMPANY_NAME;?></span></li>
		</ul>
		<!--------------------
		END - Breadcrumbs
		-------------------->
		<div class="content-i">
<div class="content-box">
<div class="control-header">




<div class="row">
<div class="col-lg-12 col-xxl-12">


                          	<div class="col-sm-12 col-xxxl-12">

<div class="users-list-w">
			
			<div class="user-w ">
				<div class="user-avatar-w">
					<div class="user-avatar1">
						<img alt="" src="img/<?php echo $get_pref_level_img1;?>.png" width="80" height="80">
					</div>
				</div>
				<div class="user-name">
					<h4 class="user-title">You are Completing The <?php echo $get_pref_level;?> Level</h4>
					<div class="user-role">
						

						
					</div>
				</div>
				
			</div>
			<center><img src="img/Hirvi.png" width="100" height="100"></center>
										


	 <!--START - Money Withdraw Form-->
                        <div class="element-wrapper">
                          <div class="element-box">

                          	


<div class="element-wrapper">
	<h6 class="element-header">Task Panel</h6>
	<div class="element-box-tp">
		
		<div class="users-list-w">
			
			<div class="user-w with-status status-green">
				<div class="user-avatar-w">
					<div class="user-avatar">
						<img alt="" src="img/avatar1.jpg">
					</div>
				</div>
				<div class="user-name">
					<h4 class="user-title">Let Go On A Trip</h4>
					<div class="user-role">
						<h6><span>Start a trip and getus the detail</span></h6>

						
					</div>
				</div>
				<a class="user-action" href="users_profile_small.html">
					<div class="os-icon os-icon-email-forward"></div>
				</a>
			</div>

		<div class="users-list-w">
			
			<div class="user-w with-status status-green">
				<div class="user-avatar-w">
					<div class="user-avatar">
						<img alt="" src="img/avatar1.jpg">
					</div>
				</div>
				<div class="user-name">
					<h6 class="user-title">Nature Exercise</h6>
					<div class="user-role">
						<h6>Progress Report : 2/10</h6>
						
					</div>
				</div>
				<a class="user-action" href="users_profile_small.html">
					<div class="os-icon os-icon-email-forward"></div>
				</a>
			</div>


					<div class="users-list-w">
			
			<div class="user-w with-status status-green">
				<div class="user-avatar-w">
					<div class="user-avatar">
						<img alt="" src="img/avatar1.jpg">
					</div>
				</div>
				<div class="user-name">
					<h6 class="user-title">Nature Exercise</h6>
					<div class="user-role">
						<h6>Progress Report : 2/10</h6>
						

					</div>
				</div>
				<a class="user-action" href="users_profile_small.html">
					<div class="os-icon os-icon-email-forward"></div>
				</a>
			</div>


		<div class="users-list-w">
			
			<div class="user-w with-status status-green">
				<div class="user-avatar-w">
					<div class="user-avatar">
						<img alt="" src="img/avatar1.jpg">
					</div>
				</div>
				<div class="user-name">
					<h6 class="user-title">Nature Exercise</h6>
					<div class="user-role">
						<h6>Progress Report : 2/10</h6>
						<div class="progress">

							<div aria-valuemax="100" aria-valuemin="0" aria-valuenow="75" class="progress-bar bg-success" role="progressbar" style="width: 50%"></div>
						</div>

					</div>
				</div>
				<a class="user-action" href="users_profile_small.html">
					<div class="os-icon os-icon-email-forward"></div>
				</a>
			</div>


					<div class="users-list-w">
			
			<div class="user-w with-status status-green">
				<div class="user-avatar-w">
					<div class="user-avatar">
						<img alt="" src="img/avatar1.jpg">
					</div>
				</div>
				<div class="user-name">
					<h6 class="user-title">Nature Exercise</h6>
					<div class="user-role">
						<h6>Progress Report : 2/10</h6>
						<div class="progress">

							<div aria-valuemax="100" aria-valuemin="0" aria-valuenow="75" class="progress-bar bg-success" role="progressbar" style="width: 50%"></div>
						</div>

					</div>
				</div>
				<a class="user-action" href="users_profile_small.html">
					<div class="os-icon os-icon-email-forward"></div>
				</a>
			</div>




					<div class="users-list-w">
			
			<div class="user-w with-status status-green">
				<div class="user-avatar-w">
					<div class="user-avatar">
						<img alt="" src="img/avatar1.jpg">
					</div>
				</div>
				<div class="user-name">
					<h6 class="user-title">Nature Exercise</h6>
					<div class="user-role">
						<h6>Progress Report : 2/10</h6>
						<div class="progress">

							<div aria-valuemax="100" aria-valuemin="0" aria-valuenow="75" class="progress-bar bg-success" role="progressbar" style="width: 50%"></div>
						</div>

					</div>
				</div>
				<a class="user-action" href="users_profile_small.html">
					<div class="os-icon os-icon-email-forward"></div>
				</a>
			</div>


					<div class="users-list-w">
			
			<div class="user-w with-status status-green">
				<div class="user-avatar-w">
					<div class="user-avatar">
						<img alt="" src="img/avatar1.jpg">
					</div>
				</div>
				<div class="user-name">
					<h6 class="user-title">Nature Exercise</h6>
					<div class="user-role">
						<h6>Progress Report : 2/10</h6>
						<div class="progress">

							<div aria-valuemax="100" aria-valuemin="0" aria-valuenow="75" class="progress-bar bg-success" role="progressbar" style="width: 50%"></div>
						</div>

					</div>
				</div>
				<a class="user-action" href="users_profile_small.html">
					<div class="os-icon os-icon-email-forward"></div>
				</a>
			</div>


		
			
			</div>
		</div>
	</div>



</div>
</div>
</div>
</div>














 




<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

</div>
</div>
</div>


	<div aria-hidden="true" class="modal fade" id="taskModal_232_view" role="dialog" tabindex="-1">
<div class="modal-dialog modal-sm" role="document">
<div class="modal-content">
<div class="modal-header faded smaller"><div class="modal-title">
	<h4>Delete Record</h4>
</div>
<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> &times;</span></button>
</div>

<div class="modal-body">
  <form method="post" action="delete_appointment_rec.php">
  <input type="hidden" name="subject" id="subject" class="form-control" placeholder="Subject">
                                         <input type="hidden" name="email_sent" id="email_sent" class="form-control">
<center><img src="img/blue-delete-button-png-29.png" width="50" height="50" /><h6>Do You Want Delete Client Record</h6></center>

<div class="modal-footer buttons-on-left">
<button class="btn btn-primary" type="submit">Yes,Delete Record</button>
<button class="btn btn-secondary" data-dismiss="modal" type="button"> No</button>
</div>

</form>
</div>

</div>
</div>
</div>
</div>





	<div aria-hidden="true" class="modal fade" id="taskModal_231_view" role="dialog" tabindex="-1">
<div class="modal-dialog modal-sm" role="document">
<div class="modal-content">
<div class="modal-header faded smaller"><div class="modal-title">
	<h4>Mark Appointment Record</h4>
</div>
<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> &times;</span></button>
</div>

<div class="modal-body">
  <form method="post" action="mark_treated_appointment.php">
  <input type="hidden" name="subject12" id="subject12" class="form-control" placeholder="Subject">
                                         <input type="hidden" name="email_sent12" id="email_sent12" class="form-control">
<center><img src="img/company6.png" width="50" height="50" /><h6>Do You Want Mark Appointment As Treated Record</h6></center>

<div class="modal-footer buttons-on-left">
<button class="btn btn-success" type="submit">Yes,Mark Record</button>
<button class="btn btn-secondary" data-dismiss="modal" type="button"> No</button>
</div>

</form>
</div>

</div>
</div>
</div>
</div>



<div aria-hidden="true" class="modal fade" id="taskModal_2314_view" role="dialog" tabindex="-1">
<div class="modal-dialog modal-sm" role="document">
<div class="modal-content">
<div class="modal-header faded smaller"><div class="modal-title">
	<h4>Cancel Appointment </h4>
</div>
<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> &times;</span></button>
</div>

<div class="modal-body">
  <form method="post" action="cancel_appointment.php">
  <input type="hidden" name="subject4" id="subject4" class="form-control" placeholder="Subject">
                                         <input type="hidden" name="email_sent4" id="email_sent4" class="form-control">
<center><img src="img/company5.png" width="50" height="50" /><h6>Do You Want Cancel This Appointment Record</h6></center>

<div class="modal-footer buttons-on-left">
<button class="btn btn-success" type="submit">Yes,Cancel Record</button>
<button class="btn btn-secondary" data-dismiss="modal" type="button"> No</button>
</div>

</form>
</div>

</div>
</div>
</div>
</div>




		<div aria-hidden="true" aria-labelledby="myLargeModalLabel" id="taskModal_23_view" class="modal fade bd-example-modal-sm" role="dialog" tabindex="-1">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header btn btn-primary"><h5 class="modal-title" id="exampleModalLabel">Edit Appointment</h5>
				<button aria-label="Close" class="close" data-dismiss="modal" type="button">
					<span aria-hidden="true"> &times;</span></button>
				</div>
				<div class="modal-body">
					<form method="post" action="appointment_mag_editfile.php">
						
						<div id="getta"></div>



	



						</form>
					</div>
				
				</div>
			</div>
		</div>






				

<div aria-hidden="true" aria-labelledby="myLargeModalLabel" id="taskModal" class="modal fade bd-example-modal-sm" role="dialog" tabindex="-1">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header btn btn-primary"><h5 class="modal-title" id="exampleModalLabel">Add Appointment</h5>
				<button aria-label="Close" class="close" data-dismiss="modal" type="button">
					<span aria-hidden="true"> &times;</span></button>
				</div>
				<div class="modal-body">
					 <form method="post" action="appointment_file.php">
						
						<div class="row">


							<div class="col-sm-6">
									<div class="form-group">
										<label for="">Date Of Appointment</label>
	
        <input type='text' class=" single-daterange form-control" value="" name="date_app" id="date_app"   required/>
        
    

										
										
									</div>
								</div>


							<div class="col-sm-6">
								<div class="form-group">
									<label for=""> Time Of Appointment</label>
							        <input type='time' class="form-control" name="time_app" value="09:00" id="time_app"  required/>
								</div>
							</div>

								
							</div>

							<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="">Doctor Name</label>
							      <select class="form-control" name="doctor_name" id="doctor_name" required>
                     <option value="" selected="Selected">Select A Doctor</option>
                     <?php
					 $sqli_get_doctors = mysqli_query($conn,"SELECT doc_code,doctor_name FROM doctors_tbl");
					 while($rack = mysqli_fetch_array($sqli_get_doctors)){
						$doctor_code = $rack['doc_code']; 
						$doctor_name = $rack['doctor_name'];
						echo '<option value="'.$doctor_code.'">'.$doctor_name.'</option>';
					 }
					 
					 
					 ?>
                     </select>
								</div>
							</div>

								<div class="col-sm-6">
									<div class="form-group">
										<label for="">Patient Name</label>
										
											
											<select class="form-control" name="patient_name" id="patient_name" required>
                     <option value="" selected="Selected">Select Patient Name</option>
                     <?php
					 $sqli_get_doctors = mysqli_query($conn,"SELECT pat_code,name FROM doctors_tbl");
					 while($rack = mysqli_fetch_array($sqli_get_doctors)){
						$pat_code = $rack['pat_code']; 
						$pat_name = $rack['name'];
						echo '<option value="'.$pat_code.'">'.$pat_name.'</option>';
					 }
					 
					 
					 ?>
							</select>				
										
									</div>
								</div>
							</div>

							
							<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<label for=""> Reason For Appointment</label>
							      <textarea name="reason" id="reason" class="form-control"></textarea>
								</div>
							</div>

								
							


						
							</div>


						

							
<div class="modal-footer">
						<button class="btn btn-secondary" data-dismiss="modal" type="button"> Close</button>
						<button class="btn btn-primary" type="submit"> Book Appointment </button>
					</div>




						</form>
					</div>
					
				</div>
			</div>
		</div>








		


		<!--------------------
		START - Color Scheme Toggler
		-------------------->
		
		<!--------------------
		END - Color Scheme Toggler
		-------------------->
		<!--------------------
		START - Demo Customizer
		-------------------->
		
		
		<!--------------------
		END - Demo Customizer
		-------------------->
		<!--------------------
		START - Chat Popup Box
		-------------------->

		<!--------------------
		END - Chat Popup Box
		-------------------->
	</div>
		<!--------------------
		START - Sidebar
		-------------------->
	

		<!--------------------
		START - Support Agents
		-------------------->
		

		<!--------------------
		END - Support Agents
		-------------------->
		<!--------------------
		START - Recent Activity
		-------------------->
		
		<!--------------------
		END - Recent Activity
		-------------------->
		<!--------------------
		START - Team Members
		-------------------->


		<!--------------------
		END - Team Members
		-------------------->
		</div>
		<!--------------------
		END - Sidebar
		-------------------->
		</div>
		</div>
		</div>
		<div class="display-type">
			
		</div>
		</div>
		<script src="bower_components/jquery/dist/jquery.min.js"></script>
		<script src="bower_components/popper.js/dist/umd/popper.min.js"></script>
		<script src="bower_components/moment/moment.js"></script>
		<script src="bower_components/chart.js/dist/Chart.min.js"></script>
		<script src="bower_components/select2/dist/js/select2.full.min.js"></script>
		<script src="bower_components/jquery-bar-rating/dist/jquery.barrating.min.js"></script>
		<script src="bower_components/ckeditor/ckeditor.js"></script>
		<script src="bower_components/bootstrap-validator/dist/validator.min.js"></script>
		<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
		<script src="bower_components/ion.rangeSlider/js/ion.rangeSlider.min.js"></script>
		<script src="bower_components/dropzone/dist/dropzone.js"></script>
		<script src="bower_components/editable-table/mindmup-editabletable.js"></script>
		<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
		<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
		<script src="bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
		<script src="bower_components/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js"></script>
		<script src="bower_components/tether/dist/js/tether.min.js"></script>
		<script src="bower_components/slick-carousel/slick/slick.min.js"></script>
		<script src="bower_components/bootstrap/js/dist/util.js"></script>
		<script src="bower_components/bootstrap/js/dist/alert.js"></script>
		<script src="bower_components/bootstrap/js/dist/button.js"></script>
		<script src="bower_components/bootstrap/js/dist/carousel.js"></script>
		<script src="bower_components/bootstrap/js/dist/collapse.js"></script>
		<script src="bower_components/bootstrap/js/dist/dropdown.js"></script>
		<script src="bower_components/bootstrap/js/dist/modal.js"></script>
		<script src="bower_components/bootstrap/js/dist/tab.js"></script>
		<script src="bower_components/bootstrap/js/dist/tooltip.js"></script>
		<script src="bower_components/bootstrap/js/dist/popover.js"></script>
		<script src="js/demo_customizerce5a.js?version=4.4.1"></script>
		<script src="js/maince5a.js?version=4.4.1"></script>

			<script src="tableExport/tableExport.js"></script>
<script type="text/javascript" src="tableExport/jquery.base64.js"></script>
<script src="js/export.js"></script>


           
    
		
		  <script type="text/javascript">

	$(document).ready(function(){
$("#searchText").change(onSelectChange);  
});

    	function searchFunction() {
var SearchString = $('input#searchText').val();
var selected = $('input#prodcategory').val();
var category = selected;
var rec_text =  SearchString   ;
var rec_text1 = '$mat='+ SearchString   ;
//alert(rec_text1);
document.getElementById('rec_text').value = rec_text;

var worded = SearchString.length;
//alert(SearchString);

if (worded > 0) {
var requestData = {productsearch: SearchString};
$.get('fetch_data_rec_app.php?categoryid='+category, requestData, function(data) {
$('div#products').html(data);
jaxcart();
}).fail(function(jqXHR) {
$('div#products').html('Sorry, error loading products refresh page')
.append(jqXHR.responseText);
});
}

if (worded == 0) {
var SearchString = "all";
var requestData = {productsearch: SearchString};
$.get('fetch_data_rec_app.php?categoryid='+category, requestData, function(data) {
$('div#products').html(data);
jaxcart();
}).fail(function(jqXHR) {
$('div#products').html('Sorry, error loading products refresh page')
.append(jqXHR.responseText);
});
}
}


function send(){
	var get_mat = document.getElementById('rec_text').value;
	var matta = "print_layout_appointment.php?sdate=<?php echo $sdate_1;?>&sdate1=<?php echo $sdate1_1;?>&purpose=<?php echo $purpose1;?>&doc_name=<?php echo $doctor1;?>&mat=" + get_mat;

	window.location.href = matta;


}


$("#taskModal_23_view").on('show.bs.modal', function(event){
        var button = $(event.relatedTarget);           
        var id = button.data('formid');
		//id= id +"&doc_code=";
		//var ken_id = document.getElementById('ken').value;
        //alert(id);        
        $.get('ajax_appointment_preview.php?id='+id,
            function(data) {
             $("#getta").html(data);   
                });
            });


$("#taskModal_231_view").on('show.bs.modal', function(event){
        var button = $(event.relatedTarget);           
        var id = button.data('formid');
		document.getElementById('email_sent12').value = id;
        document.getElementById('subject12').value = id;

    });


$("#taskModal_2314_view").on('show.bs.modal', function(event){
        var button = $(event.relatedTarget);           
       var id = button.data('formid');
         var earn = button.data('formval');
         var earning = button.data('formearn');
        //id= id +"&doc_code=";
        document.getElementById('email_sent4').value = id;
        document.getElementById('subject4').value = id;
      });		




$("#taskModal_232_view").on('show.bs.modal', function(event){
        var button = $(event.relatedTarget);           
       var id = button.data('formid');
         var earn = button.data('formval');
         var earning = button.data('formearn');
        //id= id +"&doc_code=";
        document.getElementById('email_sent').value = id;
        document.getElementById('subject').value = id;
      });		







    	
    	function fetch_select1(val)
{
$.ajax({
  type: 'post',
  url:'fetch_data_staff.php',
  data : {
   item_name: val
  },
  success : function(response){
  document.getElementById("ipd_to").innerHTML = response ;
 // document.getElementById("qty").focus();
    
  }
});

}

var copyBtn = document.querySelector('#copy_btn');
copyBtn.addEventListener('click', function () {
  var urlField = document.querySelector('table');
   
  // create a Range object
  var range = document.createRange();  
  // set the Node to select the "range"
  range.selectNode(urlField);
  // add the Range to the set of window selections
  window.getSelection().addRange(range);
   
  // execute 'copy', can't 'cut' in this case
  document.execCommand('copy');
}, false);

	
	
	
	
	</script>


		

</body>
	

	</html>
