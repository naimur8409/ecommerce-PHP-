<?php
session_start();
include("../dbconnection/dbconnection.php");
include("../model/slider.php");
$slider = new Slider();

switch($_POST['action']){

   case "save_main_slider":

       $slider->name = $_POST['name'];
       $slider->url = $_POST['url'];
	
  if($slider->uploadLogo($_FILES)){

      $slider->logo = $slider->uploadLogo($_FILES);
  }
  else{
    
    $_SESSION['message'] = "<div class='alert alert-danger'>Invalid File format</div>";
    header("Location:../add_slider.php");
    exit();
  }


       $slider->status = $_POST['status'];
	
	$save = $slider->save();
	
    if($save)
        	 {
        	 	$_SESSION['message'] = "<div class='alert alert-success'>Save Slider successfully!</div>";
        	 }
        	 else{
        	 	$_SESSION['message'] = "<div class='alert alert-danger'>Unable to save!</div>";
        	 }

        	 header("Location:../add_slider.php");

     break;

   case "update_main_slider":

       $slider->name = $_POST['name'];
       $slider->status = $_POST['status'];
       $slider->url = $_POST['url'];
       $upslider = $slider->update($_POST['id']);


   if(!empty($_FILES['logo']['name'])){

       $slider->logo = $slider->uploadLogo($_FILES);
      $update_logo = $slider->update_logo($_POST['id']);
      @unlink("../uploads/mainslider/".$_POST['old_logo']);
   }
   
   if($upslider){
                $_SESSION['message'] = "<div class='alert alert-success'>Update Slider successfully!</div>";
             }
             else{
                $_SESSION['message'] = "<div class='alert alert-danger'>Unable to Update!</div>";
             }
   header("Location:../update_slider.php?id=".$_POST['id']);
   
     break;

   case "delete_main_slider":
   
     $delete = $slider->delete($_POST['id']);
	 
	 if($delete)
        	 {
        	 	$_SESSION['message'] = "<div class='alert alert-success'>delete slider successfully!</div>";
        	 }
        	 else{
        	 	$_SESSION['message'] = "<div class='alert alert-danger'>Unable to delete!</div>";
        	 }

        	 header("Location:../slider_list.php");
	 
    
     break;

  default:

  header("Location:../login.php");

}





?>