<?php 
    $host = "localhost";
    $user = "root";
    $password = "root";
    $database = "hackathon";
    $connect = mysqli_connect ($host,$user,$password,$database);

    if (!$connect)
    {
        echo ('Error connect to DataBase');
    }
    
?>