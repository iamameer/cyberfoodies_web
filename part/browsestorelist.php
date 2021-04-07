<?php

    error_reporting(-1); ini_set('display_errors',1);
    $details = include('config/config.php');
    include('config/config.php');

    $conn = mysqli_connect($details['host'], $details['username'], $details['password'], $details['database']);
    if($conn->connect_error) {
        die("Error connecting to: ".$conn->connect_error);
    }

    $query = "SELECT store_id,store_name,store_location,store_district,
                store_order,store_phone,store_time,store_status,store_category,store_picture_url 
                 FROM ".$details['database'].".".$details['store_table'];
     
    //filter param
    $search = '';
    if(isset($_GET['search'])){
        $search = $_GET['search'];
        if(strpos($search," ")){
            $find = explode(" ",$search);
            $found = " LOWER(store_name) LIKE '%".strtolower($search)."%' OR ";
            foreach($find as $item){
                $found .= " LOWER(store_name) LIKE '%".strtolower($item)."%' OR ";
            }
            $found = substr($found,0,-3); 
            $query .= ' WHERE ' . $found;
        }else{
            if(strlen($search)>0){ 
                $query .= " WHERE LOWER(store_name) like '%".strtolower($search)."%'";
            }else{
                $query .= " WHERE LENGTH(LOWER(store_name))>1 ";
            }
        }
    }

    if(isset($_GET['district'])){
        $district = $_GET['district'];
        if(strlen($district)>0){
            $district = explode(" ",$district);
            $dd = "";
            foreach($district as $d){
                switch($d){
                    case "a":
                        $dd .= " 'cyberjaya' ,";
                    break;
                    case "b":
                        $dd .= " 'putrajaya' ,";
                    break;
                    case "c":
                        $dd .= " 'dengkil' ,";
                    break;
                    case "d":
                        $dd .= " 'puchong' ,";
                    break;
                    case "e":
                        $dd .= " 'other' ,";
                    break;
                    default:
                    //do nothing
                } 
            }
            $dd = substr($dd,0,-1); 
            if(strlen($dd)>0){
                $query .= " AND store_district IN ( ".$dd. ")";
            }else{
                $query .= " WHERE store_district IN ( ".$dd. ")";
            }
        }else{
            //$query .= " AND WHERE 1 ";
        }
    }

    if(isset($_GET['category'])){
        $category = $_GET['category'];
        if(strlen($category)>0 AND strtolower($category) != 'any'){
            $query .= " AND store_category IN ( '".$category. "')";
        }
    }

    $perpage = 9;

    $order = ' store_timestamp DESC ';
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

    //print_r($query);
    $result = $conn-> query($query);

    if (!$result) {
        print_r($query);
        var_dump($result->num_rows);
        trigger_error('Invalid query: ' . $conn->error);
    }

    //Counters
    $totalCount = 0;
    $totalFound = 0;
    $qCount = "SELECT count(id) as total FROM ".$details['database'].".".$details['store_table'];
    if(strpos($query,"WHERE")){ //if(isset($_GET['search'])){ 
        $queryCount = explode("LIMIT",$query)[0];
        $queryCount = str_replace("*","count(id) as total",$qCount) . ' WHERE ' . explode("WHERE",$queryCount)[1];
    }else{
        $queryCount = $qCount;
    } 

    $resultCount = mysqli_query($conn,$queryCount);
    $dataCount = mysqli_fetch_assoc($resultCount); 
    $totalCount = $dataCount['total'];  

    if(isset($result-> num_rows)){ 
        $totalFound = $result-> num_rows; 
    }else{
        $totalFound = 0;
    }
   
    //$totalCount = isset($_GET['search']) ? $result-> num_rows : $dataCount['total'];
     
    echo '<p class="found">Showing: '.$totalFound.' out of '.$totalCount.' Store(s)</p>
                </div>
            </div>
         </div>
    <div class="product-list">';

    //If store found, populate
    if($result-> num_rows > 0){
        $rowcounter = 0;
        $limitcounter = 0;
        //echo '<p>result found</p>';
        while($row = $result -> fetch_assoc()){
            if($rowcounter == 0){
                echo '  <div class="row mobilerow">'; // row opener
            }
             
            $store_id = $row['store_id'];
            $store_name = $row['store_name'];
            $store_location = $row['store_location'];
            $store_district = $row['store_district'];
            $store_order = $row['store_order'];
            $store_phone = $row['store_phone'];
            $store_time = $row['store_time']; 
            $store_category = $row['store_category'];
            $status = 'TUTUP';
            if(strpos($row['store_status'],'~')){
                $store_statusA = explode('|',explode('~',$row['store_status'])[1]); // isnin#08:00>18:00
                
                $time = new DateTime();
                $time->setTimezone(new DateTimeZone('Asia/Kuala_Lumpur')); 
                $day = $time->format('Y-m-d H:i:s');
                $today = date('w', strtotime($day)); //6
                $hh = date('H', strtotime($day)); //16 
                $mm = date('i', strtotime($day)); //01

                $d = $store_statusA[($today)];
                if(strpos($d,'#')){ 
                    $s = explode('#',$d); //08:00>18:00
                }else{ 
                    $s = explode('@',$d); //08:00>18:00
                }
                $t = explode('>',str_replace(':','',$s[1])); //0800 1800

                if((int)($hh.$mm) > (int)$t[0] and (int)($hh.$mm) < (int)$t[1]){
                    $status = 'BUKA';
                } 

                $store_status = $status;
                $statusid = $status;
            }else{
                $store_status = $row['store_status'];
                $statusid = 'BUKA';
            }
 
            $thumb = $row["store_picture_url"] ? $row["store_picture_url"] : 'img/blog/sample-shop-image-min.png';
            if(strpos($thumb,'/'.$store_id.'/')){
                $thumb = explode("/".$store_id."/",$thumb)[0] .'/'.$store_id.'/thumb_'. explode("/".$store_id."/",$thumb)[1];
            }
            $img =  '<img src="'.$thumb.'" @/>';
            // if(strlen($row["store_picture"] )< 10){
            //     $img = "<img src='img/blog/sample-shop-image-min.png' @>";
            // }else{
            //     $img =  '<img src="data:image/jpeg;base64,'.base64_encode( $row["store_picture"] ).'" @/>';
            // }

            $url = 'store.php?store_id='.$store_id;

            //status color 
            if($store_status=='BUKA'){
                $store_status = '<span style="color:green!important;">'.$store_status .'</span>';
            }else  if($store_status=='TUTUP'){
                $store_status = '<span style="color:red!important;">'.$store_status .'</span>';
            }else{
                $store_status = '<span style="color:#fc8803!important;">'.$store_status .'</span>';
            }

            echo '  <div class="col-lg-4 col-sm-6 mobilelist '.$statusid.'">
                        <div class="product-item">
                            <div class="pi-pic" style="overflow:hidden!important;"><a href="'.$url.'">
                                '.str_replace('@','',$img) .'
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
                                <a href="'.$url.'">
                                    <h5 class="browselist">'.$store_district.'</h5>
                                </a>
                                <div class="product-price browselist">
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
        if($totalCount > 0){
            echo ' <div class="pagination" style="padding-top: 10px">';
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
            if(isset($_GET['search']) or isset($_SERVER['QUERY_STRING'])){
                $p = "&page="; 
            }else{
                $p = "page=";
            }
            $firstpage = '<a href="#" class="page-btn" id="pageJump"> ❮❮ </a>';
            $lastpage = '<a href="#" class="page-btn" id="pageJump"> ❯❯ </a>'; 
            if(isset($_GET['page'])){
                if($_GET['page'] >= 5){ 
                    echo str_replace('#','browsestore.php?'.explode($p,$_SERVER['QUERY_STRING'])[0].$p.'1',$firstpage);
                }
            }
            for($i = 0; $i < $maxpage; $i++){
                $a = '<a href="#" class="page-btn" id="pageNum"> '.($i+1).' </a>';
                if(isset($_GET['page'])){
                    if($i != ($_GET['page'] - 1)){
                        $a = str_replace('#','browsestore.php?'.explode($p,$_SERVER['QUERY_STRING'])[0].$p.($i+1),$a); //jQuery onclick ?
                    }else{
                        $a = str_replace('class="page-btn"','class="page-btn active"',$a);
                    }
                    if($_GET['page'] < 5){
                        if($i >= 8){
                            break;
                        }else{
                            echo $a;
                        }
                    }else{
                        $pageStart = $_GET['page'] - 4;
                        $pageEnd = $_GET['page'] + 2;
                        if($i >= $pageStart and $i <= $pageEnd){
                            echo $a;
                        }
                    } 
                }else{
                    if($i>0){ 
                        $a = str_replace('#','browsestore.php?'.explode($p,$_SERVER['QUERY_STRING'])[0].$p.($i+1),$a); //jQuery onclick ?
                    }else{
                        $a = str_replace('class="page-btn"','class="page-btn active"',$a);
                    }  
                    if($i >= 8){
                        break;
                    }else{
                        echo $a;
                    }
                }  
            }//endfor page 
            if(isset($_GET['page'])){
                if($_GET['page'] != $maxpage){ 
                    echo str_replace('#','browsestore.php?'.explode($p,$_SERVER['QUERY_STRING'])[0].$p.($maxpage),$lastpage);
                }
            }
                
            echo '</div>';
        }

    }else{
        echo '</div> ';// row closure
        // 0 products
        echo '<div style="padding-left:20px!important;">No store found :c<br>';
        echo 'Try change the keyword(s)? Or start a new one!</div>';
    }//end if result    

    mysqli_close($conn);   
?>