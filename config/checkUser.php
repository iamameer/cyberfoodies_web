<?php 
    //Step1 - Check cookie
    //print_r($_COOKIE);
    if(isset($_COOKIE["q"])){
        $str = explode("|",htmlspecialchars($_COOKIE["q"]));
        //print_r($str);  

        //Step2 - Create user_id
        $user_id = explode("@",$str[1])[0];
        $user_name = $str[0];
        $user_email = $str[1];
        $user_image = $str[2];

        //Step3 - Check if exists
        $details = include('config.php');
        include('dbconn.php');

        $conn = mysqli_connect($details['host'], $details['username'], $details['password'], $details['database']);
        if($conn->connect_error) {
            die("Error connecting to: ".$conn->connect_error);
        }

        $query = "SELECT user_email FROM ".$details['database'].".".$details['user_table'] ." WHERE user_id = " . $user_id;
        //$statement = $connect->prepare($query);
        $result = $conn-> query($query);

        //If user not found, insert
        if($result-> num_rows < 1){
            $sql = 'INSERT INTO '.$details[database] .'.' .$details[user_table].' 
                                (user_id, user_image, user_name, user_email) 
                        VALUES ("'.$user_id.'", "'.$user_image.'", "'.$user_name.'", "'.$user_email.'")';
            //print_r($sql);
            if(!$conn-> query($sql)){
                echo("Error: ".$conn->error);
            }else{
                echo "<script type='text/javascript'>alert('Successfully registered!');</script>";
            }
        } 

        echo'<div class="posted-by">
                <div class="pb-pic">
                    <img src="'. $user_image .'" alt="">
                </div>
                <div class="pb-text">
                    <a href="#">
                        <h5>'. $user_name .'</h5>
                    </a>
                    <p>'. $user_email .'<br/> ' . $user_image.'</p>
                </div>
            </div>';
        
    }else{
        print_r("No q");
        echo "no q";
        //include('gsignin.php');
    }
?>