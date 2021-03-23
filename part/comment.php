<?php 
    
    #Part Review
    $add_gray = '<i class="fa fa-user-plus text-muted"></i>';
    $star_gray = ' <i class="fa fa-star-o text-muted"></i> ';
    $star_yellow = ' <i class="fa fa-star text-warning"></i>';
    $check_gray = '<i class="fa fa-check-circle-o check-icon"></i> ';
    $check_blue = ' <i class="fa fa-check-circle-o check-icon text-primary"></i>';

    $img = '';
    $user_name = '';
    $comment = '';
    $time = ''; 
    $removereplytranslate =  '';  
                                    $legacy = ' <span class="dots"></span> 
                                    <small>Reply</small> <span class="dots"></span> 
                                    <small>Translate</small>';
    $icon = '';


    error_reporting(-1); ini_set('display_errors',1);
    $details = include('config/config.php');
    include('config/config.php');

    $conn = mysqli_connect($details['host'], $details['username'], $details['password'], $details['database']);
    if($conn->connect_error) {
        die("Error connecting to: ".$conn->connect_error);
    }

    if(isset($_GET['store_id'])){
        $store_id = $_GET['store_id'];
    }else{
        echo "<script type='text/javascript'>alert('Error: no store_id');
        window.location.replace('browsestore.php'); 
        </script>";
    } 

    $query = "SELECT user_id, user_email, 
                comment_id, comment_type, comment_text, comment_reply, comment_upvote, timestamp 
            FROM ".$details['database'].".".$details['comment_table'] .
            " WHERE store_id = '" . $store_id ."'";

    //print_r($query);
    $result = $conn-> query($query); 

    $count = 0;
    if(isset($result-> num_rows)){
        $count = $result-> num_rows;
    }

     echo '<div class="mt-5" style="margin-top: 0!important">
     <div class="row d-flex justify-content-center">
         <div class="col-md-8">
             <div class="headings d-flex justify-content-between align-items-center mb-3">
                 <h5 class="comments">Comments and Reviews('.$count.')</h5> 
             </div>';

    if($count > 0){ 
        while($row = $result -> fetch_assoc()){
            $user_name = $row['user_id'];
            $user_email = $row['user_email'];
            $user_email2 =  substr(explode('@',$user_email)[0], 0, 1) .'******' .explode('@',$user_email)[1];
            $comment_id = $row['comment_id'];
            $comment_type = $row['comment_type'];
            $comment_text = $row['comment_text'];
            $comment_reply = $row['comment_reply'];
            $comment_upvote = $row['comment_upvote'];
            $time = new DateTime($row['timestamp']);
            $time->setTimezone(new DateTimeZone('Asia/Kuala_Lumpur'));
            $time = $time->format('Y-m-d H:i:s');
 
            $query2 = "SELECT user_image    
                        FROM ".$details['database'].".".$details['user_table'] .
                        " WHERE user_email = '" . $user_email ."'";

            //print_r($query2);
            $result2 = $conn-> query($query2); 
            while($row2 = $result2 -> fetch_assoc()){
                $img = $row2['user_image'];
            }//endwhile image
 
            if(isset($_COOKIE["q"])){ 
                $str = explode("|",htmlspecialchars($_COOKIE["q"])); 
                $q_email = $str[1];

                //print_r($_COOKIE["q"]."#".$row['user_email'] ."#". $q_email);
                if($row['user_email'] == $q_email){
                    $removereplytranslate =   '<div class="reply px-4"><small>
                        <a id="removecomment" href="config/newcomment.php?mode=delete&store_id='.$store_id.'&comment_id='.$comment_id.'"
                        >Remove</a></small> </div>'; 
                }else{
                    $removereplytranslate = '';
                }
            } 

            $randomcolor = array("MediumVioletRed","DeepPink","PaleVioletRed","HotPink",
                                "DarkGreen","Green","ForestGreen","SeaGreen","LimeGreen",
                                "Indigo","Purple","DarkMagenta","DarkViolet","DarkSlateBlue","BlueViolet","DarkOrchid",
                                    "SlateBlue","MediumOrchid","MediumPurple",
                                "DarkRed","Firebrick","Crimson","LightCoral","IndianRed","Salmon",
                                "OrangeRed","Tomato","DarkOrange","Coral","Orange","Gold",
                                "Teal","DarkCyan","LightSeaGreen","DarkTurquoise",
                                "Maroon","Brown","SaddleBrown","Sienna","Chocolate","DarkGoldenrod","Peru","RosyBrown","Goldenrod",
                                "MidnightBlue","RoyalBlue","SteelBlue","CornflowerBlue","DeepSkyBlue"); //'#' . strtoupper(dechex(rand(0,10000000)));

            echo '<div class="card p-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="user d-flex flex-row align-items-center"> 
                        <img src="'.$img.'" width="30" class="user-img rounded-circle mr-2"> 
                        <span style="color:'.$randomcolor[rand(0,count($randomcolor)-1)].'"><small class="font-weight-bold text-primary">'.$user_name.' ('.$user_email2.')</small> 
                        <br/><small class="font-weight-bold">'.$comment_text.'</small></span> </div> 
                        <small>'.$time.'</small>
                    </div>
                    <div class="action d-flex justify-content-between mt-2 align-items-center">
                        '.$removereplytranslate.'
                        <div class="icons align-items-center"> '.$icon.'</div>
                    </div>
                </div>'; 
         }//endwhile
     }//enfif rows
          
    echo '       </div> 
            </div> 
        </div>';

    #Part Form 
    if(!isset($_COOKIE["q"])){ 
        echo '<div id="commentform"><center>';
        echo '<h5 class="comments">Sign in to leave a Comment/Review</h5><br/>
                <div class="g-signin2" data-onsuccess="onSignIn"></div></center>';
        echo '</div>';
    }else{
        $str = explode("|",htmlspecialchars($_COOKIE["q"])); 
        $user_name = $str[0];
        $user_email = $str[1];
        $store_id = $_GET["store_id"];
  
        $comment_type = "";
        $comment_reply = "";
        $comment_upvote = "";

        echo '<h5 style="margin-top:15px!important;">Leave A Comment/Review</h5>
                <form method="POST" action="config/newcomment.php?mode=add" class="comment-form">
                <input type="text" value="'.$store_id.'" name="store_id" id="store_id" style="display:none">
                <input type="text" value="'.$comment_type.'" name="comment_type" id="comment_type" style="display:none">
                <input type="text" value="'.$comment_reply.'" name="comment_reply" id="comment_reply" style="display:none">
                <input type="text" value="'.$comment_upvote.'" name="comment_upvote" id="comment_upvote" style="display:none">
                <input type="text" value="'.$user_name.'" name="user_name" id="user_name" style="display:none">
                <input type="text" value="'.$user_email.'" name="user_email" id="user_email" style="display:none">
                    <div class="row">
                        <div class="col-lg-6">
                            <input type="text"  value="'.$user_name.'" disabled>
                        </div>
                        <div class="col-lg-6">
                            <input type="text"  value="'.$user_email.'" disabled>
                        </div>
                        <div class="col-lg-12">
                            <textarea placeholder="Messages" name="comment_text" id="comment_text"></textarea>
                            <button type="submit" class="site-btn">Leave message</button>
                        </div>
                    </div>
                </form>';
    }
 
?>