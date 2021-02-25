<?php 
     error_reporting(-1); ini_set('display_errors',1);  

     //if edit mode
     if($mode == "edit"){
        $details = include('config/config.php');
        include('config/dbconn.php');
    
        $conn = mysqli_connect($details['host'], $details['username'], $details['password'], $details['database']);
        if($conn->connect_error) {
            die("Error connecting to: ".$conn->connect_error);
        }

        mysqli_close($conn); 
     }else{
        //if addition mode
        echo ' <h3>Please fill in the details:</h3>';
        echo '<!-- <div id="storestatus"><iframe name="dummyframe" id="dummyframe" style="display: none;" action="profile.php"></iframe> -->
            <form id="addstore" action="config/newstore.php" method="POST" enctype="multipart/form-data">
            ';
        echo '<div class="group-input">
                <label for="storestatus">Status :</label>
                <select type="text" id="storestatus" name="storestatus" placeholder="Status :">
                    <option value = "Open">Buka (Open)</option>
                    <option value = "Closed">Tutup (Closed)</option>
                    <option value = "Holiday">Cuti (Holiday)</option>
                    <option value = "Moved">Berpindah (Moved)</option>
                    <option value = "Setting">Dalam proses (Setting up)</option>
                    <option value = "Other">Lain (Other)</option>
                </select>
            </div>';

        echo '<div class="group-input">
                <label for="storename">Nama Kedai (Store Name) *</label>
                <input type="text" id="storename" name="storename"  placeholder="eg: Kedai Nasi Ayam Viral"
                onchange="checkIfEmpty()" onfocus="checkIfEmpty()" onblur="checkIfEmpty()" 
                onclick="checkIfEmpty()"  onkeyup="checkIfEmpty()">
            </div>';

        echo ' <div class="group-input">
                <label for="category">Kategori (Category)</label>
                <select type="text" id="category" name="category" placeholder="Kategori (Category)">
                    <option value = "Homecook">Homecook</option>
                    <option value = "Restaurant">Restaurant</option>
                    <option value = "Agent">Agent</option>
                    <option value = "Stall">Stall</option>
                    <option value = "Food Truck">Food Truck</option>
                    <option value = "Pasar Malam">Pasar Malam</option>
                    <option value = "Other">Lain (Other)</option>
                </select>
            </div>';

        echo ' <div class="group-input">
                <label for="location">Lokasi (Store Location) *</label>
                <textarea type="text" id="location" name="location" placeholder="eg: Tamarind Square, Persiaran Multimedia, Cyber 11"
                onchange="checkIfEmpty()" onfocus="checkIfEmpty()" onblur="checkIfEmpty()" 
                onclick="checkIfEmpty()"  onkeyup="checkIfEmpty()"></textarea>
            </div>';

        echo ' <div class="group-input">
                <label for="district">Daerah (Store District) *</label>
                <select type="text" id="district" name="district" placeholder="Daerah (Store District) *">
                    <option value = "Cyberjaya">Cyberjaya</option>
                    <option value = "Putrajaya">Putrajaya</option>
                    <option value = "Dengkil">Dengkil</option>
                    <option value = "Puchong">Puchong</option>
                    <option value = "Other">Lain (Other)</option>
                </select>
            </div>';


        echo '<div class="group-input">
                <label for="time">Waktu operasi (Operating Time) *</label>
                <textarea type="text" id="time" name="time" placeholder="eg: Setiap Hari 8am dan 4pm, last order 10pm"></textarea>
            </div> ';

        echo '<div class="group-input">
                <label for="delivery">Maklumat Penghantaran (Delivery Information) *</label>
                <textarea type="text" id="delivery" name="delivery" placeholder="Cyberjaya (RM2) &#13;Putrajaya & Seri Kembangan (RM 4) &#13;Dengkil & Puchong (RM5)"
                onchange="checkIfEmpty()" onfocus="checkIfEmpty()" onblur="checkIfEmpty()" 
                onclick="checkIfEmpty()"  onkeyup="checkIfEmpty()"></textarea>
            </div>';

        echo '<div class="group-input">
                <label for="howtoorder">Cara Tempahan (How to order) *</label>
                <textarea type="text" id="howtoorder" name="howtoorder" placeholder="eg: Melalui whatsapp/telegram/sms/fb page"
                onchange="checkIfEmpty()" onfocus="checkIfEmpty()" onblur="checkIfEmpty()" 
                onclick="checkIfEmpty()"  onkeyup="checkIfEmpty()"></textarea>
            </div> ';

        echo ' <div class="group-input">
                <label for="telephone">Nombor Telefon (Phone Number) </label>
                <input type="text" id="telephone" name="telephone" placeholder="eg: 0123456789 (no dash)"
                onchange="enablews(this);" onfocus="enablews(this);" onblur="enablews(this);" 
                onclick="enablews(this);"  onkeyup="enablews(this);"></textarea>
            </div> ';

        echo ' <div id="whatsappid" style="display:none">
                <input type="checkbox" id="whatsapp" name="whatsapp" value="whatsapp" onchange="handleChange(this);">
                <label for="whatsapp">  Hubungi melalui whatsapp (Contact via whatsapp) </label> 
            </div>';

        echo '<div class="group-input">
                <label for="extratext"></label>
                <textarea type="text" id="extratext" name="extratext" placeholder="Text whatsapp (Contol/Example): 
                &#13; &#128525; Saya nak order sekarang! I want to order right away &#129392;!" style="display:none;"></textarea>
            </div> ';

        echo ' <div class="group-input">
                <label for="additional">Maklumat Tambahan (Additional Information)</label>
                <textarea type="text" id="additional" name="additional" placeholder="1) Can order via App SpeedGrocer for delivery&#13;2) Beli 10 percuma 5&#13; Tiada minimum order"></textarea>
            </div> ';

        echo ' <div class="group-input">
                <label for="additional">Upload Gambar Kedai (Add Store Image) :</label>
                <input type="file" name="image[]" id="image" accept=".jpg, .png, .gif" onchange="filesize()" /> 
                <span id="warning" style="display:none;"></span>
                <span>Hanya satu gambar kedai dibenarkan! Bukan gambar product!<br>
                <i>Only one store picture allowed! Not product\'s picture!</i></span>
            </div>';

        echo ' <button type="submit" id="site-btn" class="site-btn register-btn" 
                style="opacity:.5;disabled:true;"
                >ADD STORE</button>';

        echo '</form>';
     }//endif model

?>