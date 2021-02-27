<?php 
    error_reporting(-1); ini_set('display_errors',1);
    $details = include('config/config.php');
    include('config/config.php');

    $conn = mysqli_connect($details['host'], $details['username'], $details['password'], $details['database']);
    if($conn->connect_error) {
        die("Error connecting to: ".$conn->connect_error);
    }

    $query = "SELECT store_name FROM ".$details['database'].".".$details['store_table'] 
            . " ORDER BY RAND() LIMIT 5 ";
    $result = $conn-> query($query);

    if (!$result) {
        print_r($query);
        var_dump($result->num_rows);
        trigger_error('Invalid query: ' . $conn->error);
    }

    // function getW($phrases){
    //     $counts = array();
    //     foreach ($phrases as $phrase) {
    //         $words = explode(' ', $phrase);
    //         foreach ($words as $word) {
    //             array_push($counts,$word);
    //             $word = preg_replace("#[^a-zA-Z\-]#", "", $word);
    //             $counts[$word] += 1;
    //         }
    //     }
    //     return $counts;
    // }

    if($result-> num_rows > 0){
        $str = '';
        while($row = $result -> fetch_assoc()){
            $tag = explode(" ",$row['store_name']); 
            foreach($tag as $word){ 
                if(strlen($word)>2){
                    echo '  <a href="browsestore.php?search='.$word.'">'.$word.'</a>';
                }
            }
        }
 
    }

    // echo '  <a href="#">Towel</a>
    //         <a href="#">Shoes</a>
    //         <a href="#">Coat</a>
    //         <a href="#">Dresses</a>
    //         <a href="#">Trousers</a>
    //         <a href="#">Men\'s hats</a>
    //         <a href="#">Backpack</a>';
?>