<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
     <!-- <script src="config/gsignin.js" async defer></script> -->

    <?php  

        //include('config/checkUser.php');
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
                         <!-- legacy@nav-right -->
                         <!-- <a href="login.php" class="login-panel"><i class="fa fa-user"></i>Login</a> -->
                    
                       <?php include('config/signedin.php') ?>
                       
                    </div>
                </div>
            </div>
        </div>
        <div class="nav-item">
            <div class="container">
               
                <nav class="nav-menu mobile-menu">
                    <ul>
                        <?php include('part/nav.php'); ?>
                        <script type="text/javascript">
                            document.getElementById("home").classList.add("active");
                        </script>
                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header> 
    <!-- Header End -->
   

    <!-- Hero Section Begin -->
    <section class="hero-section">
        <div class="hero-items owl-carousel">
            <?php include('exp/carousel.php'); ?>
        </div>
    </section>
    <!-- Hero Section End -->


    <!-- Women Banner Section Begin -->
    <section class="women-banner spad" style="margin-top:10px;">
        <div class="container-fluid">
            <div class="row">   
                <div class="col-lg-8 offset-lg-1">
                    <div class="filter-control">
                        <!-- <ul>
                            <li class="active">Clothings</li>
                            <li>HandBag</li>
                            <li>Shoes</li>
                            <li>Accessories</li>
                        </ul> -->
                    </div>
                    <style type="text/css">
                            .available {
                                color: #ffffff;
                                font-size: 10px;
                                background: #76BC42;
                                position: absolute;
                                left: 0;
                                top: 20px;
                                padding: 5px 10px;
                                text-transform: uppercase;
                            }

                            .outofstock {
                                color: #ffffff;
                                font-size: 10px;
                                background: red;
                                position: absolute;
                                left: 0;
                                top: 20px;
                                padding: 5px 10px;
                                text-transform: uppercase;
                            }

                            .other {
                                color: #ffffff;
                                font-size: 10px;
                                background: orange;
                                position: absolute;
                                left: 0;
                                top: 20px;
                                padding: 5px 10px;
                                text-transform: uppercase;
                            }
                        </style>
                    <div class="product-slider owl-carousel"> 
                      <?php include('exp/foodslider.php'); ?>
                       
                    </div>
                </div>

                <div class="col-lg-3">
                    <style type="text/css">
                        .timeline-Widget,.twitter-timeline{ 
                            box-shadow: 10px 10px 62px -13px rgba(88,200,248,0.75)!important;
                            -webkit-box-shadow: 10px 10px 62px -13px rgba(88,200,248,0.75)!important;
                            -moz-box-shadow: 10px 10px 62px -13px rgba(88,200,248,0.75)!important;
                        }
                    </style>
                    <!-- Switch Mode
                    <div class="onoffswitch">
                            <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" 
                            onchange='handleChange' id="myonoffswitch" tabindex="0">
                            <label class="onoffswitch-label" for="myonoffswitch"> </label> 
                        </div>  -->
                    <a class="twitter-timeline" data-theme="light" id="toggle" height="650px"
                    href="https://twitter.com/Twt_Cyberjaya?ref_src=twsrc%5Etfw">Tweets by Twt_Cyberjaya</a> 
                    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                        <!-- <div class="product-large set-bg" data-setbg="img/pasar.jpg">
                        <h2 style="text-shadow: 3px 3px 11px rgba(128, 0, 0, 1);">Bazaar</h2>
                        <a href="bazaar.php" style="text-shadow: 3px 3px 11px rgba(0, 0, 0, 1);">Special promotion during bazaar?</a>
                    </div> -->
                    
                </div>

            </div>
        </div>
    </section>
    <!-- Women Banner Section End -->

    
    <!-- Instagram Section Begin -->
    <?php //include('exp/featuredstores.php'); ?>
    <!-- Instagram Section End -->

  

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
    <script src="config/gsignin.js"></script>
</body>

</html>

<script type="text/javascript">
    function handleChange(){
        // var switch = document.getElementById("myonoffswitch")
        // if(switch.checked == true){
        //     document.getElementById("toggle").setAttribute("data-theme","dark");
        // }else{
        //     document.getElementById("toggle").setAttribute("data-theme","light");
        // }
    }
</script>