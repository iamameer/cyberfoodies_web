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
                        <?php include('part/nav.php'); 
                            // echo str_replace('class=""','class="active"',$nav);
                            // if(!isset($_COOKIE["q"])){
                            //     echo '<div class="g-signin2" data-onsuccess="onSignIn"></div>';
                            //     echo "<script type='text/javascript'>alert('Please login first!');
                            //         window.location.replace('index.php');</script>";
                            // }else{
                                echo '<script type="text/javascript">
                                        document.getElementById("faq").classList.add("active");
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
                        <a href="#"><i class="fa fa-home"></i> Etc</a>
                        <span>FAQs</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    
    <!-- Faq Section Begin -->
    <div class="faq-section spad">
        <div class="container">
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
                                </style>

                            <div class="card">
                                <div class="card-heading active">
                                    <a class="active" data-toggle="collapse" data-target="#collapseOne">
                                        Website apa ni? (What is this website about?)
                                    </a>
                                </div>
                                <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <p>Pernah tak tetiba rasa lapar, pastu nak makan, tapi jenuh nak scroll atau cari makanan kat Twitter, Facebook, 
                                           <br>yang takde dalam Foodpanda, yang jenuh nak search kat Telegram? Geram kan? <br>
                                         So dipendekkan cerita, website ni adalah catalog bagi sesiapa yang nak beli or nak jual, silakan.</p><br>
                                        <i>
                                        <p>Ever feeling hungry at Godly hours and having hard time to find food via Twitter, Facebook or Telegram? 
                                           <br>Not being sold via Foodpanda? Must be irritating isn't it?<br>
                                         So tldr, this website serves as catalog for anyone who wanted to sell or buy, do as you please!</p><br></i>
                                            <center> 
                                            <figure>
                                                <img src='https://pbs.twimg.com/media/Ev47lb1VkAI04yo?format=jpg&name=small' alt='missing' />
                                                <figcaption>Gambar hiasan semata-mata (picture for memes)</figcaption>
                                            </figure>
                                            </center>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseTwo">
                                        FREE ke? ke ada caj tambahan/tersembunyi? (Is it free or comes with hidden cost?)
                                    </a>
                                </div>
                                <div id="collapseTwo" class="collapse" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <p>Ye, gratis aja.
                                           <br>Dok pahe lagi ke percuma abe.</a><br>
                                            Takde kene apa2, percuma selagi website ni masih bernyawa. <a href="https://www.buymeacoffee.com/ameersorne">Nak derma? silakan</a></p><br>
                                        <i>
                                        <p>It's FREE.
                                           <br>Yes, you read it right, free.<br>
                                            Why are you still reading. But you can <a href="https://www.buymeacoffee.com/ameersorne">buy me a coffee (:</a></p><br></i>
                                            <center> 
                                            <figure>
                                                <img src='https://i.imgur.com/Cw70nyW.png' alt='missing' />
                                                <figcaption>Credit as per top bar in the image</figcaption>
                                            </figure>
                                            </center>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseThree">
                                        Cemana nak jual kat sini? (So how to sell here?)
                                    </a>
                                </div>
                                <div id="collapseThree" class="collapse" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <p>Nak jual kat sini senang je, (1) Login, (2) Add new store, (3) Add products, siap!
                                           <br>Tapi kalau terdesak sangat boleh je <a href="tutorial.php">klik sini</a><br>
                                        ... atau klik gambar ni... atau melalui menu kat atas tu</p><br>
                                        <i>
                                        <p>Tbh it's pretty straight forward, (1) Login, (2) Add new store, (3) Add products, and you're set!
                                           <br>But you can see the details in case you need it badly by <a href="tutorial.php">clicking here</a><br>
                                         ... or even clicking the picture.... or via the navigation menu</p><br></i>
                                            <center> 
                                            <figure>
                                                <a href="tutorial.php"><img src='https://media.giphy.com/media/26AHPxxnSw1L9T1rW/giphy.gif' alt='missing' /></a>
                                                <figcaption>Tak pasti cemana? (Unsure how?)</figcaption>
                                            </figure>
                                            </center>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseFour">
                                        Abestu nak beli cemana lak? (... and how to buy?)
                                    </a>
                                </div>
                                <div id="collapseFour" class="collapse" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <p>Cari makanan  kat sini: <a href="browsefood.php">BROWSE FOOD&#127828;</a>
                                           <br>atau cari kedai melalui: <a href="browsestore.php">STORES &#128722;</a><br>
                                           <span>PERINGATAN: Lepas jumpa kedai/makanan yang nak tu, hubungi seller secara terus.<br>
                                           WEBSITE ni TIDAK menjalankan TRANSAKSI ONLINE dan tidak bertanggungjawab atas sebarang 
                                           masalah yang ditimbulkan samaada dari pihak penjual mahupun pembeli.</span>
                                        </p>
                                        <i><br>
                                        <p>Simply click <a href="browsefood.php">BROWSE FOOD&#127828;</a>
                                           <br>or searching specific store via <a href="browsestore.php">STORES &#128722;</a><br>
                                           <span>NOTICE: After found what you searching for, contact seller directly.<br>
                                           This WEBSITE DOES NOT provide online transaction nor responsible upon any misconduct
                                           caused by seller or the buyer. Use responsibly.</span>
                                        </i>
                                            <center> 
                                            <figure>
                                                <a href="#"><img src='https://i.pinimg.com/736x/4b/12/7f/4b127f5dddfe8ae407fad99c9bd5c6d4.jpg' alt='missing' /></a>
                                                <figcaption>Lapar eh? (Hungry?)</figcaption>
                                            </figure>
                                            </center>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseFive">
                                        Login ni selamat tak? (Is the login method secure?)
                                    </a>
                                </div>
                                <div id="collapseFive" class="collapse" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <p>YE KAMI TAK SIMPAN PASSWORD PUNNN</a>
                                           <br>Login tu memang selamat sebab menggunakan google authentication.</a><br>
                                           Tiada info credit card atau info penting disimpan.
                                        </p>
                                        <i>
                                        <br>
                                        <p>YES WE DO NOT STORE PASSWORD 
                                           <br>The login is secured by google authentication, so you're safe. </a><br>
                                           Plus we don't ask any credit card or crucial information.
                                        </p>
                                        </i>
                                            <center> 
                                            <figure>
                                                <a href="#"><img src='http://e.lvme.me/ma9vmqp.jpg' alt='missing' /></a>
                                                <figcaption>Kami pun takmau aih (We choose not to)</figcaption>
                                            </figure>
                                            </center>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Faq Section End -->

    <!-- Deal Of The Week Section Begin 
        <?php include('exp/deal.php'); ?>
     Deal Of The Week Section End -->

  
    <!-- Blog Details Section Begin -->
    <section class="blog-details spad">
        <div class="container"> 
        </div>
    </section>

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