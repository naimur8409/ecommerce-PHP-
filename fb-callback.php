<?php
if(!session_id()) {
    session_start();
}
include("admin/dbconnection/dbconnection.php");
include("admin/model/customer.php");
$customer = new Customer();

require_once __DIR__ . '/vendor/autoload.php'; // change path as needed
$fb = new Facebook\Facebook([
  'app_id' => '3094553673906095',
  'app_secret' => '6244cb11cb470adf9d5857ab516c2f3c',
  'default_graph_version' => 'v2.10',
  ]);

$helper = $fb->getRedirectLoginHelper();

try {
  $accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

if (!isset($accessToken)) {
  if ($helper->getError()) {
    header('HTTP/1.0 401 Unauthorized');
    echo "Error: " . $helper->getError() . "\n";
    echo "Error Code: " . $helper->getErrorCode() . "\n";
    echo "Error Reason: " . $helper->getErrorReason() . "\n";
    echo "Error Description: " . $helper->getErrorDescription() . "\n";
  } else {
    header('HTTP/1.0 400 Bad Request');
    echo 'Bad request';
  }
  exit;
}


// The OAuth 2.0 client handler helps us manage access tokens
$oAuth2Client = $fb->getOAuth2Client();

try {
    
  // Returns a `Facebook\FacebookResponse` object
  $response = $fb->get('/me?fields=id,name,email', $accessToken->getValue());
  
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}
$user = $response->getGraphUser();
$getCustomer = $customer->getCustomerByFacebookId($user->getId(), $user->getEmail());

 if(count($getCustomer) == 0){
     
  $customer->name = $user->getName();
  $customer->email = $user->getEmail();
  $customer->phone = '';
  $customer->company = '';
  $customer->address = '';
  $customer->city = '';
  $customer->country = '';
  $customer->postcode = '';
  $customer->state = '';
  $customer->password = md5('');
  $customer->status = 1;
  $customer->news_subscribe = 1;
  $customer->facebook_id = $user->getId();
  $customer_id = $customer->save();
  
   if($customer_id){
       
        $_SESSION['_customer_id'] = $customer_id;
        $_SESSION['_customer_name'] = $user->getName();
        $_SESSION['_customer_email'] = $user->getEmail();
        $_SESSION['_customer_phone'] = '';
        $_SESSION['_customer_company'] = '';
        $_SESSION['_customer_address'] = '';
        $_SESSION['_customer_city'] = '';
        $_SESSION['_customer_country'] = '';
        $_SESSION['_customer_postcode'] = '';
   }else{
       header('Location:login.php');
   }
     
 }else{
     
        $_SESSION['_customer_id'] = $getCustomer['id'];
        $_SESSION['_customer_name'] = $getCustomer['name'];
        $_SESSION['_customer_email'] = $getCustomer['email'];
        $_SESSION['_customer_phone'] = $getCustomer['phone'];
        $_SESSION['_customer_company'] = $getCustomer['company'];
        $_SESSION['_customer_address'] = $getCustomer['address'];
        $_SESSION['_customer_city'] = $getCustomer['city'];
        $_SESSION['_customer_country'] = $getCustomer['country'];
        $_SESSION['_customer_postcode'] = $getCustomer['postcode'];
     
     
 }

header('Location:my-account.php');

?>