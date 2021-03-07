<?php 
    ## favico
    echo '  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
            <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
            <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
            <link rel="manifest" href="/site.webmanifest">
            <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
            <meta name="msapplication-TileColor" content="#da532c">
            <meta name="theme-color" content="#ffffff">';

    ####################scripts and etc
    //echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>';
    echo '<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">';

    echo '<script>
            // $(document).ready(function(){
            //     $(".searchButton").click(function(){ 
            //         var a = $("#searchInput").val();
            //         $(".product-show-option").load("browselist.php?search="+a);
            //     });
            // });

            function searchFood(){
                var x = document.getElementById("searchInput").value;
                //x = x.replace(" ","+");
                if(x.length>1){
                    window.location.replace("browsefood.php?search="+x);
                }else{
                    alert("Please insert a logical keyword to be searched");
                }
            }

            function searchStore(){
                var x = document.getElementById("searchstore").value;
                if(x.length>1){
                    window.location.replace("browsestore.php?search="+x);
                }else{
                    alert("Please insert a logical keyword to be searched");
                }
            }

            function filterStore(){
                //district checkbox
                var district = "&district=";
                if(document.getElementById("cyberjaya").checked){
                    district += "a";
                }
                if(document.getElementById("putrajaya").checked){
                    district += "+b";
                }
                if(document.getElementById("dengkil").checked){
                    district += "+c";
                }
                if(document.getElementById("puchong").checked){
                    district += "+d";
                }
                if(document.getElementById("other").checked){
                    district += "+e";
                } 

                //status
                var status = "&status="+document.getElementById("storestatus").value;

                //category
                var category = "&category="+document.getElementById("category").value;

                //search input
                var x = document.getElementById("searchstore").value; 
                if(x.length>0){
                    window.location.replace("browsestore.php?search="+x+district+status+category);
                }else{
                    district = district.substring(1);
                    window.location.replace("browsestore.php?"+district+status+category);
                }
            }
        </script>';

    echo '<title>Cybereats</title>';

?>