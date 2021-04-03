<?php 
    error_reporting(-1); ini_set('display_errors',1);  
    $details = include('config.php');
    include('dbconn.php');

    $conn = mysqli_connect($details['host'], $details['username'], $details['password'], $details['database']);
    if($conn->connect_error) {
        die("Error connecting to: ".$conn->connect_error);
    }

    $str = explode("|",htmlspecialchars($_COOKIE['q']));

    $mode = $_GET['mode']; 
    $store_id = $_GET['store_id'];

    $folder = '/Zpictures/'.$store_id.'/';
    $chkDir = dirname(__DIR__). $folder;
 
    $sqlW = " WHERE store_id = '".$store_id."'"; 

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
        $store_map = $_POST['latlong'];

        //operation time
        $isnin = $_POST['isnin'];
        $selasa = $_POST['selasa'];
        $rabu = $_POST['rabu'];
        $khamis = $_POST['khamis'];
        $jumaat = $_POST['jumaat'];
        $sabtu = $_POST['sabtu'];
        $ahad = $_POST['ahad'];

        $store_status = $store_status .'~'.
        $isnin .'|'.
        $selasa .'|'.
        $rabu .'|'.
        $khamis .'|'.
        $jumaat .'|'.
        $sabtu .'|'.
        $ahad;

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
                store_info = "'.$store_info.'",
                store_map = "'.$store_map.'"';

        #img 1.0
        $image_file = 'No image';
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
 
        if (!file_exists($chkDir)) {
            mkdir($chkDir, 0755, true);
        } 
        array_map('unlink', glob( "$chkDir*.txt"));
        $time = new DateTime();
        $time->setTimezone(new DateTimeZone('Asia/Kuala_Lumpur'));
        $time = $time->format('Y-m-d H:i:s');
        $myfile = fopen($chkDir.$store_name.'_'.$time.'.txt', "a");
        
        #img 2.0
        $store_picture_url = 'img/sample/no-store-img.jpg';
        if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK) {
            $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
            $fileName = $_FILES['uploadedFile']['name'];
            $fileSize = $_FILES['uploadedFile']['size'];
            $fileType = $_FILES['uploadedFile']['type'];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));

            $newFileName = $store_id . '.' . $fileExtension;
  
            $dest_path = $chkDir. $newFileName;
            if(move_uploaded_file($fileTmpPath, $dest_path)){
                $store_picture_url =  $folder.$newFileName;
            }else{
                print_r(`err upload`);
                $store_picture_url = 'img/blog/sample-shop-image-min.png';
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

            $image_file = 'has image';

            $sql .= ',store_picture_url = "'.$store_picture_url.'"';
        }//end of image upload 2.0
      
        $sql .= $sqlW;
        
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
        } 

    }else if($mode == 'delete'){ 
        $sql = 'DELETE FROM '.$details['database'] .'.' .$details['store_table'];
        $sql2 = 'DELETE FROM '.$details['database'] .'.' .$details['product_table']; 
        $sql .= $sqlW;
        $sql2 .= $sqlW;

        if(!$conn-> query($sql)){
            echo("Error: ".$conn->error);
            print_r($sql);
        }else{ 
            //rename folder to deleted
            if (file_exists($chkDir)) {
                $time = new DateTime();
                $time->setTimezone(new DateTimeZone('Asia/Kuala_Lumpur'));
                $time = $time->format('Ymd');
                rename($chkDir, substr($chkDir,0,-1).'_deleted_'.$time);
            }
            
            $sql = addslashes(trim(preg_replace('/\s+/', ' ', $sql)));
            $sqlQ = ' INSERT IGNORE INTO '.$details['database'] .'.' .$details['query_table'].
                ' (user_email,query) VALUES ("'.$str[1].'","'.$sql.'")';
            $conn->query($sqlQ); 
            if(!$conn-> query($sql2)){
                echo("Error: ".$conn->error);
                print_r($sql);
            }else{ 
                $sql2 = addslashes(trim(preg_replace('/\s+/', ' ', $sql2)));
                $sqlQ = ' INSERT IGNORE INTO '.$details['database'] .'.' .$details['query_table'].
                    ' (user_email,query) VALUES ("'.$str[1].'","'.$sql2.'")';
                $conn->query($sqlQ); 
                echo "<script type='text/javascript'>
                        window.location.replace('../profile.php'); 
                        </script>";
            } 
        }
    }
  
    mysqli_close($conn);  
?>