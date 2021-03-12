<?php 

    error_reporting(-1); ini_set('display_errors',1);
    $details = include('config/config.php');
    include('config/config.php');

    $conn = mysqli_connect($details['host'], $details['username'], $details['password'], $details['database']);
    if($conn->connect_error) {
        die("Error connecting to: ".$conn->connect_error);
    }

    $query = "SELECT * FROM ".$details['database'].".".$details['product_table'];

    if(isset($_GET['search'])){
        $search = $_GET['search'];
        if(strpos($search," ")){
            $find = explode(" ",$search);
            $found = " LOWER(product_name) LIKE '%".strtolower($search)."%' OR ";
            foreach($find as $item){
                $found .= " LOWER(product_name) LIKE '%".strtolower($item)."%' OR ";
            }
            $found = substr($found,0,-3); 
            $query .= ' WHERE ' . $found;
        }else{
            $query .= " WHERE LOWER(product_name) like '%".strtolower($search)."%'";
        }
    }

    if(isset($_GET['pmin']) AND isset($_GET['pmax'])){
        $pmin = $_GET['pmin'];
        $pmax = $_GET['pmax'];

        if(strpos($query,'WHERE')){
            $query .= " AND ";
        }else{
            $query .= " WHERE ";
        }
        $query .= " product_price >= ".$pmin. " AND product_price <= " . $pmax ;

        if(isset($_GET['status'])){
            $status = $_GET['status'];
            $query .= " AND product_status like '%" .$status. "%'";
        }
    }

    $perpage = 15;

    $order = ' id ASC ';
    if(isset($_GET['psort'])){
        $psort = $_GET['psort'];
        if($psort == 'highest'){
            $order = ' product_price DESC ';
        }else if($psort == 'lowest'){
            $order = ' product_price ASC ';
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
    $queryCount = "SELECT count(id) as total FROM ".$details['database'].".".$details['product_table'];
    $resultCount = mysqli_query($conn,$queryCount);
    $dataCount = mysqli_fetch_assoc($resultCount); 
    $totalCount = $dataCount['total']; 
    //$totalCount = isset($_GET['search']) ? $result-> num_rows : $dataCount['total'];
     
    if(isset($result-> num_rows)){ 
        if(strpos($query,"OFFSET")){
            $totalFound = $result-> num_rows;
        }else{
            $totalFound = $totalCount;
        }

        if(strpos($query,"OFFSET 0")){
            $totalFound = $totalCount;
        }
    }else{
        $totalFound = 0;
    }

    echo '<p>Found: '.$totalFound.' Product(s)</p>
                </div>
            </div>
        </div>
    <div class="product-list">';

    if($result-> num_rows > 0){
        $rowcounter = 0;
        $limitcounter = 0;
        while($row = $result -> fetch_assoc()){
            if($rowcounter == 0){
                echo '  <div class="row">'; // row opener
            }

            $product_id = $row["product_id"];
            $product_name = $row['product_name'];//'Pure PineapplePure';
            $product_price = $row['product_price'];//'$60.00';
            $product_stock = (int)$row['product_stock'];//'11';
            $product_status = $row['product_status'];//'Available';
            $store_id = $row['store_id'];

            if(strlen($row["product_image"] )< 10){
                $img = "<img src='img/sample/no-prod-img.jpg' @>";
            }else{
                $img =  '<img src="data:image/jpeg;base64,'.base64_encode( $row["product_image"] ).'" @/>';
            }

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
                                    <li class="quick-view active"><a href="'.$url.'">Stock: '.$product_stock.'</a></li>
                                    <!-- <li class="w-icon"><a href="'.$url.'"><i class="fa fa-random"></i></a></li> -->
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name">'.$product_status.'</div>
                                <a href="'.$url.'">
                                    <h5>'.$product_name.'</h5>
                                </a>
                                <div class="product-price">
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
                            echo str_replace('#','browsefood.php?'.explode("page=",$_SERVER['QUERY_STRING'])[0].'page='.($i+1),$a); //jQuery onclick ?
                        }else{
                            echo $a;
                        }      
                    }else{
                        if($i>0){ 
                            echo str_replace('#','browsefood.php?'.explode("page=",$_SERVER['QUERY_STRING'])[0].'page='.($i+1),$a); //jQuery onclick ?
                        }else{
                            echo $a;
                        }
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