<?php
session_start();
include("../dbconnection/dbconnection.php");
include("../model/marks.php");
$mark = new Marks();

switch($_POST['action']){

   case "save_mark": 

       $mark->name = $_POST['name'];
       $mark->roll = $_POST['roll'];
       $mark->subject = $_POST['subject'];
       $mark->marks = $_POST['marks'];
       $status = $mark->save();
       
        if($status)
        	 {
        	 	$_SESSION['message'] = "<div class='alert alert-success'>Save Marks successfully!</div>";
        	 }
        	 else{
        	 	$_SESSION['message'] = "<div class='alert alert-danger'>Unable to save!</div>";
        	 }

        	 header("Location:../add_marks.php");

     break;

   case "update_user":

     break;

   case "delete_user":


     break;

  default:

  header("Location:../login.php");

}





?>