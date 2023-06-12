<?php
require_once('../includes/config.php');

if(isset($_POST)){
	
	$matric_id = $_SESSION['academiamember_id'] ;

	if (isset($_FILES["imgInp"]) && !empty($_FILES["imgInp"]["name"])){
	
	$assign_file3 = $_FILES["imgInp"] ["name"];
$uploadfiles = $_FILES["imgInp"] ["tmp_name"];	
$size = filesize($_FILES["imgInp"] ["tmp_name"]);
$type = $_FILES["imgInp"] ["type"];

if ($size > 35000*1024) {
	$errormsg = urlencode("Exceeds Maximum file size limit 35MB");
	header("location:stepreg_two.php?msg=$errormsg&id=$getta_id");
	exit;
	
}

         $extension = array("jpeg","jpg","png","tiff");
		
		$file_ext = explode('.',$_FILES['imgInp']['name']);	
		$file_ext = end($file_ext);
		$file_ext = strtolower(end(explode('.',$_FILES['imgInp']['name'])));
		if(in_array($file_ext,$extension) === false){
		$errors = "extension not allowed";	
		header("location:stepreg_two.php?msg=$errors&id=$getta_id");
	    exit;

		}

if ($assign_file3){
$filename = stripslashes(strtolower($_FILES["imgInp"] ["name"]));
//$extension = getExtension($filename);
//$extension = strtolower($extension);

$genrandy = rand(1023212,8000000);
$filename = stripslashes(strtolower($_FILES["imgInp"]["name"]));
//$filename = str_replace(" ","_",$filename);
//$get_count_val = $get_count_val + 1;
//$filename = $getta_id . "photo" . $get_count_val.$extension ;
$new_file_name = $siter.$genrandy.$filename;
$path = "../student_profile/".$new_file_name;
}
}

$sqli_insert_db = mysqli_query($conn,"UPDATE student_reg SET img_pix = '$new_file_name', img_status = 'Image' WHERE  matric_no = '$matric_id'	 ");
if($sqli_insert_db){
if(move_uploaded_file($_FILES['imgInp']['tmp_name'], $path)){
	$fileloc = "$new_file_name";
	$download = 1;
	}
header("location:../index.php?msgo=Upload Successful");
exit;	
}
if(!$sqli_insert_db){
header("location:../profile_pix.php?msgv=Error In Uploading Profile Image");
exit;		
}
	
	
}



?>