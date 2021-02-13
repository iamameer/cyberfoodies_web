<html>
<body>

<?php

    $details = include('config.php');
    $conn = mysqli_connect($details['host'], $details['username'], $details['password'], $details['database']);

    if (!$conn){
        die('Could not connect: ' . mysql_error());
    }else{
      echo 'Connected<br/>';
    }

    mysql_select_db($details['database'], $conn);

    $sql =  "INSERT INTO $details[table] (username, password) VALUES ($_POST[username],$_POST[password])";

    echo $sql."<br/>";
    if(!$conn-> query($sql)){
        echo("Error: ".$conn->error);
    }else{
        echo "1 record added<br/>";
    }
    // if (!mysql_query($sql,$conn)){
    //     die('Error: ' . mysql_error());
    // }else{
    //     echo "1 record added<br/>";
    // }

    mysql_close($conn);

    header("test.php");
    exit();

?>
</body>
</html>