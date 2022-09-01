<?php  
    $server = "localhost";
    $user = "root";
    $password = "";
    $database = "crud";

    $conn = mysqli_connect($server, $user, $password, $database);

    if(!$conn){
        echo "Connection failed!!!!!";
    }
?>