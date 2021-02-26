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
                <div class="row"><div class="col-lg-2 col-md-2">
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
                        <?php $nav = include('part/nav.php'); 
                            echo str_replace('class=""','class="active"',$nav);
                            if(!isset($_COOKIE["q"])){
                                echo '<div class="g-signin2" data-onsuccess="onSignIn"></div>';
                                echo "<script type='text/javascript'>alert('Please login first!');
                                    window.location.replace('index.php');</script>";
                            }else{
                                echo '<script type="text/javascript">
                                        document.getElementById("profile").classList.add("active");
                                    </script>';
                            }
                        ?>
                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Blog Details Section Begin -->
    <section class="blog-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog-details-inner">
                        
                        <?php include('config/checkUser.php'); ?>

                        <!-- <div class="blog-large-pic" style="width:50%;height:auto;">
                            <img src="img/blog/blog-detail.jpg" alt="">
                        </div> 
                        <div class="blog-detail-desc">
                            <p>psum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                                labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure Lorem ipsum dolor sit
                                amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
                                magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate.
                            </p>
                        </div>-->

                        <div class="blog-detail-title">
                           <h2 style="margin-top:10px;">Store list:</h2>
                            <!--  <p>travel <span>- May 19, 2019</span></p> -->
                        </div>   
                    </div>

                    <div class="col-lg-9 order-1 order-lg-2" style="margin: auto!important;">
                    <style type="text/css">
                         .blog-item{ 
                            background: #ffffff;
                            margin-bottom: 11px;
                            -webkit-box-shadow: 0px 8px 35px 10px #E8E8E8;
                            box-shadow: 0px 8px 35px 10px #E8E8E8;
                            padding-left: 25px;
                            padding-right: 25px;
                            padding-top: 15px;
                            padding-bottom: 10px;
                            border-radius: 10px;
                        }
                        .blog-item:hover{ 
                            background: #ffffff;
                            margin-bottom: 11px;
                            -webkit-box-shadow: 0px 8px 35px 10px #ffcf87;
                            box-shadow: 0px 8px 35px 10px #ffcf87;
                            padding-left: 25px;
                            padding-right: 25px;
                            padding-top: 15px;
                            padding-bottom: 10px;
                            border-radius: 10px; 
                        } 
                        h4:hover{ 
                            color:red!important;
                        }

                    </style>
                    <div class="row">
                       <?php 
                            include('part/storelist.php');
                       ?>
                    </div>
                    </div>
                     
                     
                        <!-- <div class="leave-comment">
                            <h4>Leave A Comment</h4>
                            <form action="#" class="comment-form">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <input type="text" placeholder="Name">
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" placeholder="Email">
                                    </div>
                                    <div class="col-lg-12">
                                        <textarea placeholder="Messages"></textarea>
                                        <button type="submit" class="site-btn">Send message</button>
                                    </div>
                                </div>
                            </form>
                        </div> -->

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->

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
    }    

</script>