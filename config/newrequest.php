<?php
     $details = include('config.php');
     include('dbconn.php'); 
     
        error_reporting(-1); ini_set('display_errors',1);
     
     $conn = mysqli_connect($details['host'], $details['username'], $details['password'], $details['database']);
     if($conn->connect_error) {
         die("Error connecting to: ".$conn->connect_error);
     }

     if(isset($_COOKIE['q'])){
        $str = explode("|",htmlspecialchars($_COOKIE['q'])); 
        $user_id = $str[1];
    }else{
        $user_id = "uid"; 
    }

    $request_name = $_POST['name'];
    $request_email = $_POST['email'];
    $request_message = $_POST['message'];

    if(isset($_GET['store_id'])){
        $request_message = 'REPORT @ store_id '.$_GET['store_id']. ' ISSUE: '.$_POST['issue'].' \n'.$request_message;
    }

    $sql = ' INSERT IGNORE INTO '.$details['database'] .'.' .$details['request_table'].
           ' (request_name, request_email, request_comment,request_username) '.
           ' VALUES ("'.$request_name.'","'.$request_email.'","'.$request_message.'","'.$user_id.'")';

    if(!$conn-> query($sql)){
        echo("Error: ".$conn->error);
    }else{
        if(isset($_GET['store_id'])){
            echo "<script type='text/javascript'>
            alert('Report successfully sent!');
                window.location.replace('../store.php?store_id=".$_GET['store_id']."'); 
                </script>";
        }else{
            echo "<script type='text/javascript'>
            alert('Message successfully sent!');
                window.location.replace('../request.php'); 
                </script>";
        }
        
        // header("profile.php");
        // exit();
    }
    mysqli_close($conn);  

?>