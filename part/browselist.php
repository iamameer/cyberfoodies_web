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
        $query .= " WHERE LOWER(product_name) like '%".strtolower($search)."%'";
    }

    $perpage = 4;
    $query .= " ORDER BY id ASC LIMIT ". $perpage;

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
    $queryCount = "SELECT count(id) as total FROM ".$details['database'].".".$details['product_table'];
    $resultCount = mysqli_query($conn,$queryCount);
    $dataCount = mysqli_fetch_assoc($resultCount);

    $totalCount = isset($_GET['search']) ? $result-> num_rows : $dataCount['total'];
    echo '<p>Found: '.$totalCount.' Product(s)</p>
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
            echo '  <div class="col-lg-4 col-sm-6">
                        <div class="product-item">
                            <div class="pi-pic" style="width:100%!important;height:175px!important;
                            overflow:hidden!important;">
                                '.str_replace('@','style="height: 100%; width: 100%; object-fit: cover"',$img) .'
                                <!-- <div class="sale pp-sale">Sale</div> -->
                                <div class="icon">
                                    <i class="icon_heart_alt"></i>
                                </div>
                                <ul>
                                    <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                    <li class="quick-view"><a href="#">+ Quick View</a></li>
                                    <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name">'.$product_status.'</div>
                                <a href="#">
                                    <h5>'.$product_name.'</h5>
                                </a>
                                <div class="product-price">
                                        RM '.$product_price.'
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
        }//endwhile

        echo '</div> '; //product-list

        //<!-- PAGING: --> 
        echo '<div class="loading-more" style="padding-top: 10px">
                <!-- <i class="icon_loading"></i> -->';
                $maxpage = (int)($totalCount / $perpage) ; 
                $mod = $dataCount['total'] % $perpage;
                if($mod != 0){
                    $maxpage += $mod;
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
        echo '<div style="padding-left:20px!important;">Nothing found :c<br>';
        echo 'Try change the keyword(s)? Don\'t be sad!</div>';
    }
        
    mysqli_close($conn); 
?>