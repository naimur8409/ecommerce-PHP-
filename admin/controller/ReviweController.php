<?php
session_start();

include("../dbconnection/dbconnection.php");

include ("../model/review.php");

$getReview = new Review();



switch($_POST['action']){

   case "save_review":

       $getReview->product_id = $_POST['product_id'];
       $getReview->customer_id = 0;
       $getReview->customer_name = $_POST['name'];
       $getReview->review = $_POST['review'];
       $getReview->rating = $_POST['rating'];
       $getReview->status = 0;

	   $save = $getReview->save();
	
    if($save)
        	 {
        	 	$_SESSION['message'] = "<div class='alert alert-success'>Review successfully!</div>";
        	 }
        	 else{
        	 	$_SESSION['message'] = "<div class='alert alert-danger'>Unable to save!</div>";
        	 }

        	 header("Location:../../index.php");

     break;

   case "update_review":

       $getReview->status = $_POST['status'];
       $upreview = $getReview->update($_POST['id']);



   
   if($upreview){
                $_SESSION['message'] = "<div class='alert alert-success'>Update Review successfully!</div>";
             }
             else{
                $_SESSION['message'] = "<div class='alert alert-danger'>Unable to Update!</div>";
             }
   header("Location:../update_review.php?id=".$_POST['id']);
   
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