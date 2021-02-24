<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <?php
        $details = include('config/config.php');
        echo '<meta name="google-signin-client_id" content="'.$details['googleClientID'].'">';
        include('part/title.php');
    ?>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/styleExtra.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">

</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="header-top">
            <?php include('part/topmost.php') ?>
        </div>
        <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo">
                            <a href="./index.html">
                                <img src="img/logo.png" alt="">
                            </a>
                        </div>    
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <div class="advanced-search" style="border: none!important;">
                          <!-- <button type="button" class="category-btn"></button>
                            <div class="input-group">
                                <input type="text" placeholder="What do you need?">
                                <button type="button" ><i class="ti-search"></i></button>
                            </div> -->
                            <div class="search">
                                <input type="text" class="searchTerm" placeholder="What are you looking for?">
                                <button type="submit" class="searchButton">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 text-right col-md-3">
                     
                    </div>
                </div>
            </div>
        </div>
        <div class="nav-item">
            <div class="container">
                <div class="nav-depart">
                    
                </div>
                <nav class="nav-menu mobile-menu">
                    <ul>
                    <?php 
                    include('part/nav.php'); 
                            if(!isset($_COOKIE["q"])){
                                echo '<div class="g-signin2" data-onsuccess="onSignIn"></div>';
                                echo "<script type='text/javascript'>alert('Please login first!');
                                    window.location.replace('index.php');</script>";
                            }else{
                                $str = explode("|",htmlspecialchars($_COOKIE["q"]));
                                $user_id = explode("@",$str[1])[0];
                                if($user_id == $_GET['q']){
                                    echo '<script type="text/javascript">
                                            document.getElementById("profile").classList.add("active");
                                        </script>';
                                }
                            }
                        ?>
                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i> Home</a>
                        <span>Add Store</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Form Section Begin -->

    <!-- Register Section Begin -->
    <div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <style type="text/css">
                        textarea {
                            width: 100%;
                            resize: none;
                            font-size: 16px;
                            color: #636363;
                            height: 116px;
                            border: 1px solid #ebebeb;
                            border-radius: 5px;
                            padding-left: 20px;
                            padding-top: 0px;
                            margin-bottom: -10px;
                        }
                    </style>
                    <div class="register-form">
 
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
                                <label for="location">Lokasi (Store Location) *</label>
                                <textarea type="text" id="location" name="location" placeholder="eg: Tamarind Square, Persiaran Multimedia, Cyber 11"
                                onchange="checkIfEmpty()" onfocus="checkIfEmpty()" onblur="checkIfEmpty()" 
                                onclick="checkIfEmpty()"  onkeyup="checkIfEmpty()"></textarea>
                            </div>
                            <div class="group-input">
                                <label for="district">Daerah (Store District) *</label>
                                <select type="text" id="district" name="district" placeholder="Daerah (Store District) *">
                                    <option value = "Cyberjaya">Cyberjaya</option>
                                    <option value = "Putrajaya">Putrajaya</option>
                                    <option value = "Dengkil">Dengkil</option>
                                    <option value = "Puchong">Puchong</option>
                                    <option value = "Other">Lain (Other)</option>
                                </select>
                            </div>
                            <div class="group-input">
                                <label for="time">Waktu operasi (Operating Time) *</label>
                                <textarea type="text" id="time" name="time" placeholder="eg: Setiap Hari 8am dan 4pm, last order 10pm"></textarea>
                            </div> 
                            <div class="group-input">
                                <label for="delivery">Maklumat Penghantaran (Delivery Information) *</label>
                                <textarea type="text" id="delivery" name="delivery" placeholder="Cyberjaya (RM2) &#13;Putrajaya & Seri Kembangan (RM 4) &#13;Dengkil & Puchong (RM5)"
                                onchange="checkIfEmpty()" onfocus="checkIfEmpty()" onblur="checkIfEmpty()" 
                                onclick="checkIfEmpty()"  onkeyup="checkIfEmpty()"></textarea>
                            </div>
                            <div class="group-input">
                                <label for="howtoorder">Cara Tempahan (How to order) *</label>
                                <textarea type="text" id="howtoorder" name="howtoorder" placeholder="eg: Melalui whatsapp/telegram/sms/fb page"
                                onchange="checkIfEmpty()" onfocus="checkIfEmpty()" onblur="checkIfEmpty()" 
                                onclick="checkIfEmpty()"  onkeyup="checkIfEmpty()"></textarea>
                            </div> 
                            <div class="group-input">
                                <label for="telephone">Nombor Telefon (Phone Number) </label>
                                <input type="text" id="telephone" name="telephone" placeholder="eg: 0123456789 (no dash)"
                                onchange="enablews(this);" onfocus="enablews(this);" onblur="enablews(this);" 
                                onclick="enablews(this);"  onkeyup="enablews(this);"></textarea>
                            </div> 
                            <div id="whatsappid" style="display:none">
                                <input type="checkbox" id="whatsapp" name="whatsapp" value="whatsapp" onchange="handleChange(this);">
                                <label for="whatsapp">  Hubungi melalui whatsapp (Contact via whatsapp) </label> 
                            </div>
                            <div class="group-input">
                                <label for="extratext"></label>
                                <textarea type="text" id="extratext" name="extratext" placeholder="Text whatsapp (Contol/Example): 
                                &#13; &#128525; Saya nak order sekarang! I want to order right away &#129392;!" style="display:none;"></textarea>
                            </div> 
                            <div class="group-input">
                                <label for="additional">Maklumat Tambahan (Additional Information)</label>
                                <textarea type="text" id="additional" name="additional" placeholder="1) Can order via App SpeedGrocer for delivery&#13;2) Beli 10 percuma 5&#13; Tiada minimum order"></textarea>
                            </div> 
                            <div class="group-input">
                                <label for="additional">Upload Gambar Kedai (Add Store Image) :</label>
                                <input type="file" name="image[]" id="image" accept=".jpg, .png, .gif" onchange="filesize()" /> 
                                <span id="warning" style="display:none;"></span>
                                <span>Hanya satu gambar kedai dibenarkan! Bukan gambar product!<br>
                                <i>Only one store picture allowed! Not product's picture!</i></span>
                            </div>
                            <button type="submit" id="site-btn" class="site-btn register-btn" 
                            style="opacity:.5;disabled:true;"
                            >ADD STORE</button>
                        </form>
                        <!-- 
                        <div class="switch-login">
                            <a href="./login.html" class="or-login">Or Login</a>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Register Form Section End -->
    
    <!-- Partner Logo Section Begin -->

    <!-- Footer Section Begin -->
    <?php 
       //include('part/footer.php');
   ?>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.zoom.min.js"></script>
    <script src="js/jquery.dd.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
<script>

$(document).ready(function(){

// load_images();

// function load_images()
// {
//     $.ajax({
//         url:"fetch.php",
//         success:function(data)
//         {
//             $('#images_list').html(data);
//         }
//     });
// }

    // $('#addstore').on('submit', function(event){
    //     event.preventDefault();
    //     var image_name = $('#image').val();

    //     $.ajax({
    //         url:"config/newstore.php",
    //         method:"POST",
    //         data: new FormData(this),
    //         contentType:false,
    //         cache:false,
    //         processData:false,
    //         success:function(data){
    //             $('#image').val(''); //clear value
    //             //load_images();
    //         }
    //     });
    //     //location.reload();

    //     // if(image_name == ''){
    //     //     //alert("Please Select Image");
    //     //     return false;
    //     // }else{
            
    //     // }
    // });

});  

function filesize(){
    var upl = document.getElementById("image");
    if(upl.files[0].size > 3000000){
        document.getElementById("warning").innerHTML = "Saiz imej melebihi had 3mb (Image size exceeded 3mb limit)";
        document.getElementById("warning").style.display = 'block'; 
        upl.value = ''; //clear
    }else{
        document.getElementById("warning").innerHTML = "";
        document.getElementById("warning").style.display = 'none'; 
    }
}

function handleChange(checkbox) {
    if(checkbox.checked == true){
        document.getElementById("extratext").style.display = 'block';
    }else{
        document.getElementById("extratext").style.display = 'none';
        document.getElementById("extratext").value = '';
    }
}

function checkIfEmpty(){
    if( !document.getElementById("storename").value ||
        !document.getElementById("location").value ||
        !document.getElementById("delivery").value ||
        !document.getElementById("howtoorder").value ){
        document.getElementById('site-btn').setAttribute('disabled', 'disabled');
        document.getElementById('site-btn').style.opacity= 0.5;
    }else{
        document.getElementById('site-btn').removeAttribute('disabled');
        document.getElementById('site-btn').style.opacity= 1;
    }
}

function enablews(input){
    if(!input.value){
        document.getElementById('whatsappid').style.display='none'; 
    }else{
        document.getElementById('whatsappid').style.display='block';
    }
}
// $(document).ready(function() {
//     $("#storename").change(function() {
//         var storename = $("#storename").val();
//         console.log(storename);
//     });
// });


// function validateName(){ 
//     console.log('in va');
//     var storename = document.getElementById('storename').value;

//     if(storename.length < 5){
//         document.getElementById('site-btn').disabled=true;
//         document.getElementById('site-btn').style.opacity: 0.5;
//     }else{
//         document.getElementById('site-btn').disabled=false;
//         document.getElementById('site-btn').style.opacity: 1;
//     }
// }

</script>