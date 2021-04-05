<?php 
     error_reporting(-1); ini_set('display_errors',1);  

     //if edit mode
     if($mode == "edit"){

        if(!isset($_GET['store_id'])){
            echo "<script type='text/javascript'>alert('Error: no store_id');
            window.location.replace('profile.php'); 
            </script>";
        }

        $details = include('config/config.php');
        include('config/dbconn.php');
    
        $conn = mysqli_connect($details['host'], $details['username'], $details['password'], $details['database']);
        if($conn->connect_error) {
            die("Error connecting to: ".$conn->connect_error);
        }

        $query = "SELECT * FROM ".$details['database'].".".$details['store_table'] .
                " WHERE store_id = '" . $store_id . "'";

        //print_r($query);
        $result = $conn-> query($query);
        if($result-> num_rows > 0){
            //echo '<p>result found</p>';
                while($row = $result -> fetch_assoc()){
                    $store_id = $row['store_id'];//'Pure PineapplePure';
                    $store_name = $row['store_name'];//'$60.00';
                    $store_status = $row['store_status'];
                    $store_category = $row['store_category'];
                    $store_location = $row['store_location'];
                    $store_district = $row['store_district'];//'11';
                    $store_time = $row['store_time'];
                    $store_delivery = $row['store_delivery'];
                    $store_order = $row['store_order'];
                    $store_phone = $row['store_phone'];
                    $store_extratext = $row['store_extratext'];
                    $store_info = $row['store_info'];
                    $store_picture = $row['store_picture'];
                    $store_picture_url = $row['store_picture_url'];
                    $store_map = $row['store_map'];
                }//end while

            echo ' <h3>Updating <b style="color:#fa9f37;">'.$store_name.'</b> details:</h3>';
            //echo '<!-- <div id="storestatus"><iframe name="dummyframe" id="dummyframe" style="display: none;" action="profile.php"></iframe> -->
            echo  '<form id="updatestore" action="config/updatestore.php?store_id='.$store_id.'&mode=update" 
                method="POST" enctype="multipart/form-data">';

            $option = array('<option id="" value = "Open">Buka (Open)</option>',
                            '<option id="" value = "Closed">Tutup (Closed)</option>',
                            '<option id="" value = "Holiday">Cuti (Holiday)</option>',
                            '<option id="" value = "Moved">Berpindah (Moved)</option>',
                            '<option id="" value = "Setting">Dalam proses (Setting up)</option>',
                            '<option id="" value = "Other">Lain (Other)</option>');

            echo '<div class="group-input">
                    <label for="storestatus">Status :</label>
                    <select type="text" id="storestatus" name="storestatus" placeholder="Status :">';
                    foreach($option as $item){
                        if(strpos($item,$store_status)){
                            $item = str_replace('id=""','selected',$item);
                        }
                        echo $item;
                    }
            echo'   </select>
                </div>';

            echo '<div class="group-input">
                    <label for="storename">Nama Kedai (Store Name) *</label>
                    <input type="text" id="storename" name="storename"  placeholder="eg: Kedai Nasi Ayam Viral"
                    onchange="checkIfEmpty()" onfocus="checkIfEmpty()" onblur="checkIfEmpty()" 
                    onclick="checkIfEmpty()"  onkeyup="checkIfEmpty()" value="'.$store_name.'">
                </div>';

            $category = array('<option id="" value = "Homecook">Homecook</option>',
                              '<option id="" value = "Restaurant">Restaurant</option>',
                              '<option id="" value = "Agent">Agent</option>',
                              '<option id="" value = "Stall">Stall</option>',
                              '<option id="" value = "Food Truck">Food Truck</option>',
                              '<option id="" value = "Pasar Malam">Pasar Malam</option>',
                              '<option id="" value = "Other">Lain (Other)</option>');
            
            echo ' <div class="group-input">
                    <label for="category">Kategori (Category)</label>
                    <select type="text" id="category" name="category" placeholder="Kategori (Category)">';
                    foreach($category as $item){
                        if(strpos($item,$store_category)){
                            $item = str_replace('id=""','selected',$item);
                        }
                        echo $item;
                    }
            echo '  </select>
                </div>';

            echo ' <div class="group-input">
                    <label for="location">Lokasi (Store Location)</label>
                    <textarea title="Use # for a newline" type="text" id="location" name="location" 
                    placeholder="eg: Tamarind Square, Persiaran Multimedia, Cyber 11&#13; (# = new line)"
                    onchange="checkIfEmpty()" onfocus="checkIfEmpty()" onblur="checkIfEmpty()" 
                    onclick="checkIfEmpty()"  onkeyup="checkIfEmpty()">'.$store_location.'</textarea>
                </div>';

            echo ' <input type="checkbox" id="checkmap" name="checkmap" value="checkmap" onchange="handleMap(this);">
            <label for="checkmap">  Set GoogleMap Location </label> 
            <span id="spanmap" style="display:none">
                <label for="map">Drag the red pin</label>
                <input type="text" id="latlong" name="latlong" value="'.$store_map.'" style="display:none"></input> 
                <div id="map" style="height:350px;width:auto"></div>
                <script src="../js/googlemapSet.js"></script>'; 
                    echo '<script
                        src="https://maps.googleapis.com/maps/api/js?key='.$details['googleAPIKey'].'&callback=initMap&libraries=&v=weekly"
                        async ></script> 
            </span><br>';

            $district = array('<option id="" value = "Cyberjaya">Cyberjaya</option>',
                              '<option id="" value = "Putrajaya">Putrajaya</option>',
                              '<option id="" value = "Dengkil">Dengkil</option>',
                              '<option id="" value = "Puchong">Puchong</option>',
                              '<option id="" value = "Other">Lain (Other)</option>');

            echo ' <div class="group-input">
                    <label for="district">Daerah (Store District)</label>
                    <select type="text" id="district" name="district" placeholder="Daerah (Store District) *">';
                    foreach($district as $item){
                        if(strpos($item,$store_district)){
                            $item = str_replace('selected=""','selected="selected"',$item);
                        }
                        echo $item;
                    }
            echo '  </select>
                </div>';

            echo '<div class="group-input">
                <label for="delivery">Maklumat Penghantaran (Delivery Information)</label>
                <textarea title="Use # for a newline" type="text" id="delivery" name="delivery"  
                placeholder="Cyberjaya (RM2) &#13;Putrajaya & Seri Kembangan (RM 4) &#13;Dengkil & Puchong (RM5)&#13; (# = new line)"
                onchange="checkIfEmpty()" onfocus="checkIfEmpty()" onblur="checkIfEmpty()" 
                onclick="checkIfEmpty()"  onkeyup="checkIfEmpty()">'.$store_delivery.'</textarea>
            </div>';

            echo '<div class="group-input">
            <label for="time">Waktu operasi (Operating Time)</label>';

            if(strpos($store_status,'~')){
                $store_statusA = explode('|',explode('~',$store_status)[1]); // isnin#08:00>18:00 
            echo  ' <br>
                    <div style="display:none;">
                        <input type="text" id="isnin" name="isnin" value="'.$store_statusA[0].'"></input> 
                        <input type="text" id="selasa" name="selasa" value="'.$store_statusA[1].'"></input> 
                        <input type="text" id="rabu" name="rabu" value="'.$store_statusA[2].'"></input> 
                        <input type="text" id="khamis" name="khamis" value="'.$store_statusA[3].'"></input> 
                        <input type="text" id="jumaat" name="jumaat" value="'.$store_statusA[4].'"></input> 
                        <input type="text" id="sabtu" name="sabtu" value="'.$store_statusA[5].'"></input> 
                        <input type="text" id="ahad" name="ahad" value="'.$store_statusA[6].'"></input> 
                    </div>';

              //print Operation time
              for($i = 0; $i <count($store_statusA);$i++){ 
                $checked = '';
                if(strpos($store_statusA[$i],'#')){
                    $s = explode('#',$store_statusA[$i]);   
                    $checked = '';
                }else{
                    $s = explode('@',$store_statusA[$i]); //08:00>18:00
                    $checked = 'checked';
                }
                $d = $s[0];
                $t = explode('>',$s[1]); //08:00 18:00
    
                echo ' <div class="toggleA">
                        <input type="checkbox" class="checkA" id="'.$d.'A" name="'.$d.'A" 
                        '.$checked.'
                        onchange="switched(this)">
                            <b class="b switchA"></b>
                            <b class="b trackA"></b> 
                            <span style="margin-left:90px;width:100%">
                                '.ucfirst($d).'
                                <input type="time" value="'.$t[0].'" step="60" class="timeclock" 
                                    style="left: 150px!important;top: -15px!important;"
                                    id="'.$d.'B" name="'.$d.'B" onchange="timechange(this)"> 
                                <input type="time" value="'.$t[1].'" step="60" class="timeclock"
                                    style="left: 310px!important;top: -15px!important;"
                                    id="'.$d.'C" name="'.$d.'C" onchange="timechange(this)">
                            </span>
                    </div>';
                if($i == (count($store_statusA)-1)){
                    echo '<br>';
                }
              }//end for
 
            }else{
                echo ' <div style="display:none;">
                            <input type="text" id="isnin" name="isnin" value="isnin#08:00>18:00"></input> 
                            <input type="text" id="selasa" name="selasa" value="selasa#08:00>18:00"></input> 
                            <input type="text" id="rabu" name="rabu" value="rabu#08:00>18:00"></input> 
                            <input type="text" id="khamis" name="khamis" value="khamis#08:00>18:00"></input> 
                            <input type="text" id="jumaat" name="jumaat" value="jumaat#08:00>18:00"></input> 
                            <input type="text" id="sabtu" name="sabtu" value="sabtu#08:00>18:00"></input> 
                            <input type="text" id="ahad" name="ahad" value="ahad#08:00>18:00"></input> 
                        </div>  ';
            }

            echo '<textarea title="Use # for a newline" type="text" id="time" name="time"  
                    placeholder="(Jika lain) eg: Setiap Hari 8am dan 4pm, last order 10pm&#13; (# = new line)">'.$store_time.'</textarea>
                </div> ';

            echo '<div class="group-input">
                    <label for="howtoorder">Cara Tempahan (How to order)</label>
                    <textarea title="Use # for a newline" type="text" id="howtoorder" name="howtoorder"  
                    placeholder="eg: Melalui whatsapp/telegram/sms/fb page&#13; (# = new line)"
                    onchange="checkIfEmpty()" onfocus="checkIfEmpty()" onblur="checkIfEmpty()" 
                    onclick="checkIfEmpty()"  onkeyup="checkIfEmpty()">'.$store_order.'</textarea>
                </div> ';

            echo ' <div class="group-input">
                    <label for="telephone">Nombor Telefon (Phone Number) </label>
                    <input type="text" id="telephone" name="telephone"  value="'.$store_phone.'"
                    placeholder="eg: 0123456789 (no dash)"
                    onchange="enablews(this);" onfocus="enablews(this);" onblur="enablews(this);" 
                    onclick="enablews(this);"  onkeyup="enablews(this);"> 
                </div> ';

            $whatsapp = ' <div id="whatsappid" style="display:none">
                    <input type="checkbox" id="whatsapp" name="whatsapp" value="whatsapp" 
                    onchange="handleChange(this);" checked="false">
                    <label for="whatsapp">  Hubungi melalui whatsapp (Contact via whatsapp) </label> 
                </div>';

            if(strlen($store_extratext)>1){
                $whatsapp = str_replace('display:none','display:block',$whatsapp);
                echo str_replace('checked="false"','checked="true"',$whatsapp);
            }else{
                echo $whatsapp;
            }

            echo '<div class="group-input" style="border: none !important;">
                    <label for="extratext"></label>
                    <textarea title="Use # for a newline" type="text" id="extratext" name="extratext" 
                    placeholder="Text whatsapp (Contol/Example): 
                    &#13; &#128525; Saya nak order sekarang! I want to order right away &#129392;!"
                     style="display:none;">'.$store_extratext.'</textarea>
                </div> ';

            echo ' <div class="group-input">
                    <label for="additional">Maklumat Tambahan (Additional Information)</label>
                    <textarea title="Use # for a newline" type="text" id="additional" 
                    name="additional" placeholder="1) Can order via App SpeedGrocer for delivery&#13;2) Beli 10 percuma 5&#13; Tiada minimum order&#13; (# = new line)"
                    >'.$store_info.'</textarea>
                </div> ';

            // if(strlen($store_picture)< 10){
            //     $img = "<img src='img/sample/no-store-img.jpg' @>";
            // }else{
            //     $img =  '<img src="data:image/jpeg;base64,'.base64_encode($store_picture).'" @/>';
            // }

            $img = '<img src="'.$store_picture_url.'" @>';

            echo str_replace('@','style="padding-bottom:15px;"',$img);

            echo ' <div class="group-input">
                    <label for="additional">Upload Gambar Kedai (Add Store Image) :</label>
                    <input type="file" id="file-upload" name="uploadedFile" accept=".jpg, .png, .gif" onchange="filesize()">
                    <!-- <input type="file" name="image[]" id="image" accept=".jpg, .png, .gif" onchange="filesize()" /> -->
                    <span id="warning" style="display:none;"></span>
                    <span>Upload gambar baru akan menggantikan gambar sekarang<br>
                    <i>Uploading new image will replace the current one</i></span>
                </div>';

            echo ' <button type="submit" id="site-btn" class="site-btn register-btn" 
                    style="opacity:.5;disabled:true;"
                    >UPDATE STORE</button>';

            echo '</form>';

            echo  ' <div style="margin-top:30px!important;"> 
                    <input type="checkbox" id="del" name="del" value="del" onchange="handleChange2(this);">
                    <label for="del"> Delete kedai ini (Delete this store) ? </label>
                ';
            echo   '<div id="delbutton" style="display:none">
                        <span>Delete kedai ini akan delete SEMUA produk di dalamnya<br>
                        <i>Deleting this store will clear ALL products inside</i></span><br>
                        <a href="config/updatestore.php?store_id='.$store_id.'&mode=delete" 
                        class="primary-btn up-cart" style="background-color:#ff401f;">Delete Store</a>
                        </div>
                    </div>';
        }

        mysqli_close($conn); 
     }else{
        //if addition mode
        $d = include('newstoreform.php');
     }//endif mode

?>