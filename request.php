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
                                        document.getElementById("request").classList.add("active");
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

      <!-- Contact Section Begin -->
      <section class="contact-section spad">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 offset-lg-1">
                    <div class="contact-form">
                        <div class="leave-comment">
                            <h4>Request a feature or update!</h4>
                            <p class="illget">I'll get back to you as soon as possible
                                <br>(Or tell me something nice &#128521;)</p>
                            <form action="config/newrequest.php" class="comment-form" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <input type="text" id="name" name="name" placeholder="Your name" required>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" id="email" name="email" placeholder="Your email" required>
                                    </div>
                                    <div class="col-lg-12">
                                        <textarea id="message" name="message" placeholder="Your message" required></textarea>
                                        <button type="submit" class="site-btn">Send request</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="contact-title">
                        <h4>Contact Me</h4>
                        <p>Reach me out if you wanted to suggest out anything!</p>
                    </div>
                    <style type="text/css">
                        .cw-item:hover {
                            background-color:#ffd561;
                            color:black!important;
                        }
                        .cw-item span { 
                            color:black!important;
                        }
                    </style>

                    <div class="contact-widget"> 
                        <!-- <div class="cw-item">
                            <div class="ci-icon">
                                <i class="ti-mobile"></i>
                            </div>
                            <div class="ci-text">
                                <span>Phone:</span>
                                <p>013 480 6952</p>
                            </div>
                        </div>  -->
                            <a href="mailto:admin@realtea.me?bcc=ameersorne@gmail.com&subject=FROM CYBERFOODIES&body=Hello!%0D%0AYou look cute today!%0D%0A%0D%0ARegards,%0D%0ARandom cyberians">
                        <div class="cw-item">
                            <div class="ci-icon">
                                <i class="ti-email"></i>
                            </div>
                            <div class="ci-text">
                                <span>Email:</span>
                                <p>admin@realtea.me</p>
                            </div>
                        </div>
                            </a>
 
                        <div class="cw-item">
                            <div class="ci-icon">
                                <i class="ti-crown"></i>
                            </div>
                            <div class="ci-text">
                                <span>Like what I did? Feel free to donate c:</span><br>
                                <!-- <p>admin@realtea.me</p> -->
                               <?php include('part/paypal.html'); ?>
  
                            </div>
                        </div> 

                        <!--  <a href="https://www.buymeacoffee.com/ameersorne">
                        <div class="cw-item">
                            <div class="ci-icon">
                                <i class="ti-location-pin"></i>
                            </div>
                            <div class="ci-text">
                                <span>Donate:</span>
                                <p>Like what I did? Click this image <br/>to donate c: </p>
                            </div>
                            <img style="padding-right:25px" class="post-share-img object-fit-cover laazy br-r-12 og-image-modal og-image-modal-footer" 
                            src="https://img.buymeacoffee.com/api/?url=aHR0cHM6Ly9pbWcuYnV5bWVhY29mZmVlLmNvbS9hcGkvP3VybD1hSFIwY0hNNkx5OWpaRzR1WW5WNWJXVmhZMjltWm1WbExtTnZiUzkxY0d4dllXUnpMM0J5YjJacGJHVmZjR2xqZEhWeVpYTXZNakF5TVM4d015OHpPVEUwWVdJMk56QmtOamd3T1RnMVpXSXdORGt4Wm1NME1HSm1aV1l4Tnk1cWNHYz0mc2l6ZT0zMDAmbmFtZT1hbWVlcnNvcm5l&amp;creator=ameersorne&amp;is_creating=developing websites, creating posters, designing logo and banners&amp;design_code=1&amp;design_color=%23FF5F5F&amp;slug=ameersorne" 
                            data-src="https://img.buymeacoffee.com/api/?url=aHR0cHM6Ly9pbWcuYnV5bWVhY29mZmVlLmNvbS9hcGkvP3VybD1hSFIwY0hNNkx5OWpaRzR1WW5WNWJXVmhZMjltWm1WbExtTnZiUzkxY0d4dllXUnpMM0J5YjJacGJHVmZjR2xqZEhWeVpYTXZNakF5TVM4d015OHpPVEUwWVdJMk56QmtOamd3T1RnMVpXSXdORGt4Wm1NME1HSm1aV1l4Tnk1cWNHYz0mc2l6ZT0zMDAmbmFtZT1hbWVlcnNvcm5l&amp;creator=ameersorne&amp;is_creating=developing websites, creating posters, designing logo and banners&amp;design_code=1&amp;design_color=%23FF5F5F&amp;slug=ameersorne">
                        </div>
                            </a>-->

                    </div>

                </div>
              
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    <!-- Blog Details Section Begin  
    <section class="blog-details spad">
        <div class="container">
            
        </div>
    </section>
    Blog Details Section End -->

    <!-- Deal Of The Week Section Begin 
        <?php include('exp/deal.php'); ?>
     Deal Of The Week Section End -->

  

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
function buycoffee(){
    console.log("buycoffee")
    var x = document.getElementById("buycoffee")
    if(x.style.display=="none"){
        x.style.display = "block";
    }else{
        x.style.display = "none";
    }
}
</script>