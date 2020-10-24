<?php
session_start();
include("../dbconnection/dbconnection.php");
include("../model/customer.php");
include("../model/order.php");
$order = new Orders();
$customer = new Customer();

switch($_POST['action']){



  case "customer_login_process":
   
   $getCustomer = $customer->getCustomerByEmail($_POST['email']);

       if(count($getCustomer) > 0 && $getCustomer['password']==md5($_POST['password'])){

        $_SESSION['_customer_id'] = $getCustomer['id'];
        $_SESSION['_customer_name'] = $getCustomer['name'];
        $_SESSION['_customer_email'] = $getCustomer['email'];
        $_SESSION['_customer_phone'] = $getCustomer['phone'];
        $_SESSION['_customer_company'] = $getCustomer['company'];
        $_SESSION['_customer_address'] = $getCustomer['address'];
        $_SESSION['_customer_city'] = $getCustomer['city'];
        $_SESSION['_customer_country'] = $getCustomer['country'];
        $_SESSION['_customer_postcode'] = $getCustomer['postcode'];
          header("Location:../../my-account.php");
       }
  


   break;
   case "save_customer": 
   
  $customer->name = $_POST['name'];
  $customer->email = $_POST['email'];
  $customer->phone = $_POST['phone'];
  $customer->company = $_POST['company'];
  $customer->address = $_POST['address'];
  $customer->city = $_POST['city'];
  $customer->country = $_POST['country'];
  $customer->postcode = $_POST['postcode'];
  $customer->state = $_POST['state'];
  $customer->password = md5($_POST['password']);
  $customer->status = 1;
  $customer->news_subscribe = $_POST['newsletter'];
  $customer->facebook_id = '';
  $customer_id = $customer->save();
	
    if($customer_id)
        	 {
             $to = $_POST['email'];
             $subject = "Registration Confirmation";
             $message ="Thank you for your registration.";
             mail($to, $subject, $message);

        	 	$_SESSION['message'] = "<div class='alert alert-success'>Thank you for your registration!!!</div>";

        	 }
        	 else{
        	 	$_SESSION['message'] = "<div class='alert alert-danger'>Unable to registration!</div>";
        	 }
        	 
        	 $sms = "Dear ".$_POST['name']." Thank you for registration!!";
            $mobile = $_SESSION['_customer_phone'];
            $send_sms = $order->sendSMS($mobile, $sms);

        	 header("Location:../../register.php");

     break;

   case "update_customer":

  $customer->name = $_POST['name'];
  $customer->email = $_POST['email'];
  $customer->phone = $_POST['phone'];
  $customer->company = $_POST['company'];
  $customer->address = $_POST['address'];
  $customer->city = $_POST['city'];
  $customer->country = $_POST['country'];
  $customer->postcode = $_POST['postcode'];
  $customer->state = $_POST['state'];
  $customer->password = md5($_POST['password']);
  $customer->status = 1;
  $customer->news_subscribe = $_POST['news_subscribe'];
  $update = $customer->update($_POST['id']);
  
    if($update)
           {
            $_SESSION['message'] = "<div class='alert alert-success'>Update Profile successfully!</div>";
           }
           else{
            $_SESSION['message'] = "<div class='alert alert-danger'>Unable to update!</div>";
           }

           header("Location:../../profile_update.php?id=".$_POST['id']);
   
     break;

   case "delete_customer":
   
     $delete = $customer->delete($_POST['id']);
	 
	 if($delete)
        	 {
        	 	$_SESSION['message'] = "<div class='alert alert-success'>Delete Customer successfully!</div>";
        	 }
        	 else{
        	 	$_SESSION['message'] = "<div class='alert alert-danger'>Unable to delete!</div>";
        	 }

        	 header("Location:../customer_list.php");
	 
    
     break;

    case "customer_forgatepassword_process":
       $email = $_POST['email'];

       $getValue = $customer->getCustomerByEmail($email);

         if(count($getValue) > 0){

            $password = rand(10000, 999999);
            $customer->id = $getValue['id'];
            $customer->password = md5($password);

           $to = $getValue['email'];
           $subject = "Forgate Password!!!";
            $message = "
            <html>
            <head>
            <title>Forgate Password</title>
            </head>
            <body>
            <p>Your password has been changed!. Please find your password and change it for security purpose.</p>
            <table>
            <tr>
            <th>Password : </th>
            <th>".$password."</th>
            </tr>
            </table>
            </body>
            </html>
            ";

            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            // More headers
            $headers .= 'From: <info@bmunionhighschool.com>' . "\r\n";
            

            mail($to,$subject,$message,$headers);


          $_SESSION['message'] = "<div class='alert alert-success'>Your password has been changed!. Please check your E-mail</div>";
         }else{


         $_SESSION['message'] = "<div class='alert alert-success'>This email address is not registred!</div>";

         }

      header("Location:../../forgate_password.php");
     break;

  default:

  header("Location:../../index.php");

}





?>