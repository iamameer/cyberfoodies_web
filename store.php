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
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/styleExtra.css" type="text/css">
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
                    <?php include('part/nav.php'); 
                            // if(!isset($_COOKIE["q"])){
                            //     echo '<div class="g-signin2" data-onsuccess="onSignIn"></div>';
                            //     echo "<script type='text/javascript'>alert('Please login first!');
                            //         window.location.replace('index.php');</script>";
                            // }else{
                            //     echo '<script type="text/javascript">
                            //             document.getElementById("profile").classList.add("active");
                            //         </script>';
                            // }
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
                    <div class="breadcrumb-text product-more">
                        <a href="./index.php"><i class="fa fa-home"></i> Home</a>
                        <a href="./browsestore.php">Store</a>
                        <span>Store Details</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
   
        <div class="container">
        
            <div class="row">
                <div class="col-lg-12">
                    <div class="cart-table"><center>
                    <div class="blog-detail-title">
                            <?php 
                                if(isset($_GET['store_id'])){
                                    $store_id = $_GET['store_id'];
                                    include('part/getstorePicName.php');
                                }else{
                                    echo "<script type='text/javascript'>alert('Error: no store_id');
                                    window.location.replace('index.php'); 
                                    </script>";
                                }
                             ?>
                        </div></center>
                        <table>
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th class="p-name">Product Name</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Availability</th>
                                    <!-- <i class="ti-close"></i> -->
                                </tr>
                            </thead>
                            <tbody>
                            <style type="text/css">
                                    .productrow:hover{ 
                                        background: #ffffff;
                                        margin-bottom: 11px;
                                        -webkit-box-shadow: 0px 8px 30px 1px #ffcf87;
                                        box-shadow: 0px 8px 30px 1px #ffcf87;
                                    }  
                            </style>
                                <?php 
                                    if(isset($_GET['store_id'])){
                                        $store_id = $_GET['store_id'];
                                        if(isset($_GET['q'])){
                                            $q = $_GET['q'];
                                        }else{
                                            $q = 'nouser';
                                        } 
                                        if(isset($_COOKIE["q"])){
                                            $str = explode("|",htmlspecialchars($_COOKIE["q"]));
                                            $user_id = explode("@",$str[1])[0];
                                        }else{
                                            $user_id = "";
                                        }
                                        include('part/productlist.php'); 
                                    }else{
                                        echo "<script type='text/javascript'>alert('Error: no store_id');
                                        window.location.replace('index.php'); 
                                        </script>";
                                    }?> 
                            </tbody>
                        </table>
                        <style type="text/css">
                                    .th,.infodrop{
                                        opacity: 0.6;
                                        transition: 0.8s;
                                    }
                                    .infodrop{
                                        display:none;
                                    }

                                    .dis{
                                        padding:25px;
                                        border: 1px solid #ebebeb;
                                    }
                                    </style>
                        <table style="margin-top:15px;">
                            <thead>
                                <tr>
                                    <th style="background-color:#fa9f37;opacity:1;" class="th" onclick="setActive(this)">Lokasi</th>
                                    <th class="th" onclick="setActive(this)">Waktu Operasi</th>
                                    <th class="th" onclick="setActive(this)" >Maklumat Penghantaran</th>
                                    <th class="th" onclick="setActive(this)" >Cara Tempahan</th>
                                    <th class="th" onclick="setActive(this)" >Maklumat Tambahan</th>
                                    <!-- <i class="ti-close"></i> -->
                                </tr>
                            </thead>
                            <tbody>
                                    <?php include('part/getstoreDetails.php'); ?>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="cart-buttons">
                                <!-- <a href="#" class="primary-btn continue-shop">Continue shopping</a> -->
                                <?php 
                                    if(isset($_GET['store_id'])){
                                        $store_id = $_GET['store_id'];
                                            if(isset($_COOKIE["q"]) AND isset($_GET['q'])){
                                                $str = explode("|",htmlspecialchars($_COOKIE["q"]));
                                                $user_id = explode("@",$str[1])[0];
                                                $q = $_GET['q'];
                                                if($user_id == $q){
                                                    echo '<span style="font-style: italic;">*Klik pada imej untuk edit/delete produk
                                                            <br>*Click on the image to edit/delete the product
                                                    </span>';
                                                    echo  '
                                                    <a href="addProduct.php?store_id='.$store_id.'&mode=add" 
                                                    class="primary-btn up-cart" style="margin-top:15px;background-color:#e7ab3c">Add product</a>

                                                    <a href="addStore.php?store_id='.$store_id.'&mode=edit" 
                                                    class="primary-btn up-cart" style="margin-top:15px;background-color:#e7e43c">Edit Store</a>
                                                    ';
                                                }
                                            }
                                    }else{
                                        echo "<script type='text/javascript'>alert('Error: no store_id');
                                        window.location.replace('index.php'); 
                                        </script>";
                                    } 
                                ?>
                            </div>
                            <!-- <div class="discount-coupon">
                                <h6>Discount Codes</h6>
                                <form action="#" class="coupon-form">
                                    <input type="text" placeholder="Enter your codes">
                                    <button type="submit" class="site-btn coupon-btn">Apply</button>
                                </form>
                            </div> -->
                        </div>
                        <div class="col-lg-4 offset-lg-4">
                            <div class="proceed-checkout">
                                <!-- <ul>
                                    <li class="subtotal">Subtotal <span>$240.00</span></li>
                                    <li class="cart-total">Total <span>$240.00</span></li>
                                </ul> -->
                                <?php include('part/wsgen.php'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->

    <!-- Partner Logo Section Begin -->
  <div id="filler" height="200px">
      
  </div>
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

function setActive(th) {
    var x =  document.getElementsByClassName("th");
    var y = document.getElementsByClassName("dis");
    for(var i=0;i<x.length;i++){
        if(x[i].innerHTML != th.innerHTML){
            x[i].style.backgroundColor = '#fff';
            x[i].style.opacity = '0.6';

            y[i].style.opacity = '0.6';
            y[i].style.display = 'none';
        }else{
            y[i].style.opacity = '1';
            y[i].style.display = 'block';
        }
        // y[i].style.opacity = '0.6';
        // y[i].style.display = 'none';
    }
    th.style.backgroundColor = '#fa9f37';
    th.style.opacity = '1';
}


</script>