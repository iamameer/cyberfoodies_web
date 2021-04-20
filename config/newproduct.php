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
        $temp = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $product_name)); 
        $store_id = $_GET['store_id'];
        $product_id = $temp.'_'.substr($store_id,0,5).rand ( 11 , 99 );//str_shuffle($user_id . rand ( 11 , 99 ).substr(str_replace(' ','',$temp), 0, 5));
    }else{
        $user_id = "uid";
        $product_id = "pid";
    }

    $product_price = $_POST['productprice'];
    $product_stock = $_POST['productstock'];
    $product_status = $_POST['productstatus'];
    $product_description = $_POST['productdesc'];

    #img 1.0
    $image_file = '';
    // if(count($_FILES["image"]["tmp_name"]) > 0){
    //     for($count = 0; $count < count($_FILES["image"]["tmp_name"]); $count++){
    //         if($_FILES["image"]["tmp_name"][$count]){
    //             $image_file = addslashes(file_get_contents($_FILES["image"]["tmp_name"][$count]));
    //             //echo $image_file;
    //         }else{
    //             $image_file = "No image";
    //             $store_picture_url = 'img/sample/no-store-img.jpg';
    //             //echo $image_file;
    //         }
    //     }
    // }
    
    #img 2.0
    $product_image_url = 'img/sample/no-prod-img.jpg';
    if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
        $fileName = $_FILES['uploadedFile']['name'];
        $fileSize = $_FILES['uploadedFile']['size'];
        $fileType = $_FILES['uploadedFile']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        $newFileName = $product_id . '.' . $fileExtension;

        $folder = '/Zpictures/'.$store_id.'/';
        $chkDir = dirname(__DIR__). $folder;
        // if (!file_exists($chkDir)) {
        //     mkdir($chkDir, 0755, true);
        // }

        $dest_path = $chkDir. $newFileName;
        if(move_uploaded_file($fileTmpPath, $dest_path)){
            $product_image_url =  $folder.$newFileName;
        }else{
            print_r(`err upload`);
            $product_image_url = 'img/sample/no-prod-img.jpg';
        } 

        #thumbnail
        $thumbnail =  $chkDir . 'thumb_' . $newFileName;
        list($width, $height) = getimagesize($dest_path);

        if($fileExtension == 'jpg' or $fileExtension == 'jpeg'){
            $image = imagecreatefromjpeg($dest_path);
        }else if($fileExtension == 'gif'){ 
            $image = imagecreatefromgif($dest_path);
        }else if($fileExtension == 'png'){ 
            $image = imagecreatefrompng($dest_path);
        }

        $resize = .4; 
        $tn = imagecreatetruecolor($width*$resize, $height*$resize);
        imagecopyresampled($tn,$image,0,0,0,0,$width*$resize,$height*$resize,$width,$height);
        imagejpeg($tn,$thumbnail,70);

    }//end of image upload 2.0

    $store_district = '';
    if(isset($_POST['store_district'])){
        $store_district = strtolower($_POST['store_district']);
    }

    $sql = 'INSERT IGNORE INTO '.$details['database'] .'.' .$details['product_table'].
            '(user_id, store_id,store_district,product_id,product_name, product_description,
            product_price, product_stock, product_status, product_image,product_image_url) 
            VALUES ("'.$user_id.'","'.$store_id.'","'.$store_district.'","'.$product_id.'",
                "'.$product_name.'", "'.$product_description.'","'.$product_price.'","'.$product_stock.'","'.$product_status.'", "'.$image_file.'","'.$product_image_url.'")';
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