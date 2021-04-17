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
                                        document.getElementById("lorong").classList.add("active");
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
                        <span>Lorong Belakang</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Blog Details Section Begin -->
    <section class="blog-details spad blogcontent" style="padding-top:15px;">
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
                                        <h2>Welcome to Lorong Belakang! </h2>
                                        <p><b>Waktu: Setiap Sabtu ( 4pm - 10pm ) </b>
                                        <br>Ingin berbuka puasa di Lorong Belakang Cyberjaya? Waze atau Google map ke Shaftsbury Square Cyberjaya. 
                                        <br>Kami menyediakan tempat lepak khas untuk anda serta keluarga dan rakan-rakan anda. Jumpa anda setiap Sabtu!  
                                        <br>Sumber: <a href="https://twitter.com/lorong_belakang">Twitter</a> 
                                        <br>
                                        <a href="https://t.co/WboHJ7NImc?amp=1"
                                        <div class="primary-btn" style="padding-top:2px;">Berminat?</div></a>
                                        </p><br>
                                        <figure>
                                                <div class="maplayout">
                                                    <div class="testbox1" onmouseover="maphover()"></div>
                                                    <div class="testbox2" onmouseover="maphover()"></div>

                                                    <img src='https://pbs.twimg.com/profile_banners/1310126818809184257/1616248296/1500x500' class="bazaarads"
                                                    alt='missing'/>
                                                </div>
                                                <figcaption></figcaption>
                                            </figure>

                            <div class="card">
                                <div class="card-heading">
                                    <a class="active" data-toggle="collapse"  data-target="#collapseTwo">
                                        Senarai Penjual (17 April 2021)
                                    </a>
                                </div>
                                <div id="collapseTwo" class="collapse show" data-parent="#accordionExample">
                                    <div class="card-body"> 
                                            <?php include('exp/timeline-lorong.php'); ?> 
                                    </div> 

                                        
                                    <center><figure>
                                                <div class="maplayout">  
                                                    <img src='https://i.imgur.com/8GSfnos.png' class="bazaarads"
                                                    alt='missing'/> 
                                                </div>
                                                <figcaption>Layout</figcaption>
                                            </figure>   </center>
                                </div>
                            </div>

                            
                            <div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" >
                                        Lokasi
                                    </a>
                                </div>
                                <div id="collapseThree" class="collapse show " data-parent="#accordionExample">
                                    <div class="card-body">   
                                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1992.3128200783212!2d101.66086127606091!3d2.923505878184341!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cdb65623667c1d%3A0xaaaaa564888f7f15!2sShaftsbury%20Square!5e0!3m2!1sen!2smy!4v1618648929062!5m2!1sen!2smy" 
                                                width="95%" height="400px"  style="border:0;" allowfullscreen="" loading="lazy"></iframe> 
                                    </div> 
                                </div>
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
</body>

</html>
 <script type="text/javascript">
function maphover(){
    
}
</script>