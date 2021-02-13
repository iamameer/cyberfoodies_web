<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fashi | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <?php
    $details = include('config.php');
    $servername = $details['host'];
    $username = $details['username'];
    $password =  $details['password'];
    
    // Create connection
    $conn = mysqli_connect($servername, $username, $password);
    
    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
      echo "fail";
    }
    echo "Connected successfully";
    ?>

    <iframe name="dummyframe" id="dummyframe" style="display: none;" action="test.php"></iframe>
    <form action="insert.php" method="POST" target="dummyframe">
        <input type="text" name="username" id="username" placeholder="username"/>
        <input type="text" name="password" id="password" placeholder="password"/>
        <input type="submit" id="btnSubmit" value="login" onClick="window.location.reload();"/>
    </form>
    <table>
    <tr>
        <th>Id</th>
        <th>Username</th>
        <th>Password</th>
    </tr>
  
    <?php
        include("list.php");
    ?>
    

</table>
</body>

</html>