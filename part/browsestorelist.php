<?php

    error_reporting(-1); ini_set('display_errors',1);
    $details = include('config/config.php');
    include('config/config.php');

    $conn = mysqli_connect($details['host'], $details['username'], $details['password'], $details['database']);
    if($conn->connect_error) {
        die("Error connecting to: ".$conn->connect_error);
    }

    $query = "SELECT * FROM ".$details['database'].".".$details['store_table'];
     
    //filter param
    if(isset($_GET['search'])){
        $search = $_GET['search'];
        $query .= " WHERE LOWER(store_name) like '%".strtolower($search)."%'";
    }

    $perpage = 15;

    $order = ' id ASC ';
    if(isset($_GET['sort'])){
        $psort = $_GET['sort'];
        if($psort == 'atoz'){
            $order = ' store_name ASC ';
        }else if($psort == 'ztoa'){
            $order = ' store_name DESC ';
        }
    }

    $query .= " ORDER BY ". $order ." LIMIT ". $perpage;

    if(isset($_GET['page'])){
        $query .= " OFFSET " . $perpage * ($_GET['page']-1); 
    }else{
        
    }

    $result = $conn-> query($query);

    if (!$result) {
        print_r($query);
        var_dump($result->num_rows);
        trigger_error('Invalid query: ' . $conn->error);
    }

    //Counters
    $queryCount = "SELECT count(id) as total FROM ".$details['database'].".".$details['store_table'];
    $resultCount = mysqli_query($conn,$queryCount);
    $dataCount = mysqli_fetch_assoc($resultCount);

    $totalCount = isset($_GET['search']) ? $result-> num_rows : $dataCount['total'];
    echo '<p>Found: '.$totalCount.' Store(s)</p>
                </div>
            </div>
         </div>
    <div class="product-list">';

    //If store found, populate
    if($result-> num_rows >= 0){
        $rowcounter = 0;
        $limitcounter = 0;
        //echo '<p>result found</p>';
        while($row = $result -> fetch_assoc()){
            if($rowcounter == 0){
                echo '  <div class="row">'; // row opener
            }
             
            $store_id = $row['store_id'];
            $store_name = $row['store_name'];
            $store_location = $row['store_location'];
            $store_district = $row['store_district'];
            $store_order = $row['store_order'];
            $store_phone = $row['store_phone'];
            $store_time = $row['store_time'];
            $store_status = $row['store_status'];
            $store_category = $row['store_category'];

            if(strlen($row["store_picture"] )< 10){
                $img = "<img src='img/blog/sample-shop-image-min.png' @>";
            }else{
                $img =  '<img src="data:image/jpeg;base64,'.base64_encode( $row["store_picture"] ).'" @/>';
            }

            $url = 'store.php?store_id='.$store_id;

            echo '  <div class="col-lg-4 col-sm-6">
                        <div class="product-item">
                            <div class="pi-pic" style="width:100%!important;height:175px!important;
                            overflow:hidden!important;"><a href="'.$url.'">
                                '.str_replace('@','style="height: 100%; width: 100%; object-fit: cover"',$img) .'
                                <!-- <div class="sale pp-sale">Sale</div> --></a>
                                <div class="icon">
                                    <!-- <i class="icon_heart_alt"></i> -->
                                    <i class="material-icons" style="color:red;">favorite</i>
                                </div>
                                <ul>
                                <!--<li class="w-icon active"><a href="'.$url.'"><i class="icon_bag_alt"></i></a></li> -->
                                    <li class="quick-view active"><a href="'.$url.'">'.$store_category.'</a></li>
                                    <!-- <li class="w-icon"><a href="'.$url.'"><i class="fa fa-random"></i></a></li> -->
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name">'.$store_status.'</div>
                                <a href="#">
                                    <h5>'.$store_district.'</h5>
                                </a>
                                <div class="product-price">
                                        '.$store_name.'
                                    <!-- <span>$35.00</span> -->
                                </div>
                            </div>
                        </div>
                    </div>'; 
                    $rowcounter++;
                    if($rowcounter == 3){
                        echo '</div> ';// row closure
                        $rowcounter = 0;
                    }
    
                    if($limitcounter >= $perpage){
                        break;
                    }    
        }//end while
        echo '</div> '; //product-list

        //<!-- PAGING: --> 
        echo '<div class="loading-more" style="padding-top: 10px">
            <!-- <i class="icon_loading"></i> -->';
            $maxpage = (int)($totalCount / $perpage) ; //15/4 = 
            $mod = fmod($totalCount, $perpage);
            if($mod != 0){
                $maxpage ++;
            }
            if ($maxpage <= 0){ 
                $maxpage = 1;
            }
            // else if ($maxpage > 10){
            //     $maxpage = 10;
            // }
            for($i = 0; $i < $maxpage; $i++){
                $a = '<a href="#" class="primary-btn"> '.($i+1).' </a>';
                if(isset($_GET['page'])){
                    if($i != ($_GET['page'] - 1)){
                        echo str_replace('#','browsefood.php?'.explode("&page=",$_SERVER['QUERY_STRING'])[0].'&page='.($i+1),$a); //jQuery onclick ?
                    }else{
                        echo $a;
                    }      
                }else{
                    if($i>0){ 
                        echo str_replace('#','browsefood.php?'.explode("&page=",$_SERVER['QUERY_STRING'])[0].'&page='.($i+1),$a); //jQuery onclick ?
                    }else{
                        echo $a;
                    }
                }
            }
                
        echo '</div>';

    }else{
        echo '</div> ';// row closure
        // 0 products
        echo '<div style="padding-left:20px!important;">No store found :c<br>';
        echo 'Try change the keyword(s)? Or start a new one!</div>';
    }//end if result    

    mysqli_close($conn);   
?>