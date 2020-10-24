<?php
session_start();
include("../dbconnection/dbconnection.php");
include("../model/banner.php");
$banner = new Banner();

switch($_POST['action']){

   case "save_banner":

       $banner->name = $_POST['name'];
       $banner->url = $_POST['url'];

  if($banner->uploadLogo($_FILES)){

      $banner->logo = $banner->uploadLogo($_FILES);
  }
  else{
    
    $_SESSION['message'] = "<div class='alert alert-danger'>Invalid File format</div>";
    header("Location:../add_banner.php");
    exit();
  }


       $banner->status = $_POST['status'];
	
	$save = $banner->save();
	
    if($save)
        	 {
        	 	$_SESSION['message'] = "<div class='alert alert-success'>Save brand successfully!</div>";
        	 }
        	 else{
        	 	$_SESSION['message'] = "<div class='alert alert-danger'>Unable to save!</div>";
        	 }

        	 header("Location:../add_banner.php");

     break;

   case "update_banner":

       $banner->name = $_POST['name'];
       $banner->status = $_POST['status'];
       $banner->url = $_POST['url'];

       $upbanner = $banner->update($_POST['id']);


   if(!empty($_FILES['logo']['name'])){

       $banner->logo = $banner->uploadLogo($_FILES);
      $update_logo = $banner->update_logo($_POST['id']);
      @unlink("../uploads/mainslider/".$_POST['old_logo']);
   }
   
   if($upbanner){
                $_SESSION['message'] = "<div class='alert alert-success'>Update brand successfully!</div>";
             }
             else{
                $_SESSION['message'] = "<div class='alert alert-danger'>Unable to Update!</div>";
             }
   header("Location:../update_banner.php?id=".$_POST['id']);
   
     break;

   case "delete_banner":
   
     $delete = $banner->delete($_POST['id']);
	 
	 if($delete)
        	 {
        	 	$_SESSION['message'] = "<div class='alert alert-success'>delete brand successfully!</div>";
        	 }
        	 else{
        	 	$_SESSION['message'] = "<div class='alert alert-danger'>Unable to delete!</div>";
        	 }

        	 header("Location:../main_banner_list.php");
	 
    
     break;

  default:

  header("Location:../login.php");

}





?>