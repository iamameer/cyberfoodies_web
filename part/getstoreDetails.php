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
    //     window.location.replace('http://cyberfoodies.epizy.com/index.php'); 
    //     </script>";
    // }

    $query = "SELECT store_location,store_time,store_delivery,store_order,store_info 
            FROM ".$details['database'].".".$details['store_table'] .
            " WHERE store_id = '" . $store_id ."'";

    //print_r($query);
    $result = $conn-> query($query);
    if($result-> num_rows > 0){
        //echo '<p>result found</p>';
            while($row = $result -> fetch_assoc()){
               $store_location = $row['store_location'];
               $store_time = $row['store_time'];
               $store_delivery = $row['store_delivery'];
               $store_order = $row['store_order'];
               $store_info = $row['store_info'];
            }

            // echo ' <tr class="productrow">
            //         <td class="dis" style="padding-left:10px;padding-right:10px;">'."aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa".'</td>
            //         <td class="dis" style="padding-left:10px;padding-right:10px;display:none;">'.$store_time.'</td>
            //         <td class="dis" style="padding-left:10px;padding-right:10px;display:none;">'.$store_delivery.'</td>
            //         <td class="dis" style="padding-left:10px;padding-right:10px;display:none;">'.$store_order.'</td>
            //         <td class="dis" id="info5" style="padding-left:10px;padding-right:10px;display:none;">'.$store_info.'</td>
            //     </tr>';

           
            echo '</tbody>
            </table>';

             echo ' <p class="dis" style="display:block;">'.$store_location.'</tr>
                    <p class="dis" style="display:none;">'.$store_time.'</tr>
                    <p class="dis" style="display:none;">'.$store_delivery.'</tr>
                    <p class="dis" style="display:none;">'.$store_order.'</tr>
                    <p class="dis" style="display:none;">'.$store_info.'</tr>
                    ';
    }  
    mysqli_close($conn);   
?>