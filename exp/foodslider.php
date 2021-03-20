<?php 

    error_reporting(-1); ini_set('display_errors',1);
    $details = include('config/config.php');
    include('config/config.php');

    $conn = mysqli_connect($details['host'], $details['username'], $details['password'], $details['database']);
    if($conn->connect_error) {
        die("Error connecting to: ".$conn->connect_error);
    }

    $query = "SELECT * FROM ".$details['database'].".".$details['product_table'] 
            . " ORDER BY RAND() LIMIT 7 ";

    $result = $conn-> query($query);

    if (!$result) {
        print_r($query);
        var_dump($result->num_rows);
        trigger_error('Invalid query: ' . $conn->error);
    }
        
    if($result-> num_rows > 0){
        while($row = $result -> fetch_assoc()){
            $product_id = $row["product_id"];
            $product_name = $row['product_name'];//'Pure PineapplePure';
            $product_price = $row['product_price'];//'$60.00';
            $product_stock = (int)$row['product_stock'];//'11';
            $product_status = $row['product_status'];//'Available';
            $store_id = $row['store_id'];
            $store_district = $row['store_district'];
    
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
    
            if($product_status == 'Available'){
                $product_status = '<div class="available">'.$product_status.'</div>';
            }else if($product_status == 'Out of stock'){
                $product_status = '<div class="outofstock">'.$product_status.'</div>';
            }else{
                $product_status = '<div class="other">'.$product_status.'</div>';
            }
    
            $url = 'store.php?store_id='.$store_id.'&product_id='.$product_id;

            $img = str_replace('@','
                        style="
                        height: 350px!important;
                        object-fit: contain;
                        background: linear-gradient(rgba(94, 0, 49, .4),rgba(255, 154, 54,.2));"',
                        $img);
    
            $item = '  <div class="product-item">
                        <div class="pi-pic" style="box-shadow: 10px 10px 29px 0px rgba(0,0,0,0.22);
                        -webkit-box-shadow: 10px 10px 29px 0px rgba(0,0,0,0.22);
                        -moz-box-shadow: 10px 10px 29px 0px rgba(0,0,0,0.22);">
                        <a href="@">
                             '.$img.'
                             </a>
                             '.$product_status.'
                            <div class="icon">
                                <i class="icon_heart_alt"></i>
                            </div>
                            <ul>
                                <li class="w-icon quick-view"><a href="@">'.$product_stock.'</a></li>
                                <li class="w-icon active"><a href="@">'.$store_district.'</a></li>
                                <li class="w-icon"><a href="@" style="background:#25D366!important"><i class="fa fa-whatsapp"></i></a></li>
                            </ul>
                        </div>
                        <div class="pi-text">
                            <!-- <div class="catagory-name">Coat</div>-->
                            <a href="@">
                                <h5>'.$product_name.'</h5>
                            </a>
                            <div class="product-price">
                                RM '.$product_price.'
                                <!-- <span>$35.00</span> -->
                            </div>
                        </div>
                    </div>';

            echo str_replace('@',$url,$item);
       
        }//endwhile

    }else{
        echo '  <span>No product available storewide. <br>Maybe something is wrong.. contact admin!</span>';
    }
?>