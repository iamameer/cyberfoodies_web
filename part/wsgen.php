<?php

    error_reporting(-1); ini_set('display_errors',1);

    $details = include('config/config.php');
    include('config/config.php');

    $conn = mysqli_connect($details['host'], $details['username'], $details['password'], $details['database']);
    if($conn->connect_error) {
        die("Error connecting to: ".$conn->connect_error);
    }

    // if(isset($_GET['store_id'])){
    //     $store_id = $_GET['store_id'];
    // }else{
    //     echo "<script type='text/javascript'>alert('Error: no store_id');
    //     window.location.replace('index.php'); 
    //     </script>";
    // }

    $query = "SELECT store_phone,store_extratext
            FROM ".$details['database'].".".$details['store_table'] .
            " WHERE store_id = '" . $store_id . "' LIMIT 1" ;

    //print_r($query);
    $result = $conn-> query($query); //$result = mysqli_query($conn,$query); // 
    //$row = mysql_fetch_assoc($result);
    if($result-> num_rows > 0){
       while($row = $result -> fetch_assoc()){
           if(isset($row['store_phone'])){
                if(strlen($row['store_phone'])>2){
                    if(($row['store_phone'][0] == "0" OR $row['store_phone'][0] == 0  ) AND ctype_digit($row['store_phone']) ){
                        $url = str_replace(" ","",$row["store_phone"]);
                        $url = str_replace("-","",$row["store_phone"]);
                        $url = 'https://wa.me/' .$url;
                        if(strlen($row["store_extratext"])>1){
                            $url .= '?text=' .$row["store_extratext"];
                        }
                        echo '<a href="'. $url . '" class="proceed-btn" style="background:#25D366">Contact seller now! <i class="fa fa-whatsapp"></i></a>';
                    }
                }else{
                    echo '<span>Contact: '.$row["store_phone"].'<br>(Invalid phone number)</span>';
                }
           }else{
               echo '<span>Contact: '.$row["store_phone"].'<br>(Phone not provided)</span>';
           }
        } 
    }else{
       echo 'ended here';
    }
   
    mysqli_close($conn);   
?>