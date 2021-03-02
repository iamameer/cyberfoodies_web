<?php 
    error_reporting(-1); ini_set('display_errors',1);  
    $details = include('config.php');
    include('dbconn.php');

    $conn = mysqli_connect($details['host'], $details['username'], $details['password'], $details['database']);
    if($conn->connect_error) {
        die("Error connecting to: ".$conn->connect_error);
    }

    $mode = $_GET['mode']; 
    $store_id = $_GET['store_id'];

    if($mode == 'update'){

        $store_name = $_POST['storename'];  
        $store_status = $_POST['storestatus'];
        $store_category = $_POST['category'];
        $store_location = $_POST['location'];
        $store_district = $_POST['district'];//'11';
        $store_time = $_POST['time'];
        $store_delivery = $_POST['delivery'];
        $store_order = $_POST['howtoorder'];
        $store_phone = $_POST['telephone'];
        $store_extratext = isset($_POST['extratext']) ? $_POST['extratext'] : "";
        $store_info = $_POST['additional'];

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
        }//end image

        $sql = 'UPDATE '.$details['database'] .'.' .$details['store_table']. 
                ' SET 
                store_name = "'.$store_name.'",
                store_status = "'.$store_status.'",
                store_category = "'.$store_category.'",
                store_location = "'.$store_location.'",
                store_district = "'.$store_district.'",
                store_time = "'.$store_time.'",
                store_delivery = "'.$store_delivery.'",
                store_order = "'.$store_order.'",
                store_phone = "'.$store_phone.'",
                store_extratext = "'.$store_extratext.'",
                store_info = "'.$store_info.'"';

        if($image_file != "No image"){
            $sql .= ',product_image = "'.$image_file.'"';
        }

    }else if($mode == 'delete'){ 
        $sql = 'DELETE FROM '.$details['database'] .'.' .$details['store_table'];
    }

    $sqlW = " WHERE store_id = '".$store_id."'";
    $sql .= $sqlW;

    if(!$conn-> query($sql)){
        echo("Error: ".$conn->error);
        print_r($sql);
    }else{
        $str = explode("|",htmlspecialchars($_COOKIE['q'])); 
        $user_id = explode("@",$str[1])[0];
        echo "<script type='text/javascript'>
                window.location.replace('../profile.php'); 
                </script>";
    }

    mysqli_close($conn);  
?>