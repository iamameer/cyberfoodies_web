<?php

    error_reporting(-1); ini_set('display_errors',1);
    $details = include('config/config.php');
    include('config/config.php');

    $conn = mysqli_connect($details['host'], $details['username'], $details['password'], $details['database']);
    if($conn->connect_error) {
        die("Error connecting to: ".$conn->connect_error);
    }

    $str = explode("|",htmlspecialchars($_COOKIE["q"]));
    $user_id = explode("@",$str[1])[0];
    error_reporting(-1); ini_set('display_errors',1);
    $query = "SELECT store_id, store_name, store_district, store_status, store_picture, store_picture_url 
            FROM ".$details['database'].".".$details['store_table'] .
            " WHERE user_id = '" . $user_id . "' ORDER BY store_timestamp desc, store_status, store_district";

    //print_r($query);
    $result = $conn-> query($query);

    //If store found, populate
    if(($result-> num_rows >= 0) AND ($result-> num_rows < 11)){
        $limit = false;
        //echo '<p>result found</p>';
        while($row = $result -> fetch_assoc()){
               
            $thumb = $row["store_picture_url"] ? $row["store_picture_url"] : 'img/blog/sample-shop-image-min.png';
            if(strpos($thumb,'/store/')){
                $thumb = explode("/store/",$thumb)[0] .'/store/thumb_'. explode("/store/",$thumb)[1];
            }
            $img =  '<img src="'.$thumb.'" @/>';
            // if(strlen($row["store_picture"] )< 10){
            //     $img = "<img src='img/blog/sample-shop-image-min.png' @>";
            // }else{
            //     $img =  '<img src="data:image/jpeg;base64,'.base64_encode( $row["store_picture"] ).'" @/>';
            // }

            $linkimage = '<a href="store.php?store_id='.$row['store_id'].'">' . str_replace('@','style="height: 100%; width: 100%; object-fit: cover"',$img) . '</a>';
            
            echo ' <div class="col-lg-4 col-sm-6" style="margin-top:10px">
                    <div class="blog-item" >
                        <div class="bi-pic">
                            '. $linkimage.'
                        </div>
                        <div class="bi-text">
                            <a href="store.php?store_id='.$row['store_id'].'">
                                <h4>'.$row["store_name"] .'</h4>
                            </a>
                            <p>'.$row["store_status"] .'<span>- '.$row["store_district"] .'</span></p>
                        </div>
                    </div>
                </div>';
            }//end while

    }else if($result-> num_rows >= 10){
        //else if exceed 10
        $limit = true;
    }//end if result    

    if($details['superadmin'] == $user_id){
        $limit = false;
    }

    if($limit){
        echo ' <div class="col-lg-4 col-sm-6">
            <div class="blog-item">
                <div class="bi-pic" style="width:100%!important;height:156px!important;
                overflow:hidden!important;">
                    <img src="img/blog/add-store-new.jpg" alt="" style="height: 100%; width: 100%; object-fit: cover">
                </div>
                <div class="bi-text">
                    <a href="#">
                        <h4>- Limit reached -</h4>
                    </a> 
                    <p>Maximum<span> 10 stores only!</span>!</p>
                </div>
            </div>
        </div>'; 
    }else{
        echo ' <div class="col-lg-4 col-sm-6">
        <div class="blog-item" style="background-color:#f5d9ab;">
            <div class="bi-pic" style="width:100%!important;height:156px!important;
            overflow:hidden!important;">
            <a href="addStore.php?user_id='.$user_id.'&mode=add">
                <img src="img/sample/new-store.jpg" alt="" style="height: 100%; width: 100%; object-fit: cover">
            </a>
            </div>
            <div class="bi-text">
                <a href="addStore.php?user_id='.$user_id.'&mode=add">
                    <h4>- New store -</h4>
                </a> 
                <p>Add <span>new store</span>!</p>
            </div>
        </div>
    </div>'; 
    }
    

    mysqli_close($conn);   
?>