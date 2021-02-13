<?php

    //get from post
    $username = $_POST['username'];
    $password = $_POST['password'];

    //prevent injection
    $username = stripcslashes($username);
    $password = stripcslashes($password);
    $username = mysql_real_escape_string($username);
    $password = mysql_real_escape_string($password);

    //query 
    $details = include('config.php');
    $conn = mysqli_connect($details['host'], $details['username'], $details['password'], $details['database']);

    if(!$conn) {
        die("Error connecting to: ". mysqli_connect_error());
    }

    $sql = "INSERT INTO  $details[database].$details[table] (username,password) VALUES (?,?)";
    $stmt = mysqli_prepare($sql);
    $stmt->bind_param("sss",$username,$password);
    $stmt->execute();

    echo $stmt;
    if(mysqli_query($conn, $stmt)){
        echo "inserted ";
    }else{
        echo "fail";
    }

    mysqli_close($conn);

    header("http://cyberfoodies.epizy.com/phpTest/test.php");
    exit();
?>