<?php 
    //Step1 - Check cookie 
    if(isset($_COOKIE["q"])){
        $str = explode("|",htmlspecialchars($_COOKIE["q"])); 

        $details = include('config.php');

        $admin = explode("@",$str[1])[0];
        if($admin == $details['superadmin']){
            $user_id = $_POST["user_id"]; 
            $curr_id = isset( $_POST["curr_id"]) ?  $_POST["curr_id"] : "furqanprince95";
            $store_id = $_POST["store_id"]; 

            if(strpos($user_id,'@')){
                $user_id = explode("@",$user_id)[0];
            }

            if(strpos($store_id,'store_id=')){
                $store_id = explode("store_id=",$store_id)[1];
            }

            //Step3 - Check if exists
            include('dbconn.php');

            $conn = mysqli_connect($details['host'], $details['username'], $details['password'], $details['database']);
            if($conn->connect_error) {
                die("Error connecting to: ".$conn->connect_error);
            }

            $sql1 = ' UPDATE '.$details['database'].'.'.$details['store_table'].
                    ' SET 
                    user_id = "'. $user_id .'"' 
                    ." WHERE user_id = '".$curr_id."' AND store_id = '".$store_id."'";
            if(!$conn-> query($sql1)){
                echo("Error: ".$conn->error);
            }else{
                $sql1 = addslashes(trim(preg_replace('/\s+/', ' ', $sql1)));
                $sqlQ = ' INSERT IGNORE INTO '.$details['database'] .'.' .$details['query_table'].
                    ' (user_email,query) VALUES ("'.$str[1].'","'.$sql1.'")';
                $conn->query($sqlQ); 

                $sql2 = ' UPDATE '.$details['database'].'.'.$details['product_table'].
                        ' SET 
                        user_id = "'. $user_id .'"' 
                        ." WHERE user_id = '".$curr_id."' AND store_id = '".$store_id."'";
                if(!$conn-> query($sql2)){
                    echo("Error: ".$conn->error);
                }else{ 
                    $sql2 = addslashes(trim(preg_replace('/\s+/', ' ', $sql2)));
                    $sqlQ = ' INSERT IGNORE INTO '.$details['database'] .'.' .$details['query_table'].
                        ' (user_email,query) VALUES ("'.$str[1].'","'.$sql2.'")';
                    $conn->query($sqlQ); 

                    echo "<script type='text/javascript'>
                    window.location.replace('../store.php?store_id=".$store_id."'); 
                    </script>";
                }//endif sql2
            }//endif sql1

        } //endif admin
        
    }else{
        print_r("No q");
        echo "no q";
        //include('gsignin.php');
    }

    mysqli_close($conn);   
?>