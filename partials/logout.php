<?php
    
    // echo '<script type="text/javascript">';
    // echo 'if(confirm("Are you sure")){';
    // echo 'location.href = `header.php`';
    // echo '}';
    // echo '</script>';

    session_start();
    
    session_unset();
    session_destroy();
    
    header("location: /completewebsite/index.php");
    exit;

    // fb_login

    // session_destroy();

    // header('location:index.php');
    // exit;

    // google_login

    include('config.php');

    $google_client->revokeToken();
    session_destroy();

    header('location: \completewebsite\index.php');
    exit;

?>