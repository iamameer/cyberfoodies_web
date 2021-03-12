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
                       <?php include('part/logo.php') ?>
                    <div class="col-lg-3 text-right col-md-3">
                        <?php include('config/signedin.php') ?>
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
                        <span><?php echo ucfirst($_GET['mode']); ?> Store</span>
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
                    <script type="text/javascript">
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

                            var ws = document.getElementById('extratext').value;
                            if(ws.length > 1){
                                document.getElementById('whatsapp').checked = true; 
                            }else{
                                document.getElementById('whatsapp').checked = false; 
                            }
                        }
                    </script>
                    <div class="register-form">
                             <?php
                                $mode = $_GET['mode'];
                                if($mode == 'edit'){
                                    $store_id = $_GET['store_id'];
                                }else{
                                    $user_id = $_GET['user_id'];
                                }
                                include('part/storeform.php'); ?>                              
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
       include('part/footer.php');
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

function handleChange2(checkbox) {
    if(checkbox.checked == true){
        document.getElementById("delbutton").style.display = 'block';
    }else{
        document.getElementById("delbutton").style.display = 'none';
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