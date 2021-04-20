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
                                        document.getElementById("bazaar").classList.add("active");
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

 <!-- Breadcrumb Section Begin -->
 <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="index.php"><i class="fa fa-home"></i>Home</a>
                        <span>Bazaar</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Blog Details Section Begin -->
    <section class="blog-details spad blogcontent" style="padding-top:15px;" id="topcontainer">
        <div class="container">
           
             <center><!--<img src="img/coming-soon.jpg" alt="" >  --> 
            <style type="text/css">.n:hover{color:pink}</style>
            <!-- <h4>Berminat? (Interested?)<h4>
                <p>(Layout dan list vendor akan datang)</a>  -->
            </center> 

            <div class="row">
                <div class="col-lg-12">
                    <div class="faq-accordin">
                        <div class="accordion" id="accordionExample">
                                <style type="text/css">
                                    .card-body a:hover{
                                        color:pink;
                                    } 
                                    .card-body span{
                                        color:red;
                                    }

                                    .testbox{
                                        height:100px;
                                        width: 100px;
                                        background-color: blue;
                                        left: -10px!important;
                                        top: 200px!important;
                                        z-index: 1;
                                        position: relative;
                                        opacity: .5;
                                    }
                                </style>

                            <div class="card">
                                <div class="card-heading active">
                                    <a data-toggle="collapse" data-target="#collapseOne">
                                        TAPAK (Park & Ride)
                                    </a>
                                </div>
                                <div id="collapseOne" class="collapse" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <p>Waktu: Sepanjang bulan ramadhan ( 2pm - 8pm )
                                        <br>Sumber: <a href="https://www.mpsepang.gov.my/en/main/">MP Sepang</a>
                                        </p><br>
                                         
                                            <figure>
                                                <div class="maplayout">
                                                    <div class="testbox1" onmouseover="maphover()"></div>
                                                    <div class="testbox2" onmouseover="maphover()"></div>

                                                    <img src='https://i.imgur.com/T2OZwyC.jpg' class="bazaarads"
                                                    alt='missing'/>
                                                </div>
                                                <figcaption>(Layout dan list vendor akan datang)</figcaption>
                                            </figure>

                                            <?php //include('exp/bazaar1.html'); ?>

                                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15938.662594190624!2d101.6549224!3d2.9122192!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x911b3aef2d99682c!2sTapak%20Urban%20Street%20Dining%20Cyberjaya!5e0!3m2!1sen!2smy!4v1618302362088!5m2!1sen!2smy"
                                                width="95%" height="400px"  style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                                            
                                    </div> 
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-heading">
                                    <a class="active" data-toggle="collapse" data-target="#collapseTwo">
                                        Prima Avenue
                                    </a>
                                </div>
                                <div id="collapseTwo" class="collapse show" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <p>Waktu: Sepanjang bulan ramadhan ( 3pm - 8pm )   
                                        <br>Sumber: <a href="https://twitter.com/shezzlahhhhh/status/1376829555260891139/photo/2">Twitter</a> 
                                        </p><br>
                                         
                                            <figure>
                                                <div class="maplayout">
                                                    <div class="testbox1" onmouseover="maphover()"></div>
                                                    <div class="testbox2" onmouseover="maphover()"></div>

                                                    <img src='https://i.imgur.com/ZVvVC8a.jpg' class="bazaarads"
                                                    alt='missing'/> 
                                                </div>
                                                <figcaption></figcaption>
                                            </figure>

                                            <?php include('exp/timeline-prima.php'); ?>

                                            
                                            <center><figure>
                                                <div class="maplayout">  
                                                    <img src='https://i.imgur.com/koLQAHX.png' class="bazaarads"
                                                    alt='missing'/> 
                                                </div>
                                                <figcaption>Layout Bazaar</figcaption>
                                            </figure>   </center>

                                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.633739686484!2d101.65527595134651!3d2.921224455313223!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cdb6f92d65ab89%3A0xc02d18120df42cb9!2sPrima%20Avenue%2C%20Cyberjaya%2C%2063000%20Cyberjaya%2C%20Selangor!5e0!3m2!1sen!2smy!4v1618302721023!5m2!1sen!2smy" 
                                                width="95%" height="400px"  style="border:0;" allowfullscreen="" loading="lazy"></iframe> 
                                    </div> 
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseThree">
                                        Tamarind Square [Dibatalkan/Cancelled]
                                    </a>
                                </div>
                                <div id="collapseThree" class="collapse" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <p><strike>Waktu: Sepanjang bulan ramadhan ( 2pm - 8pm )</strike> <a href="https://twitter.com/Twt_Cyberjaya/status/1381928681036124177">[Rujuk]</a>
                                        <br>Sumber: <a href="https://www.instagram.com/p/CMylLriFzFe/">Tamarind Square Instagram</a>
                                        </p><br>
                                         
                                            <figure>
                                                <div class="maplayout">
                                                    <div class="testbox1" onmouseover="maphover()"></div>
                                                    <div class="testbox2" onmouseover="maphover()"></div>

                                                    <img src='https://i.imgur.com/75XZxjI.jpg'  class="bazaarads"
                                                    alt='missing'/>
                                                </div>
                                                <figcaption>(Layout dan list vendor akan datang)</figcaption>
                                            </figure>

                                            <?php //include('exp/bazaar1.html'); ?> 
                                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.63792184357!2d101.63430545134649!3d2.9200457553197126!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cdb72c965ab4cd%3A0x38201f285c241048!2sTamarind%20Square!5e0!3m2!1sen!2smy!4v1618302908983!5m2!1sen!2smy" 
                                                width="95%" height="400px"  style="border:0;" allowfullscreen="" loading="lazy"></iframe> 
                                    </div> 
                                </div>
                            </div>

                            <a href="#topcontainer" class="floatbutton" style="visibility:hidden;" id="floatbutton">
                                <i class="fa fa-chevron-circle-up my-float" id="myfloat"></i>
                            </a>

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
</body>

</html>
 <script type="text/javascript">
function maphover(){
    
}
</script>