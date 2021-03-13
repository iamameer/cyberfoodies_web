<?php 

    $string = array("What are you looking for?",
                    "Lapar apa harini?",
                    "Type here to start mmmmmmmmmmmakannnnn",
                    "Cepat! Call seller cepattttt",
                    "Hmmm lupa la nak beli apa",
                    "What if i want to buy everything...");

    echo '<div class="logo">
            <a href="./index.php">
                <img src="img/sample/imglogo3.png" alt="">
            </a>
        </div>
            </div> <!-- endDiv col-md-2 -->
                            <div class="col-lg-7 col-md-7">
                                <div class="advanced-search">
                                    <!-- <button type="button" class="category-btn"></button>
                                    <div class="input-group">
                                        <input type="text" placeholder="What do you need?">
                                        <button type="button" ><i class="ti-search"></i></button>
                                    </div> -->
                                    <div class="search">';
                                    
echo   '     <input id="searchInput" type="text" class="searchTerm" placeholder="'.$string[rand(0,count($string)-1)].'">
                <button type="submit" class="searchButton" id="searchButton" onclick="searchFood()">
                    <i class="fa fa-search"></i>
                </button>
                <script type="text/javascript">
                    var input = document.getElementById("searchInput"); 
                    input.addEventListener("keyup", function(event) { 
                        if (event.keyCode === 13) { 
                        event.preventDefault(); 
                        document.getElementById("searchButton").click();
                        }
                    });
                </script>
            </div>
        </div>
    </div>'

?>