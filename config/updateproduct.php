<?php 
    error_reporting(-1); ini_set('display_errors',1);  
    $details = include('config.php');
    include('dbconn.php');

    $conn = mysqli_connect($details['host'], $details['username'], $details['password'], $details['database']);
    if($conn->connect_error) {
        die("Error connecting to: ".$conn->connect_error);
    }

    $str = explode("|",htmlspecialchars($_COOKIE['q'])); 

    $product_id = $_GET['product_id'];
    //$user_id = $_GET['user_id'];
    $store_id = $_GET['store_id'];

    if($_GET['mode'] == 'update'){
        $product_name = $_POST['productname'];
        $product_price = $_POST['productprice'];
        $product_stock = $_POST['productstock'];
        $product_status = $_POST['productstatus'];
        $product_desc = $_POST['productdesc'];

        $sql = 'UPDATE '.$details['database'] .'.' .$details['product_table']. 
        ' SET 
        product_id = "'.$product_id.'",
        product_name = "'.$product_name.'",
        product_price = "'.$product_price.'",
        product_stock = "'.$product_stock.'",
        product_status = "'.$product_status.'",
        product_description = "'.$product_desc.'"';
    
        #img 1.0
        $image_file = 'No image';
        // if(count($_FILES["image"]["tmp_name"]) > 0){
        //     for($count = 0; $count < count($_FILES["image"]["tmp_name"]); $count++){
        //         if($_FILES["image"]["tmp_name"][$count]){
        //             $image_file = addslashes(file_get_contents($_FILES["image"]["tmp_name"][$count]));
        //             //echo $image_file;
        //         }else{
        //             $image_file = "No image";
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

            if($fileExtension == 'jpg'){
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
 
            $sql .= ',product_image_url = "'.$product_image_url.'"';
        }//end of image upload 2.0
  
    }else if($_GET['mode'] == 'delete'){
        $sql = 'DELETE FROM '.$details['database'] .'.' .$details['product_table'];
    }
    
    $sql .= ' WHERE product_id = "'.$product_id.'" AND store_id = "'.$store_id.'"';

    if(!$conn-> query($sql)){
        echo("Error: ".$conn->error);
        print_r($sql);
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