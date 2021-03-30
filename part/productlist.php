<?php 
    error_reporting(-1); ini_set('display_errors',1);
    $details = include('config/config.php');
    include('config/config.php');

    $conn = mysqli_connect($details['host'], $details['username'], $details['password'], $details['database']);
    if($conn->connect_error) {
        die("Error connecting to: ".$conn->connect_error);
    }
    
    //$store_id
    // if(isset($_GET['store_id'])){
    //     $store_id = $_GET['store_id'];
    // }else{
    //     echo "<script type='text/javascript'>alert('Error: no store_id');
    //     window.location.replace('index.php'); 
    //     </script>";
    // }

    $query = "SELECT user_id,product_id,product_image,product_name,product_description,
                product_price,product_stock,product_status, product_image_url 
            FROM ".$details['database'].".".$details['product_table'] .
            " WHERE store_id = '" . $store_id . "'
            ORDER BY product_timestamp desc" ; // AND user_id = '" . $user_id . "'

    //print_r($query);
    $result = $conn-> query($query);
    if($result-> num_rows > 0){
        //echo '<p>result found</p>';
            while($row = $result -> fetch_assoc()){
                
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
                if(strpos($thumb,'/store/')){
                    $thumb = explode("/store/",$thumb)[0] .'/store/thumb_'. explode("/store/",$thumb)[1];
                }
                $img =  '<img src="'.$thumb.'" @/>';
                // if(strlen($row["product_image"] )< 10){
                //     $img = "<img src='img/sample/no-prod-img.jpg' >";
                // }else{
                //     $img =  '<img src="data:image/jpeg;base64,'.base64_encode( $row["product_image"] ).'"  onclick="imgTap()" />';
                // }

                //print_r($quser_id."//".$user_id);
                if($quser_id == $user_id){
                    $img = '<a href="addProduct.php?user_id='.$user_id.'&product_id='.$prod_id.'&store_id='.$store_id.'&mode=edit">'. 
                            str_replace('@','',$img)  .'</a>';
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
                $product_row = ' 
                                <div class="col-lg-4 col-sm-6" style="margin-top:10px">
                                    <div class="carde transition" style="">
                                        <h2 class="transition ch2">'.$product_name.'</h2>
                                        <center>
                                        <p class="cp"><span class="cspan">RM '.$product_price.'</span> 
                                        <br/>'.$product_desc.' 
                                        <br/>Stock: '.$product_stock.' (Status: '.$product_status.')</p>
                                        </center>
                                        <!--<div class="cta-container transition"><a href="#" class="cta">Call to action</a></div>-->
                                        <div class="card_circle transition" 
                                            style="background: url(\''.$thumb.'\') no-repeat top center;
                                            background-color:rgba(255, 91, 79,.5);
                                            background-size:contain;
                                            "></div>
                                    </div>
                                </div> ';
 
                // $product_row = ' <tr class="productrow">
                //                     <td class="cart-pic first-row">'.$img.'</td>
                //                     <td class="cart-title first-row">
                //                         <h5>'.$product_name.'</h5>
                //                         <i style="color:#613000">'.$product_desc.'</i>
                //                     </td>
                //                     <td class="p-price first-row">'.$product_price.'</td>
                //                     <td class="qua-col first-row">
                //                         <div class="quantity">
                //                             '.$product_stock.'
                //                         </div>
                //                     </td>
                //                     <td class="total-price first-row">'.$product_status.'</td>
                //                 </tr>';
            
                                
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
                //echo '<td class="close-td first-row"><i class="ti-cut"></i></td>';

            }//endwhile
    }else{
        // 0 products
        echo '<tr><td class="cart-title first-row" style="padding-left:20px!important;">Belum ada product dijual
        <br/>(No products listed, yet)</td></tr>';
    }
    mysqli_close($conn);   
?>