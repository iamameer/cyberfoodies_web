<?php
        $details = include('config.php');
        $conn = mysqli_connect($details['host'], $details['username'], $details['password']);

        if($conn->connect_error) {
            die("Error connecting to: ".$conn->connect_error);
        }

        $sql = "SELECT id,username,password FROM " . $details['database'] . "." . $details['table'] ;
        $result = $conn-> query($sql);

        if($result-> num_rows > 0){
            while($row = $result -> fetch_assoc()){
                echo "<tr><td>".$row["id"] . "</td><td>" . $row["username"] . "</td><td>" . $row["password"] . "</td></tr>";
            }
            echo "</table>";
        }else{
            echo "0 result";
        }

    $conn->close();
?>