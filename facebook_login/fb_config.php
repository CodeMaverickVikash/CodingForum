<!-- first you need to install php library or package(composer require facebook/graph-sdk) using composer -->
<!-- then create api -->
<?php

require_once 'vendor/autoload.php';
require_once 'config.php';

if (!session_id())
{
    session_start();
}

// Call Facebook API

$facebook = new \Facebook\Facebook([
  'app_id'      => $credentials[0],
  'app_secret'     => $credentials[1],
  'default_graph_version'  => 'v2.10'
]);



$facebook_output = '';

$facebook_helper = $facebook->getRedirectLoginHelper();

if(isset($_GET["code"]))
{
     if(isset($_SESSION['access_token']))
     {
      $access_token = $_SESSION['access_token'];
     }
     else
     {
      $access_token = $facebook_helper->getAccessToken();

      $_SESSION['access_token'] = $access_token;

      $facebook->setDefaultAccessToken($_SESSION['access_token']);
     }

     $_SESSION['user_id'] = '';
     $_SESSION['user_name'] = '';
     $_SESSION['user_email_address'] = '';
     $_SESSION['user_image'] = '';
     $_SESSION['loggedin'] = '';

     $graph_response = $facebook->get("/me?fields=name,email", $access_token);

     $facebook_user_info = $graph_response->getGraphUser();
    // echo '<pre>';
    // var_dump($facebook_user_info);
    // echo '</pre>';

     if(!empty($facebook_user_info['id']))
     {
      $_SESSION['user_image'] = 'http://graph.facebook.com/'.$facebook_user_info['id'].'/picture';
     }

     if(!empty($facebook_user_info['name']))
     {
      $_SESSION['user_name'] = $facebook_user_info['name'];
     }

     if(!empty($facebook_user_info['email']))
     {
      $_SESSION['username'] = $facebook_user_info['email'];
      $_SESSION['loggedin'] = true;
      
     }
 
}
else
{
 // Get login url
    $facebook_permissions = ['email']; // Optional permissions

    $facebook_login_url = $facebook_helper->getLoginUrl('http://localhost/completewebsite/index.php', $facebook_permissions);
    
    // Render Facebook login button
    // $facebook_login_url = '<div align="center"><a href="'.$facebook_login_url.'"><img src="facebook.png" /></a></div>';
}

?>