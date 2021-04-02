<?php 
    error_reporting(-1); ini_set('display_errors',1);
    $details = include('config/config.php');
    include('config/config.php');

    $conn = mysqli_connect($details['host'], $details['username'], $details['password'], $details['database']);
    if($conn->connect_error) {
        die("Error connecting to: ".$conn->connect_error);
    }
    
    $query = "SELECT user_id,product_id,product_image,product_name,product_description,
                product_price,product_stock,product_status, product_image_url 
            FROM ".$details['database'].".".$details['product_table'] .
            " WHERE store_id = '" . $store_id . "' " ;  

    if(isset($_GET["product_id"])){
        $query .= " ORDER BY product_id = '".$_GET["product_id"]."' DESC, product_timestamp DESC ";
    }else{
        $query .= " ORDER BY product_timestamp DESC ";
    }

    //print_r($query);
    $rotate = '';
    $result = $conn-> query($query);
    if($result-> num_rows > 0){
        $rowcounter = 0;
        while($row = $result -> fetch_assoc()){

            // if($rowcounter == 0){
            //     echo '  <div class="row mobilerow">'; // row opener
            // }
            
            //$product_image = $row['product_image'];//"No Im";//'src="img/cart-page/product-1.jpg"' ;
            $user_id = $row['user_id'];
            $prod_id = $row["product_id"];
            $product_name = $row['product_name'];//'Pure PineapplePure';
            $product_price = $row['product_price'];//'$60.00';
            $product_stock = (int)$row['product_stock'];//'11';
            $product_status = $row['product_status'];//'Available';
            $product_desc = $row['product_description'];
            //$product_unit = $row['product_unit'];//'sebungkus';
            //<input type="text" value="'.$product_stock.'">

            $thumb = $row["product_image_url"] ? $row["product_image_url"] : 'img/sample/no-prod-img.jpg';
            list($width, $height) = getimagesize(dirname(__DIR__).'/'.$thumb);
            if($width> $height and strpos($thumb,'no-prod-img')){
                $size = 'background-size:contain'; 
            }else if($width> $height and !strpos($thumb,'no-prod-img')){
                $rotate =  '
                            background-position: bottom center;'; 
                $size = 'background-size:contain'; 
            }else if($width < $height and !strpos($thumb,'no-prod-img')){ 
                $rotate = 'background-position: center center'; 
                $size = 'background-size:cover'; 
            }

            $edit =  '';
            if($quser_id == $user_id){
                $edit = '<a class="cta" href="addProduct.php?user_id='.$user_id.'&product_id='.$prod_id.'&store_id='.$store_id.'&mode=edit">'
                        //. str_replace('@','',$img)  
                        .'Edit</a>';
            }

            //stock color 
            if($product_stock >= 5 and $product_stock < 10){
                $product_stock = '<span style="color:#fc8803!important;">'.$product_stock .'</span>';
            }else if($product_stock < 5 ){
                $product_stock = '<span style="color:red!important;">'.$product_stock .'</span>';
            }else if($product_stock >= 10 ){
                $product_stock = '<span style="color:green!important;">'.$product_stock .'</span>';
            }

            // $thumb = 'https://assets.justinmind.com/wp-content/uploads/2018/11/Lorem-Ipsum-alternatives.png';
            $product_row = '<div class="col-lg-4 col-sm-6 productlistmobile" style="margin-top:10px">
                                <div class="carde transition" style="">
                                    <h2 class="transition ch2">'.$product_name.'</h2>
                                    <center>
                                    <p class="cp"><span class="cspan">RM '.$product_price.'</span> 
                                    <br/>'.$product_desc.' 
                                    <br/>Stock: '.$product_stock.' (Status: '.$product_status.')</p>
                                    </center>
                                    '.$edit.' 
                                    <div class="card_circle transition" 
                                        style="background: url(\''.$thumb.'\') no-repeat ;
                                        background-color:rgba(255, 91, 79,.5);
                                        '.$size.'
                                        "></div>
                                </div>
                            </div> ';
        
            if(isset($_GET['product_id'])){
                $product_id = $_GET['product_id'];
            }else{
                $product_id = '';
            }
            if($prod_id == $product_id){
                $style = 'style="background: rgba(255, 175, 100,.3);margin-bottom:10px;-webkit-box-shadow: 0px 8px 30px 1px #ffb987;box-shadow: 0px 8px 30px 1px #ffb987;"';
                $product_row = str_replace('style=""',$style,$product_row);
            }  
            echo $product_row;

            // $rowcounter++;
            // if($rowcounter == 3){
            //     echo '</div> ';// row closure
            //     $rowcounter = 0;
            // } 
        }//endwhile
        
        echo '<style type="text/css">
                .row .carde:hover .card_circle { 
                    '.$rotate.' 
                    background-color: rgba(255, 60, 112, 0.193); 
                    background-size: 450px 360px;
                    border-radius: 0;
                    margin-left: 0;
                    margin-top: 0;
                    height: 450px;
                    width: 360px;
                }
            </style>';
    }else{
        // 0 products
        echo '<span style="padding-left:20px!important;">Belum ada product dijual
        <br/>(No products listed, yet)</span>';
    }
    mysqli_close($conn);   
?>