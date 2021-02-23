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
    $query = "SELECT store_id, store_name, store_district, store_status, store_picture
            FROM ".$details['database'].".".$details['store_table'] .
            " WHERE user_id = '" . $user_id . "' ORDER BY store_timestamp desc, store_status, store_district";

    //print_r($query);
    $result = $conn-> query($query);

    //If store found, populate
    if($result-> num_rows > 0){
         
    //echo '<p>result found</p>';
        while($row = $result -> fetch_assoc()){
             
    //echo '<p>in while</p>';
    if(strlen($row["store_picture"] )< 10){
        $img = "<img src='img/blog/sample-shop-image-min.png' @>";
    }else{
        $img =  '<img src="data:image/jpeg;base64,'.base64_encode( $row["store_picture"] ).'" @/>';
    }
            echo ' <div class="col-lg-4 col-sm-6">
                <div class="blog-item" >
                    <div class="bi-pic" 
                    style="width:255px!important;height:170px!important;
                    overflow:hidden!important;">
                        '. str_replace('@','style="height: 100%; width: 100%; object-fit: cover"',$img) .'
                    </div>
                    <div class="bi-text">
                        <a href="store.php?store_id='.$row['store_id'].'&q='.$user_id.'">
                            <h4>'.$row["store_name"] .'</h4>
                        </a>
                        <p>'.$row["store_status"] .'<span>- '.$row["store_district"] .'</span></p>
                    </div>
                </div>
            </div>';
        }//end while
    }  
    
    echo ' <div class="col-lg-4 col-sm-6">
            <div class="blog-item">
                <div class="bi-pic">
                    <img src="img/blog/add-store-new.jpg" alt="">
                </div>
                <div class="bi-text">
                    <a href="addStore.php?user_id='.$user_id.'">
                        <h4>- Add store -</h4>
                    </a> 
                </div>
            </div>
        </div>'; 


?>