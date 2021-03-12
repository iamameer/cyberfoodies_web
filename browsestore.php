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
                                // if(!isset($_COOKIE["q"])){
                                //     echo '<div class="g-signin2" data-onsuccess="onSignIn"></div>';
                                //     echo "<script type='text/javascript'>alert('Please login first!');
                                //         window.location.replace('index.php');</script>";
                                // }else{
                                    echo '<script type="text/javascript">
                                            document.getElementById("storelist").classList.add("active");
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
                        <a href="index.php"><i class="fa fa-home"></i> Home</a>
                        <span>Foods</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Product Shop Section Begin -->
    <section class="product-shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 produts-sidebar-filter">
                    
                    <div class="filter-widget">
                        <h4 class="fw-title">Store name</h4>
                        <div class="group-input">
                            <style type="text/css">
                                #username {
                                    border: 1px solid #ebebeb;
                                    height: 50px;
                                    width: 100%;
                                    padding-left: 20px;
                                    padding-right: 15px;
                                }

                                /* #cyberjaya,#putrajaya,#puchong,#dengkil,#other { 
                                    height: 20px;  
                                    width: 100%;
                                    float: left!important;
                                }

                                .filter-widget label{
                                    float: right!important;
                                } */
                            </style>
                            <!-- <label for="username">Username or email address *</label> -->
                            <input type="text" id="searchstore" placeholder="eg: Kedai Ayam Viral">
                        </div>

                        <a href="#" class="filter-btn" style="margin-top:20px;height:auto;" onclick="searchStore();">Search Store</a>
                    </div>
                <div style="border: 1px solid #ebebeb; padding-left:10px; padding-top:10px">
                    <div class="filter-widget">
                        <h4 class="fw-title">District</h4>
                        <?php 
                            if(isset($_GET['district'])){
                                $district = $_GET['district'];
                                if(strpos($district,'a')!== false){
                                    $a = 'checked';
                                }
                                if(strpos($district,'b')!== false){
                                    $b = 'checked';
                                }
                                if(strpos($district,'c')!== false){
                                    $c = 'checked';
                                }
                                if(strpos($district,'d')!== false){
                                    $d = 'checked';
                                }
                                if(strpos($district,'e')!== false){
                                    $e = 'checked';
                                }
                            }else{
                                $a = ''; $b = ''; $c = ''; $d = ''; $e = ''; 
                            }

                            echo '  <input type="checkbox" id="cyberjaya" '.$a.'>
                                    <label for="cyberjaya">Cyberjaya</label> <br />
                                    <input type="checkbox" id="putrajaya" '.$b.'>
                                    <label for="putrajaya">Putrajaya</label> <br />
                                    <input type="checkbox" id="dengkil" '.$c.'>
                                    <label for="dengkil">Dengkil</label> <br />
                                    <input type="checkbox" id="puchong" '.$d.'>
                                    <label for="puchong">Puchong</label> <br />
                                    <input type="checkbox" id="other" '.$e.'>
                                    <label for="other">Lain (Other)</label>';
                        ?>
                          
                    </div>

                    <div class="filter-widget" style="margin-top:-30px;">
                        <h4 class="fw-title">Status</h4>
                        <select type="text" id="storestatus" name="storestatus" placeholder="Status :">
                          <?php 
                            $arr = array('<option selected="" value = "Open">Buka (Open)</option>',
                                         '<option selected="" value = "Closed">Tutup (Closed)</option>',
                                         '<option selected="" value = "Holiday">Cuti (Holiday)</option>',
                                         '<option selected="" value = "Moved">Berpindah (Moved)</option>',
                                         '<option selected="" value = "Setting">Dalam proses (Setting up)</option>',
                                         '<option selected="" value = "Other">Lain (Other)</option>');

                            foreach($arr as $item){
                                if(isset($_GET['status'])){
                                    if(strpos($item,$_GET['status'])){
                                        $item = str_replace('selected=""','selected="selected"',$item);
                                    }else{
                                        $item = str_replace('selected=""','',$item);
                                    }
                                }
                                echo $item;
                            }
                          ?>
                        </select>
                    </div>

                    <div class="filter-widget" style="margin-top:-20px;">
                        <h4 class="fw-title">Category</h4>
                        <select type="text" id="category" name="category" placeholder="Kategori (Category)">
                        <?php 
                            $arr = array(' <option selected="" value = "Homecook">Homecook</option>',
                                          '<option selected="" value = "Restaurant">Restaurant</option>',
                                          '<option selected="" value = "Agent">Agent</option>',
                                          '<option selected="" value = "Stall">Stall</option>',
                                          '<option selected="" value = "Food Truck">Food Truck</option>',
                                          '<option selected="" value = "Pasar Malam">Pasar Malam</option>',
                                          '<option selected="" value = "Other">Lain (Other)</option>');

                            foreach($arr as $item){
                                if(isset($_GET['category'])){
                                    if(strpos($item,$_GET['category'])){
                                        $item = str_replace('selected=""','selected="selected"',$item);
                                    }else{
                                        $item = str_replace('selected=""','',$item);
                                    }
                                }
                                echo $item;
                            }
                          ?>
                        </select>
                        <br />
                        <a href="#" class="filter-btn" style="margin-top:20px;height:auto;" onclick="filterStore()">Filter Store</a>
                    </div>

                </div> 
                   

                    <div class="filter-widget" style='padding-top:20px;'>
                        <h4 class="fw-title">Tags</h4>
                        <div class="fw-tags">
                            <?php include('part/getTagsStore.php'); ?>
                        </div>
                    </div>
                </div>

                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="product-show-option">
                        <div class="row">
                            <div class="col-lg-7 col-md-7">
                                <div class="select-option">
                                    <select class="sorting">
                                        <option value="">Sort: Default</option>
                                        <option value="">Alphabet: A to Z</option>
                                        <option value="">Alphabet: Z to A</option> 
                                    </select>
                                    <!-- <select class="p-show">
                                        <option value="">Show:</option>
                                    </select> -->
                                </div>
                            </div>
                            <style type="text/css">
                                .primary-btn {
                                        display: inline-block;
                                        font-size: 14px;
                                        font-weight: 900;
                                        padding: 12px 30px;
                                        margin-right: 5px;
                                        margin-left: 5px;
                                        color: #ffffff;
                                        background: #e7ab3c;
                                        text-transform: uppercase;
                                        text-decoration: none;
                                    }
                                    .product-item:hover{ 
                                        background: #ffffff;
                                        margin-bottom: 11px;
                                        -webkit-box-shadow: 0px 8px 30px 1px #ffcf87;
                                        box-shadow: 0px 8px 30px 1px #ffcf87;
                                    }  
                            </style>
                            <div class="col-lg-5 col-md-5 text-right">
                                
                        <?php 
                            include('part/browsestorelist.php');
                        ?>
                </div> 
            </div>
        </div>
    </section>
    <!-- Product Shop Section End -->

    <!-- Partner Logo Section Begin -->
 
    <!-- Partner Logo Section End -->

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
    function seturl(input){
        var url = "browsefood.php?search="+(input.innerHTML).toLowerCase();
        input.setAttribute("href",url);  
    }

    $(document).ready(function(){

        $('.filter-btn').click(function(){

            var pmin = $('#minamount').val();
            pmin = pmin.indexOf("RM") >= 0 ? pmin.split("RM")[1] : pmin;

            var pmax = $('#maxamount').val();
            pmax = pmax.indexOf("RM") >= 0 ? pmax.split("RM")[1] : pmax;

            var filter = "pmin="+pmin+"&pmax="+pmax;

            var url = window.location.href;
            if(url.indexOf("php?") >= 0){
                url += "&";
            }else{
                url += "?";
            }

            if(url.indexOf("pmin") >= 0){
                url = url.split("pmin")[0];
            }
 
            //status
            var status = '&status=';
            if ($('input#available').is(':checked')) {
                status += "a";
            }
            if ($('input#limited').is(':checked')) {
                status += "b";
            }
            if ($('input#outofstock').is(':checked')) {
                status += "c";
            }
            if ($('input#tobeadded').is(':checked')) {
                status += "d";
            }
            if ($('input#preorder').is(':checked')) {
                status += "e";
            }
            if ($('input#other').is(':checked')) {
                status += "f";
            }

            filter += status;

            $(location).attr('href',url+filter);

        });

        $('.sorting').on('change',function(){  
            var url = window.location.href;
            if(url.indexOf("php?") >= 0){
                if(url.indexOf("php?sort") >= 0){
                    url = url.split("sort")[0];
                    url += "sort=";
                }else{
                    url = url.split("&sort")[0];
                    url += "&sort=";
                }
            }else{
                url += "?sort=";
            }
 
            var sort = $('.current').text(); 
            if(sort.indexOf("A to Z") >= 0){ 
                $(location).attr('href',url+'atoz');
            }else if(sort.indexOf("Z to A") >= 0){
                $(location).attr('href',url+'ztoa');
            }
        });

        // $("#available").change(function() {
        //     if(this.checked) {
        //         //Do stuff
        //     }
        // });

    });
</script>