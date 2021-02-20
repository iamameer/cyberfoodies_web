<?php 
    require_once 'google-api/vendor/autoload.php';

    $details = include('config.php');

    $google_client = new Google_Client();
    $google_client->setClientId($details['googleClientID']);
    $google_client->setClientSecret($details['googleClientSecret']);
    $google_client->setRedirectUri('http://localhost/fashi-master/index.php');

    $google_client->addScope('email');
    $google_client->addScope('profile');

    session_start();
?>