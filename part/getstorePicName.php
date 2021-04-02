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

    $query = "SELECT store_name,store_picture_url,store_status
            FROM ".$details['database'].".".$details['store_table'] .
            " WHERE store_id = '" . $store_id ."'";

    //print_r($query);
    $result = $conn-> query($query);
    if($result-> num_rows > 0){
        //echo '<p>result found</p>';
            while($row = $result -> fetch_assoc()){
                echo '<h2 id="storename">'.$row['store_name'].'</h2>';
                echo '<p>Status: <span style="';
                if(strtolower($row['store_status']) == "closed"){
                    echo 'color:red!important;';
                }else{
                    echo 'color:green!important;';
                }
                echo '">'.$row['store_status'].'</span></p>';
                echo ' </div>
                <div class="blog-large-pic" style="padding-bottom:10px!important;">';

                $img =  '<img src="'.$row['store_picture_url'].'" @/>';
                // if(strlen($row['store_picture'])< 10){
                //     $img = "<img src='img/sample/no-store-img.jpg' @>";
                // }else{
                //     $img =  '<img src="data:image/jpeg;base64,'.base64_encode($row['store_picture']).'" @/>';
                // }
    
                echo str_replace('@','',$img);

                //object-fit: cover
            }
    }  
    mysqli_close($conn);   
?>