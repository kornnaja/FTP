<?php 

    $host = "db";
    $username = "root";
    $password = "1234";
    $dbname = "devcorp_db";

    // Create Connection
    $conn = mysqli_connect($host, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed" . mysqli_connect_error());
    } 

?>