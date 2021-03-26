<?php 
    $details = include('config.php');
    include('dbconn.php');

    $conn = mysqli_connect($details['host'], $details['username'], $details['password'], $details['database']);
    if($conn->connect_error) {
        die("Error connecting to: ".$conn->connect_error);
    }
    error_reporting(-1); ini_set('display_errors',1);

    $product_name = $_POST['productname'];
    if(isset($_COOKIE['q'])){
        $str = explode("|",htmlspecialchars($_COOKIE['q'])); 
        $user_id = explode("@",$str[1])[0];
        $product_id = str_shuffle($user_id . rand ( 11 , 99 ).substr(str_replace(' ','',$product_name), 0, 5));
        $store_id = $_GET['store_id'];
    }else{
        $user_id = "uid";
        $product_id = "pid";
    }

    $product_price = $_POST['productprice'];
    $product_stock = $_POST['productstock'];
    $product_status = $_POST['productstatus'];

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

    $store_district = '';
    if(isset($_POST['store_district'])){
        $store_district = strtolower($_POST['store_district']);
    }

    $sql = 'INSERT IGNORE INTO '.$details['database'] .'.' .$details['product_table'].
            '(user_id, store_id,store_district,product_id,product_name, product_price, product_stock, product_status, product_image) 
            VALUES ("'.$user_id.'","'.$store_id.'","'.$store_district.'","'.$product_id.'",
                "'.$product_name.'","'.$product_price.'","'.$product_stock.'","'.$product_status.'", "'.$image_file.'")';
    //print_r($sql);
    if(!$conn-> query($sql)){
        echo("Error: ".$conn->error);
    }else{
        $sql = addslashes(trim(preg_replace('/\s+/', ' ', $sql)));
        $sqlQ = ' INSERT IGNORE INTO '.$details['database'] .'.' .$details['query_table'].
            ' (user_email,query) VALUES ("'.$str[1].'","'.$sql.'")';
        $conn->query($sqlQ); 
        echo "<script type='text/javascript'>
                window.location.replace('../store.php?store_id=".$store_id."'); 
                </script>";
        // header("profile.php");
        // exit();
    }

    mysqli_close($conn);   

?>