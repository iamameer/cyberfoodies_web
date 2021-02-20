<?php
       echo '<li id="home" ><a href="index.php">Home</a></li>
            <li id="itemlist" ><a href="itemlist.php">Browse food&#127828;</a>
                <ul class="dropdown"> 
                <li><a href="#">Chocojars</a></li>
                <li><a href="#">Western</a></li>
                <li><a href="#">Kuih</a></li>
                </ul>
            </li>
            <li id="storelist" ><a href="storelist.php">Stores &#128722;</a></li>
            <li id="request" ><a href="request.php">Request</a></li>
            <li id="etc" ><a href="#">Etc</a>
                <ul class="dropdown">
                    <li><a href="announce.php">Anouncement</a></li>
                    <li><a href="faq.php">FAQ</a></li>
                    <li><a href="disclaimer.php">Disclaimer</a></li>
                </ul>
            </li>';

            if(isset($_COOKIE["q"])){
                echo '<li id="profile" class="active"><a href="profile.php">My Page</a>
                        <ul class="dropdown">
                        <li><a href="index.php" id="signout" onclick="signOut();">Sign Out</a></li>
                        </ul>
                    </li>';
            }else{
                // echo "<script type='text/javascript'>alert('Please login first!');
                //     window.location.replace('index.php');</script>";
            }
 
?>