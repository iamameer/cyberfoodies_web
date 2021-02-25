<?php
     $details = include('config.php');
     include('dbconn.php');

     $conn = mysqli_connect($details['host'], $details['username'], $details['password'], $details['database']);
     if($conn->connect_error) {
         die("Error connecting to: ".$conn->connect_error);
     }
    error_reporting(-1); ini_set('display_errors',1);
    
    $store_name = $_POST['storename'];
    if(isset($_COOKIE['q'])){
        $str = explode("|",htmlspecialchars($_COOKIE['q'])); 
        $user_id = explode("@",$str[1])[0];
        $store_id = str_shuffle($user_id . rand ( 11 , 99 ).substr(str_replace(' ','',$store_name), 0, 5));
    }else{
        $user_id = "uid";
        $store_id = "sid";
    }

    $store_location = $_POST['location'];
    $store_district = $_POST['district']; 
    $store_time = $_POST['time'];
    $store_delivery = $_POST['delivery'];
    $store_order = $_POST['howtoorder'];
    $store_phone = $_POST['telephone'];
    //$whatsapp = isset($_POST['whatsapp']) ? $_POST['whatsapp'] : "";
    $store_extratext = isset($_POST['extratext']) ? $_POST['extratext'] : "";
    $store_info = $_POST['additional'];
    $store_status = $_POST['storestatus'];
    $store_category = $_POST['category'];

    if(count($_FILES["image"]["tmp_name"]) > 0){
        for($count = 0; $count < count($_FILES["image"]["tmp_name"]); $count++){
            if($_FILES["image"]["tmp_name"][$count]){
                $image_file = addslashes(file_get_contents($_FILES["image"]["tmp_name"][$count]));
                //echo $image_file;
            }else{
                $image_file = "No image";
                //echo $image_file;
            }
        }
    }

    //generate whatsapp link
    // if ($whatsapp) {
    //     $telephone = str_replace('-', '', $telephone);
    //     $telephone = str_replace(' ', '', $telephone);    
    //     $telephone = preg_replace('/[^A-Za-z0-9\-]/', '', $telephone);
    //     echo '<a href="https://wa.me/'.$telephone.'?text='.$extratext.'">Click here</a>';
    // }
 
    $sql = 'INSERT IGNORE INTO '.$details['database'] .'.' .$details['store_table'].
            '(user_id, store_id, store_name, store_location, store_district, store_delivery, 
            store_order, store_info, store_picture, store_phone, store_time, store_status, store_category) 
            VALUES ("'.$user_id.'", "'.$store_id.'","'.$store_name.'","'.$store_location.'","'.$store_district.'","'.$store_delivery.'",
             "'.$store_order.'", "'.$store_info.'", "'.$image_file.'","'.$store_phone.'","'.$store_time.'","'.$store_status.'","'.$store_category.'")';

    if(!$conn-> query($sql)){
        echo("Error: ".$conn->error);
    }else{
        echo "<script type='text/javascript'>
                window.location.replace('http://cyberfoodies.epizy.com/profile.php'); 
                </script>";
        // header("profile.php");
        // exit();
    }

    mysqli_close($conn);   
    //mysql_close($conn);   
    // $details = include('config.php');
    // include('dbconn.php');

    // if(count($_FILES["image"]["tmp_name"]) > 0){
    //     for($count = 0; $count < count($_FILES["image"]["tmp_name"]); $count++){
    //         $image_file = addslashes(file_get_contents($_FILES["image"]["tmp_name"][$count]));
    //         $query = "INSERT INTO $details[table](images) VALUES ('$image_file')";
    //         $statement = $connect->prepare($query);
    //         $statement->execute();
    //     }
    // }
    
//     echo "<script type='text/javascript'>
//     location.href = 'profile.php'; 
// </script>";

?>