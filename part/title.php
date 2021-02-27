<?php 
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
                if(x.length>1){
                    window.location.replace("browsefood.php?search="+x);
                }else{
                    alert("Please insert a logical keyword to be searched");
                }
            }
        </script>';

    echo '<title>Cyberfoodies</title>';

?>