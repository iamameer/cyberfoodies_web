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
        $temp = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $store_name));
        $store_id = str_shuffle($user_id . rand ( 11 , 99 ).substr(str_replace(' ','',$temp), 0, 5));
    }else{
        $user_id = "uid";
        $store_id = "sid";
    }

    $store_location = $_POST['location'];
    $store_district = $_POST['district']; 
    $store_time = $_POST['time'];
    $store_delivery = $_POST['delivery'];
    $store_order = $_POST['howtoorder'];
    $store_phone =  str_replace(' ', '', $_POST['telephone']);
    $store_phone =  str_replace('-', '', $store_phone);
    //$whatsapp = isset($_POST['whatsapp']) ? $_POST['whatsapp'] : "";
    $store_extratext = isset($_POST['extratext']) ? $_POST['extratext'] : "";
    $store_info = $_POST['additional'];
    $store_status = $_POST['storestatus'];
    $store_category = $_POST['category'];
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
                    $ahad.'|'.
                    $isnin .'|'.
                    $selasa .'|'.
                    $rabu .'|'.
                    $khamis .'|'.
                    $jumaat .'|'.
                    $sabtu;

    if(strpos($store_map,":")){
        $lat = explode(',',$store_map)[0];
        $long = explode(',',$store_map)[1];
        $store_map = explode(':',$lat)[1] . "," . explode(':',$long)[1]; 
        $store_map = trim($store_map);
    }
  
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
    
    $folder = '/Zpictures/'.$store_id.'/';
    $chkDir = dirname(__DIR__). $folder;
    if (!file_exists($chkDir)) {
        mkdir($chkDir, 0755, true);
    }
    //unlink('$chkDir*.txt');
    $time = new DateTime();
    $time->setTimezone(new DateTimeZone('Asia/Kuala_Lumpur'));
    $time = $time->format('Y-m-d H:i:s');
    $myfile = fopen($chkDir.str_replace('/','@',$store_name).'_'.$time.'.txt', "a");

    #img 2.0
    $store_picture_url = 'img/blog/sample-shop-image-min.png';
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

    }//end of image upload 2.0
    

    #writing part
    $sql = 'INSERT IGNORE INTO '.$details['database'] .'.' .$details['store_table'].
            '(user_id, store_id, store_name, store_location, store_district, store_delivery, 
            store_extratext, store_order, store_info, store_picture, store_picture_url,
            store_phone, store_time, 
            store_status, store_category, store_map) 
            VALUES 
            ("'.$user_id.'", "'.$store_id.'","'.$store_name.'","'.$store_location.'","'.$store_district.'","'.$store_delivery.'",
            "'.$store_extratext.'", "'.$store_order.'", "'.$store_info.'", "'.$image_file.'","'.$store_picture_url.'",
            "'.$store_phone.'","'.$store_time.'",
            "'.$store_status.'","'.$store_category.'","'.$store_map.'" )';

    if(!$conn-> query($sql)){ 
        echo("Error: ".$conn->error. ' @'.$sql);
    }else{
        $sql2 = ' INSERT INTO '.$details['database'] .'.' .$details['user_table'].
                '(user_phone) VALUES ("'.$store_phone.'") ';
        $conn->query($sql2); 
        $sql = addslashes(trim(preg_replace('/\s+/', ' ', $sql)));
            $sqlQ = ' INSERT IGNORE INTO '.$details['database'] .'.' .$details['query_table'].
                ' (user_email,query) VALUES ("'.$str[1].'","'.$sql.'")';
        $conn->query($sqlQ); 
        echo "<script type='text/javascript'>
                window.location.replace('../profile.php'); 
                </script>";
        // header("profile.php");
        // exit();
    }

    mysqli_close($conn);   

?>