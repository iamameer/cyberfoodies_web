<?php 
    echo '<div class="col-lg-3 text-right col-md-3 signedBar">';
    if(!isset($_COOKIE["q"])){
        // echo "<script type='text/javascript'> 
        //         function signOut() {
        //             setCookie('q','',-1);
        //             var auth2 = gapi.auth2.getAuthInstance();
        //             auth2.signOut().then(function () {
        //             console.log('User signed out.');
        //             });
        //         }    
        //     </script>";
        echo '<div class="g-signin2" data-onsuccess="onSignIn"></div>';
    }else{
        $str = explode("|",htmlspecialchars($_COOKIE["q"]));
        //print_r($str);  

        //Step2 - Create user_id
        $user_id = explode("@",$str[1])[0];
        $user_name = $str[0];
        $user_email = $str[1];
        $user_image = $str[2];

        echo'<div class="posted-by2">
                <div class="pb-pic">
                    <a href="profile.php">
                    <img src="'. $user_image .'" alt="" style="margin-left:10px;border-radius: 50%!important;float:right;" height="auto" width="45px">
                    </a>
                </div>
                <div class="pb-text">
                    <a href="profile.php">
                        <h5 class="signedName">Hi '. $user_name .' !</h5>
                    
                    <p class="signedEmail">'. $user_email .'</p>
                    </a>
                </div>
            </div>';
    }
    echo '</div>';
?>
