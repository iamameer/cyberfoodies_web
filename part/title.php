<?php  
    $dir = dirname(__DIR__);
    $details = include($dir.'/config/config.php');
    if(strpos($dir,"dev")){
        echo '<meta name="google-signin-client_id" content="'.$details['googleClientID_dev'].'">';
    }else{
        echo '<meta name="google-signin-client_id" content="'.$details['googleClientID'].'">';
    }
    
    ##responsive // pwa
    echo '<link rel="stylesheet" href="css/pwa.css?v3" type="text/css">';

    ##shoutout
    echo '<link rel="stylesheet" href="shoutout/assets/css/styles.css" />';
    
    ## favico
    echo '  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
            <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
            <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
            <link rel="manifest" href="/site.webmanifest">
            <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
            <meta name="msapplication-TileColor" content="#da532c">
            <meta name="theme-color" content="#ffffff">';

    ## Addtohomescreen
    echo '<meta name="mobile-web-app-capable" content="yes">';
    echo '<meta name="apple-mobile-web-app-capable" content="yes">';
    echo '<meta name="apple-mobile-web-app-" content="yes" />';
    echo '<meta name="mobile-web-app-capable" content="yes" />';
    echo '<meta name="apple-mobile-web-app-status-bar-style" content="black">';
    echo '<meta name="apple-mobile-web-app-title" content="Cybereats.fun">';
    echo '<meta name="theme-color" content="#f79131">';

    ####################scripts and etc
    //echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>';
    echo '<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">';

    echo "<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=60476a9f39329f00123ae914&product=analytics' async='async'></script>";
    
    echo "<script type='text/javascript' src='js/search.js'> </script>";

    echo  '<script async src="https://www.googletagmanager.com/gtag/js?id=G-26QE93M6YG"></script>';
    echo "<script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            
            gtag('config', '".$details['gtag']."');
        </script>";

    echo '<title>Cybereats</title>';
?>