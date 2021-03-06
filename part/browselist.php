<?php 

    error_reporting(-1); ini_set('display_errors',1);
    $details = include('config/config.php');
    include('config/config.php');

    $conn = mysqli_connect($details['host'], $details['username'], $details['password'], $details['database']);
    if($conn->connect_error) {
        die("Error connecting to: ".$conn->connect_error);
    }

    #select from 
    $query = "SELECT product_id,product_name,product_price,product_description,
                product_stock,product_status,product_image_url, store_id, store_district 
                 FROM ".$details['database'].".".$details['product_table'];

    #where product_name
    if(isset($_GET['search'])){
        $search = $_GET['search'];
        $search = preg_replace('/[^a-zA-Z0-9_ -]/s',' ',$search);
        if(strpos($search," ")){
            $find = explode(" ",$search);
            $found = " LOWER(product_name) LIKE '%".strtolower($search)."%' OR ";
            foreach($find as $item){
                $found .= " LOWER(product_name) LIKE '%".strtolower($item)."%' OR ";
            }
            $found = substr($found,0,-3); 
            $query .= ' WHERE ' . $found;
        }else{ 
            if(strlen($search)>0){ 
                $query .= " WHERE LOWER(product_name) like '%".strtolower($search)."%'";
            }else{
                $query .= " WHERE LENGTH(LOWER(product_name))>1 ";
            }
        }
    }

    #and/where pmin pmax, district, status
    if(isset($_GET['pmin']) AND isset($_GET['pmax'])){
        #price
        $pmin = $_GET['pmin'];
        $pmax = $_GET['pmax'];

        if(strpos($query,'WHERE')){
            $query .= " AND ";
        }else{
            $query .= " WHERE ";
        }
        $query .= " product_price >= ".$pmin. " AND product_price <= " . $pmax ." ";

        #district
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
                $query .= " AND store_district IN ( ".$dd. ")";
            }else{
                //$query .= " WHERE 1 ";
            }
        }

        #status
        if(isset($_GET['status'])){
            $status = strtolower($_GET['status']);
            if($status != 'any'){
                $query .= " AND product_status like '%" .$status. "%'";
            }
        }
    }
 
    #order
    $order = ' product_timestamp DESC ';
    if(isset($_GET['psort'])){
        $psort = $_GET['psort'];
        if($psort == 'highest'){
            $order = ' product_price DESC ';
        }else if($psort == 'lowest'){
            $order = ' product_price ASC ';
        }
    }

    #limit 
    $perpage = 9;
    $query .= " ORDER BY ". $order ." LIMIT ". $perpage;

    #offset
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
    $qCount = "SELECT count(id) as total FROM ".$details['database'].".".$details['product_table'];
    if(strpos($query,"WHERE")){ //if(isset($_GET['search'])){ 
        $queryCount = explode("LIMIT",$query)[0];
        $queryCount = str_replace("*","count(id) as total",$qCount) . ' WHERE ' . explode("WHERE",$queryCount)[1];
    }else{
        $queryCount = $qCount;
    } 
    
    //print_r($queryCount);
    $resultCount = mysqli_query($conn,$queryCount);
    $dataCount = mysqli_fetch_assoc($resultCount); 
    $totalCount = $dataCount['total'];  

    if(isset($result-> num_rows)){ 
        $totalFound = $result-> num_rows; 
    }else{
        $totalFound = 0;
    }
   
    //$totalCount = isset($_GET['search']) ? $result-> num_rows : $dataCount['total'];
     
    echo '<p class="found">Showing: '.$totalFound.' out of '.$totalCount.' Product(s)</p>
                </div>
            </div>
        </div>
    <div class="product-list">';

    if($result-> num_rows > 0){
        $rowcounter = 0;
        $limitcounter = 0;
        while($row = $result -> fetch_assoc()){
            if($rowcounter == 0){
                echo '  <div class="row mobilerow">'; // row opener
            }

            $product_id = $row["product_id"];
            $product_name = $row['product_name'];//'Pure PineapplePure';
            $product_price = $row['product_price'];//'$60.00';
            $product_stock = (int)$row['product_stock'];//'11';
            $product_status = $row['product_status'];//'Available';
            $store_id = $row['store_id'];

            $thumb = $row["product_image_url"] ? $row["product_image_url"] : 'img/sample/no-prod-img.jpg';
            if(strpos($thumb,'/'.$store_id.'/')){
                $thumb = explode("/".$store_id."/",$thumb)[0] .'/'.$store_id.'/thumb_'. explode("/".$store_id."/",$thumb)[1];
            }
            $img =  '<img src="'.$thumb.'" @/>';
            // if(strlen($row["product_image"] )< 10){
            //     $img = "<img src='img/sample/no-prod-img.jpg' @>";
            // }else{
            //     $img =  '<img src="data:image/jpeg;base64,'.base64_encode( $row["product_image"] ).'" @/>';
            // }

            //stock color 
            if($product_stock >= 5 and $product_stock < 10){
                $product_stock = '<span style="color:#fc8803!important;">'.$product_stock .'</span>';
            }else if($product_stock < 5 ){
                $product_stock = '<span style="color:red!important;">'.$product_stock .'</span>';
            }else if($product_stock >= 10 ){
                $product_stock = '<span style="color:green!important;">'.$product_stock .'</span>';
            }

            //<img src="img/products/product-1.jpg" alt="">
            //item iteration
            $url = 'store.php?store_id='.$store_id.'&product_id='.$product_id;
            //echo ' <a href="'.$url.'">';
            echo '  <div class="col-lg-4 col-sm-6 mobilelist">
                        <div class="product-item">
                            <div class="pi-pic"><a href="'.$url.'">
                                '.str_replace('@','',$img) .'
                                <!-- <div class="sale pp-sale">Sale</div> --></a>
                                <div class="icon">
                                    <!-- <i class="icon_heart_alt"></i> -->
                                    <i class="material-icons" style="color:red;">favorite</i>
                                </div>
                                <ul>
                                <!--<li class="w-icon active"><a href="'.$url.'"><i class="icon_bag_alt"></i></a></li> -->
                                    <li class="quick-view active"><a href="'.$url.'">Stock: '.$product_stock.'</a></li>
                                    <!-- <li class="w-icon"><a href="'.$url.'"><i class="fa fa-random"></i></a></li> -->
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name">'.$product_status.'</div>
                                <a href="'.$url.'">
                                    <h5 class="browselist">'.$product_name.'</h5>
                                </a>
                                <div class="product-price browselist">
                                        RM '.$product_price.'
                                    <!-- <span>$35.00</span> -->
                                </div>
                            </div>
                        </div>
                    </div>'; 
                //echo '</a>';
                $rowcounter++;
                if($rowcounter == 3){
                    echo '</div> ';// row closure
                    $rowcounter = 0;
                }

                if($limitcounter >= $perpage){
                    break;
                }    
        }//endwhile

        echo '</div> '; //product-list

        //<!-- PAGING: --> 
        if($totalCount>0){
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
                        echo str_replace('#','browsefood.php?'.explode($p,$_SERVER['QUERY_STRING'])[0].$p.'1',$firstpage);
                    }
                }
                for($i = 0; $i < $maxpage; $i++){
                    $a = '<a href="#" class="page-btn" id="pageNum"> '.($i+1).' </a>';
                    if(isset($_GET['page'])){
                        if($i != ($_GET['page'] - 1)){
                            $a = str_replace('#','browsefood.php?'.explode($p,$_SERVER['QUERY_STRING'])[0].$p.($i+1),$a); //jQuery onclick ?
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
                            $a = str_replace('#','browsefood.php?'.explode($p,$_SERVER['QUERY_STRING'])[0].$p.($i+1),$a); //jQuery onclick ?
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
                        echo str_replace('#','browsefood.php?'.explode($p,$_SERVER['QUERY_STRING'])[0].$p.($maxpage),$lastpage);
                    }
                }
                
            echo '</div>';
        }

    }else{
        echo '</div> ';// row closure
        // 0 products
        echo '<div style="padding-left:20px!important;">Nothing found :c<br>';
        echo 'Try change the keyword(s)? Don\'t be sad!</div>';
    }
        
    mysqli_close($conn); 
?>