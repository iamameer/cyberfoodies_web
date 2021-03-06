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
                <div class="row">
                    <div class="col-lg-2 col-md-2">
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
                                // if(!isset($_COOKIE["q"])){
                                //     echo '<div class="g-signin2" data-onsuccess="onSignIn"></div>';
                                //     echo "<script type='text/javascript'>alert('Please login first!');
                                //         window.location.replace('index.php');</script>";
                                // }else{
                                    echo '<script type="text/javascript">
                                            document.getElementById("itemlist").classList.add("active");
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
                <div id="filterblocker" onclick="closeNav()"></div>
                <div id="filterbar" class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 produts-sidebar-filter">
                    <!-- <div class="filter-widget">
                        <h4 class="fw-title">Status</h4>
                        <ul class="filter-catagories">
                        <li><a name="cat" href="#" onclick="seturl(this);">Dijual (Available)</a></li>
                        <li><a name="cat" href="#" onclick="seturl(this);">Terhad (Limited)</a></li>
                        <li><a name="cat" href="#" onclick="seturl(this);">Out of stock</a></li>
                        <li><a name="cat" href="#" onclick="seturl(this);">To be added</a></li>
                        <li><a name="cat" href="#" onclick="seturl(this);">Pre-Order</a></li>
                        <li><a name="cat" href="#" onclick="seturl(this);">Lain (Other)</a></li>
                        </ul>
                    </div> -->
                    <div style="border: 1px solid #ebebeb; padding-left:10px; padding-top:10px; margin-bottom:10px;">
               
                    <div class="filter-widget">
                        <h4 class="fw-title">Price</h4>
                        <div class="filter-range-wrap">
                            <div class="range-slider">
                                <div class="price-input">
                                    <?php    
                                        $pmin = $_GET['pmin'] ?? '0';
                                        $pmax = $_GET['pmax'] ?? '99';
                                        echo ' <input type="number" id="minamount" placeholder="RM" value="'.$pmin.'">
                                               <input type="number" id="maxamount" placeholder="RM" value="'.$pmax.'">';
                                    ?>
                                </div>
                            </div> 
                            <div style="margin-left:15px; margin-right:15px;" class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                    data-min="0" data-max="99">
                                <div class="ui-slider-range ui-corner-all ui-widget-header" id="bef"></div>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" id="omin"></span>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" id="omax"></span>
                            </div>
                        </div>
                        <!-- <a href="#" class="filter-btn">Select by price</a> -->
                    </div>
                    
                    <div class="filter-widget">
                        <h4 class="fw-title">District</h4>
                        <?php  
                            $a = ''; $b = ''; $c = ''; $d = ''; $e = ''; 
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
                
                    <div class="filter-widget">
                        <!-- <h4 class="fw-title">Status</h4>
                            <select type="text" id="productstatus" name="productstatus" placeholder="Status :">
                            <?php 
                                $arr = array('<option selected="" value = "Available">Dijual (Available)</option>',
                                             '<option selected="" value = "Limited">Terhad (Limited)</option>',
                                             '<option selected="" value = "Out of stock">Kehabisan stok (Out of stock)</option>',
                                             '<option selected="" value = "To be added">Akan datang (To be added)</option>',
                                             '<option selected="" value = "Pre-Order">Pre-Order</option>',
                                             '<option selected="" value = "Other">Lain (Other)</option>',
                                             '<option selected="" value = "Any">Semua (Any)</option>');

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
                            </select> -->
                        <a href="#" class="filter-btn2" onclick="filterFood()">Filter</a>
                    </div>
                </div>
                  
                 
                    <!-- <div class="filter-widget">
                        <h4 class="fw-title">Color</h4>
                        <div class="fw-color-choose">
                            <div class="cs-item">
                                <input type="radio" id="cs-black">
                                <label class="cs-black" for="cs-black">Black</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" id="cs-violet">
                                <label class="cs-violet" for="cs-violet">Violet</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" id="cs-blue">
                                <label class="cs-blue" for="cs-blue">Blue</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" id="cs-yellow">
                                <label class="cs-yellow" for="cs-yellow">Yellow</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" id="cs-red">
                                <label class="cs-red" for="cs-red">Red</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" id="cs-green">
                                <label class="cs-green" for="cs-green">Green</label>
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="filter-widget">
                        <h4 class="fw-title">Size</h4>
                        <div class="fw-size-choose">
                            <div class="sc-item">
                                <input type="radio" id="s-size">
                                <label for="s-size">s</label>
                            </div>
                            <div class="sc-item">
                                <input type="radio" id="m-size">
                                <label for="m-size">m</label>
                            </div>
                            <div class="sc-item">
                                <input type="radio" id="l-size">
                                <label for="l-size">l</label>
                            </div>
                            <div class="sc-item">
                                <input type="radio" id="xs-size">
                                <label for="xs-size">xs</label>
                            </div>
                        </div>
                    </div> -->
                    <div class="filter-widget">
                        <h4 class="fw-title">Tags</h4>
                        <div class="fw-tags">
                            <?php include('part/getTags.php'); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="product-show-option">
                        <div class="row">
                            <div class="col-lg-7 col-md-7">
                                <div class="select-option">
                                    <div class="mobilefilter" onclick="openNav()"><i class="fa fa-filter"></i><span class="f"> Filter</span></div>
                                    <select class="sorting">
                                        <option value="">Sort: Default</option>
                                        <option value="">Price: Low to High</option>
                                        <option value="">Price: High to Low</option> 
                                    </select>
                                    <!-- <select class="p-show">
                                        <option value="">Show:</option>
                                    </select> -->
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 text-right">
                                
                        <?php include('part/browselist.php') ?>
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
    <script src="config/gsignin.js"></script>
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
 
            // //status
            // var status = '&status=';
            // if ($('input#available').is(':checked')) {
            //     status += "a";
            // }
            // if ($('input#limited').is(':checked')) {
            //     status += "b";
            // }
            // if ($('input#outofstock').is(':checked')) {
            //     status += "c";
            // }
            // if ($('input#tobeadded').is(':checked')) {
            //     status += "d";
            // }
            // if ($('input#preorder').is(':checked')) {
            //     status += "e";
            // }
            // if ($('input#other').is(':checked')) {
            //     status += "f";
            // }

            // filter += status;

            $(location).attr('href',url+filter);

        });

        // $('.filter-btn2').click(function(){

        //     var pmin = $('#minamount').val();
        //     pmin = pmin.indexOf("RM") >= 0 ? pmin.split("RM")[1] : pmin;

        //     var pmax = $('#maxamount').val();
        //     pmax = pmax.indexOf("RM") >= 0 ? pmax.split("RM")[1] : pmax;

        //     var filter = "pmin="+pmin+"&pmax="+pmax;

        //     //district

        //     var url = window.location.href;
        //     if(url.indexOf("php?") >= 0){
        //         url += "&";
        //     }else{
        //         url += "?";
        //     }

        //     if(url.indexOf("pmin") >= 0){
        //         url = url.split("pmin")[0];
        //     }

        //     //status
        //     var status = '&status=';
        //     var selected =  $('#productstatus').find(":selected").text();
        //     if(selected.indexOf("Available") >= 0){
        //         status += 'Available';
        //     }else if(selected.indexOf("Limited") >= 0){
        //         status += 'Limited';
        //     }else if(selected.indexOf("stock") >= 0){
        //         status += 'Out of stock';
        //     }else if(selected.indexOf("added") >= 0){
        //         status += 'To be added';
        //     }else if(selected.indexOf("Order") >= 0){
        //         status += 'Pre-Order';
        //     }else if(selected.indexOf("Other") >= 0){
        //         status += 'Other';
        //     }

        //     filter += status;

        //     $(location).attr('href',url+filter);

        // });

        $('.sorting').on('change',function(){  
            var url = window.location.href;
            if(url.indexOf("php?") >= 0){
                if(url.indexOf("php?psort") >= 0){
                    url = url.split("psort")[0];
                    url += "psort=";
                }else{
                    url = url.split("&psort")[0];
                    url += "&psort=";
                }
            }else{
                url += "?psort=";
            }
 
            var sort = $('.current').text(); 
            if(sort.indexOf("High to Low") >= 0){ 
                $(location).attr('href',url+'highest');
            }else if(sort.indexOf("Low to High") >= 0){
                $(location).attr('href',url+'lowest');
            }
        });

        // $("#available").change(function() {
        //     if(this.checked) {
        //         //Do stuff
        //     }
        // });

    });
</script>

<script type="module"> 
    var url = window.location.href;
    if(url.includes("pmin")){
        document.getElementById("minamount").value = (url.split("pmin=")[1]).split("&")[0]; 
        document.getElementById("maxamount").value =(url.split("pmax=")[1]).split("&")[0]; 
    }

    if(url.includes("search")){
        var searchVal = url.split("search=")[1];
        if(searchVal.includes("&")){
            searchVal = searchVal.split("&")[0];
        } 
        document.getElementById("searchInput").value = searchVal.replaceAll("%20"," ");
    }
</script>