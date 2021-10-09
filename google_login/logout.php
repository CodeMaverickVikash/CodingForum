<?php
session_start();
    
session_unset();
session_destroy();

header("location: /completewebsite/index.php");
exit;

include('config.php');

$google_client->revokeToken();
session_destroy();

header('location: \completewebsite\index.php');
?>