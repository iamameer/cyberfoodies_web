<?php

echo '
            
<script> 
//document.getElementsByName("cat")
function seturl(input){
    var url = "browsefood.php?search="+(input.innerHTML).toLowerCase();
    input.setAttribute("href",url);  
}
</script>';

       echo '<li id="home" ><a href="index.php">Home</a></li> 
            <li id="itemlist" ><a href="browsefood.php">Browse food &#127828;</a>
             <!--   <ul class="dropdown"> 
                <li><a name="cat" href="#" onclick="seturl(this);">Chocojars</a></li>
                <li><a name="cat" href="#" onclick="seturl(this);">Western</a></li>
                <li><a name="cat" href="#" onclick="seturl(this);">Kuih</a></li>
                </ul> -->
            </li>
            <li id="storelist" ><a href="browsestore.php">Stores &#128722;</a></li>
            <li id="bazaar" ><a href="bazaar.php">Bazaar! &#x1F389;</a>
            <li id="lorong" ><a href="lorong.php">Lorong Belakang &#x2728;</a>
            <li id="shoutout"><a href="shoutout.php">Shoutout &#128226;</a>
                <!-- <ul class="dropdown">
                <li><a href="announcement.php">Timeline</a></li>
                </ul> -->
            </li>
            <li id="etc" ><a href="#">Etc</a>
                <ul class="dropdown">
                    <li id="tutorial"><a href="tutorial.php">Tutorial</a></li>
                    <li id="request"><a href="request.php">Request</a>
                    <li id="announce"><a href="announcement.php">Anouncement</a></li>
                    <li id="faq"><a href="faq.php">FAQ</a></li>
                    <li id="dis"><a href="disclaimer.php">Disclaimer</a></li>
                </ul>
            </li>';

            if(isset($_COOKIE["q"])){
                echo '<li id="profile" class=""><a href="profile.php">My Page</a>
                        <ul class="dropdown">
                        <li><a href="" id="signout" onclick="signOut();">Sign Out</a></li>
                        </ul>
                    </li>';
            }else{
                // echo "<script type='text/javascript'>alert('Please login first!');
                //     window.location.replace('index.php');</script>";
            } 


?>