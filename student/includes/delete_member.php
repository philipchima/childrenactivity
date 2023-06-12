<?php
require_once('../includes/config.php');

if(!isset($_POST)){
exit;
}

if(isset($_POST)){
$id = strip_tags($_POST['id']);	

if(!get_magic_quotes_gpc()){
$id = addslashes($id);	
}
$id = mysqli_real_escape_string($conn,$id);

$sqli_delete = mysqli_query($conn,"DELETE  FROM date_reg WHERE id = '$id' LIMIT 1");
if($sqli_delete){
$msg = "Record Deleted Successfully";	
header("location:../admin/member_preview.php?msgo=$msg");
exit;
}

if(!$sqli_delete){
$msg = "Error In Deleting Record";	
header("location:../admin/member_preview.php?msg=$msg");
exit;
}


}



?>