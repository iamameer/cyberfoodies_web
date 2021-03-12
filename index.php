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
        $details = include('config/config.php');
        echo '<meta name="google-signin-client_id" content="'.$details['googleClientID'].'">';

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

    <div class="banner-section spad">
       
    </div>

    <!-- Women Banner Section Begin -->
    <section class="women-banner spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="product-large set-bg" data-setbg="img/products/women-large.jpg">
                        <h2>Sample</h2>
                        <a href="#">This is sample image</a>
                    </div>
                    
                </div>
                <div class="col-lg-8 offset-lg-1">
                    <div class="filter-control">
                        <!-- <ul>
                            <li class="active">Clothings</li>
                            <li>HandBag</li>
                            <li>Shoes</li>
                            <li>Accessories</li>
                        </ul> -->
                    </div>
                    <div class="product-slider owl-carousel">
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
                      <?php include('part/foodslider.php'); ?>
                       
                    </div>
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
</body>

</html>

<script>

 function onSignIn(googleUser) {
    var profile = googleUser.getBasicProfile();
    console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
    console.log('Name: ' + profile.getName());
    console.log('Image URL: ' + profile.getImageUrl());
    console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.

    var str = profile.getName()+"|"+profile.getEmail()+"|"+profile.getImageUrl();
    console.log(str); 
    setCookie("q",str,1);
    if(profile){
        window.location.replace("profile.php");
        googleUser.disconnect()
    }
  }

  function setCookie(name,value,days) {
    console.log("in setCookie");
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = escape(name) + "=" + escape(value || "")  + expires + "; path=/";
}

    function signOut() {
        setCookie("q","",-1);
        var auth2 = gapi.auth2.getAuthInstance();
        auth2.signOut().then(function () {
        console.log("User signed out.");
        });
        auth2.disconnect();
    }    


</script>