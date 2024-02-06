<?php 

    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "todolist";

    // creating database connection
    $con = mysqli_connect($host, $user, $password, $database);

    // check database connection
    if(mysqli_connect_errno())
    {
        die("Connection failed: " . mysqli_connect_error());
    }
?>
