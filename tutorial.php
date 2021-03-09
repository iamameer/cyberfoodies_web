<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.4.2/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.4.2/dist/js/uikit-icons.min.js" ></script>
    <script src="https://apis.google.com/js/platform.js" async defer></script>   
    <?php
        $details = include('config/config.php');
        echo '<meta name="google-signin-client_id" content="'.$details['googleClientID'].'">';
        include('part/title.php');
    ?>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

  
    <!-- Css Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.4.2/dist/css/uikit.min.css" type="text/css">
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
                        <?php include('part/nav.php'); 
                            // echo str_replace('class=""','class="active"',$nav);
                            // if(!isset($_COOKIE["q"])){
                            //     echo '<div class="g-signin2" data-onsuccess="onSignIn"></div>';
                            //     echo "<script type='text/javascript'>alert('Please login first!');
                            //         window.location.replace('index.php');</script>";
                            // }else{
                                echo '<script type="text/javascript">
                                        document.getElementById("tutorial").classList.add("active"); 
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
                        <span>Tutorial</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Blog Details Section Begin -->
    <section class="blog-details spad">
       
        <div class="container">
            <h2>Tak tahu cemana nak mula? (Unsure where to start?)</h2><br> 
            
            <img src="https://media.giphy.com/media/hEc4k5pN17GZq/giphy.gif"><br><br>
            <?php include('part/tuts.php'); ?>
        </div>
    </section>
  
    <!-- Blog Details Section End -->

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
    
   /*** Detect the browser's prefixes ***/ 
if(document.addEventListener){ // Only IE9+ support this ;)
  // http://davidwalsh.name/vendor-prefix
  // Can't use it in IE8- as it brakes the page...
  var isPrefixed = (function () {
    var styles = window.getComputedStyle(document.documentElement, ''),
      pre = (Array.prototype.slice
        .call(styles)
        .join('') 
        .match(/-(moz|webkit|ms)-/) || (styles.OLink === '' && ['', 'o'])
      )[1],
      dom = ('WebKit|Moz|MS|O').match(new RegExp('(' + pre + ')', 'i'))[1];
    return {
      dom: dom,
      lowercase: pre,
      css: '-' + pre + '-',
      js: pre[0].toUpperCase() + pre.substr(1)
    };
  })();

  // Deals with prefixes
  var prefix = isPrefixed.css;

} else {
  var prefix = "";
}

/*** Slides ***/
var currentSlide = 0,
    totalSlides  = $(".tl-item").length - 1;

// Creates the navigation
$(".timeline").after("<div class='tl-nav-wrapper'><ul class='tl-nav'></ul></div><a href='#' class='tl-items-arrow-left'></a><a href='#' class='tl-items-arrow-right'></a>");
$( ".tl-copy" ).wrapInner( "<div class='tl-copy-inner'></div>");

// Cicle through items and creates the nav
$(".tl-item").each(function(i) {
  var year = $(".tl-item:eq(" + i + ")" ).data("year");
  $(".tl-nav").append("<li><div>" + year + "</div></li>");
  
  // Click handlers
  $(".tl-nav li:eq(" + i + ")").click(function() {
    if(!$(".tl-item:eq(" + i + ")" ).hasClass("tl-active")) {
      // Activates the item
      $(".tl-item").removeClass("tl-active");
      $(".tl-item:eq(" + i + ")" ).addClass("tl-active");
      currentSlide = i;

      // Activates the item nav
      $(".tl-nav li").removeClass("tl-active");
      $(".tl-nav li:eq(" + i + ")" ).addClass("tl-active");
    }
  });
});

// Activates the first slide
$(".tl-item:first, .tl-nav li:first").addClass("tl-active");

// Slide's arrows click handlers
$(".tl-items-arrow-left").on("click", function(){
  if(currentSlide > 0) {
    currentSlide--;
  
    // Activates the previous item
    $(".tl-item").removeClass("tl-active");
    $(".tl-item:eq(" + currentSlide +")").addClass("tl-active");
    
    // Activates the previous item nav
    $(".tl-nav li").removeClass("tl-active");
    $(".tl-nav li:eq(" + currentSlide + ")" ).addClass("tl-active");
  }
});

$(".tl-items-arrow-right").on("click", function(){
  if(currentSlide < totalSlides) {
    currentSlide++;
  
    // Activates the next item
    $(".tl-item").removeClass("tl-active");
    $(".tl-item:eq(" + currentSlide +")").addClass("tl-active");
    
    // Activates the next item nav
    $(".tl-nav li").removeClass("tl-active");
    $(".tl-nav li:eq(" + currentSlide + ")" ).addClass("tl-active");
  }
});
  
/*** Nav ***/
// The nav's width
var navWidth = ($(".tl-nav li").outerWidth(true) * $(".tl-nav li").length) + 36;
$(".tl-nav").width(navWidth);

// The nav's arrows
$(".tl-nav-wrapper").append("<a href='#' class='tl-nav-arrow-left'></a><a href='#' class='tl-nav-arrow-right'></a>");

/*** The timeline's height ***/
var vpHeight  = $(window).height();
var tlHeight = vpHeight - $(".tl-nav-wrapper").outerHeight(true) - 26;
$(".tl-wrapper").height(vpHeight);
$(".tl-item").css("max-height", tlHeight);
$(".tl-item").height(tlHeight);

/*** Nav's navigation... ***/
var navTranslation = 0;
var navLimit = (navWidth - $(".tl-nav-wrapper").outerWidth(true) + 20) * -1;

// To the left
$(".tl-nav-arrow-left").on("click", function() {
  if(navTranslation < 0) {
    navTranslation = navTranslation + 86;
    $(".tl-nav").css(prefix + "transform", "translateX(" + navTranslation + "px)");
  }
});

// To the right
$(".tl-nav-arrow-right").on("click", function() {
  if(navTranslation >= navLimit) {
    navTranslation = navTranslation - 86;
    $(".tl-nav").css(prefix + "transform", "translateX(" + navTranslation + "px)");
  }
});

</script>