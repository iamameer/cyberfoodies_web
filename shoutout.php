<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Search food here!">
    <meta name="keywords" content="Cybereats, cyber, eats, fun, cybereats.fun, makan, cyberjaya, sepang, putrajaya, free">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <?php 
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
                        <?php include('config/signedin.php') ?> 
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
                            // echo str_replace('class=""','class="active"',$nav);
                            // if(!isset($_COOKIE["q"])){
                            //     echo '<div class="g-signin2" data-onsuccess="onSignIn"></div>';
                            //     echo "<script type='text/javascript'>alert('Please login first!');
                            //         window.location.replace('index.php');</script>";
                            // }else{
                                echo '<script type="text/javascript">
                                        document.getElementById("shoutout").classList.add("active");
                                    </script>';
                            // }
                        ?>
                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Blog Details Section Begin -->
    <section class="blog-details spad blogcontent">
        <div class="container">  
            <?php include('shoutout/index.html') ?>

        </div>
    </section>
    <!-- Blog Details Section End -->
  
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

    <!-- Include jQuery and the EmojiOne library -->
    <!-- <script src="http://code.jquery.com/jquery-2.1.3.min.js"></script> -->
    <script src="http://cdn.jsdelivr.net/emojione/1.3.0/lib/js/emojione.min.js"></script>
    <script src="shoutout/assets/js/script.js"></script>

</body>

</html>
 