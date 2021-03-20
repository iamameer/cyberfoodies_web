<?php  

    error_reporting(-1); ini_set('display_errors',1);
    $details = include('config/config.php');
    include('config/config.php');

    $conn = mysqli_connect($details['host'], $details['username'], $details['password'], $details['database']);
    if($conn->connect_error) {
        die("Error connecting to: ".$conn->connect_error);
    }
    
    if(isset($_GET['store_id'])){
        $store_id = $_GET['store_id'];
    }else{
        echo "<script type='text/javascript'>alert('Error: no store_id');
        window.location.replace('browsestore.php'); 
        </script>";
    } 

    $query = "SELECT store_location,store_time,store_delivery,store_order,store_info,user_id, store_map  
            FROM ".$details['database'].".".$details['store_table'] .
            " WHERE store_id = '" . $store_id ."'";

    //print_r($query);
    $result = $conn-> query($query);
    if($result-> num_rows > 0){
        //echo '<p>result found</p>';
            while($row = $result -> fetch_assoc()){
               $store_location = $row['store_location'];
               $store_time = $row['store_time'];
               $store_delivery = $row['store_delivery'];
               $store_order = $row['store_order'];
               $store_info = $row['store_info'];
               $user_id = $row['user_id'];
               $store_map = $row['store_map'];
            }

            // echo ' <tr class="productrow">
            //         <td class="dis" style="padding-left:10px;padding-right:10px;">'."aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa".'</td>
            //         <td class="dis" style="padding-left:10px;padding-right:10px;display:none;">'.$store_time.'</td>
            //         <td class="dis" style="padding-left:10px;padding-right:10px;display:none;">'.$store_delivery.'</td>
            //         <td class="dis" style="padding-left:10px;padding-right:10px;display:none;">'.$store_order.'</td>
            //         <td class="dis" id="info5" style="padding-left:10px;padding-right:10px;display:none;">'.$store_info.'</td>
            //     </tr>';

           
            echo '</tbody>
            </table>';

             echo ' <p class="dis" style="display:block;">'.str_replace('#','<br/>',$store_location).' 
                    <br/> 
                        <input type="text" id="latlong" name="latlong" value="'.$store_map.'" style="display:none" ></input> 
                        <div id="map" style="height:350px;width:auto"></div>  
                        <script src="../js/googlemapView.js"></script>
                        <script
                        src="https://maps.googleapis.com/maps/api/js?key='.$details['googleAPIKey'].'&callback=initMap&libraries=&v=weekly"
                        async ></script> 
                    </p> 
                    <p class="dis" style="display:none;">'.str_replace('#','<br/>',$store_time).'</p>
                    <p class="dis" style="display:none;">'.str_replace('#','<br/>',$store_delivery).'</p>
                    <p class="dis" style="display:none;">'.str_replace('#','<br/>',$store_order).'</p>
                    <p class="dis" style="display:none;">'.str_replace('#','<br/>',$store_info).'</p>
                    ';

            #Part closure
            echo '</div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="cart-buttons">';

            #Part share buttons 
            echo '  <!-- <a href="#" class="primary-btn continue-shop">Continue shopping</a> -->
                    <!-- ShareThis BEGIN -->
                        <div class="sharethis-inline-share-buttons"></div>
                    <!-- ShareThis END -->';

            #Part edit/add mode 
            $owner = 'no';
            if(isset($_COOKIE["q"])){
                $str = explode("|",htmlspecialchars($_COOKIE["q"]));
                $q = explode("@",$str[1])[0];
                $email = $str[1]; 
                if($user_id == $q){
                    echo '<br><br><span style="font-style: italic;">*Klik pada imej untuk edit/delete produk
                            <br>*Click on the image to edit/delete the product
                    </span>';
                    echo  '
                    <a href="addProduct.php?store_id='.$store_id.'&mode=add" 
                    class="primary-btn up-cart" style="margin-top:15px;background-color:#e7ab3c">Add product</a>

                    <a href="addStore.php?store_id='.$store_id.'&mode=edit" 
                    class="primary-btn up-cart" style="margin-top:15px;background-color:#e7e43c">Edit Store</a>
                    ';
                    
                    $owner = 'yes';
                }else{
                    $owner = 'no';
                }
            }else{
                $owner = 'no';
                $q = "";
                $email = "";
            }

            if($owner == 'no'){ 
                //REPORT STORE
                echo '<a href="#" class="primary-btn continue-shop" 
                        style="margin-top:25px"
                        onclick="report(this);return false;">Report store</a>';
 
                echo '  <div id="report" class="contact-form" style="display:none">
                            <div class="leave-comment"> 
                                Kedai tutup? Barang tak cukup? Ditipu?
                                    <br><i>( Something wrong with the store/products? )</i> <br><br>
                                <form id="reportform" action="config/newrequest.php?store_id='.$store_id.'" class="comment-form" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <input type="text" id="name" name="name" placeholder="Your name" required
                                            value="'.$q.'">
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="text" id="email" name="email" placeholder="Your email" required
                                            value="'.$email.'">
                                        </div>
                                        <div class="col-lg-6" style="padding-bottom:15px">
                                            <div class="group-input">
                                                <label for="issue">Issue: *</label>
                                                <select type="text" id="issue" name="issue" placeholder="Issue : *">
                                                    <option value = "closed">Tutup (Closed)</option>
                                                    <option value = "wrong number">Nombor telefon salah (Wrong phone number)</option>
                                                    <option value = "wrong info">Info salah (Wrong information)</option>
                                                    <option value = "product not updated">Produk tak dikemaskini (Product not updated)</option>
                                                    <option value = "misleading pic">Gambar tak berkaitan (Misleading picture)</option>
                                                    <option value = "Other">Lain (Other)</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <textarea id="message" name="message" placeholder="Your report" required></textarea>
                                            <button type="submit" class="site-btn">Send Report</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>';
            }

    }else{
        //if store not found
        echo "<script type='text/javascript'>alert('Error: no store found or wrong store id');
                window.location.replace('browsestore.php'); 
            </script>";
    }
    mysqli_close($conn);   
?>