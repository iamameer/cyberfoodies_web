<?php 
    $details = include('config.php');
    include('dbconn.php'); 

    error_reporting(-1); ini_set('display_errors',1);

    $conn = mysqli_connect($details['host'], $details['username'], $details['password'], $details['database']);
    if($conn->connect_error) {
        die("Error connecting to: ".$conn->connect_error);
    }

    if($_GET['mode'] == 'delete'){
        //delete mode
        $store_id = $_GET['store_id'];
        $comment_id = $_GET['comment_id'];

        $sql = 'DELETE FROM '.$details['database'] .'.' .$details['comment_table']. 
                ' WHERE store_id = "'.$store_id.'" AND comment_id = "'.$comment_id.'"';

    }else{
        //add mode 
        $store_id = $_POST['store_id'];
        $user_name = $_POST['user_name'];
        $user_email = $_POST['user_email']; 
        $comment_id = str_shuffle($store_id . rand ( 11 , 99 ).substr(str_replace(' ','',$user_name), 0, 5));
        $comment_type = $_POST['comment_type'];
        $comment_text = $_POST['comment_text'];
        $comment_reply = $_POST['comment_reply'];
        $comment_upvote = $_POST['comment_upvote'];   

        $sql = ' INSERT IGNORE INTO '.$details['database'] .'.' .$details['comment_table'].
            ' (store_id, user_id, user_email, 
                    comment_id,comment_type,
                    comment_text, comment_reply, comment_upvote) '.
            ' VALUES ("'.$store_id.'","'.$user_name.'","'.$user_email.'",
                    "'.$comment_id.'","'.$comment_type.'",
                    "'.$comment_text.'","'.$comment_reply.'","'.$comment_upvote.'")';
    }
 
    //print_r($sql);
    if(!$conn-> query($sql)){
        echo("Error: ".$conn->error);
    }else{
        echo "<script type='text/javascript'>
            //alert('Successfully added comment');
                window.location.replace('../store.php?store_id=".$store_id."'); 
                </script>";
    }

?>