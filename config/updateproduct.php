<?php 
    error_reporting(-1); ini_set('display_errors',1);  
    $details = include('config.php');
    include('dbconn.php');

    $conn = mysqli_connect($details['host'], $details['username'], $details['password'], $details['database']);
    if($conn->connect_error) {
        die("Error connecting to: ".$conn->connect_error);
    }

    $product_id = $_GET['product_id'];
    //$user_id = $_GET['user_id'];
    $store_id = $_GET['store_id'];

    if($_GET['mode'] == 'update'){
        $product_name = $_POST['productname'];
        $product_price = $_POST['productprice'];
        $product_stock = $_POST['productstock'];
        $product_status = $_POST['productstatus'];
        $product_desc = $_POST['productdesc'];
    
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

        $sql = 'UPDATE '.$details['database'] .'.' .$details['product_table']. 
                ' SET 
                product_id = "'.$product_id.'",
                product_name = "'.$product_name.'",
                product_price = "'.$product_price.'",
                product_stock = "'.$product_stock.'",
                product_status = "'.$product_status.'",
                product_description = "'.$product_desc.'"';
       
        if($image_file != "No image"){
            $sql .= ',product_image = "'.$image_file.'"';
        }

    }else if($_GET['mode'] == 'delete'){
        $sql = 'DELETE FROM '.$details['database'] .'.' .$details['product_table'];
    }
    
    $sql .= ' WHERE product_id = "'.$product_id.'" AND store_id = "'.$store_id.'"';

    if(!$conn-> query($sql)){
        echo("Error: ".$conn->error);
        print_r($sql);
    }else{
        $str = explode("|",htmlspecialchars($_COOKIE['q'])); 
        $user_id = explode("@",$str[1])[0];
        echo "<script type='text/javascript'>
                window.location.replace('../store.php?store_id=".$store_id."&q=".$user_id."'); 
                </script>";
        // header("profile.php");
        // exit();
    }

    mysqli_close($conn);   
?>