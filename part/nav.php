<?php

echo '
            
<script> 
//document.getElementsByName("cat")
function seturl(input){
    var url = "browsefood.php?search="+(input.innerHTML).toLowerCase();
    input.setAttribute("href",url);  
}
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
</script>';

       echo '<li id="home" ><a href="index.php">Home</a></li>
            <li id="itemlist" ><a href="browsefood.php">Browse food&#127828;</a>
             <!--   <ul class="dropdown"> 
                <li><a name="cat" href="#" onclick="seturl(this);">Chocojars</a></li>
                <li><a name="cat" href="#" onclick="seturl(this);">Western</a></li>
                <li><a name="cat" href="#" onclick="seturl(this);">Kuih</a></li>
                </ul> -->
            </li>
            <li id="storelist" ><a href="browsestore.php">Stores &#128722;</a></li>
            <li id="request" ><a href="request.php">Request</a></li>
            <li id="etc" ><a href="#">Etc</a>
                <ul class="dropdown">
                    <li><a href="etc/announce.php">Anouncement</a></li>
                    <li><a href="etc/faq.php">FAQ</a></li>
                    <li><a href="etc/disclaimer.php">Disclaimer</a></li>
                </ul>
            </li>';

            if(isset($_COOKIE["q"])){
                echo '<li id="profile" class=""><a href="profile.php">My Page</a>
                        <ul class="dropdown">
                        <li><a href="index.php" id="signout" onclick="signOut();">Sign Out</a></li>
                        </ul>
                    </li>';
            }else{
                // echo "<script type='text/javascript'>alert('Please login first!');
                //     window.location.replace('index.php');</script>";
            } 


?>