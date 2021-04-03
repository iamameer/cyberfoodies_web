 
 <h3>Please fill in the details:</h3>
<!-- <div id="storestatus"><iframe name="dummyframe" id="dummyframe" style="display: none;" action="profile.php"></iframe> -->
    <form id="addstore" action="config/newstore.php" method="POST" enctype="multipart/form-data">
    
        <div class="group-input">
            <label for="storestatus">Status :</label>
            <select type="text" id="storestatus" name="storestatus" placeholder="Status :">
                <option value = "Open">Buka (Open)</option>
                <option value = "Closed">Tutup (Closed)</option>
                <option value = "Holiday">Cuti (Holiday)</option>
                <option value = "Moved">Berpindah (Moved)</option>
                <option value = "Setting">Dalam proses (Setting up)</option>
                <option value = "Other">Lain (Other)</option>
            </select>
        </div>

        <div class="group-input">
            <label for="storename">Nama Kedai (Store Name) *</label>
            <input type="text" id="storename" name="storename"  placeholder="eg: Kedai Nasi Ayam Viral"
            onchange="checkIfEmpty()" onfocus="checkIfEmpty()" onblur="checkIfEmpty()" 
            onclick="checkIfEmpty()"  onkeyup="checkIfEmpty()">
        </div>

        <div class="group-input">
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
        </div>

        <div class="group-input">
            <label for="location">Lokasi (Store Location)</label>
            <textarea title="Use # for a newline" type="text" id="location" name="location" 
            placeholder="eg: Tamarind Square, Persiaran Multimedia, Cyber 11&#13; (# = new line)"
            onchange="checkIfEmpty()" onfocus="checkIfEmpty()" onblur="checkIfEmpty()" 
            onclick="checkIfEmpty()"  onkeyup="checkIfEmpty()"></textarea>
        </div>

        <input type="checkbox" id="checkmap" name="checkmap" value="checkmap" onchange="handleMap(this);">
            <label for="checkmap">  Set GoogleMap Location </label> 
            <span id="spanmap" style="display:none">
                <label for="map">Drag the red pin</label>
                <input type="text" id="latlong" name="latlong" value="" style="display:none"></input> 
                <div id="map" style="height:350px;width:auto"></div>
                <script src="../js/googlemapSet.js"></script>
                <?php $config = include('config/config.php'); 
                    echo '<script
                        src="https://maps.googleapis.com/maps/api/js?key='.$config['googleAPIKey'].'&callback=initMap&libraries=&v=weekly"
                        async ></script>'
                ?>
            </span><br>

        <div class="group-input">
            <label for="district">Daerah (Store District)</label>
            <select type="text" id="district" name="district" placeholder="Daerah (Store District) *">
                <option value = "Cyberjaya">Cyberjaya</option>
                <option value = "Putrajaya">Putrajaya</option>
                <option value = "Dengkil">Dengkil</option>
                <option value = "Puchong">Puchong</option>
                <option value = "Other">Lain (Other)</option>
            </select>
        </div>
  
        <div class="group-input">
            <label for="time">Waktu operasi (Operating Time)</label>
               <br>
            <div style="display:none;">
                <input type="text" id="isnin" name="isnin" value="isnin#08:00>18:00"></input> 
                <input type="text" id="selasa" name="selasa" value="selasa#08:00>18:00"></input> 
                <input type="text" id="rabu" name="rabu" value="rabu#08:00>18:00"></input> 
                <input type="text" id="khamis" name="khamis" value="khamis#08:00>18:00"></input> 
                <input type="text" id="jumaat" name="jumaat" value="jumaat#08:00>18:00"></input> 
                <input type="text" id="sabtu" name="sabtu" value="sabtu#08:00>18:00"></input> 
                <input type="text" id="ahad" name="ahad" value="ahad#08:00>18:00"></input> 
            </div>  
            <div class="toggleA">
                <input type="checkbox" class="checkA" id="isninA" name="isninA" onchange="switched(this)">
                    <b class="b switchA"></b>
                    <b class="b trackA"></b> 
                    <span style="margin-left:90px;width:100%">
                        Isnin 
                        <input type="time" value="08:00" step="900" class="timeclock" 
                            style="left: 150px!important;top: -15px!important;"
                            id="isninB" name="isninB" onchange="timechange(this)"> 
                        <input type="time" value="18:00" step="900" class="timeclock"
                            style="left: 310px!important;top: -15px!important;"
                            id="isninC" name="isninC" onchange="timechange(this)">
                    </span>
            </div> 
            <br>
            <div class="toggleA">
                <input type="checkbox" class="checkA" id="selasaA" name="selasaA" onchange="switched(this)">
                    <b class="b switchA"></b>
                    <b class="b trackA"></b> 
                    <span style="margin-left:90px;margin-bottom:10px;width:100%">
                        Selasa 
                        <input type="time" value="08:00" step="900" class="timeclock" 
                            style="left: 150px!important;top: -15px!important;"
                            id="selasaB" name="selasaB" onchange="timechange(this)">
                        <input type="time" value="18:00" step="900" class="timeclock"
                            style="left: 310px!important;top: -15px!important;"
                            id="selasaC" name="selasaC" onchange="timechange(this)">
                    </span>
            </div> 
            <br>
            <div class="toggleA">
                <input type="checkbox" class="checkA" id="rabuA" name="rabuA" onchange="switched(this)">
                    <b class="b switchA"></b>
                    <b class="b trackA"></b> 
                    <span style="margin-left:90px;margin-bottom:10px;width:100%">
                        Rabu 
                        <input type="time" value="08:00" step="900" class="timeclock" 
                            style="left: 150px!important;top: -15px!important;"
                            id="rabuB" name="rabuB" onchange="timechange(this)"> 
                        <input type="time" value="18:00" step="900" class="timeclock"
                            style="left: 310px!important;top: -15px!important;"
                            id="rabuC" name="rabuC" onchange="timechange(this)">
                    </span>
            </div> 
            <br>
            <div class="toggleA">
                <input type="checkbox" class="checkA" id="khamisA" name="khamisA" onchange="switched(this)">
                    <b class="b switchA"></b>
                    <b class="b trackA"></b> 
                    <span style="margin-left:90px;margin-bottom:10px;width:100%">
                        Khamis 
                        <input type="time" value="08:00" step="900" class="timeclock" 
                            style="left: 150px!important;top: -15px!important;"
                            id="khamisB" name="khamisB" onchange="timechange(this)"> 
                        <input type="time" value="18:00" step="900" class="timeclock"
                            style="left: 310px!important;top: -15px!important;"
                            id="khamisC" name="khamisC" onchange="timechange(this)">
                    </span>
            </div> 
            <br>
            <div class="toggleA">
                <input type="checkbox" class="checkA" id="jumaatA" name="jumaatA" onchange="switched(this)">
                    <b class="b switchA"></b>
                    <b class="b trackA"></b> 
                    <span style="margin-left:90px;margin-bottom:10px;width:100%">
                        Jumaat 
                        <input type="time" value="08:00" step="900" class="timeclock" 
                            style="left: 150px!important;top: -15px!important;"
                            id="jumaatB" name="jumaatB" onchange="timechange(this)">
                        <input type="time" value="18:00" step="900" class="timeclock"
                            style="left: 310px!important;top: -15px!important;"
                            id="jumaatC" name="jumaatC" onchange="timechange(this)">
                    </span>
            </div> 
            <br>
            <div class="toggleA">
                <input type="checkbox" class="checkA" id="sabtuA" name="sabtuA" onchange="switched(this)">
                    <b class="b switchA"></b>
                    <b class="b trackA"></b> 
                    <span style="margin-left:90px;margin-bottom:10px;width:100%">
                        Sabtu 
                        <input type="time" value="08:00" step="900" class="timeclock" 
                            style="left: 150px!important;top: -15px!important;"
                            id="sabtuB" name="sabtuB" onchange="timechange(this)"> 
                        <input type="time" value="18:00" step="900" class="timeclock"
                            style="left: 310px!important;top: -15px!important;"
                            id="sabtuC" name="sabtuC" onchange="timechange(this)">
                    </span>
            </div> 
            <br>
            <div class="toggleA">
                <input type="checkbox" class="checkA" id="ahadA" name="ahadA" onchange="switched(this)">
                    <b class="b switchA"></b>
                    <b class="b trackA"></b> 
                    <span style="margin-left:90px;margin-bottom:10px;width:100%">
                        Ahad 
                        <input type="time" value="08:00" step="900" class="timeclock" 
                            style="left: 150px!important;top: -15px!important;"
                            id="ahadB" name="ahadB" onchange="timechange(this)">
                        <input type="time" value="18:00" step="900" class="timeclock"
                            style="left: 310px!important;top: -15px!important;"
                            id="ahadC" name="ahadC" onchange="timechange(this)">
                    </span>
            </div> 
          
            <textarea title="Use # for a newline" type="text" id="time" name="time" 
            placeholder="(Jika lain) eg: Setiap Hari 8am dan 4pm, last order 10pm &#13; (# = new line)"></textarea>
        </div> 

        <div class="group-input">
            <label for="delivery">Maklumat Penghantaran (Delivery Information)</label>
            <textarea title="Use # for a newline" type="text" id="delivery" name="delivery" 
            placeholder="Cyberjaya (RM2) &#13;Putrajaya & Seri Kembangan (RM 4) &#13;Dengkil & Puchong (RM5)&#13; (# = new line)"
            onchange="checkIfEmpty()" onfocus="checkIfEmpty()" onblur="checkIfEmpty()" 
            onclick="checkIfEmpty()"  onkeyup="checkIfEmpty()"></textarea>
        </div>

        <div class="group-input">
            <label for="howtoorder">Cara Tempahan (How to order)</label>
            <textarea title="Use # for a newline" type="text" id="howtoorder" name="howtoorder" 
            placeholder="eg: Melalui whatsapp/telegram/sms/fb page&#13; (# = new line)"
            onchange="checkIfEmpty()" onfocus="checkIfEmpty()" onblur="checkIfEmpty()" 
            onclick="checkIfEmpty()"  onkeyup="checkIfEmpty()"></textarea>
        </div> 

        <div class="group-input">
            <label for="telephone">Nombor Telefon (Phone Number) </label>
            <input type="text" id="telephone" name="telephone" placeholder="eg: 0123456789 (no dash)"
            onchange="enablews(this);" onfocus="enablews(this);" onblur="enablews(this);" 
            onclick="enablews(this);"  onkeyup="enablews(this);">
        </div> 

        <div id="whatsappid" style="display:none">
            <input type="checkbox" id="whatsapp" name="whatsapp" value="whatsapp" onchange="handleChange(this);">
            <label for="whatsapp">  Hubungi melalui whatsapp (Contact via whatsapp) </label> 
        </div>

        <div class="group-input">
            <label for="extratext"></label>
            <textarea title="Use # for a newline" type="text" id="extratext" name="extratext" placeholder="Text whatsapp (Contol/Example): 
            &#13; &#128525; Saya nak order sekarang! I want to order right away &#129392;!" style="display:none;"></textarea>
        </div> 

        <div class="group-input">
            <label for="additional">Maklumat Tambahan (Additional Information)</label>
            <textarea title="Use # for a newline" type="text" id="additional" name="additional" 
            placeholder="1) Can order via App SpeedGrocer for delivery&#13;2) Beli 10 percuma 5&#13; Tiada minimum order&#13; (# = new line)"></textarea>
        </div> 

        <div class="group-input">
            <label for="additional">Upload Gambar Kedai (Add Store Image) :</label>
            <input type="file" id="file-upload" name="uploadedFile" accept=".jpg, .jpeg, .png, .gif" onchange="filesize()">
            <!-- <input type="file" name="image[]" id="image" accept=".jpg, .png, .gif" onchange="filesize()" />  -->
            <span id="warning" style="display:none;"></span>
            <span>Hanya satu gambar kedai dibenarkan! Bukan gambar product!<br>
            <i>Only one store picture allowed! Not product's picture!</i></span>
        </div>

        <button type="submit" id="site-btn" class="site-btn register-btn" 
        style="opacity:.5;disabled:true;">ADD STORE</button>

</form>