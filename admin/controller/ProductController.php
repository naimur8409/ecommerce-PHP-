<?php
session_start();
include("../dbconnection/dbconnection.php");
include("../model/product.php");
$product = new Product();

switch($_POST['action']){

   case "save_product": 
   
  $product->category_id = $_POST['category_id'];
  $product->brand_id = $_POST['brand_id'];
  $product->name = $_POST['name'];
  $product->sku = $_POST['sku'];
  $product->price = $_POST['price'];
  $product->quantity = $_POST['quantity'];
  $product->description = $_POST['description'];
	$product->image = $product->uploadImage($_FILES, $_POST['name']);
	$product->status = $_POST['status'];
	$product->is_feature = $_POST['is_feature'];
  $product->is_new = $_POST['is_new'];
	$product_id = $product->save();
	
    if($product_id)
        	 {
             if(count($_FILES['add_img']['name']) > 0){

              for($i=0; $i<count($_FILES['add_img']['name']); $i++){
                
              $FILES = [
                        'name'=>$_FILES['add_img']['name'][$i],
                        'tmp_name'=>$_FILES['add_img']['tmp_name'][$i]
                       ];

                $product->image_name = $product->uploadAdditionalImage($FILES, 'add_img_'.$i.'_'.time());

                 $product->id = $product_id;

                 $save_image = $product->saveAdditionalImage();


              }


             }

        	 	$_SESSION['message'] = "<div class='alert alert-success'>Save product successfully!</div>";

        	 }
        	 else{
        	 	$_SESSION['message'] = "<div class='alert alert-danger'>Unable to save!</div>";
        	 }

        	 header("Location:../add_product.php");

     break;

   case "update_product":

  $product->category_id = $_POST['category_id'];
  $product->brand_id = $_POST['brand_id'];
  $product->name = $_POST['name'];
  $product->sku = $_POST['sku'];
  $product->price = $_POST['price'];
  $product->quantity = $_POST['quantity'];
  $product->description = $_POST['description'];

  
  $product->status = $_POST['status'];
  $product->is_feature = $_POST['is_feature'];
  $product->is_new = $_POST['is_new'];
  $update = $product->update($_POST['id']);
  if(!empty($_FILES['image']['name'])){

    $product->image = $product->uploadImage($_FILES, $_POST['name']);
    $update_image = $product->updateImage($_POST['id']);
  }

    if($update)
           {
            $_SESSION['message'] = "<div class='alert alert-success'>Update product successfully!</div>";
           }
           else{
            $_SESSION['message'] = "<div class='alert alert-danger'>Unable to update!</div>";
           }

           header("Location:../update_product.php?id=".$_POST['id']);
   
     break;

   case "delete_product":
   
     $delete = $product->delete($_POST['id']);
	 
	 if($delete)
        	 {
        	 	$_SESSION['message'] = "<div class='alert alert-success'>Delete product successfully!</div>";
        	 }
        	 else{
        	 	$_SESSION['message'] = "<div class='alert alert-danger'>Unable to delete!</div>";
        	 }

        	 header("Location:../product_list.php");
	 
    
     break;

  default:

  header("Location:../login.php");

}





?>