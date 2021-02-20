<?php
    $details = include('config/config.php');
    include('dbconn.php');

    $conn = mysqli_connect($details['host'], $details['username'], $details['password'], $details['database']);
    if($conn->connect_error) {
        die("Error connecting to: ".$conn->connect_error);
    }

    $str = explode("|",htmlspecialchars($_COOKIE["q"]));
    $user_id = explode("@",$str[1])[0];

    $details = include('config.php');
    $query = "SELECT store_id, store_name, store_district, store_status, store_picture
            FROM ".$details['database'].".".$details['store_table'] .
            " WHERE user_id = " . $user_id . " ORDER BY store_status";

    //echo $query;
    $result = $conn-> query($query);

    //If store found, populate
    if($result-> num_rows > 0){
         
    echo '<p>result found</p>';
        while($row = $result -> fetch_assoc()){
             
    echo '<p>in while</p>';
            echo ' <div class="col-lg-4 col-sm-6">
                <div class="blog-item">
                    <div class="bi-pic">
                        <img src="'. $row["store_picture"] . '" alt="">
                    </div>
                    <div class="bi-text">
                        <a href="store.php?store_id='.$row['store_id'].'">
                            <h4>'.$row["store_name"] .'</h4>
                        </a>
                        <p>'.$row["store_status"] .'<span>- '.$row["store_district"] .'</span></p>
                    </div>
                </div>
            </div>';
        }//end while
    }  
    
    echo ' <div class="col-lg-4 col-sm-6">
            <div class="blog-item">
                <div class="bi-pic">
                    <img src="img/blog/add-store.jpg" alt="">
                </div>
                <div class="bi-text">
                    <a href="addstore.php">
                        <h4>- Add store -</h4>
                    </a> 
                </div>
            </div>
        </div>'; 


?>