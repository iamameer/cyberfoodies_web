<?php
        
    $details = include('config.php');

    $connect = new PDO("mysql:host=$details[host];dbname=$details[database]", $details['username'], $details['password']);

?>