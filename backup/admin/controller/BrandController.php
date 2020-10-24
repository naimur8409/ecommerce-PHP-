<?php
session_start();
include("../dbconnection/dbconnection.php");
include("../model/brand.php");
$brand = new Brand();

switch($_POST['action']){

   case "save_brand": 
   
  $brand->name = $_POST['name'];
	
  if($brand->uploadLogo($_FILES)){

    $brand->logo = $brand->uploadLogo($_FILES);
  }
  else{
    
    $_SESSION['message'] = "<div class='alert alert-danger'>Invalid File format</div>";
    header("Location:../add_brand.php");
    exit();
  }
	
	
	$brand->status = $_POST['status'];
	
	$save = $brand->save();
	
    if($save)
        	 {
        	 	$_SESSION['message'] = "<div class='alert alert-success'>Save brand successfully!</div>";
        	 }
        	 else{
        	 	$_SESSION['message'] = "<div class='alert alert-danger'>Unable to save!</div>";
        	 }

        	 header("Location:../add_brand.php");

     break;

   case "update_brand":

   $brand->name = $_POST['name'];
   $brand->status = $_POST['status'];
   $update = $brand->update($_POST['id']);

   if(!empty($_FILES['logo']['name'])){

      $brand->logo = $brand->uploadLogo($_FILES);
      $update_logo = $brand->update_logo($_POST['id']);
      @unlink("../uploads/brand/".$_POST['old_logo']);
   }
   
   if($update){
                $_SESSION['message'] = "<div class='alert alert-success'>Update brand successfully!</div>";
             }
             else{
                $_SESSION['message'] = "<div class='alert alert-danger'>Unable to Update!</div>";
             }
   header("Location:../update_brand.php?id=".$_POST['id']);
   
     break;

   case "delete_brand":
   
     $delete = $brand->delete($_POST['id']);
	 
	 if($delete)
        	 {
        	 	$_SESSION['message'] = "<div class='alert alert-success'>delete brand successfully!</div>";
        	 }
        	 else{
        	 	$_SESSION['message'] = "<div class='alert alert-danger'>Unable to delete!</div>";
        	 }

        	 header("Location:../brand_list.php");
	 
    
     break;

  default:

  header("Location:../login.php");

}





?>